<?php
class Price_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function base_rate_designs()
	{
		return $this->db->get_where('base_rate_design')->result_array();
	}

	public function base_rate_designs_check($id)
	{
		return $this->db->get_where('base_rate_design',['id' => $id])->result_array();
	}

	public function optional_price_check($id)
	{
		return $this->db->get_where('optional_features',['id' => $id])->result_array();
	}


	public function get_categories()
	{
		return $this->db->get_where('category')->result_array();	
	}

	public function get_subcategories($category_id)
	{	
		$this->db->order_by('id','ASC');
		return $this->db->get_where('sub_category',['category' => $category_id])->result_array();	
	}

	public function get_optional_features($category_id)
	{	
		$this->db->order_by('id','ASC');
		return $this->db->get_where('optional_features',['category' => $category_id])->result_array();	
	}

	public function get_optional_features_id($id)
	{
		return $this->db->get_where('optional_features',['id' => $id])->result_array()[0];	
	}

	
}
?>