<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		check_admin();
		$this->load->model('user_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['row'] = $this->user_m->get();
		// check_not_login();
		// $this->load->view('user/user_data');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->model('user_m');
		$data['row'] = $this->user_m->get();
		$this->load->view('user/user_data', $data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
		$this->form_validation->set_rules('password', 'Password', 'min_length[5]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'matches[password]',
			array('matches' => '%s tidak sesuai dengan password')
		);

		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/topbar');
			$this->load->view('user/user_form_add');
			$this->load->view('templates/footer');
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->add($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".base_url('user')."';</script>";
		}

	}

	public function edit($id)
	{
		$this->form_validation->set_rules('fullname', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
		if($this->input->post('password')) {
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		if($this->input->post('passconf')) {
			$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]',
				array('matches' => '%s tidak sesuai dengan password')
			);
		}
		$this->form_validation->set_rules('level', 'Level', 'required');

		$this->form_validation->set_message('required', '%s masih kosong, silahkan isi');
		$this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
		$this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti');

		$this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

		if ($this->form_validation->run() == FALSE) {
			$query = $this->user_m->get($id);
			if($query->num_rows() > 0) {
				$data['row'] = $query->row();
				$this->load->view('user/user_form_edit', $data);
			} else {
				echo "<script>alert('Data tidak ditemukan');";
				echo "window.location='".base_url('user')."';</script>";
			}
			
		} else {
			$post = $this->input->post(null, TRUE);
			$this->user_m->edit($post);
			if($this->db->affected_rows() > 0) {
				echo "<script>alert('Data berhasil Disimpan');</script>";
			}
			echo "<script>window.location='".base_url('user')."';</script>";
		}

	}
	function username_check() {
		$post = $this->input->post(null, TRUE);
		$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
		if($query->num_rows() > 0) {
			$this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
			return FALSE;
		} else {
			return TRUE;
		}
	}


	public function del()
	{
		$id = $this->input->post('user_id');
		$this->user_m->del($id);

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil dihapus');</script>";
		}
		echo "<script>window.location='".base_url('user')."';</script>";
	}
}
