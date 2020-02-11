<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('user_m');

	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->db->get_where('user', ['username' => $username])->row_array();

			if($user){

				  if(password_verify($password, $user['password'])){
				  	$data = [
				  		'user_id' => $user['user_id'],
				  		'username' => $user['username'],
				  		'name' => $user['name'],
				  		'level' => $user['level']
				  	];
				  	$this->session->set_userdata($data);
					redirect('dashboard');
					
				  }else{
				  	$this->session->set_flashdata('message', 'Password Salah Kawan!');
				  	redirect('auth');
				  }

			}else{
				$this->session->set_flashdata('message', 'Username Belum Terdaftar');
				redirect('auth');
			}
		}
		// $this->load->view('login');
	}

	private function process()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		if($user){

		}else{
			$this->session->set_flashdata('message', 'Username Belum Terdaftar');
			redirect('auth');
		}

		
		// {% endif %}
		// $post = $this->input->post(null, TRUE);
		// if(isset($post['login'])) {
		// 	$this->load->model('user_m');
		// 	$query = $this->user_m->login($post);
		// 	if($query->num_rows() > 0) {
		// 		$row = $query->row();
		// 		$params = array(
		// 			'userid' => $row->user_id,
		// 			'level' => $row->level
		// 		);
		// 		$this->session->set_userdata($params);
		// 		echo "<script>
		// 		alert('selamat, login berhasil');

		// 		windows.location='".site_url('dashboard')."';
		// 		</script>";
		// 	} else {
		// 		echo "<script>
		// 		alert('login gagal, username / password salah');
		// 		windows.location='".site_url('auth/login')."';
		// 		</script>";
		// 	}
		// }
	}

	public function	logout()
	{
		$data	= array('user_id', 'level', 'name', 'username');
		$this->session->unset_userdata($data);
		redirect('auth');
	}
}
