<?php
class User_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function get_users()
	{
		return $this->db->get_where('user',['delete_flag' => '0'])->result_array();
	}

	public function get_users_all()
	{
		return $this->db->get_where('user')->result_array();
	}


	public function user_check($id)
	{
		return $this->db->get_where('user',['id' => $id,'id !=' => '1','delete_flag' => '0'])->result_array();
	}

	public function user_check2($id)
	{
		return $this->db->get_where('user',['id' => $id,'delete_flag' => '0'])->result_array();
	}

	public function get_user($id)
	{
		return $this->db->get_where('user',['id' => $id])->result_array()[0];
	}
}
?>