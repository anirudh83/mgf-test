<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
    }

	public function index()
	{
		if($this->session->userdata('id')){
			redirect(base_url('dashboard'));
		}
		else
		{
			redirect(base_url('welcome/login'));
		}
	}

	public function login()
	{
		$this->load->helper('cookie');
		$data['title'] = "Log In";
		$this->load->template('login',$data);
	}

	public function auth()
	{
		if($this->input->post()){
			$user = $this->db->get_where('user',['user_name' => $this->input->post('username'),'pass' => $this->input->post('password'),'delete_flag' => '0'])->result_array();
			if($user){
			
				$this->session->set_userdata('id',$user[0]['id']);
				redirect(base_url('dashboard'));

			}
			else{
				$this->session->set_flashdata('error', '1');
				redirect(base_url('welcome/login'));
			}

		}else{
			redirect(base_url('welcome/login'));
		}
	}

	public function logout()
	{
	    $this->session->sess_destroy();
	    redirect(base_url());
	}
}
