<?php
//============================================================+
// File name   : member_statement_pdf.php
// Begin       : 2016-13-04
// Last Update : 2016-14-04
//
// Description : Statement Document
//               Creates a PDF/A-1b document using TCPDF
//
// Author: Roystan Smith
//
// (c) Copyright:
//               Roystan Smith
//               R&L LTD
//               roystansmith@gmail.com
//               info@roystan.com
//============================================================+

/**
 * Creates a confirmation document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: PDF/A-1b mode
 * @author Roystan Smith
 * @since 2016-13-04
 */

// Include the main TCPDF library (search for installation path).
App::import('Vendor','tcpdf/tcpdf');

$filename = lcfirst($this->data['Member']['firstname']) . '_' . lcfirst($this->data['Member']['lastname']) . '_statement_document';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roystan Smith');
$pdf->SetTitle($this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname'] . ' Account Confirmation Document');
$pdf->SetSubject('Statement Document');
$pdf->SetKeywords('Account, PDF, Confirmation, doc, account');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '                                      '.$this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname'] . ' - Statement Document', '                                          '.PDF_CUSTOM_HEADER_STRING);


// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------

$tbl = '<br /><br /><br />
<table class="first" width="100%" cellpadding="4" cellspacing="6" border="1">
    <tr>
        <td width="30" align="center"><b>No.</b></td>
        <td width="100" align="center" bgcolor="#b7c2c8"><b>PREMIUM</b></td>
        <td width="140" align="center"><b>DATE RECEIVED</b></td>
        <td width="80" align="center"> <b>YEAR</b></td>
        <td width="100" align="center"><b>MONTH</b></td>
        <td width="100" align="center"><b>AMOUNT</b></td>
    </tr>';

$count = 0;
$temp_premium = false;
$total_received = 0;
$total_years = 0;
$temp_year = false;

foreach ($payments as $payments) {
    
    $total_received = $total_received + $payments['Payment']['amount_received'];
    
    if ($temp_year != date('Y', strtotime($payments['Payment']['date_for'])))
    {
        ++$total_years;
    }
    
    $temp_year = date('Y', strtotime($payments['Payment']['date_for']));
    
   $tbl .= '<tr>
        <td width="30" align="center">'.++$count.'</td>';
   
    $tbl .= '<td width="100" align="center">R'.$this->data['Member']['premium'].'</td>';
    $tbl .= '<td width="140" align="center">'.date($payments['Payment']['date_created']).'</td>
        <td width="80" align="center">'.date('Y', strtotime($payments['Payment']['date_for'])).'</td>
        <td width="100" align="center">'.date('F', strtotime($payments['Payment']['date_for'])).'</td>
        <td width="100" align="center">R'.$payments['Payment']['amount_received'].'</td>
    </tr>';
    
    $tbl1 = '
    <tr>
        <td width="30" align="center">'.$count.'.</td>
        <td width="140">R'.$this->data['Member']['premium'].'<br />XXXX</td>
        <td width="140" rowspan="6" class="second">'.date($payments['Payment']['date_for']).'<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">'.date('Y', strtotime($payments['Payment']['date_created'])).'<br /></td>
        <td width="80">'.date('F', strtotime($payments['Payment']['date_for'])).'</td>
        <td align="center" width="85">R'.$payments['Payment']['amount_received'].'</td>
    </tr>
    <tr>
        <td width="30" align="center" rowspan="3">2.</td>
        <td width="140" rowspan="3">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="85">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="80">XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="85">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="80" rowspan="2" >XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="85">XXXX<br />XXXX</td>
    </tr>
    <tr>
        <td width="30" align="center">3.</td>
        <td width="140">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="85">XXXX<br />XXXX</td>
    </tr>
    <tr bgcolor="#b7c2c8">
        <td width="30" align="center">4.</td>
        <td width="140" bgcolor="#00CC00" color="#FFFF00">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td width="80">XXXX<br />XXXX</td>
        <td align="center" width="85">XXXX<br />XXXX</td>
    </tr>';
}

$tbl .= '<tr bgcolor="#b7c2c8">
        <td width="30" align="center">TOT</td>
        <td width="100" align="center" bgcolor="#b7c2c8"></td>
        <td width="140" align="center"></td>
        <td width="80" align="center"></td>
        <td width="100" align="center">MONTHS: '.$count.'</td>
        <td width="100" align="center">TOTAL: R'.$total_received.'</td>
    </tr>';

$tbl .= '</table>

';

$pdf->writeHTML($tbl, true, false, false, false, '');

// force print dialog
$js = 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// -----------------------------------------------------------------------------
$pdf->Output($filename . '_' .date('Y-m-d'). '.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
