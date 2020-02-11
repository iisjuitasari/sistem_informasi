<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class category extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('category_m');
	}

	public function index()
	{
		$data['row'] = $this->category_m->get();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('product/category/category_data', $data);
		$this->load->view('templates/footer');
	}

	public function add() {
		$category = new stdClass();
		$category->category_id = null;
		$category->name = null;
		$data = array(
			'page' => 'add',
			'row' => $category
		);
		$this->load->view('product/category/category_form', $data);
	}

	public function edit($id)
	{
		$query = $this->category_m->get($id);
		if($query->num_rows() > 0) {
			$category = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $category
			);
			$this->load->view('product/category/category_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
			echo "window.location='".base_url('category')."';</script>";
		}
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->category_m->add($post);
		}

		if($this->db->affected_rows() > 0) {
			echo "<script>alert('Data berhasil disimpan');</script>";
		} else if(isset($_POST['edit'])) {
			$this->category_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil disimpan');
		}
		redirect('category');
	}

	public function del($id)
	{
		$this->category_m->del($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success','Data berhasil dihapus');
		}
		redirect('category');
	}
}
