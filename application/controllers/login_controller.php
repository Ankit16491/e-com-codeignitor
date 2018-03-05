<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('id')){
			return redirect('admin_controller');
		}
	}	
	public function index()
	{

		$this->load->view('admin/admin_login/login');

	}
	public function login_pro()
	{
		
		$this->form_validation->set_rules('username','User Name','required|valid_email');
		$this->form_validation->set_rules('pass','Password','required|min_length[5]');

		if($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error" style="color:red">', '</div>');
			$this->load->view('admin/admin_login/login');
		}
		else
		{
			$username = $this->input->post('username');
			$pass = $this->input->post('pass');

			$this->load->model('login_model');
			$result = $this->login_model->admin_login($username,$pass);

			if($result)
			{
				$id = $result->id;
				$this->session->set_userdata('id',$id);
				return redirect('admin_controller');
				
			}else{

				$this->session->set_flashdata('login_error','invalid username of password try again');
				return redirect('login_controller');
			}
		}
		
	}
}
