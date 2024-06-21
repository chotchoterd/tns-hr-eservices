<?php

use Mpdf\Tag\Center;

include "checkAdminUser.php";
$current_year = date('Y');
require_once __DIR__ . '/vendor/autoload.php';
$defaultConfig1 = new Mpdf\Config\ConfigVariables();
$defaultConfig = $defaultConfig1->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig1 = new Mpdf\Config\FontVariables();
$defaultFontConfig = $defaultFontConfig1->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf(array(
    'fontDir' => array_merge($fontDirs, array(
        __DIR__ . '/tmp',
    )),
    'fontdata' => $fontData + array( // lowercase letters only in font key
        'sarabun' => array(
            'R' => 'THSarabunNew.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf'
        )
    ),
    'default_font' => 'sarabun',
    'default_font_size' => 12.5 // กำหนดขนาดฟอนต์ที่นี่
));
$html = '<!DOCTYPE html>';
$html .= '<html lang="th">';
$html .= '<head>';
$html .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$html .= '</head>';
$html .= '<body>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th align="left" style="font-size: 20px;">';
$html .= '<img src="img/images.png" alt="" width="60px">' . nbs(3) . 'THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="font-size: 20px;">';
foreach ($data_EvaluateForeman_id as $data_EvaluateForeman_ids)
    $html .= '<u>[' . ($data_EvaluateForeman_ids->year_submit) . '] BONUS & ANNUAL Assessment for Foreman & below</u>';
$html .= '</th>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Date</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 130px;">';
$html .= '' . $data_EvaluateForeman_ids->date_submit . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Employee name</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->emp_name . '';
$html .= '</td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Employee ID</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->emp_id . '';
$html .= '</td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Position</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->position . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Section</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->section . '';
$html .= '</td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Employment date</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->employment_date . '';
$html .= '</td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Years of service</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->year_fo_service . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<div style="' . ($data_EvaluateForeman_ids->foreman == "" ? "display: none;" : "") . '">';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Foreman</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->foreman . '';
$html .= '</td>';
$html .= '</div>';
$html .= '<div style="' . ($data_EvaluateForeman_ids->sup_name1 == "" ? "display: none;" : "") . '">';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Supervisor Name 1</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->sup_name1 . '';
$html .= '</td>';
$html .= '</div>';
$html .= '<div style="' . ($data_EvaluateForeman_ids->sup_name2 == "" ? "display: none;" : "") . '">';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Supervisor Name 2</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->sup_name2 . '';
$html .= '</td>';
$html .= '</div>';
$html .= '</tr>';
$html .= '<div style="' . ($data_EvaluateForeman_ids->Factory_Manager_GM == "" ? "display: none" : "") . '">';
$html .= '<tr>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 100px;"><b>Factory Manager / GM</b></td>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd; width: 120px;">';
$html .= '' . $data_EvaluateForeman_ids->Factory_Manager_GM . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '</div>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th align="left" colspan="6">1. Leave record evaluation / ประเมินจากสถิติการลา.</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Leave day(s) – จำนวนวันลา</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 100px;">0 – 6</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 100px;">7 – 13</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 100px;">14 – 20</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 100px;">21 – 27</th>';
$html .= '<th style="border: 0.5px solid #adb5bd;">28 days up/ 28วันขึ้นไป</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">40 points - 40 คะแนน</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">40</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">35</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">30</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">25</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">0</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th colspan="3" style="border: 0.5px solid #adb5bd; width: 225px;">';
$html .= 'Leave record between 1 Sep [' . ($data_EvaluateForeman_ids->year_submit - 1) . '] – 31 Aug [' . ($data_EvaluateForeman_ids->year_submit) . '] <br>';
$html .= 'สถิติการลาระหว่าง 1 กันยายน [' . ($data_EvaluateForeman_ids->year_submit - 1) . '] ถึง 31 สิงหาคม [' . ($data_EvaluateForeman_ids->year_submit) . ']';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 225px;">Leave record. บันทึกการลา</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 225px;">';
$html .= 'From 1 Sep [' . ($data_EvaluateForeman_ids->year_submit - 1) . ']';
$html .= ' to 31 Dec [' . ($data_EvaluateForeman_ids->year_submit - 1) . ']';
$html .= '</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 225px;">';
$html .= 'From 1 Jan [' . ($data_EvaluateForeman_ids->year_submit) . ']';
$html .= ' to 31 Aug [' . ($data_EvaluateForeman_ids->year_submit) . ']';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Business leave ลากิจ</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->business_leave1 . '';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->business_leave2 . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Sick leave ลาป่วย</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->sick_leave1 . '';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->sick_leave2 . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Absenteeism ขาดงาน</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->absenteeism1 . '';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->absenteeism2 . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Total รวม</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->total_leave1 . '';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->total_leave2 . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Grand Total ผลรวม</th>';
$html .= '<td align="center" colspan="2" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->grand_total . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Late มาสาย</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->late1 . '';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '' . $data_EvaluateForeman_ids->late2 . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td>';
$html .= '<center>';
$html .= '<div>*** For reference****</div>';
$html .= '</center>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th colspan="3" style="border: 0.5px solid #adb5bd;">';
$html .= 'การลงโทษทางวินัย / Punishment Record <br>';
$html .= 'ระหว่าง 1 Sep [' . ($data_EvaluateForeman_ids->year_submit - 1) . '] - 31 Aug [' . ($data_EvaluateForeman_ids->year_submit) . ']';
$html .= '</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 150px;">หมายเหตุ / Noted</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd;">ตักเตือนด้วยวาจา/Verbal Warning</td>';
$html .= '<td style="border: 0.5px solid #adb5bd;">';
if ($data_EvaluateForeman_ids->verbal_warning == 0) {
    $html .= '-';
} else {
    $html .= '' . $data_EvaluateForeman_ids->verbal_warning . '';
}
$html .= '</td>';
$html .= '<td style="border: 0.5px solid #adb5bd;">ครั้ง</td>';
$html .= '<td style="border: 0.5px solid #adb5bd;">ไม่นำไปใช้ร่วมการประเมิน</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td align="left" style="border: 0.5px solid #adb5bd;">ตักเตือนด้วยหนังสือ/Letter warning</td>';
$html .= '<td style="border: 0.5px solid #adb5bd;">';
if ($data_EvaluateForeman_ids->letter_warning == 0) {
    $html .= '-';
} else {
    $html .= '' . $data_EvaluateForeman_ids->letter_warning . '';
}
$html .= '</td>';
$html .= '<td style="border: 0.5px solid #adb5bd;">ครั้ง</td>';
$html .= '<td style="border: 0.5px solid #adb5bd;">นำไปใช้ร่วมการประเมิน</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 300px; padding: 9px;">Leave Score</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="background-color: #006494; color: #fff; padding: 9px;">';
$html .= '<label for="">';
$html .= '' . $data_EvaluateForeman_ids->leave_score . '';
$html .= '</label>';
$html .= '</th>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th colspan="6" align="left">2. Assessment by Supervisor 1 ประเมินโดยหัวหน้างาน</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Evaluation Item / หัวข้อการประเมิน</th>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Excellent<br>ดีเลิศ<br>(10)</th>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Good<br>ดี<br>(8)</th>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Fair<br>พอใช้<br>(5)</th>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Need Improvemen<br>ต้องปรับปรุง<br>(3)</th>';
$html .= '<th style="border: 0.5px solid #adb5bd;">Un Satisfactory<br>ไม่เป็นที่พอใจ<br>(2)</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd;">';
foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
    if ($bonus_evaluate_Foreman_belows->topic == 1) {
        $html .= $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th . '';
    }
}
$html .= '</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="10" ' . ($data_EvaluateForeman_ids->item1 == "10" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="8" ' . ($data_EvaluateForeman_ids->item1 == "8" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="5" ' . ($data_EvaluateForeman_ids->item1 == "5" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="3" ' . ($data_EvaluateForeman_ids->item1 == "3" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="2" ' . ($data_EvaluateForeman_ids->item1 == "2" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd;">';
foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
    if ($bonus_evaluate_Foreman_belows->topic == 2) {
        $html .= '' . $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th . '';
    }
}
$html .= '</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="10" ' . ($data_EvaluateForeman_ids->item2 == "10" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="8" ' . ($data_EvaluateForeman_ids->item2 == "8" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="5" ' . ($data_EvaluateForeman_ids->item2 == "5" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="3" ' . ($data_EvaluateForeman_ids->item2 == "3" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="2" ' . ($data_EvaluateForeman_ids->item2 == "2" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd;">';
foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
    if ($bonus_evaluate_Foreman_belows->topic == 3) {
        $html .= '' . $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th . '';
    }
}
$html .= '</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="10" ' . ($data_EvaluateForeman_ids->item3 == "10" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="8" ' . ($data_EvaluateForeman_ids->item3 == "8" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="5" ' . ($data_EvaluateForeman_ids->item3 == "5" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="3" ' . ($data_EvaluateForeman_ids->item3 == "3" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="2" ' . ($data_EvaluateForeman_ids->item3 == "2" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd;">';
foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
    if ($bonus_evaluate_Foreman_belows->topic == 4) {
        $html .= '' . $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th . '';
    }
}
$html .= '</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="10" ' . ($data_EvaluateForeman_ids->item4 == "10" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="8" ' . ($data_EvaluateForeman_ids->item4 == "8" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="5" ' . ($data_EvaluateForeman_ids->item4 == "5" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="3" ' . ($data_EvaluateForeman_ids->item4 == "3" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="2" ' . ($data_EvaluateForeman_ids->item4 == "2" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd;">';
foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
    if ($bonus_evaluate_Foreman_belows->topic == 5) {
        $html .= '' . $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th . '';
    }
}
$html .= '</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="10" ' . ($data_EvaluateForeman_ids->item5 == "10" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="8" ' . ($data_EvaluateForeman_ids->item5 == "8" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="5" ' . ($data_EvaluateForeman_ids->item5 == "5" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="3" ' . ($data_EvaluateForeman_ids->item5 == "3" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="2" ' . ($data_EvaluateForeman_ids->item5 == "2" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd;">';
foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
    if ($bonus_evaluate_Foreman_belows->topic == 6) {
        $html .= '' . $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th . '';
    }
}
$html .= '</th>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="10" ' . ($data_EvaluateForeman_ids->item6 == "10" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="8" ' . ($data_EvaluateForeman_ids->item6 == "8" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="5" ' . ($data_EvaluateForeman_ids->item6 == "5" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="3" ' . ($data_EvaluateForeman_ids->item6 == "3" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '<td align="center" style="border: 0.5px solid #adb5bd;">';
$html .= '<input type="radio" value="2" ' . ($data_EvaluateForeman_ids->item6 == "2" ? 'checked="checked"' : '') . '>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd; width: 350px;">Section Assessment score คะแนนประเมินโดยแผนก</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 350px;">';
$html .= '' . $data_EvaluateForeman_ids->assessment_score . '';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd; width: 350px;">Leave record score คะแนนจากสถิติการลา</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 350px;">';
$html .= '' . $data_EvaluateForeman_ids->leave_score . '';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 0.5px solid #adb5bd; width: 350px;">Total Score คะแนนรวม</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 350px;">';
$html .= '' . $data_EvaluateForeman_ids->total_score . '';
$html .= '</th>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td colspan="5">Rating Score / ผลการประเมิน</td>';
$html .= '</tr>';
$html .= '<tr>';
$total_score = $data_EvaluateForeman_ids->total_score;
$grade_a_checked = '';
$grade_b_checked = '';
$grade_c_checked = '';
$grade_d_checked = '';
switch (true) {
    case ($total_score >= 91):
        $grade_a_checked = 'checked="checked"';
        break;
    case ($total_score >= 73 && $total_score <= 90):
        $grade_b_checked = 'checked="checked"';
        break;
    case ($total_score >= 56 && $total_score <= 72):
        $grade_c_checked = 'checked="checked"';
        break;
    case ($total_score <= 55):
        $grade_d_checked = 'checked="checked"';
        break;
}
$html .= '<td style="width: 140px;">Grade / ระดับ</td>';
$html .= '<td style="width: 140px;"><b>A </b><input type="checkbox" name="up_grade_a" id="up_grade_a" ' . $grade_a_checked . '> <label for="grade_a">91 Above /สูงกว่า 91</label></td>';
$html .= '<td style="width: 140px;"><b>B </b><input type="checkbox" name="up_grade_b" id="up_grade_b" ' . $grade_b_checked . '> <label for="grade_b">90 - 73</label></td>';
$html .= '<td style="width: 140px;"><b>C </b><input type="checkbox" name="up_grade_c" id="up_grade_c" ' . $grade_c_checked . '> <label for="grade_c">72 - 56</label></td>';
$html .= '<td style="width: 140px;"><b>D </b><input type="checkbox" name="up_grade_d" id="up_grade_d" ' . $grade_d_checked . '> <label for="grade_d">55 Below / ต่ำกว่า 55</label></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th align="left" colspan="3">3. Assessment by Manager / Sr. Manager / Factory Manager ประเมินโดยผู้จัดการแผนก / ผู้จัดการอาวุโส / ผู้จัดการโรงงาน Comment in writing ความคิดเห็นเป็นลายลักษณ์อักษร.</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 240px;">Position /ตำแหน่ง</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 240px;">Final Rating</th>';
$html .= '<th style="border: 0.5px solid #adb5bd; width: 240px;">Comment in writing <br> ความคิดเห็นเป็นลายลักษณ์อักษร</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd;">Direct Supervisor <br> หัวหน้างานสายตรง</td>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd; text-align: center;" rowspan="3">';
if ($data_EvaluateForeman_ids->total_score >= 91) {
    $html .= '<b style="font-size: 50px;">A</b>';
} elseif ($data_EvaluateForeman_ids->total_score >= 73) {
    $html .= '<b style="font-size: 50px;">B</b>';
} elseif ($data_EvaluateForeman_ids->total_score >= 56) {
    $html .= '<b style="font-size: 50px;">C</b>';
} else {
    $html .= '<b style="font-size: 50px;">D</b>';
}
$html .= '</td>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd;">Senior Manager / Section Manager <br> ผู้จัดการอาวุโส / ผู้จัดการแผนก</td>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd;"></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd;">Factory Manager <br> ผู้จัดการโรงงาน</td>';
$html .= '<td style="height: 100px; border: 0.5px solid #adb5bd;"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '' . br(2) . '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<th style="vertical-align: bottom;">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td style="vertical-align: bottom; border-bottom: 0.5px solid #adb5bd; width: 200px;"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<br>';
$html .= '<label for="">(' . nbs(56) . ')</label><br>';
$html .= '<label for="">Direct Supervisor</label><br>';
$html .= '<label for="">หัวหน้างานสายตรง </label>';
$html .= '</th>';
$html .= '<th style="vertical-align: bottom;">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td style="vertical-align: bottom; border-bottom: 0.5px solid #adb5bd; width: 200px;"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<br>';
$html .= '<label for="">(' . nbs(56) . ')</label><br>';
$html .= '<label for="">Senior Manager / Section Manager</label><br>';
$html .= '<label for="">ผู้จัดการอาวุโส / ผู้จัดการแผนก</label>';
$html .= '</th>';
$html .= '<th style="vertical-align: bottom;">';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td style="vertical-align: bottom; border-bottom: 0.5px solid #adb5bd; width: 200px;"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<br>';
$html .= '<label for="">(' . nbs(56) . ')</label><br>';
$html .= '<label for="">Factory Manager / GM</label><br>';
$html .= '<label for="">ผู้จัดการโรงงาน / ผู้จัดการทั่วไป</label>';
$html .= '</th>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</body>';
$mpdf->WriteHTML($html);
$mpdf->Output("PDFForeman" . $current_year . ".pdf");
