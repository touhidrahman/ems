<?php
tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator(PDF_CREATOR);
$title = "Perfect Oral Dental Care";
$obj_pdf->SetTitle($title);
$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, 
        PDF_HEADER_STRING);
$obj_pdf->setHeaderFont(
        Array(
                PDF_FONT_NAME_MAIN,
                '',
                PDF_FONT_SIZE_MAIN
        ));
$obj_pdf->setFooterFont(
        Array(
                PDF_FONT_NAME_DATA,
                '',
                PDF_FONT_SIZE_DATA
        ));
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
ob_start();
// we can have any view part here like HTML, PHP etc
echo "<p><i>Date: " . $dt . "<br>ID: " . $id . "<br></i></p>";
echo "<p>Patient: " . $basic_info['name'] . "<br>
Age: " . $basic_info['age'] . " years<br>
Sex: ". $basic_info['sex'];

echo "<h3>Medical Histories</h3>";

foreach ($med_histories as $m) {
    echo "<p>" . $m->disease_name . "</p>";
}

foreach ($result as $row) {
    echo "<h3>Complaints</h3>" . $row['complain'] . "<br>
    <h3>Diagnosis</h3>";
    foreach ($this_patient_diags as $tpn) {
        if ($tpn->diag_dt == $row['dt']) {
            if ($tpn->diag_text != "") {
                echo $tpn->diag_name . ': ' . $tpn->diag_text . '<br>';
            }
        }
    }
    
    echo "<h3>Treatment Plan</h3>";
    $total = 0;
    foreach ($this_patient_treats as $tpt){
        if ($tpt->treat_dt == $row['dt'])
        {
            if ($tpt->unit != "") {
                echo $tpt->treat_name;
                echo ': ';
                echo $tpt->unit.' x '.$tpt->treat_cost;
                echo ' = ';
                echo $tpt->unit*$tpt->treat_cost.' Taka';
                echo ' | <i>';
                echo $tpt->treat_description;
                echo '</i><br>';
                $total += $tpt->unit*$tpt->treat_cost;
            }
        }
    }
    echo "<p><strong>Total Cost: ".$total." Taka Only</strong></p>";
}

echo "<p></p>";
echo "<p></p>";
echo "<p></p>";
echo "<p></p>";
echo "<p>___________________________<br><strong>DR. ABCDEF WXYZ</strong><br>Perfect Oral & Dental Care</p>";
echo "<p></p>";
echo "<p></p>";
echo "<p>I agree to the terms and condition</p>";
echo "<p></p>";
echo "<p>___________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;(Signature of Patient)<br><br></p>";
$content = ob_get_contents();
ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output($id.'.pdf', 'I');
?>