<?php
class Quotation_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_quotation($id)
	{
		return $this->db->get_where('quotation',['id' => $id])->result_array();
	}

	public function get_full_quote($id)
	{
		$this->db->select('*');
		$this->db->from('quotation');
		$this->db->join('quotation_detail', 'quotation.id = quotation_detail.q_id');
		$this->db->where('quotation.id', $id);
		return $this->db->get()->result_array();
	}

	public function search($f_name,$l_name,$from,$to,$address,$created_by)
	{

		$var = $from;
		$date = str_replace('/', '-', $var);
		$from = date('Y-m-d', strtotime($date));

		$var = $to;
		$date = str_replace('/', '-', $var);
		$to = date('Y-m-d', strtotime($date));

		if(!empty($f_name) && !empty($l_name)){
			$this->db->group_start();
				if(!empty($f_name)){
					$this->db->like('first_name',$f_name,'both');
				}

				if(!empty($l_name)){
					$this->db->like('last_name',$l_name,'both');	
				}

				if(!empty($address)){
					$this->db->like('address',$address,'both');	
				}

			$this->db->group_end();
		}

		if(strtotime($from)>strtotime(0)){
			$this->db->where('date >=',date('Y-m-d' ,strtotime($from)));
		}

		if(strtotime($to)>strtotime(0)){
			$this->db->where('date <=',date('Y-m-d' ,strtotime($to)));
		}
		if(!empty($created_by)){
			$this->db->where('user_id',$created_by,'both');	
		}
		$this->db->where('df','0');
		if($this->session->userdata('id') != '1'){
			$this->db->where('user_id',$this->session->userdata('id'));
		}
		$this->db->order_by('id','DESC');
		$query = $this->db->get('quotation');
		return [$query->num_rows(),$query->result_array()];
	}

	public function dashboard_list()
	{
		if($this->session->userdata('id') != '1'){
			$this->db->where('user_id',$this->session->userdata('id'));
		}
		$this->db->order_by('id','DESC');
		$this->db->limit(50);
		$query = $this->db->get('quotation');
		return $query->result_array();
	}

}
?>