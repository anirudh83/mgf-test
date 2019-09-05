<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_prices extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->auth->check_session();
        $this->auth->not_admin();
        $this->load->model('user_model');
        $this->load->model('price_model');
    }

    public function index()
    {
    	$data['title'] = "Manage Prices";
		$this->load->template('manage_prices/index',$data);
    }

    public function manage_base_rate($id = false)
    {
    	if($id){
			
			$data['prices'] = '';
			$data['title'] 	= "Manage Base Rate Design";
			$this->load->template('manage_prices/manage_base_rate',$data);
			
		}
		else{
			$data['prices'] = '';
			$data['title'] = "Manage Base Rate Design";
			$this->load->template('manage_prices/manage_base_rate',$data);
		}
    }

    public function base_rate_save()
    {
    	$this->form_validation->set_error_delimiters('<div class="validation_error">', '</div>');
		$this->form_validation->set_rules('base_rate_name', 'Name', 'trim|max_length[250]');
		$this->form_validation->set_rules('base_rate_price', 'Rate', 'trim|max_length[10]|callback_rate_check');
		$this->form_validation->set_rules('main_id', '', 'trim');
		$this->form_validation->set_rules('base_rate_lock', '', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Manage Base Rate Design";
			$data['prices']  = $this->price_model->base_rate_designs_check($this->input->post('main_id'))[0];
			$this->load->template('manage_prices/manage_base_rate',$data);
		}
		else
		{
			$data = [
						'name'			=> $this->input->post('base_rate_name'),
						'rate'			=> $this->input->post('base_rate_price'),
						'lock'			=> $this->input->post('base_rate_lock')
					];

			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('base_rate_design',$data)){
				$this->session->set_flashdata('ok', 'Update successful');
				redirect(base_url('manage_prices/manage_base_rate'));
			}
			else{
				$this->session->set_flashdata('error', 'Error Please Try Again');
				redirect(base_url('manage_prices/manage_base_rate'));
			}
		}
    }



    public function rate_check($val)
    {
    	if(!empty($val)){
	        if ( !is_numeric($val)) {
	            $this->form_validation->set_message('rate_check', 'The {field} field must be number or decimal.');
	            return FALSE;
	        } else {
	            return TRUE;
	        }
	    }
	    else{
	    	return TRUE;
	    }
    }

    public function optional_prices($id = false)
    {
    	if($id){
			if($this->price_model->optional_price_check($id)){
				$data['title'] = "Manage Optional Features";
				$data['prices']  = $this->price_model->optional_price_check($id)[0];
				$this->load->template('manage_prices/manage_optional_features',$data);
			}
			else{
				$data['prices'] = '';
				$data['title'] 	= "Manage Optional Features";
				$this->load->template('manage_prices/manage_optional_features',$data);
			}
		}
		else{
			$data['prices'] = '';
			$data['title'] = "Manage Optional Features";
			$this->load->template('manage_prices/manage_optional_features',$data);
		}
    }

    public function optional_price_save()
    {
    	$this->form_validation->set_error_delimiters('<div class="validation_error">', '</div>');
		$this->form_validation->set_rules('base_rate_name', 'Name', 'trim|max_length[250]');
		$this->form_validation->set_rules('base_rate_price', 'Rate', 'trim|max_length[10]|callback_rate_check');
		$this->form_validation->set_rules('main_id', '', 'trim');
		$this->form_validation->set_rules('base_rate_lock', '', 'trim');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = "Manage Optional Features";
			$data['prices']  = $this->price_model->optional_price_check($this->input->post('main_id'))[0];
			$this->load->template('manage_prices/manage_optional_features',$data);
		}
		else
		{
			$data = [
						'name'			=> $this->input->post('base_rate_name'),
						'rate'			=> $this->input->post('base_rate_price'),
						'lock'			=> $this->input->post('base_rate_lock')
					];

			$this->db->where('id',$this->input->post('main_id'));
			if($this->db->update('optional_features',$data)){
				$this->session->set_flashdata('ok', 'Update successful');
				redirect(base_url('manage_prices/optional_prices'));
			}
			else{
				$this->session->set_flashdata('error', 'Error Please Try Again');
				redirect(base_url('manage_prices/optional_prices'));
			}
		}
    }

    public function included_features()
    {
    	if($this->input->get('f_id')){
			if($this->price_model->optional_price_check($this->input->get('f_id'))){
				$data['title'] = "Manage Included Features";
				$data['prices']  = $this->price_model->optional_price_check($this->input->get('f_id'))[0];
				if($this->input->get('d_id') && !empty($this->input->get('d_id')) && $this->price_model->base_rate_designs_check($this->input->get('d_id'))){
					$data['design'] = $this->input->get('d_id');
				}else{
					$data['design'] = '';
				}
				$data['f_id'] = $this->input->get('f_id');
				$this->load->template('manage_prices/manage_included_features',$data);
			}
			else{
				$data['prices'] = '';
				$data['title'] 	= "Manage Included Features";
				if($this->input->get('d_id') && !empty($this->input->get('d_id')) && $this->price_model->base_rate_designs_check($this->input->get('d_id'))){
					$data['design'] = $this->input->get('d_id');
				}else{
					$data['design'] = '';
				}
				$data['f_id'] = '';
				$this->load->template('manage_prices/manage_included_features',$data);
			}
		}
		else{
			$data['prices'] = '';
			$data['title'] = "Manage Included Features";
			if($this->input->get('d_id') && !empty($this->input->get('d_id')) && $this->price_model->base_rate_designs_check($this->input->get('d_id'))){
				$data['design'] = $this->input->get('d_id');
			}else{
				$data['design'] = '';
			}
			$data['f_id'] = '';
			$this->load->template('manage_prices/manage_included_features',$data);
		}
    }

    public function included_features_save()
    {
    	if($this->input->post('included')){
	    	$this->db->where('id',$_POST['d_id']);
	    	$this->db->update('base_rate_design',['included' => implode(',', $_POST['included'])]);
	    	$this->session->set_flashdata('ok', 'Update successful');
			redirect(base_url('manage_prices/included_features/?d_id='.$_POST['d_id']));
		}
		else{
			$this->db->where('id',$_POST['d_id']);
	    	$this->db->update('base_rate_design',['included' => '']);
	    	$this->session->set_flashdata('ok', 'Update successful');
			redirect(base_url('manage_prices/included_features/?d_id='.$_POST['d_id']));	
		}
    }

    public function upload_images()
    {
    	$files_row = $this->db->get_where('files',['id' => '1'])->result_array()[0];
    	
    	if (!empty($_FILES['pc_one']['name'])) {

    		if(file_exists(FCPATH."files/pdf/".$files_row['pc_one'])){
                unlink(FCPATH."files/pdf/".$files_row['pc_one']);    
            }

    		$path = $_FILES['pc_one']['name'];
			$newName = "MGF_Master_Pack_1.".pathinfo($path, PATHINFO_EXTENSION); 
			$config['upload_path']		= './files/pdf/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 6000000;
			$config['file_name'] = $newName;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('pc_one')){

				$this->db->where('id', '1');
				$this->db->update('files',['pc_one' => $newName]);

				
				
			}
    	}
    	
    	if (!empty($_FILES['pc_two']['name'])) {

    		if(file_exists(FCPATH."files/pdf/".$files_row['pc_two'])){
                unlink(FCPATH."files/pdf/".$files_row['pc_two']);    
            }

    		$path = $_FILES['pc_two']['name'];
			$newName = "MGF_Master_Pack_2.".pathinfo($path, PATHINFO_EXTENSION); 
			$config['upload_path']		= './files/pdf/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 6000000;
			$config['file_name'] = $newName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('pc_two')){

				$this->db->where('id', '1');
				$this->db->update('files',['pc_two' => $newName]);
			}
    	}

    	if (!empty($_FILES['pc_three']['name'])) {
    		
    		if(file_exists(FCPATH."files/pdf/".$files_row['pc_three'])){
                unlink(FCPATH."files/pdf/".$files_row['pc_three']);    
            }

    		$path = $_FILES['pc_three']['name'];
			$newName = "MGF_Master_Pack_3.".pathinfo($path, PATHINFO_EXTENSION); 
			$config['upload_path']		= './files/pdf/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 6000000;
			$config['file_name'] = $newName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('pc_three')){

				$this->db->where('id', '1');
				$this->db->update('files',['pc_three' => $newName]);

				
			}
    	}

    	if (!empty($_FILES['trade']['name'])) {

    		if(file_exists(FCPATH."files/pdf/".$files_row['trade'])){
                unlink(FCPATH."files/pdf/".$files_row['trade']);    
            }

    		$path = $_FILES['trade']['name'];
			$newName = "MGF_Trade_Breakup.".pathinfo($path, PATHINFO_EXTENSION); 
			$config['upload_path']		= './files/pdf/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 6000000;
			$config['file_name'] = $newName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('trade')){

				$this->db->where('id', '1');
				$this->db->update('files',['trade' => $newName]);

				
				
			}
    	}

    	if (!empty($_FILES['contract']['name'])) {

    		if(file_exists(FCPATH."files/pdf/".$files_row['contract'])){
                unlink(FCPATH."files/pdf/".$files_row['contract']);    
            }

    		$path = $_FILES['contract']['name'];
			$newName = md5(microtime(true)).".".pathinfo($path, PATHINFO_EXTENSION); 
			$config['upload_path']		= './files/pdf/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 6000000;
			$config['file_name'] = $newName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('contract')){

				$this->db->where('id', '1');
				$this->db->update('files',['contract' => $newName]);

				
				
			}
    	}

    	if (!empty($_FILES['warrenty']['name'])) {

    		if(file_exists(FCPATH."files/pdf/".$files_row['warrenty'])){
                unlink(FCPATH."files/pdf/".$files_row['warrenty']);    
            }
    		
    		$path = $_FILES['warrenty']['name'];
			$newName = "MGF_Home_Warrantity.".pathinfo($path, PATHINFO_EXTENSION); 
			$config['upload_path']		= './files/pdf/';
			$config['allowed_types']	= 'pdf';
			$config['max_size']			= 6000000;
			$config['file_name'] = $newName;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if($this->upload->do_upload('warrenty')){

				$this->db->where('id', '1');
				$this->db->update('files',['warrenty' => $newName]);

				
				
			}
    	}

    	$this->session->set_flashdata('ok', 'Update successful');
		redirect(base_url('manage_prices'));

    }
}