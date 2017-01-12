<?php
//============================================================+
// File name   : member_application_form.php
// Begin       : 2016-13-04
// Last Update : 2016-14-04
//
// Description : Application Document
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
 * Creates a application form using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: PDF/A-1b mode
 * @author Roystan Smith
 * @since 2016-13-04
 */

// Include the main TCPDF library (search for installation path).
App::import('Vendor','tcpdf/xtcpdf');

$filename = 'member_application_form';

// create new PDF document
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roystan Smith');
$pdf->SetTitle('Membership Application Form');
$pdf->SetSubject('Membership Application Form');
$pdf->SetKeywords('Application Form, PDF, Application, doc, form');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '                                       Funeral Cover Application Form', '                                          '.PDF_CUSTOM_HEADER_STRING);

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

$tbl = '<br /><br />Please fill in your personal details and all information of relatives that you are covering.';

$tbl .= '<br /><br />
    <table border="1" cellpadding="4" cellspacing="0" nobr="true" align="left">
        <tr>
            <th colspan="5" align="center" style="background-color:#b7c2c8;"><strong>Main Member</strong></th>
        </tr>';

        $tbl .= 
        '<tr nobr="true">
                <td width="18%"><strong>Firstname</strong></td>
                <td width="32%"></td>
                <td rowspan="3" width="18%"><strong>Address</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Lastname</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Id Number</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Date of birth</strong></td>
                <td width="32%"></td>
                <td width="18%"><strong>Postal Code</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Gender</strong></td>
                <td width="32%">
                    <input type="checkbox" name="agree" value="1" /> <label for="agree">Male </label>
                    <input type="checkbox" name="agree" id="rqb" value="2" /> <label for="rqb">Female</label>
                </td>
                <td width="18%"><strong>Tel Number</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td width="18%"><strong>Category</strong></td>
                <td width="32%">
                    <input type="checkbox" name="radioquestion" value="1" /> <label for="agree">Single </label>
                    <input type="checkbox" name="radioquestion" id="rqb" value="2" /> <label for="rqb">Family</label>
                </td>
                <td width="18%"><strong>Cell Number</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>';
     
    $tbl .= '</table>
    ';

$pdf->writeHTML($tbl, true, false, false, false, '');

// NON-BREAKING TABLE (nobr="true")

$tbl = '<br />Please fill in the details of your spouse.';

    $tbl .= '<br /><br />
    <table border="1" cellpadding="4" cellspacing="0" nobr="true" align="left">
        <tr>
            <th colspan="6" align="center" style="background-color:#b7c2c8;"><strong>Spouse Details</strong></th>
        </tr>';

        $tbl .= 
        '<tr nobr="true">
                <td width="18%"><strong>Firstname</strong></td>
                <td width="32%"></td>
                <td rowspan="3" width="18%"><strong>Address</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Lastname</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Id Number</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Date of birth</strong></td>
                <td width="32%"></td>
                <td width="18%"><strong>Postal Code</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Gender</strong></td>
                <td width="32%">
                    <input type="checkbox" name="agree" value="1" /> <label for="agree">Male </label>
                    <input type="checkbox" name="agree" id="rqb" value="2" /> <label for="rqb">Female</label>
                </td>
                <td width="18%"><strong>Tel Number</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td width="18%"><strong>Relationship</strong></td>
                <td width="32%">
                    <input type="checkbox" name="radioquestion" value="1" /> <label for="agree">Wife </label>
                    <input type="checkbox" name="radioquestion" id="rqb" value="2" /> <label for="rqb">Husband</label>
                </td>
                <td width="18%"><strong>Cell Number</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>';     
    $tbl .= '</table>
    ';
    
    $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

// NON-BREAKING ROWS (nobr="true")
    
    $tbl = '<br />Please fill in the details of all dependants to be covered. Note that dependants over the age of 21 cannot be covered and therefore have to take out their own funeral cover.';
    
    $tbl .= '<br /><br />
    <table border="1" cellpadding="4" cellspacing="0" align="left" width="100%">
        <tr>
            <th colspan="2" style="background-color:#b7c2c8;" align="center"><strong>Dependants Details</strong></th>
        </tr>';

        $cnt = 0;
    
        for($i = 0; $i < 2; $i++) {
            $tbl .= 
            '<tr nobr="true">
                <td rowspan="6" width="4%"><strong>#'.++$cnt.'</strong></td>
                <td width="13%"><strong>Firstname</strong></td>
                <td width="32%"></td>
                <td rowspan="6" width="4%"><strong>#'.++$cnt.'</strong></td>
                <td width="13%"><strong>Firstname</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Lastname</strong></td>
                <td width="32%"></td>
                <td width="13%"><strong>Lastname</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Id Number</strong></td>
                <td width="32%"></td>
                <td width="13%"><strong>Id Number</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Date of birth</strong></td>
                <td width="32%"></td>
                <td width="13%"><strong>Date of birth</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Gender</strong></td>
                <td width="32%">
                    <input type="checkbox" name="agree" value="1" /> <label for="agree">Male </label>
                    <input type="checkbox" name="agree" id="rqb" value="2" /> <label for="rqb">Female</label>
                </td>
                <td width="13%"><strong>Gender</strong></td>
                <td width="34%">
                    <input type="checkbox" name="agree" value="1" /> <label for="agree">Male </label>
                    <input type="checkbox" name="agree" id="rqb" value="2" /> <label for="rqb">Female</label>
                </td>
            </tr>
            <tr>
                <td width="13%"><strong>Relationship</strong></td>
                <td width="32%">
                    <input type="checkbox" name="radioquestion" value="1" /> <label for="agree">Child </label>
                    <input type="checkbox" name="radioquestion" id="rqb" value="2" /> <label for="rqb">Brother</label>
                    <input type="checkbox" name="radioquestion" id="rqb2" value="3" /> <label for="rqb">Sister</label>
                    <input type="checkbox" name="radioquestion" id="rqb3" value="4" /> <label for="rqb">Other</label>
                </td>
                <td width="13%"><strong>Relationship</strong></td>
                <td width="34%">
                    <input type="checkbox" name="radioquestion" value="1" /> <label for="agree">Child </label>
                    <input type="checkbox" name="radioquestion" id="rqb" value="2" /> <label for="rqb">Brother</label>
                    <input type="checkbox" name="radioquestion" id="rqb2" value="3" /> <label for="rqb">Sister</label>
                    <input type="checkbox" name="radioquestion" id="rqb3" value="4" /> <label for="rqb">Other</label>
                </td>
            </tr>
            <tr>
                <td colspan="6"></td>
            </tr>';
        }
        
    $tbl .= 
    '</table>';
       
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
