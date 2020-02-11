<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('unit_m');
	}

	public function index()
	{
		$data['row'] = $this->unit_m->get();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('product/unit/unit_data', $data);
		$this->load->view('templates/footer');
	}

	public function add() {
		$unit = new stdClass();
		$unit->unit_id = null;
		$unit->name = null;
		$data = array(
			'page' => 'add',
			'row' => $unit
		);
		$this->load->view('product/unit/unit_form', $data);
	}

	public function edit($id)
	{
		$query = $this->unit_m->get($id);
		if($query->num_rows() > 0) {
			$unit = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $unit
			);
			$this->load->view('product/unit/unit_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".base_url('unit')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->unit_m->add($post);
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil disimpan');</script>";
		} else if(isset($_POST['edit'])) {
			$this->unit_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('unit');
	}

	public function del($id)
	{
		$this->unit_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('unit');
	}
}
