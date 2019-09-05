<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotation extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->auth->check_session();
        $this->load->model('user_model');
        $this->load->model('price_model');
        $this->load->model('quotation_model');
        $this->load->model('pdf_model');
    }

    public function index()
    {
        if($this->input->post()){
            $data['title']      = "Search For a Quotation";
            $data['date']       = [$this->input->post('date_from'),$this->input->post('date_to')];
            $data['name']       = [$this->input->post('first_name'),$this->input->post('last_name')];
            $data['add']        = [$this->input->post('address'),$this->input->post('created_by')];
            $data['result']     = $this->quotation_model->search($this->input->post('first_name'),$this->input->post('last_name'),$this->input->post('date_from'),$this->input->post('date_to'),$this->input->post('address'),$this->input->post('created_by'));
            $data['results']    = $data['result'][0];
            $data['result']     = $data['result'][1];
            $this->load->template('quotation/index',$data);
        }
        else{
            $data['title']      = "Search For a Quotation";
            $today              = date("Y-m-d");
            $data['date']       = [date('d/m/Y', strtotime($today.' -1 month')),date('d/m/Y')];
            $data['name']       = ['',''];
            $data['add']        = ['',''];
            $data['results']    = 0;
            $this->load->template('quotation/index',$data);       
        }
    }

    public function new()
    {
    	$data['title'] = "Pricing Calculator";
		$this->load->template('quotation/new',$data);
    }

    public function discount_check()
    {
        if($this->input->post('code')){
            $code = $this->db->get_where('discount',['code' => $this->input->post('code')])->result_array();
            if($code){
                echo "1";    
            }
            else{
                echo "0";
            }
        }
        else{
            echo "0";
        }
    }

    public function save_quote()
    {

        if($this->input->post('certificate')){
            $certificate = $this->input->post('certificate');
        }
        else{
            $certificate = '';   
        }

        if($this->input->post('diagram')){
            $diagram = $this->input->post('diagram');
        }
        else{
            $diagram = '';   
        }

        if(!empty($this->input->post('discount_code'))){
            $code = $this->db->get_where('discount',['code' => $this->input->post('discount_code')])->result_array();
            if($code){
                $dis_code  = $code[0]['code'];
                $dis_type  = (!empty($code[0]['percent']))?'p':'a';
                $dis_value = (!empty($code[0]['percent']))?$code[0]['percent']:$code[0]['amount'];
                if($dis_type == 'p'){
                    $_grand_total = $this->input->post('grand_total') * $dis_value / 100;
                    $_grand_total = $this->input->post('grand_total') - $_grand_total;
                }
                else{
                    $_grand_total = $this->input->post('grand_total') - $dis_value;
                }
            }else{
                $dis_code  = "";
                $dis_type  = "";
                $dis_value = "";
                $_grand_total = $this->input->post('grand_total');    
            }
        }
        else{
            $dis_code  = "";
            $dis_type  = "";
            $dis_value = "";
            $_grand_total = $this->input->post('grand_total');
        }

        $personal = [
                        'title'         => $this->input->post('salutation_name'),
                        'first_name'    => $this->input->post('first_name'),
                        'last_name'     => $this->input->post('last_name'),
                        'title2'        => $this->input->post('salutation_name2'),
                        'first_name2'   => $this->input->post('first_name2'),
                        'last_name2'    => $this->input->post('last_name2'),
                        'address'       => $this->input->post('address'),
                        'suburb'        => $this->input->post('suburb'),
                        'state'         => $this->input->post('state'),
                        'postcode'      => $this->input->post('postcode'),
                        'email'         => $this->input->post('email'),
                        'landline'      => $this->input->post('landline'),
                        'mobile'        => $this->input->post('mobile'),
                        'fax'           => $this->input->post('fax'),
                        'certificate'   => $certificate,
                        'diagram'       => $diagram,
                        'approval_cost'         => $this->input->post('approval_cost'),
                        'demolition_cost'       => $this->input->post('demolition_cost'),
                        'land_clearing_cost'    => $this->input->post('land_clearing_cost'),
                        'meter'                 => $this->input->post('meter'),
                        'amount'                => $this->input->post('price_meter'),
                        'description'           => $this->input->post('remarks'),
                        'grand_total'           => $_grand_total,
                        'd_code'                => $dis_code,
                        'd_type'                => $dis_type,
                        'd_value'               => $dis_value,
                        'date'                  => date('Y-m-d'),
                        'user_id'               => $this->session->userdata('id')
                    ];

            if($this->db->insert('quotation' ,$personal)){
                $insert_id = $this->db->insert_id();

                if($this->input->post('BaseDesign')){
                    $design_id = $this->input->post('BaseDesign');
                    $design_text = $this->input->post('design_hid');
                }else{
                    $design_id = '';
                    $design_text = '';
                }

                if($this->input->post('cate1')){
                    $cate1 = json_encode([$this->input->post('cate1'),$this->input->post('catetext1')]);
                }else{
                    $cate1 = 'null';
                }

                if($this->input->post('cate2')){
                    $cate2 = json_encode([$this->input->post('cate2'),$this->input->post('catetext2')]);
                }else{
                    $cate2 = 'null';
                }

                if($this->input->post('cate3')){
                    $cate3 = json_encode([$this->input->post('cate3'),$this->input->post('catetext3')]);
                }else{
                    $cate3 = 'null';
                }

                if($this->input->post('cate4')){
                    $cate4 = json_encode([$this->input->post('cate4'),$this->input->post('catetext4')]);
                }else{
                    $cate4 = 'null';
                }

                $cate5 = [];
                foreach ($this->input->post('cateid5') as $key => $value) {
                    $cate5[] = [$value,$this->input->post('cate5qty')[$key],$this->input->post('cate5text')[$key]];
                }
                $cate5 = json_encode($cate5);

                if($this->input->post('cate6')){
                    $cate6 = json_encode([$this->input->post('cate6'),$this->input->post('catetext6')]);
                }else{
                    $cate6 = 'null';
                }

                if($this->input->post('cate7')){
                    $cate7 = json_encode([$this->input->post('cate7'),$this->input->post('catetext7')]);
                }else{
                    $cate7 = 'null';
                }

                if($this->input->post('cate8')){
                    $cate8 = json_encode([$this->input->post('cate8'),$this->input->post('catetext8')]);
                }else{
                    $cate8 = 'null';
                }

                if($this->input->post('cate9')){
                    $cate9 = [];
                    foreach ($this->input->post('cate9') as $key => $value) {
                        $cate9[] = [$value,$this->input->post('cate9text'.$value)];                    
                    }
                    $cate9 = json_encode($cate9);
                }else{
                    $cate9 = 'null';
                }

                if($this->input->post('cate10')){
                    $cate10 = json_encode([$this->input->post('cate10'),$this->input->post('catetext10')]);
                }else{
                    $cate10 = 'null';
                }

                if($this->input->post('cate11')){
                    $cate11 = json_encode([$this->input->post('cate11'),$this->input->post('catetext11')]);
                }else{
                    $cate11 = 'null';
                }

                if($this->input->post('cate12')){
                    $cate12 = [];
                    foreach ($this->input->post('cate12') as $key => $value) {
                        $cate12[] = [$value,$this->input->post('cate12text'.$value)];                    
                    }
                    $cate12 = json_encode($cate12);
                }else{
                    $cate12 = 'null';
                }

                if($this->input->post('cate13')){
                    $cate13 = json_encode([$this->input->post('cate13'),$this->input->post('catetext13')]);
                }else{
                    $cate13 = 'null';
                }

                if($this->input->post('cate14')){
                    $cate14 = [];
                    foreach ($this->input->post('cate14') as $key => $value) {
                        $cate14[] = [$value,$this->input->post('cate14text'.$value)];                    
                    }
                    $cate14 = json_encode($cate14);
                }else{
                    $cate14 = 'null';
                }

                if($this->input->post('cate15')){
                    $cate15 = json_encode([$this->input->post('cate15'),$this->input->post('catetext15')]);
                }else{
                    $cate15 = 'null';
                }

                if($this->input->post('cate16')){
                    $cate16 = json_encode([$this->input->post('cate16'),$this->input->post('catetext16')]);
                }else{
                    $cate16 = 'null';
                }

                if($this->input->post('cate17')){
                    $cate17 = json_encode([$this->input->post('cate17'),$this->input->post('catetext17')]);
                }else{
                    $cate17 = 'null';
                }

                if($this->input->post('cate18')){
                    $cate18 = json_encode([$this->input->post('cate18'),$this->input->post('catetext18')]);
                }else{
                    $cate18 = 'null';
                }

                if($this->input->post('cate19')){
                    $cate19 = json_encode([$this->input->post('cate19'),$this->input->post('catetext19')]);
                }else{
                    $cate19 = 'null';
                }

                if($this->input->post('cate20')){
                    $cate20 = json_encode([$this->input->post('cate20'),$this->input->post('catetext20')]);
                }else{
                    $cate20 = 'null';
                }

                if($this->input->post('cate21')){
                    $cate21 = json_encode([$this->input->post('cate21'),$this->input->post('catetext21')]);
                }else{
                    $cate21 = 'null';
                }

                if($this->input->post('cate22')){
                    $cate22 = json_encode([$this->input->post('cate22'),$this->input->post('catetext22')]);
                }else{
                    $cate22 = 'null';
                }

                if($this->input->post('cate23')){
                    $cate23 = json_encode([$this->input->post('cate23'),$this->input->post('catetext23')]);
                }else{
                    $cate23 = 'null';
                }

                if($this->input->post('cate24')){
                    $cate24 = json_encode([$this->input->post('cate24'),$this->input->post('catetext24')]);
                }else{
                    $cate24 = 'null';
                }

                $cate25 = [];
                foreach ($this->input->post('cateid25') as $key => $value) {
                    $cate25[] = [$value,$this->input->post('cate25qty')[$key],$this->input->post('cate25text')[$key]];
                }
                $cate25 = json_encode($cate25);

                $cate26 = [];
                foreach ($this->input->post('cateid26') as $key => $value) {
                    $cate26[] = [$value,$this->input->post('cate26qty')[$key],$this->input->post('cate26text')[$key]];
                }
                $cate26 = json_encode($cate26);

                if($this->input->post('cate27')){
                    $cate27 = [];
                    foreach ($this->input->post('cate27') as $key => $value) {
                        $cate27[] = [$value,$this->input->post('cate27text'.$value)];                    
                    }
                    $cate27 = json_encode($cate27);
                }else{
                    $cate27 = 'null';
                }

                if($this->input->post('cate28')){
                    $cate28 = json_encode([$this->input->post('cate28'),$this->input->post('catetext28')]);
                }else{
                    $cate28 = 'null';
                }

                $cate29 = [];
                foreach ($this->input->post('cateid29') as $key => $value) {
                    $cate29[] = [$value,$this->input->post('cate29qty')[$key],$this->input->post('cate29text')[$key]];
                }
                $cate29 = json_encode($cate29);

                $cate30 = [];
                foreach ($this->input->post('cateid30') as $key => $value) {
                    $cate30[] = [$value,$this->input->post('cate30qty')[$key],$this->input->post('cate30text')[$key]];
                }
                $cate30 = json_encode($cate30);

                if($this->input->post('cate31')){
                    $cate31 = [];
                    foreach ($this->input->post('cate31') as $key => $value) {
                        $cate31[] = [$value,$this->input->post('cate31text'.$value)];                    
                    }
                    $cate31 = json_encode($cate31);
                }else{
                    $cate31 = 'null';
                }

                $extra = [];
                foreach ($this->input->post('other_note') as $key => $value) {
                    $extra[] = [$value,$this->input->post('other_rate')[$key]];
                }
                $extra = json_encode($extra);

                $detail =   [
                                'design_id'     =>  $design_id,
                                'design_text'   =>  $design_text,
                                'cate1'         =>  $cate1,
                                'cate2'         =>  $cate2,
                                'cate3'         =>  $cate3,
                                'cate4'         =>  $cate4,
                                'cate5'         =>  $cate5,
                                'cate6'         =>  $cate6,
                                'cate7'         =>  $cate7,
                                'cate8'         =>  $cate8,
                                'cate9'         =>  $cate9,
                                'cate10'        =>  $cate10,
                                'cate11'        =>  $cate11,
                                'cate12'        =>  $cate12,
                                'cate13'        =>  $cate13,
                                'cate14'        =>  $cate14,
                                'cate15'        =>  $cate15,
                                'cate16'        =>  $cate16,
                                'cate17'        =>  $cate17,
                                'cate18'        =>  $cate18,
                                'cate19'        =>  $cate19,
                                'cate20'        =>  $cate20,
                                'cate21'        =>  $cate21,
                                'cate22'        =>  $cate22,
                                'cate23'        =>  $cate23,
                                'cate24'        =>  $cate24,
                                'cate25'        =>  $cate25,
                                'cate26'        =>  $cate26,
                                'cate27'        =>  $cate27,
                                'cate28'        =>  $cate28,
                                'cate29'        =>  $cate29,
                                'cate30'        =>  $cate30,
                                'cate31'        =>  $cate31,
                                'extra'         =>  $extra,
                                'q_id'          =>  $insert_id
                            ];

                if($this->db->insert('quotation_detail' ,$detail)){
                    $this->session->set_flashdata('ok', 'Quotation successful Save');
                    redirect(base_url('quotation/new'));
                }
                else{
                    $this->db->where('id',$insert_id);
                    $this->db->delete('quotation');
                    $this->session->set_flashdata('error', 'Error Please Try Again');
                    redirect(base_url('quotation/new'));
                }
            }
            else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation/new'));
            }
    }

    public function save_new_quote()
    {

        if($this->input->post('certificate')){
            $certificate = $this->input->post('certificate');
        }
        else{
            $certificate = '';   
        }

        if($this->input->post('diagram')){
            $diagram = $this->input->post('diagram');
        }
        else{
            $diagram = '';   
        }

        if(!empty($this->input->post('discount_code'))){
            $code = $this->db->get_where('discount',['code' => $this->input->post('discount_code')])->result_array();
            if($code){
                $dis_code  = $code[0]['code'];
                $dis_type  = (!empty($code[0]['percent']))?'p':'a';
                $dis_value = (!empty($code[0]['percent']))?$code[0]['percent']:$code[0]['amount'];
                if($dis_type == 'p'){
                    $_grand_total = $this->input->post('grand_total') * $dis_value / 100;
                    $_grand_total = $this->input->post('grand_total') - $_grand_total;
                }
                else{
                    $_grand_total = $this->input->post('grand_total') - $dis_value;
                }
            }else{
                $dis_code  = "";
                $dis_type  = "";
                $dis_value = "";
                $_grand_total = $this->input->post('grand_total');    
            }
        }
        else{
            $dis_code  = "";
            $dis_type  = "";
            $dis_value = "";
            $_grand_total = $this->input->post('grand_total');
        }

        $personal = [
                        'title'         => $this->input->post('salutation_name'),
                        'first_name'    => $this->input->post('first_name'),
                        'last_name'     => $this->input->post('last_name'),
                        'title2'        => $this->input->post('salutation_name2'),
                        'first_name2'   => $this->input->post('first_name2'),
                        'last_name2'    => $this->input->post('last_name2'),
                        'address'       => $this->input->post('address'),
                        'suburb'        => $this->input->post('suburb'),
                        'state'         => $this->input->post('state'),
                        'postcode'      => $this->input->post('postcode'),
                        'email'         => $this->input->post('email'),
                        'landline'      => $this->input->post('landline'),
                        'mobile'        => $this->input->post('mobile'),
                        'fax'           => $this->input->post('fax'),
                        'certificate'   => $certificate,
                        'diagram'       => $diagram,
                        'approval_cost'         => $this->input->post('approval_cost'),
                        'demolition_cost'       => $this->input->post('demolition_cost'),
                        'land_clearing_cost'    => $this->input->post('land_clearing_cost'),
                        'meter'                 => $this->input->post('meter'),
                        'amount'                => $this->input->post('price_meter'),
                        'description'           => $this->input->post('remarks'),
                        'grand_total'           => $_grand_total,
                        'd_code'                => $dis_code,
                        'd_type'                => $dis_type,
                        'd_value'               => $dis_value,
                        'date'                  => date('Y-m-d'),
                        'user_id'               => $this->session->userdata('id')
                    ];

            if($this->db->insert('quotation' ,$personal)){
                $insert_id = $this->db->insert_id();

                if($this->input->post('BaseDesign')){
                    $design_id = $this->input->post('BaseDesign');
                    $design_text = $this->input->post('design_hid');
                }else{
                    $design_id = '';
                    $design_text = '';
                }

                if($this->input->post('cate1')){
                    $cate1 = json_encode([$this->input->post('cate1'),$this->input->post('catetext1')]);
                }else{
                    $cate1 = 'null';
                }

                if($this->input->post('cate2')){
                    $cate2 = json_encode([$this->input->post('cate2'),$this->input->post('catetext2')]);
                }else{
                    $cate2 = 'null';
                }

                if($this->input->post('cate3')){
                    $cate3 = json_encode([$this->input->post('cate3'),$this->input->post('catetext3')]);
                }else{
                    $cate3 = 'null';
                }

                if($this->input->post('cate4')){
                    $cate4 = json_encode([$this->input->post('cate4'),$this->input->post('catetext4')]);
                }else{
                    $cate4 = 'null';
                }

                $cate5 = [];
                foreach ($this->input->post('cateid5') as $key => $value) {
                    $cate5[] = [$value,$this->input->post('cate5qty')[$key],$this->input->post('cate5text')[$key]];
                }
                $cate5 = json_encode($cate5);

                if($this->input->post('cate6')){
                    $cate6 = json_encode([$this->input->post('cate6'),$this->input->post('catetext6')]);
                }else{
                    $cate6 = 'null';
                }

                if($this->input->post('cate7')){
                    $cate7 = json_encode([$this->input->post('cate7'),$this->input->post('catetext7')]);
                }else{
                    $cate7 = 'null';
                }

                if($this->input->post('cate8')){
                    $cate8 = json_encode([$this->input->post('cate8'),$this->input->post('catetext8')]);
                }else{
                    $cate8 = 'null';
                }

                if($this->input->post('cate9')){
                    $cate9 = [];
                    foreach ($this->input->post('cate9') as $key => $value) {
                        $cate9[] = [$value,$this->input->post('cate9text'.$value)];                    
                    }
                    $cate9 = json_encode($cate9);
                }else{
                    $cate9 = 'null';
                }

                if($this->input->post('cate10')){
                    $cate10 = json_encode([$this->input->post('cate10'),$this->input->post('catetext10')]);
                }else{
                    $cate10 = 'null';
                }

                if($this->input->post('cate11')){
                    $cate11 = json_encode([$this->input->post('cate11'),$this->input->post('catetext11')]);
                }else{
                    $cate11 = 'null';
                }

                if($this->input->post('cate12')){
                    $cate12 = [];
                    foreach ($this->input->post('cate12') as $key => $value) {
                        $cate12[] = [$value,$this->input->post('cate12text'.$value)];                    
                    }
                    $cate12 = json_encode($cate12);
                }else{
                    $cate12 = 'null';
                }

                if($this->input->post('cate13')){
                    $cate13 = json_encode([$this->input->post('cate13'),$this->input->post('catetext13')]);
                }else{
                    $cate13 = 'null';
                }

                if($this->input->post('cate14')){
                    $cate14 = [];
                    foreach ($this->input->post('cate14') as $key => $value) {
                        $cate14[] = [$value,$this->input->post('cate14text'.$value)];                    
                    }
                    $cate14 = json_encode($cate14);
                }else{
                    $cate14 = 'null';
                }

                if($this->input->post('cate15')){
                    $cate15 = json_encode([$this->input->post('cate15'),$this->input->post('catetext15')]);
                }else{
                    $cate15 = 'null';
                }

                if($this->input->post('cate16')){
                    $cate16 = json_encode([$this->input->post('cate16'),$this->input->post('catetext16')]);
                }else{
                    $cate16 = 'null';
                }

                if($this->input->post('cate17')){
                    $cate17 = json_encode([$this->input->post('cate17'),$this->input->post('catetext17')]);
                }else{
                    $cate17 = 'null';
                }

                if($this->input->post('cate18')){
                    $cate18 = json_encode([$this->input->post('cate18'),$this->input->post('catetext18')]);
                }else{
                    $cate18 = 'null';
                }

                if($this->input->post('cate19')){
                    $cate19 = json_encode([$this->input->post('cate19'),$this->input->post('catetext19')]);
                }else{
                    $cate19 = 'null';
                }

                if($this->input->post('cate20')){
                    $cate20 = json_encode([$this->input->post('cate20'),$this->input->post('catetext20')]);
                }else{
                    $cate20 = 'null';
                }

                if($this->input->post('cate21')){
                    $cate21 = json_encode([$this->input->post('cate21'),$this->input->post('catetext21')]);
                }else{
                    $cate21 = 'null';
                }

                if($this->input->post('cate22')){
                    $cate22 = json_encode([$this->input->post('cate22'),$this->input->post('catetext22')]);
                }else{
                    $cate22 = 'null';
                }

                if($this->input->post('cate23')){
                    $cate23 = json_encode([$this->input->post('cate23'),$this->input->post('catetext23')]);
                }else{
                    $cate23 = 'null';
                }

                if($this->input->post('cate24')){
                    $cate24 = json_encode([$this->input->post('cate24'),$this->input->post('catetext24')]);
                }else{
                    $cate24 = 'null';
                }

                $cate25 = [];
                foreach ($this->input->post('cateid25') as $key => $value) {
                    $cate25[] = [$value,$this->input->post('cate25qty')[$key],$this->input->post('cate25text')[$key]];
                }
                $cate25 = json_encode($cate25);

                $cate26 = [];
                foreach ($this->input->post('cateid26') as $key => $value) {
                    $cate26[] = [$value,$this->input->post('cate26qty')[$key],$this->input->post('cate26text')[$key]];
                }
                $cate26 = json_encode($cate26);

                if($this->input->post('cate27')){
                    $cate27 = [];
                    foreach ($this->input->post('cate27') as $key => $value) {
                        $cate27[] = [$value,$this->input->post('cate27text'.$value)];                    
                    }
                    $cate27 = json_encode($cate27);
                }else{
                    $cate27 = 'null';
                }

                if($this->input->post('cate28')){
                    $cate28 = json_encode([$this->input->post('cate28'),$this->input->post('catetext28')]);
                }else{
                    $cate28 = 'null';
                }

                $cate29 = [];
                foreach ($this->input->post('cateid29') as $key => $value) {
                    $cate29[] = [$value,$this->input->post('cate29qty')[$key],$this->input->post('cate29text')[$key]];
                }
                $cate29 = json_encode($cate29);

                $cate30 = [];
                foreach ($this->input->post('cateid30') as $key => $value) {
                    $cate30[] = [$value,$this->input->post('cate30qty')[$key],$this->input->post('cate30text')[$key]];
                }
                $cate30 = json_encode($cate30);

                if($this->input->post('cate31')){
                    $cate31 = [];
                    foreach ($this->input->post('cate31') as $key => $value) {
                        $cate31[] = [$value,$this->input->post('cate31text'.$value)];                    
                    }
                    $cate31 = json_encode($cate31);
                }else{
                    $cate31 = 'null';
                }

                $extra = [];
                foreach ($this->input->post('other_note') as $key => $value) {
                    $extra[] = [$value,$this->input->post('other_rate')[$key]];
                }
                $extra = json_encode($extra);

                $detail =   [
                                'design_id'     =>  $design_id,
                                'design_text'   =>  $design_text,
                                'cate1'         =>  $cate1,
                                'cate2'         =>  $cate2,
                                'cate3'         =>  $cate3,
                                'cate4'         =>  $cate4,
                                'cate5'         =>  $cate5,
                                'cate6'         =>  $cate6,
                                'cate7'         =>  $cate7,
                                'cate8'         =>  $cate8,
                                'cate9'         =>  $cate9,
                                'cate10'        =>  $cate10,
                                'cate11'        =>  $cate11,
                                'cate12'        =>  $cate12,
                                'cate13'        =>  $cate13,
                                'cate14'        =>  $cate14,
                                'cate15'        =>  $cate15,
                                'cate16'        =>  $cate16,
                                'cate17'        =>  $cate17,
                                'cate18'        =>  $cate18,
                                'cate19'        =>  $cate19,
                                'cate20'        =>  $cate20,
                                'cate21'        =>  $cate21,
                                'cate22'        =>  $cate22,
                                'cate23'        =>  $cate23,
                                'cate24'        =>  $cate24,
                                'cate25'        =>  $cate25,
                                'cate26'        =>  $cate26,
                                'cate27'        =>  $cate27,
                                'cate28'        =>  $cate28,
                                'cate29'        =>  $cate29,
                                'cate30'        =>  $cate30,
                                'cate31'        =>  $cate31,
                                'extra'         =>  $extra,
                                'q_id'          =>  $insert_id
                            ];

                if($this->db->insert('quotation_detail' ,$detail)){
                    $this->session->set_flashdata('ok', 'Quotation successful Save');
                    redirect(base_url('quotation'));
                }
                else{
                    $this->db->where('id',$insert_id);
                    $this->db->delete('quotation');
                    $this->session->set_flashdata('error', 'Error Please Try Again');
                    redirect(base_url('quotation'));
                }
            }
            else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }
    }


    public function delete($id = false)
    {
        if($id){

            if($this->quotation_model->get_quotation($id)){

                $this->db->where('id',$id);
                $this->db->update('quotation',['df' => '1']);

                $this->session->set_flashdata('ok', 'Quotation successful Deleted');
                redirect(base_url('quotation'));

            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }
    }

    public function view($id = false)
    {
        if($id){

            if($this->quotation_model->get_quotation($id)){

                $data['title']      = "Pricing Calculator";
                $data['quote']      = $this->quotation_model->get_full_quote($id)[0];
                $this->load->template('quotation/view',$data); 

            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }
    }

    public function re_quote()
    {
        $id = $this->input->get('id');
        if($id){

            if($this->quotation_model->get_quotation($id)){

                $data['title']      = "Pricing Calculator";
                $data['quote']      = $this->quotation_model->get_full_quote($id)[0];
                $this->load->template('quotation/re_quote',$data); 

            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }
    }

    public function trade_backup($id)
    {
        $quote = $this->quotation_model->get_full_quote($id)[0];
        $this->load->helper('download');
        $data = file_get_contents(FCPATH."files/pdf/MGF_Trade_Breakup.pdf");
        $name = "MGF_Trade_Breakup_".$quote['first_name']."_".$quote['last_name']."_".$quote['id'].".pdf";
        force_download($name, $data);
    }

    
    public function send($id = false)
    {
        if($id){

            if($this->quotation_model->get_quotation($id)){

                $data['title']      = "Send Quotation Letter";
                $data['quote']      = $this->quotation_model->get_full_quote($id)[0];
                $this->load->template('quotation/send',$data); 

            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }
    }

    public function mail_send()
    {
        $dir_name = $this->input->post('quote_id');
        if(file_exists(FCPATH."tmp/".$dir_name))
        {
            deleteDir(FCPATH."tmp/".$dir_name);
        }
        
        mkdir(FCPATH."tmp/".$dir_name, 0700);


        $this->load->library('email');
        $config['protocol']     = 'smtp';
        $config['smtp_host']    = $this->config->config['smtp_host'];
        $config['smtp_port']    = $this->config->config['smtp_port'];
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $this->config->config['smtp_user'];
        $config['smtp_pass']    = $this->config->config['smtp_pass'];
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['mailtype']     = 'html';
        $config['validation']   = TRUE; 
        
        $this->email->initialize($config);

        $this->email->from($this->config->config['smtp_user'], 'Master Granny Flats');
        $this->email->to($this->input->post('email')); 
        $this->email->subject($this->input->post('subject'));
        $this->email->message($this->input->post('body'));

        if($this->input->post('quotation_later')){
            $name_latter = $this->pdf_model->save_letter($this->input->post('quote_id'),$dir_name);
            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$name_latter)){
                $this->email->attach(base_url().'tmp/'.$dir_name.'/'.$name_latter);    
            }
        }

        if($this->input->post('quotation_summary')){
            $name_file = $this->pdf_model->summary($this->input->post('quote_id'),$dir_name);
            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$name_file)){
                $this->email->attach(base_url().'tmp/'.$dir_name.'/'.$name_file);    
            }
        }

        if($this->input->post('pc_item_1')){
            if(file_exists(FCPATH.'files/pdf/MGF_Master_Pack_1.pdf')){
                $this->email->attach(base_url().'files/pdf/MGF_Master_Pack_1.pdf');    
            }
        }

        if($this->input->post('pc_item_2')){
            if(file_exists(FCPATH.'files/pdf/MGF_Master_Pack_2.pdf')){
                $this->email->attach(base_url().'files/pdf/MGF_Master_Pack_2.pdf');    
            }
        }

        if($this->input->post('pc_item_3')){
            if(file_exists(FCPATH.'files/pdf/MGF_Master_Pack_3.pdf')){
                $this->email->attach(base_url().'files/pdf/MGF_Master_Pack_3.pdf');    
            }
        }

        if($this->input->post('trade_breakup')){
            if(file_exists(FCPATH.'files/pdf/MGF_Trade_Breakup.pdf')){
                $this->email->attach(base_url().'files/pdf/MGF_Trade_Breakup.pdf');    
            }
        }

        if($this->input->post('home_warranty')){
            if(file_exists(FCPATH.'files/pdf/MGF_Home_Warrantity.pdf')){
                $this->email->attach(base_url().'files/pdf/MGF_Home_Warrantity.pdf');    
            }
        }

        

        if($this->input->post('floor_plan')){
            $name_file = $this->pdf_model->floor_plan($this->input->post('quote_id'),$dir_name);
            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$name_file)){
                $this->email->attach(base_url().'tmp/'.$dir_name.'/'.$name_file);    
            }
        }

        if (!empty($_FILES['attch1']['name'])) {
            $path = $_FILES['attch1']['name'];
            $newName = "Attachment_1.".pathinfo($path, PATHINFO_EXTENSION); 

            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$newName)){
                unlink(FCPATH.'tmp/'.$dir_name.'/'.$newName);    
            }

            
            $config['upload_path']      = './tmp/'.$dir_name;
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 6000000;
            $config['file_name'] = $newName;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('attch1');

            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$newName)){
                $this->email->attach(base_url().'tmp/'.$dir_name.'/'.$newName);    
            }
        }

        if (!empty($_FILES['attch2']['name'])) {
            $path = $_FILES['attch2']['name'];
            $newName = "Attachment_2.".pathinfo($path, PATHINFO_EXTENSION); 

            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$newName)){
                unlink(FCPATH.'tmp/'.$dir_name.'/'.$newName);    
            }

            
            $config['upload_path']      = './tmp/'.$dir_name;
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 6000000;
            $config['file_name'] = $newName;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('attch2');

            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$newName)){
                $this->email->attach(base_url().'tmp/'.$dir_name.'/'.$newName);    
            }
        }

        if (!empty($_FILES['attch3']['name'])) {
            $path = $_FILES['attch3']['name'];
            $newName = "Attachment_3.".pathinfo($path, PATHINFO_EXTENSION); 

            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$newName)){
                unlink(FCPATH.'tmp/'.$dir_name.'/'.$newName);    
            }

            
            $config['upload_path']      = './tmp/'.$dir_name;
            $config['allowed_types']    = 'pdf';
            $config['max_size']         = 6000000;
            $config['file_name'] = $newName;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $this->upload->do_upload('attch3');

            if(file_exists(FCPATH.'tmp/'.$dir_name.'/'.$newName)){
                $this->email->attach(base_url().'tmp/'.$dir_name.'/'.$newName);    
            }
        }


        if(file_exists(FCPATH."tmp/".$dir_name))
        {
            deleteDir(FCPATH."tmp/".$dir_name);
        }
        
        if($this->email->send()){
            $this->session->set_flashdata('ok', 'Mail Sent');
            redirect(base_url('quotation/send/').$this->input->post('quote_id'));
        }
        else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation/send/').$this->input->post('quote_id'));
        }
    }
}
?>