<?php
//============================================================+
// File name   : lid_aansoek_vorm.php
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

$filename = 'lid_aansoek_vorm';

// create new PDF document
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Roystan Smith');
$pdf->SetTitle('Lid Aansoek Vorm');
$pdf->SetSubject('Lid Aansoek Vorm');
$pdf->SetKeywords('Aansoek Vorm, PDF, Aansoek, dokument, vorm');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, '                                       Begrafnis Dekking Aansoek Vorm', '                                          '.PDF_CUSTOM_HEADER_STRING);

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

$tbl = '<br /><br />Vul assesblief u besonderhede asook besonderhede van enige naasbestaandes wat u wil dek.';

$tbl .= '<br /><br />
    <table border="1" cellpadding="4" cellspacing="0" nobr="true" align="left">
        <tr>
            <th colspan="5" align="center" style="background-color:#b7c2c8;"><strong>Hoof Lid</strong></th>
        </tr>';

        $tbl .= 
        '<tr nobr="true">
                <td width="18%"><strong>Naam</strong></td>
                <td width="32%"></td>
                <td rowspan="3" width="18%"><strong>Adres</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Van</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Id Nommer</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Geboorte Datum</strong></td>
                <td width="32%"></td>
                <td width="18%"><strong>Pos Kode</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Geslag</strong></td>
                <td width="32%">
                    <input type="checkbox" name="member_gender_radioquestion" id="member_gender" value="1" /> <label for="agree">Manlik </label>
                    <input type="checkbox" name="member_gender_radioquestion" id="member_gender" value="2" /> <label for="rqb">Vroulik</label>
                </td>
                <td width="18%"><strong>Telefoon Nommer</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td width="18%"><strong>Kategorie</strong></td>
                <td width="32%">
                    <input type="checkbox" name="member_category_radioquestion" id="member_category" value="1" /> <label for="agree">Enkel </label>
                    <input type="checkbox" name="member_category_radioquestion" id="member_category" value="2" /> <label for="rqb">Familie</label>
                </td>
                <td width="18%"><strong>Selfoon Nommer</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td colspan="4"></td>
            </tr>';
     
    $tbl .= '</table>
    ';

$pdf->writeHTML($tbl, true, false, false, false, '');

// NON-BREAKING TABLE (nobr="true")

$tbl = '<br />Vul asb die besonderhede van u lewensmaat in.';

    $tbl .= '<br /><br />
    <table border="1" cellpadding="4" cellspacing="0" nobr="true" align="left">
        <tr>
            <th colspan="6" align="center" style="background-color:#b7c2c8;"><strong>Lewensmaat Besonderhede</strong></th>
        </tr>';

        $tbl .= 
        '<tr nobr="true">
                <td width="18%"><strong>Naam</strong></td>
                <td width="32%"></td>
                <td rowspan="3" width="18%"><strong>Adres</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Van</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Id Nommer</strong></td>
                <td width="32%"></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Gebore</strong></td>
                <td width="32%"></td>
                <td width="18%"><strong>Pos Kode</strong></td>
                <td width="32%"></td>
            </tr>
            <tr nobr="true">
                <td width="18%"><strong>Geslag</strong></td>
                <td width="32%">
                    <input type="checkbox" name="spouse_gender_radioquestion" id="spouse_gender_radioquestion" value="1" /> <label for="agree">Manlik </label>
                    <input type="checkbox" name="spouse_gender_radioquestion" id="spouse_gender_radioquestion" value="2" /> <label for="rqb">Vroulik</label>
                </td>
                <td width="18%"><strong>Telefoon Nommer</strong></td>
                <td width="32%"></td>
            </tr>
            <tr>
                <td width="18%"><strong>Verhouding</strong></td>
                <td width="32%">
                    <input type="checkbox" name="spouse_relationship_radioquestion" id="spouse_relationship_radioquestion" value="1" /> <label for="agree">Vrou </label>
                    <input type="checkbox" name="spouse_relationship_radioquestion" id="spouse_relationship_radioquestion" value="2" /> <label for="rqb">Man</label>
                </td>
                <td width="18%"><strong>Selfoon Nommer</strong></td>
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
    
    $tbl = '<br />Vul asb die besonderhede van alle afhanklikes wat gedek word in. Let wel slegs afhanklikes onder die ouderdom van 21 word gedek.';
    
    $tbl .= '<br /><br />
    <table border="1" cellpadding="4" cellspacing="0" align="left" width="100%">
        <tr>
            <th colspan="2" style="background-color:#b7c2c8;" align="center"><strong>Afhanklikes Besonderhede</strong></th>
        </tr>';

        $cnt = 0;
    
        for($i = 0; $i < 2; $i++) {
            $tbl .= 
            '<tr nobr="true">
                <td rowspan="6" width="4%"><strong>#'.++$cnt.'</strong></td>
                <td width="13%"><strong>Naam</strong></td>
                <td width="32%"></td>
                <td rowspan="6" width="4%"><strong>#'.++$cnt.'</strong></td>
                <td width="13%"><strong>Naam</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Van</strong></td>
                <td width="32%"></td>
                <td width="13%"><strong>Van</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Id Nommer</strong></td>
                <td width="32%"></td>
                <td width="13%"><strong>Id Nommer</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Gebore</strong></td>
                <td width="32%"></td>
                <td width="13%"><strong>Gebore</strong></td>
                <td width="34%"></td>
            </tr>
            <tr nobr="true">
                <td width="13%"><strong>Geslag</strong></td>
                <td width="32%">
                    <input type="checkbox" name="dependant_gender_radioquestion_1'.$i.'" id="dependant_gender_radioquestion_1'.$i.'" value="1" /> <label for="dependant_gender_radioquestion_1'.$i.'">Manlik </label>
                    <input type="checkbox" name="dependant_gender_radioquestion_1'.$i.'" id="dependant_gender_radioquestion_1'.$i.'" value="2" /> <label for="dependant_gender_radioquestion_1'.$i.'">Vroulik</label>
                </td>
                <td width="13%"><strong>Geslag</strong></td>
                <td width="34%">
                    <input type="checkbox" name="dependant_gender_radioquestion_2'.$i.'" id="dependant_gender_radioquestion_2'.$i.'" value="1" /> <label for="dependant_gender_radioquestion_2'.$i.'">Manlik </label>
                    <input type="checkbox" name="dependant_gender_radioquestion_2'.$i.'" id="dependant_gender_radioquestion_2'.$i.'" value="2" /> <label for="dependant_gender_radioquestion_2'.$i.'">Vroulik</label>
                </td>
            </tr>
            <tr>
                <td width="13%"><strong>Verhouding</strong></td>
                <td width="32%">
                    <input type="checkbox" name="dependant_relationship_radioquestion_1'.$i.'" id="dependant_relationship_radioquestion_1'.$i.'" value="1" /> <label for="dependant_relationship_radioquestion_1'.$i.'">Kind </label>
                    <input type="checkbox" name="dependant_relationship_radioquestion_1'.$i.'" id="dependant_relationship_radioquestion_1'.$i.'" value="2" /> <label for="dependant_relationship_radioquestion_1'.$i.'">Broer</label>
                    <input type="checkbox" name="dependant_relationship_radioquestion_1'.$i.'" id="dependant_relationship_radioquestion_1'.$i.'" value="3" /> <label for="dependant_relationship_radioquestion_1'.$i.'">Sister</label>
                    <input type="checkbox" name="dependant_relationship_radioquestion_1'.$i.'" id="dependant_relationship_radioquestion_1'.$i.'" value="4" /> <label for="dependant_relationship_radioquestion_1'.$i.'">Ander</label>
                </td>
                <td width="13%"><strong>Verhouding</strong></td>
                <td width="34%">
                    <input type="checkbox" name="dependant_relationship_radioquestion_2'.$i.'" id="dependant_relationship_radioquestion_2'.$i.'" value="1" /> <label for="dependant_relationship_radioquestion_2'.$i.'">Kind </label>
                    <input type="checkbox" name="dependant_relationship_radioquestion_2'.$i.'" id="dependant_relationship_radioquestion_2'.$i.'" value="2" /> <label for="dependant_relationship_radioquestion_2'.$i.'">Broer</label>
                    <input type="checkbox" name="dependant_relationship_radioquestion_2'.$i.'" id="dependant_relationship_radioquestion_2'.$i.'" value="3" /> <label for="dependant_relationship_radioquestion_2'.$i.'">Sister</label>
                    <input type="checkbox" name="dependant_relationship_radioquestion_2'.$i.'" id="dependant_relationship_radioquestion_2'.$i.'" value="4" /> <label for="dependant_relationship_radioquestion_2'.$i.'">Ander</label>
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
