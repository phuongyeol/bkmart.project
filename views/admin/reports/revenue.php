<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');
ob_start(); 
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Anh Nguyen Store');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 005', PDF_HEADER_STRING);

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
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(1, 1, 1, 1);

// set color for background
$pdf->SetFillColor(255, 255, 127);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$pdf->writeHTMLCell(0,0,'','', $title, 0, 1, 0, true, 'C', true);

$content = '';
$content .= '<legend style="padding-bottom: 20px">List of Invoice'.$date_start_input.'to'.$date_end_input.'</legend>
<div style="float: right; font-weight: bold">
Sum:'.number_format($sum) .'VND
</div>
<br/>
<br/>
<table  id="myTable" class="table table-hover table-striped table-bordered">
<thead>
<tr>
<th class="text-center">Code </th>
<th class="text-center">Invoice ID</th>
<th class="text-center">Staff ID</th>
<th class="text-center">Customer ID</th>
<th class="text-center">Date</th>
<th class="text-center">Total</th>
</tr>
</thead>
<tbody>';
$i=1; $sum=0 ;
$output='';
foreach ($data as $key => $invoice) {
	$output .= '<tr >
	<td class="text-center"><a href="?mod=invoice&act=detail&id='.$invoice["id"].' ?>"  class="btn btn-warning">'.$i++.'</a></td>
	<td class="text-left">'.$invoice["id"].'</td>
	<td class="text-center">'. $invoice["staff_id"].'</td>
	<td class="text-center">'.$invoice["customer_id"].'</td>
	<td class="text-center">'. $invoice["date"].'</td>
	<td class="text-right">'.number_format($invoice["money"]).'</td>
	</tr>';
} ;
$content.=$output;
$content.='</tbody>
		</table>';
$pdf->writeHTML($content);
$pdf->writeHTMLCell(0,0,'','', 0, 1, 0, true, 'C', true);



//move pointer to last page
$pdf->lastPage();


// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdf->Output('report.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
