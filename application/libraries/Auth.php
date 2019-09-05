<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->helper('url');
    }

    
    function check_session()
	{
        if(!$this->CI->session->userdata('id'))
        {
        	$this->CI->session->set_flashdata('error', 'This is not a valid Session Please Login Here.');
            redirect(base_url());
        }
	}

    function not_admin()
    {
        if($this->CI->session->userdata('id') != '1')
        {
            redirect(base_url());
        }
    }

    function get_admin($id)
    {
        $this->CI->db->select('*');
        $this->CI->db->where('id', $id);
        $result = $this->CI->db->get('user');
        $result = $result->row();
        return $result;
    }  


    function check_auth()
    {
        if($this->CI->session->userdata('id') != '1')
        {
            redirect(base_url('error404'));
        }
    }



}