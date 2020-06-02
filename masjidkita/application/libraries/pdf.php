<?php if (!defined('BASEPATH')) exit('Maaf, akses secara langsung tidak diperkenankan.');

require_once dirname(__FILE__).'/tcpdf/tcpdf.php';
//require_once dirname(__FILE__).'/tcpdf/examples/tcpdf_include.php';
class Pdf extends TCPDF{
		//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'kopsurat.jpg';
		$this->Image($image_file, 10, 10, 60, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('times', '', 11);
		// Title
		$this->Cell(20, 10, '                                -'.$this->getAliasNumPage().'-', 0, false, 'L', 0, '', 0, false, 'T', 'M');
		        $this->SetTopMargin(30);

	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, '   F.kur.ehb', 0, false, 'L', 0, '', 0, false, 'T', 'M');
		$this->Cell(0, 10, 'rev02.17/07/2017', 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
	}