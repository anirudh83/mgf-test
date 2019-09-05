<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('quotation_model');
        $this->load->model('user_model');
    }

	public function index()
	{
		$data['title'] = "Dashboard";
		$this->load->template('dashboard',$data);
	}

}