<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf.php';

class Trade extends TCPDF
{

    public function Footer() {
    	if($this->numpages != 1){	
	        $this->SetXY(-10,-10);
	        $this->SetFont('helvetica', 'I', 8);
	    	$this->Line(5, $this->y, $this->w - 5 , $this->y);
	        $this->Cell(0, 10, $this->getAliasNumPage().' of '.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	    }
    }
}
