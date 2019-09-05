<?php
class Pdf_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('tcpdf/Pdf');
        $this->load->library('tcpdf/Npdf');
	}


	public function save_letter($id,$dir_name)
	{
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
        $pdf_name = 'MGF_Quotation_Letter_'.$data['quote']['first_name'].'_'.$data['quote']['last_name'].'_'.$data['quote']['id'];
        $pdf->Output(FCPATH.'tmp/'.$dir_name.'/'.$pdf_name.'.pdf', 'F');
        return $pdf_name.'.pdf';
	}

	public function summary($id,$dir_name)
    {

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
        $pdf_name = 'MGF_Quotation_Summary_'.$data['quote']['first_name'].'_'.$data['quote']['last_name'].'_'.$data['quote']['id'];
        $pdf->Output(FCPATH.'tmp/'.$dir_name.'/'.$pdf_name.'.pdf', 'F');

        return $pdf_name.'.pdf';
            
    }

    public function floor_plan($id,$dir_name)
    {
    	

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
        $pdf_name = 'MGF_Floor_Plan_'.$data['quote']['first_name'].'_'.$data['quote']['last_name'].'_'.$data['quote']['id'];
        $pdf->Output(FCPATH.'tmp/'.$dir_name.'/'.$pdf_name.'.pdf', 'F');
        return $pdf_name.'.pdf';
    	
    }


}