<?php
//============================================================+
// File name   : senior_citizen_confirmation_doc.php
// Begin       : 2016-13-04
// Last Update : 2016-14-04
//
// Description : Confirmation Document
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

$filename = lcfirst($this->data['SeniorCitizen']['firstname']) . '_' . lcfirst($this->data['SeniorCitizen']['lastname']) . '_account_confirmation';

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roystan Smith');
$pdf->SetTitle($this->data['SeniorCitizen']['firstname'] . ' ' . $this->data['SeniorCitizen']['lastname'] . ' Account Confirmation Document');
$pdf->SetSubject('Account Confirmation');
$pdf->SetKeywords('Account, PDF, Confirmation, doc, account');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '                                      '.$this->data['SeniorCitizen']['firstname'] . ' ' . $this->data['SeniorCitizen']['lastname'] . ' - Account Confirmation Document', '                                          '.PDF_CUSTOM_HEADER_STRING);


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
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">
            <table>
                <tr nobr="true">
                    <td><strong>Address:</strong><br /><br /><br /><br />
                        <strong>ID Number:</strong><br />
                        <strong>Date Of Birth:</strong><br />
                        <strong>Gender:</strong><br />
                        <strong>Telephone:</strong><br />
                        <strong>Cellphone:</strong><br />
                    </td>
                    <td>'.$this->data['SeniorCitizen']['address'].'<br /><br />
                        '.$this->data['SeniorCitizen']['idnumber'].'<br />
                        '.$this->data['SeniorCitizen']['dateofbirth'].'<br />
                        '.$this->data['Gender']['title'].'<br />
                        '.$this->data['SeniorCitizen']['telnr'].'<br />
                        '.$this->data['SeniorCitizen']['cellnr'].'<br />
                    </td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td><strong>Account Details</strong></td>
                </tr>
            </table>
        </td>
        <td>
            <table>
                <tr>
                    <td><strong>Payment Details</strong></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr nobr="true">
    	<td rowspan="2">
            <table>
                <tr>
                    <td><strong>Policy Number :</strong><br />
                        <strong>Premium:</strong><br />
                        <strong>Entry Date:</strong><br />
                    </td>
                    <td>'.$this->data['SeniorCitizen']['policyno'].'<br />
                        N/A<br />
                        '.$this->data['SeniorCitizen']['entrydate'].'<br />
                    </td>
                </tr>
            </table>
        </td>
                 
    	<td>
            <table>
                <tr>
                    <td><strong>Cover Amount:</strong></td>
                    <td>N/A</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>Premium:</strong></td>
                    <td>N/A</td>
                </tr>
            </table>
        </td>
    </tr>

</table><br /><br /><br /><br />
';

$pdf->writeHTML($tbl, true, false, false, false, '');

$html = '<br /><br /><br /><br />I __________________________________ ,declare that the above mentioned information is correct in every aspect.';

$pdf->writeHTML($html, true, false, false, false, '');

$tbl ='<table cellspacing="0" cellpadding="4" align="center">
        <tr>
            <td>
            </td>
        </tr>
        <tr>
            <td>
            </td>
        </tr>
        <tr>
            <td width="15%">Signed</td>
            <td width="30%">________________________________</td>
        </tr>
        <tr>
            <td>
            </td>
        </tr>
        <tr>
            <td width="15%">Date</td>
            <td width="30%">________________________________</td>
        </tr>
    </table>';

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
