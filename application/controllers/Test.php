<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
        $this->load->library('tcpdf/Pdf');
    }


    public function test()
    {
        $this->load->view('test');
    }

    public function index()
    {
    	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Kava Developers');
        $pdf->SetTitle('Expense Claim');
        $pdf->SetSubject('Expense');
        $pdf->SetKeywords('PDF');
        $pdf->SetFontSize(10);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->AddPage();

        //$html = '<h1>Kava Developers</h1><img src="'.base_url().'theme/image/logo.gif">';
        $data['a']  =   '';
        $html = $this->load->view('test',$data,true);
        $pdf->writeHTML($html, true, false, true, false, '');

        // $html .= '<img src="'.base_url().'theme/image/logo.gif">';

        // $pdf->writeHTML($html, true, 0, true, 0);
        $pdf->Output('sample.pdf', 'I');
    }



}