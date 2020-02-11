<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// check_not_login();
		// $this->template->load('template', 'dashboard');
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/topbar');
		$this->load->view('template');
		$this->load->view('templates/footer');
	}
}
