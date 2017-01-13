<?php
//============================================================+
// File name   : payment_summary_doc.php
// Begin       : 2017-01-13
// Last Update : 2017-01-13
//
// Description : Payment Document
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
 * Creates a payment summary document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: PDF/A-1b mode
 * @author Roystan Smith
 * @since 2016-13-04
 */

// Include the main TCPDF library (search for installation path).
App::import('Vendor','tcpdf/xtcpdf');

$filename = 'payment_summary';

// create new PDF document
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roystan Smith');
$pdf->SetTitle(date('Y-m-d') . ' Payment Summary Document');
$pdf->SetSubject('Payment Summary');
$pdf->SetKeywords('Account, PDF, Payment Summary, doc, account');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '                                      '.date('Y-m-d') . ' - Payment Summary Document', '                                          '.PDF_CUSTOM_HEADER_STRING);

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

// NON-BREAKING TABLE (nobr="true")

$total = 0;
$membership_type = 'M';

$tbl = '
<table border="1" cellpadding="2" cellspacing="2" nobr="true" align="center">
    <tr>
        <th colspan="3" align="center"><strong>Payment Summary For '. date('Y-m-d').'</strong></th>
    </tr>
<tr nobr="true" style="background-color:#b7c2c8;">
    <td>Membership Type</td>
    <td>Fullname</td>
    <td>Amount</td>
</tr>';

foreach ($todays_member_payment_summary_arr as $todays_member_payment_summary) {
    $total += $todays_member_payment_summary['Payment']['amount_received'];
    $tbl .= 
    '<tr nobr="true">
        <td><font face="courier" size=2><strong>Member</strong></font></td>
        <td>'.$todays_member_payment_summary['Member']['firstname'] . ' ' . $todays_member_payment_summary['Member']['lastname'].'</td>
        <td>R'.$todays_member_payment_summary['Payment']['amount_received'].'</td>
    </tr>';
}

foreach ($todays_senior_citizen_payment_summary_arr as $todays_senior_citizen_payment_summary) {
    $total += $todays_senior_citizen_payment_summary['Payment']['amount_received'];
    $tbl .= 
    '<tr nobr="true">
        <td><font face="courier" size=2><strong>Senior Citizen</strong></font></td>
        <td>'.$todays_senior_citizen_payment_summary['SeniorCitizen']['firstname'] . ' ' . $todays_senior_citizen_payment_summary['SeniorCitizen']['lastname'].'</td>
        <td>R'.$todays_senior_citizen_payment_summary['Payment']['amount_received'].'</td>
    </tr>';
}

$tbl .= '
    <tr nobr="true">
        <td colspan="3" align="center"></td>
    </tr>
    <tr>
        <td style="font-weight:bold;"></td>
        <td style="font-weight:bold;">Total</td>
        <td style="font-weight:bold;">R' . $total . '</td>
    </tr>';
$tbl .= '</table>
';

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// force print dialog
$js = 'print(true);';

// set javascript
$pdf->IncludeJS($js);

// -----------------------------------------------------------------------------
$pdf->Output($filename . '_' .date('Y-m-d'). '.pdf', 'D');

//============================================================+
// END OF FILE
//============================================================+
