<?php
//============================================================+
// File name   : member_confirmation_doc.php
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
App::import('Vendor','tcpdf/xtcpdf');

$filename = lcfirst($this->data['Member']['firstname']) . '_' . lcfirst($this->data['Member']['lastname']) . '_account_confirmation';

// create new PDF document
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roystan Smith');
$pdf->SetTitle($this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname'] . ' Account Confirmation Document');
$pdf->SetSubject('Account Confirmation');
$pdf->SetKeywords('Account, PDF, Confirmation, doc, account');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '                                      '.$this->data['Member']['firstname'] . ' ' . $this->data['Member']['lastname'] . ' - Account Confirmation Document', '                                          '.PDF_CUSTOM_HEADER_STRING);


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
                    <td>'.$this->data['Member']['address'].'<br /><br />
                        '.$this->data['Member']['idnumber'].'<br />
                        '.$this->data['Member']['dateofbirth'].'<br />
                        '.$this->data['Gender']['title'].'<br />
                        '.$this->data['Member']['telnr'].'<br />
                        '.$this->data['Member']['cellnr'].'<br />
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
                        <strong>Category:</strong><br />
                        <strong>Premium:</strong><br />
                        <strong>Entry Date:</strong><br />
                    </td>
                    <td>'.$this->data['Member']['policyno'].'<br />
                        '.$this->data['Category']['title'].'<br />
                        '.$this->data['Member']['premium'].'<br />
                        '.$this->data['Member']['entrydate'].'<br />
                    </td>
                </tr>
            </table>
        </td>
                 
    	<td>
            <table>
                <tr>
                    <td><strong>Cover Amount:</strong></td>
                    <td>'.$this->data['Member']['coveramount'].'</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>Premium:</strong></td>
                    <td>'.$this->data['Member']['premium'].'</td>
                </tr>
            </table>
        </td>
    </tr>

</table><br /><br /><br /><br />
';

$pdf->writeHTML($tbl, true, false, false, false, '');

// NON-BREAKING TABLE (nobr="true")

if ($spouses) {

    $spouses_count = 0;
    
    $tbl = '
    <table border="1" cellpadding="2" cellspacing="2" nobr="true" align="center">
        <tr>
            <th colspan="8" align="center"><strong>Spouse</strong></th>
        </tr>
    <tr nobr="true" style="background-color:#b7c2c8;">
        <td>#</td>
        <td>Firstname</td>
        <td>Lastname</td>
        <td>Id Number</td>
        <td>DOB</td>
        <td>Gender</td>
        <td>Relationship</td>
        <td>Cover Status</td>
    </tr>';
    
    foreach ($spouses as $key => $spouse) {
        $spouse_relationship = '';
        $spouse_gender = '';
        foreach ($relationships AS $id => $relationship):
                if ($spouse['Spouse']['relationship_id'] == $id):
                        $spouse_relationship = $relationship;
                endif;
        endforeach;
        foreach ($genders AS $id => $gender):
                if ($spouse['Spouse']['gender_id'] == $id):
                        $spouse_gender = $gender;
                endif;
        endforeach;
        
    $tbl .= 
    '<tr nobr="true">
        <td>'.++$spouses_count.'</td>
        <td>'.$spouse['Spouse']['firstname'].'</td>
        <td>'.$spouse['Spouse']['lastname'].'</td>
        <td>'.$spouse['Spouse']['idnumber'].'</td>
        <td>'.$spouse['Spouse']['dateofbirth'].'</td>
        <td>'.$spouse_gender.'</td>
        <td>'.$spouse_relationship.'</td>
        <td>covered</td>
    </tr>';
    }
     
    $tbl .= '</table>
    ';
    
    $pdf->writeHTML($tbl, true, false, false, false, '');

}

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")
if ($dependants) {
    
    $dependant_count = 0;
    
    $tbl = 
    '<table border="1" cellpadding="2" cellspacing="2" align="center">
        <tr>
            <th colspan="8"><strong>Dependants</strong></th>
        </tr>
        <tr nobr="true" style="background-color:#b7c2c8;">
            <td>#</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Id Number</td>
            <td>DOB</td>
            <td>Gender</td>
            <td>Relationship</td>
            <td>Cover Status</td>
        </tr>';
        foreach ($dependants as $key => $dependant) {

           $is_covered = true;

           if ($dependant['Dependant']['age'] > 21):
                   $is_covered = false;
           endif;

           $cover_status = $is_covered ? 'covered' : 'not covered';

           $dependant_relationship = '';
           $dependant_gender = '';
           foreach ($relationships AS $id => $relationship):
                   if ($dependant['Dependant']['relationship_id'] == $id):
                           $dependant_relationship = $relationship;
                   endif;
           endforeach;
           foreach ($genders AS $id => $gender):
                   if ($dependant['Dependant']['gender_id'] == $id):
                           $dependant_gender = $gender;
                   endif;
           endforeach;

           $tbl .= '<tr nobr="true">
            <td>'.++$dependant_count.'</td>
            <td>'.$dependant['Dependant']['firstname'].'</td>
            <td>'.$dependant['Dependant']['lastname'].'</td>
            <td>'.$dependant['Dependant']['idnumber'].'</td>
            <td>'.$dependant['Dependant']['dateofbirth'].'</td>
            <td>'.$dependant_gender.'</td>
            <td>'.$dependant_relationship.'</td>
            <td>'.$cover_status.'</td>
           </tr>';
        }
        $tbl .= '</table>';
       
       $pdf->writeHTML($tbl, true, false, false, false, '');
}

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
