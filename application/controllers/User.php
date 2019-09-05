<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->auth->check_session();
        $this->auth->not_admin();
        $this->load->model('user_model');
    }

	public function index()
	{
		$data['title'] = "Users";
		$this->load->template('user/index',$data);
	}

	public function add()
	{
		$data['title'] = "Add User";
		$this->load->template('user/add',$data);
	}

	public function edit($id = false)
	{
		if($id){
			if($this->user_model->user_check2($id)){
				$data['title'] = "Edit User";
				$data['user']  = $this->user_model->user_check2($id)[0];
				$this->load->template('user/edit',$data);
			}
			else{
				$this->session->set_flashdata('error', 'User Not Found');
				redirect(base_url('user'));
			}
		}
		else{
			$this->session->set_flashdata('error', 'User Not Found');
			redirect(base_url('user'));
		}
	}

	public function save()
	{

		$this->form_validation->set_error_delimiters('<div class="validation_error">', '</div>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[30]|alpha_dash|is_unique[user.user_name]',array('is_unique' => 'Username Is Already Exists'));
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[30]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Add User";
			$this->load->template('user/add',$data);
		}
		else
		{ 
			$data = [
						'name'			=> $this->input->post('name'),
						'user_name'		=> $this->input->post('username'),
						'pass'			=> $this->input->post('password')
					];

			
			if($this->db->insert('user',$data)){
				$this->session->set_flashdata('ok', 'User Successfully Added');
				redirect(base_url('user'));
			}
			else{
				$this->session->set_flashdata('error', 'Error Please Try Again');
				redirect(base_url('user'));
			}
		}
	}

	public function update()
	{

		$this->form_validation->set_error_delimiters('<div class="validation_error">', '</div>');
		$this->form_validation->set_rules('username', 'Username','trim|required|min_length[5]|max_length[30]|alpha_dash|callback_check_user['.$this->input->post('main_id').']');
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('main_id', '', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[30]|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Edit User";
			$data['user']  = $this->user_model->user_check($this->input->post('main_id'))[0];
			$this->load->template('user/edit',$data);
		}
		else
		{ 
			$data = [
						'name'			=> $this->input->post('name'),
						'user_name'		=> $this->input->post('username'),
						'pass'			=> $this->input->post('password')
					];

			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('user',$data)){
				$this->session->set_flashdata('ok', 'User Successfully Saved');
				redirect(base_url('user'));
			}
			else{
				$this->session->set_flashdata('error', 'Error Please Try Again');
				redirect(base_url('user'));
			}
		}
	}

	public function delete($id = false)
	{
		if($id){
			if($this->user_model->user_check($id)){
				
				$this->db->where('id',$id);
				if($this->db->update('user',['delete_flag' => '1'])){

					$this->session->set_flashdata('ok', 'User Successfully Deleted');
					redirect(base_url('user'));
				}
				else{
					$this->session->set_flashdata('error', 'Error Please Try Again');
					redirect(base_url('user'));
				}

			}
			else{
				$this->session->set_flashdata('error', 'User Not Found');
				redirect(base_url('user'));
			}
		}
		else{
			$this->session->set_flashdata('error', 'User Not Found');
			redirect(base_url('user'));
		}
	}

	public function check_user($username,$id)
	{
		if($this->db->get_where('user',['id !=' => $id,'user_name' => $username])->result_array()){
			$this->form_validation->set_message('check_user', 'Username Already Exists.');
			return false;
		}
		else{
			return true;
		}
	}

}