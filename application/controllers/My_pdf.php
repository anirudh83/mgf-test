<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_pdf extends CI_Controller {


	public function __construct()
    {
        parent::__construct();

        $this->auth->check_session();
        $this->load->model('user_model');
        $this->load->model('price_model');
        $this->load->model('quotation_model');
        $this->load->library('tcpdf/Pdf');
        $this->load->library('tcpdf/Npdf');
        $this->load->library('tcpdf/Trade');
        $this->load->library('fpdm/fpdm');
    }

    public function fpdma()
    {
        
        $fields = array(
            'name'    => 'My name',
            'address' => 'My address',
            'city'    => 'My city',
            'phone'   => 'My phone number'
        );

        $pdf = new FPDM(FCPATH.'/template.pdf');
        $pdf->Load($fields, false); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
        $pdf->Merge();
        $pdf->Output();
    }

    public function trade($id = false)
    {
        if($id){

            if($this->quotation_model->get_quotation($id)){

                $pdf = new Trade(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                    
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Kava Developers');
                $pdf->SetTitle('Floor Plan');
                $pdf->SetSubject('Floor Plan');
                $pdf->SetKeywords('PDF');
                $pdf->SetFontSize(10);
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(true);
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf->AddPage();
                $data['quote']  =   $this->quotation_model->get_full_quote($id)[0];
                $html = $this->load->view('pdf/trade',$data,true);
                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->Output('sample.pdf', 'I');
        
            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }

    }

    public function floor_plan($id = false)
    {
    	if($id){

            if($this->quotation_model->get_quotation($id)){

                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
		        $pdf->SetCreator(PDF_CREATOR);
		        $pdf->SetAuthor('Kava Developers');
		        $pdf->SetTitle('Floor Plan');
		        $pdf->SetSubject('Floor Plan');
		        $pdf->SetKeywords('PDF');
		        $pdf->SetFontSize(10);
		        $pdf->setPrintHeader(false);
		        $pdf->setPrintFooter(false);
		        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		        $pdf->AddPage();

		        $data['quote']  =   $this->quotation_model->get_full_quote($id)[0];

		        $html = $this->load->view('pdf/floor_plan',$data,true);
		        $pdf->writeHTML($html, true, false, true, false, '');
		        $pdf->Output('MGF_Floor_Plan_'.$data['quote']['first_name'].'_'.$data['quote']['last_name'].'_'.$data['quote']['id'].'.pdf', 'I');


            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }

    	
    }

    public function summary($id = false)
    {
    	if($id){

            if($this->quotation_model->get_quotation($id)){

                $pdf = new Npdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
		        $pdf->SetCreator(PDF_CREATOR);
		        $pdf->SetAuthor('Kava Developers');
		        $pdf->SetTitle('Floor Plan');
		        $pdf->SetSubject('Floor Plan');
		        $pdf->SetKeywords('PDF');
		        $pdf->SetFontSize(10);
		        $pdf->setPrintHeader(false);
		        $pdf->setPrintFooter(true);
		        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
		        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
		        $pdf->AddPage();

		        $data['quote']  =   $this->quotation_model->get_full_quote($id)[0];

		        $html = $this->load->view('pdf/summary',$data,true);

		        $pdf->writeHTML($html, true, false, true, false, '');
		        $pdf->Output('MGF_Quotation_Summary_'.$data['quote']['first_name'].'_'.$data['quote']['last_name'].'_'.$data['quote']['id'].'.pdf', 'I');


            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }

    	
    }

    public function quotation_later($id = false)
    {
        if($id){

            if($this->quotation_model->get_quotation($id)){

                $pdf = new pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Kava Developers');
                $pdf->SetTitle('Quotation Latter');
                $pdf->SetSubject('Quotation Latter');
                $pdf->SetKeywords('PDF');
                $pdf->SetFontSize(12);
                $pdf->SetMargins(20, 20, 20, true);
                $pdf->setPrintHeader(false);
                $pdf->setPrintFooter(true);
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                $pdf->AddPage();

                $data['quote']  =   $this->quotation_model->get_full_quote($id)[0];

                $html = $this->load->view('pdf/quotation_latter',$data,true);

                $pdf->writeHTML($html, true, false, true, false, '');
                $pdf->Output('MGF_Quotation_Letter_'.$data['quote']['first_name'].'_'.$data['quote']['last_name'].'_'.$data['quote']['id'].'.pdf', 'I');


            }else{
                $this->session->set_flashdata('error', 'Error Please Try Again');
                redirect(base_url('quotation'));
            }

        }else{
            $this->session->set_flashdata('error', 'Error Please Try Again');
            redirect(base_url('quotation'));
        }
    }

    public function pc_item_1()
    {
        if(file_exists(FCPATH.'files/pdf/MGF_Master_Pack_1.pdf')){
            redirect(base_url().'files/pdf/MGF_Master_Pack_1.pdf');
        }
        else{ ?>
                <script type="text/javascript">
                    alert('File Not Found');
                    window.top.close();
                </script>
            <?php 
        }
    }

    public function pc_item_2()
    {
        if(file_exists(FCPATH.'files/pdf/MGF_Master_Pack_2.pdf')){
            redirect(base_url().'files/pdf/MGF_Master_Pack_2.pdf');
        }
        else{ ?>
                <script type="text/javascript">
                    alert('File Not Found');
                    window.top.close();
                </script>
            <?php 
        }
    }

    public function pc_item_3()
    {
        if(file_exists(FCPATH.'files/pdf/MGF_Master_Pack_3.pdf')){
            redirect(base_url().'files/pdf/MGF_Master_Pack_3.pdf');
        }
        else{ ?>
                <script type="text/javascript">
                    alert('File Not Found');
                    window.top.close();
                </script>
            <?php 
        }
    }

    public function trade_Backup()
    {
        if(file_exists(FCPATH.'files/pdf/MGF_Trade_Breakup.pdf')){
            redirect(base_url().'files/pdf/MGF_Trade_Breakup.pdf');
        }
        else{ ?>
                <script type="text/javascript">
                    alert('File Not Found');
                    window.top.close();
                </script>
            <?php 
        }
    }

    public function home_warrantity()
    {
        if(file_exists(FCPATH.'files/pdf/MGF_Home_Warrantity.pdf')){
            redirect(base_url().'files/pdf/MGF_Home_Warrantity.pdf');
        }
        else{ ?>
                <script type="text/javascript">
                    alert('File Not Found');
                    window.top.close();
                </script>
            <?php 
        }
    }
}