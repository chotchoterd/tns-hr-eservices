<?php
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
$html .= '<th align="left">';
$html .= '<img src="' . base_url("/img/images.png") . '" alt="" width="60px">' . nbs(3) . 'THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="padding-left: 200px;">';
$html .= 'Self-Evaluation';
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th style="padding-left: 200px;">';
$html .= 'Permanent Employee Grade 2 - Grade 6';
$html .= '</th>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<tr>';
$html .= '<td><div style="display: flex;"><b>Instruction: </b>Please completely assess your work performance to reflect on your achievements this year (' . $current_year . ') and your ongoing commitment to improving your performance within the organization and your job target in the following year (' . ($current_year + 1) . '). <b>After which, submit this form to your superior by 30 October ' . $current_year . '. </b></div></td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td><div style="display: flex;">HR Note: In order to comply with the company is policy to minimize printing/ paperless scheme.<br>';
$html .= 'We, the HR team, would like to request for your cooperation in submitting the completed evaluation form as a PDF file and using an electronic signature before forwarding it to your superior. Your kind cooperation would be highly appreciated. /Thank you. <br></div></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '<table>';
foreach ($self_evaluation_id as $self_evaluation_ids)
        $html .= '<tr>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td></td>';
$html .= '<td align="left" style="border: 1px solid #000000; width: 100px;"><b>Date</b></td>';
$html .= '<td align="left" style="border: 1px solid #000000; width: 100px;">';
$html .= '' . $self_evaluation_ids->date_submit . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 1px solid #000000; width: 100px;">Employee name</th>';
$html .= '<td style="border: 1px solid #000000; width: 150px;">';
$html .= '' . $self_evaluation_ids->emp_name . '';
$html .= '</td>';
$html .= '<th align="left" style="border: 1px solid #000000; width: 90px;">Employee ID</th>';
$html .= '<td style="border: 1px solid #000000; width: 100px;">';
$html .= '' . $self_evaluation_ids->emp_id . '';
$html .= '</td>';
$html .= '<th align="left" style="border: 1px solid #000000;">Employee Grade</th>';
$html .= '<td style="border: 1px solid #000000;">';
$html .= '' . $self_evaluation_ids->emp_grade . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 1px solid #000000;">Section</th>';
$html .= '<td style="border: 1px solid #000000;">';
$html .= '' . $self_evaluation_ids->section . '';
$html .= '</td>';
$html .= '<th align="left" style="border: 1px solid #000000;">Division</th>';
$html .= '<td style="border: 1px solid #000000; width: 150px">';
$html .= '' . $self_evaluation_ids->division . '';
$html .= '</td>';
$html .= '<th align="left" style="border: 1px solid #000000;">Hired date</th>';
$html .= '<td style="border: 1px solid #000000;">';
$html .= '' . $self_evaluation_ids->hired_date . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th align="left" style="border: 1px solid #000000;">Superior name</th>';
$html .= '<td style="border: 1px solid #000000;">';
$html .= '' . $self_evaluation_ids->sup_name . '';
$html .= '</td>';
$html .= '<th align="left" style="border: 1px solid #000000;">Superior Grade</th>';
$html .= '<td style="border: 1px solid #000000;">';
$html .= '' . $self_evaluation_ids->sup_grade . '';
$html .= '</td>';
$html .= '<th align="left" style="border: 1px solid #000000;">Employee Years of service</th>';
$html .= '<td style="border: 1px solid #000000;">';
$html .= '' . $self_evaluation_ids->emp_year_of_service . '';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th colspan="6" align="left">';
foreach ($topic_selfevaluation as $topic_selfevaluations) {
    if ($topic_selfevaluations->main_topic == 1) {
        $html .= $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic . ' ' . '(' . ($current_year) . ').';
    }
}
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" align="center">';
$html .= '<b>Job Target</b>';
$html .= '</td>';
$html .= '<td colspan="3" align="center">';
$html .= '<b>Actual achievement</b>';
$html .= '</td>';
$html .= '</tr>';
$check_job_target_1['job_target_1'] = array();
$check_job_target_1['job_target_1'] = $self_evaluation_ids->job_target_1;
$newArray_job_target_1 = explode(",", $check_job_target_1['job_target_1']);

$check_actual_achievement['actual_achievement'] = array();
$check_actual_achievement['actual_achievement'] = $self_evaluation_ids->actual_achievement;
$newArray_actual_achievement = explode(",", $check_actual_achievement['actual_achievement']);
for ($b = 0; $b < count($newArray_job_target_1); $b++) {
    $html .= '<tr>';
    $html .= '<td colspan="3" style="border: 1px solid #000; height: 45px;">';
    $html .= '<label>' . $newArray_job_target_1[$b] . '</label>';
    $html .= '</td>';
    $html .= '<td colspan="3" style="border: 1px solid #000; height: 45px;">';
    $html .= '<label>' . $newArray_actual_achievement[$b] . '</labla>';
    $html .= '</td>';
    $html .= '</tr>';
}
$html .= '<tr>';
$html .= '<th colspan="6" align="left">';
foreach ($topic_selfevaluation as $topic_selfevaluations) {
    if ($topic_selfevaluations->main_topic == 2) {
        $html .= $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic . ' ' . '(' . ($current_year + 1) . ').';
    }
}
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="center">';
$html .= '<b>Job Target</b>';
$html .= '</td>';
$html .= '</tr>';
$check_job_target_2['job_target_2'] = array();
$check_job_target_2['job_target_2'] = $self_evaluation_ids->job_target_2;
$newArray_job_target_2 = explode(",", $check_job_target_2['job_target_2']);
for ($r = 0; $r < count($newArray_job_target_2); $r++) {
    $html .= '<tr>';
    $html .= '<td colspan="6" style="border: 1px solid #000; height: 45px;">';
    $html .= '<label>' . $newArray_job_target_2[$r] . '</label>';
    $html .= '</td>';
    $html .= '</tr>';
}
$html .= '<tr>';
$html .= '<th colspan="6" align="left">';
foreach ($topic_selfevaluation as $topic_selfevaluations) {
    if ($topic_selfevaluations->main_topic == 3) {
        $html .= $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic;
    }
}
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6">';
foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.1) {
        $html .= "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6">';
$check_item_option_selfevaluations3_1['item_option_selfevaluations3_1'] = array();
$check_item_option_selfevaluations3_1['item_option_selfevaluations3_1'] = $self_evaluation_ids->item_option_selfevaluations3_1;
$newArray_item_option_selfevaluations3_1 = explode(",", $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1']);
foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
    $check3_1 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluations3_1) ? 'checked="checked"' : '';
    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.1) {
        $input_id = 'item_option_selfevaluation_' . $key;
        $html .= "<input type=\"radio\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_1> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label><br>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6">';
foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.2) {
        $html .= "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="margin: 0; padding: 0; vertical-align: top;">';
$check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = array();
$check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = $self_evaluation_ids->item_option_selfevaluation3_2;
$newArray_item_option_selfevaluation3_2 = explode(",", $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2']);

$count = 0;
$half = ceil(count($item_option_selfevaluation) / 2);
foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
    $check3_2 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_2) ? 'checked="checked"' : '';
    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
        $input_id = '3_2item_option_selfevaluation_' . $key;
        if ($count < $half) {
            $html .= "<input type=\"checkbox\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label> <br>";
        }
    }
    $count++;
}
$html .= '</td>';
$html .= '<td colspan="3" style="margin: 0; padding: 0; vertical-align: top;">';
$check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = array();
$check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = $self_evaluation_ids->item_option_selfevaluation3_2;
$newArray_item_option_selfevaluation3_2 = explode(",", $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2']);

$count = 0;
foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
    $check3_2 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_2) ? 'checked="checked"' : '';
    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
        $input_id = '3_2item_option_selfevaluation_' . $key;
        if ($count >= $half && $count < $half * 2) {
            $html .= "<input type=\"checkbox\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label> <br>";
        }
    }
    $count++;
}
$html .= '<div style=" ' . ($self_evaluation_ids->others_capability == "" ? "display: none;" : "") . '">';
$html .= '<label>' . $self_evaluation_ids->others_capability . '</label>';
$html .= '</div>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6">';
foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.3) {
        $html .= "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . " (" . ($current_year + 1) . ")?" . "</b>";
    }
}
$html .= '</td>';
$html .= '</tr>';

$check_improve_yourself['improve_yourself'] = array();
$check_improve_yourself['improve_yourself'] = $self_evaluation_ids->improve_yourself;
$newArray_improve_yourself = explode(",", $check_improve_yourself['improve_yourself']);
for ($q = 0; $q < count($newArray_improve_yourself); $q++) {
    $html .= '<tr>';
    $html .= '<td colspan="6" style="border: 1px solid #000; height: 45px;">';
    $html .= '<label>' . $newArray_improve_yourself[$q] . '</label>';
    $html .= '</td>';
    $html .= '</tr>';
}
$html .= '<tr>';
$html .= '<th colspan="6" align="left">';
foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.4) {
        $html .= $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . " (" . ($current_year + 1) . ")?";
    }
}
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" align="center">';
$html .= '<b>What are your weaknesses?</b>';
$html .= '</td>';
$html .= '<td colspan="3" align="center">';
$html .= '<b>What are your strengths?</b>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="3" style="border: 1px solid #000; height: 150px; margin: 0; padding: 0; vertical-align: top;">';
$html .= '<label>' . $self_evaluation_ids->weaknesses . '</label>';
$html .= '</td>';
$html .= '<td colspan="3" style="border: 1px solid #000; height: 150px; margin: 0; padding: 0; vertical-align: top;">';
$html .= '<label>' . $self_evaluation_ids->strengths . '</label>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="left">';
foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.5) {
        $html .= "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . " (" . ($current_year + 1) . ")?" . "</b>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" style="border: 1px solid #000; height: 150px; margin: 0; padding: 0; vertical-align: top;">';
$html .= '<label>' . $self_evaluation_ids->target_in_next_year . '</label>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="left">';
foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.6) {
        $html .= "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6">';
$check_item_option_selfevaluation3_6['item_option_selfevaluation3_6'] = array();
$check_item_option_selfevaluation3_6['item_option_selfevaluation3_6'] = $self_evaluation_ids->item_option_selfevaluation3_6;
$newArray_item_option_selfevaluation3_6 = explode(",", $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6']);

foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
    $check3_6 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_6) ? 'checked="checked"' : '';
    $input_id = '3_6item_option_selfevaluation_' . $key;
    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.6) {
        $html .= "<input type=\"radio\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_6> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label><br>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="left">';
foreach ($subtopic_in_subtopic as $subtopic_in_subtopics) {
    if ($subtopic_in_subtopics->main_topic == 3 && $subtopic_in_subtopics->sub_topic == 3.6 && $subtopic_in_subtopics->subtopic_in_subtopic == "3.6.1") {
        $html .= '<div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '"><b>' . $subtopic_in_subtopics->subtopic_in_subtopic . ' ' . $subtopic_in_subtopics->subtopic_in_subtopic_text . '</b></div>
                    <div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '">' . $subtopic_in_subtopics->remark . '</div>';
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="2" style="margin: 0; padding: 0; vertical-align: top;">';
$html .= '<div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '">';
$check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = array();
$check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1;
$newArray_item_option_is_subtopic_in_subtopics3_6_1 = explode(",", $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1']);

$count = 0; // ตัวนับจำนวนข้อมูล
$half = ceil(count($item_option_is_subtopic_in_subtopic_division) / 3); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
$div = "";
foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
    if ($count < $half) {
        $html .= "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
        $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
        foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
            $check_3_6_1 = in_array($item_option_is_subtopic_in_subtopics->sub_division, $newArray_item_option_is_subtopic_in_subtopics3_6_1) ? 'checked="checked"' : '';
            if ($item_option_is_subtopic_in_subtopics->division == $div) {
                $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                $html .= "<input type=\"checkbox\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
            }
        }
    }
    $count++;
}
$html .= '</div>';
$html .= '</td>';
$html .= '<td colspan="2" style="margin: 0; padding: 0; vertical-align: top;">';
$html .= '<div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '">';
$check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = array();
$check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1;
$newArray_item_option_is_subtopic_in_subtopics3_6_1 = explode(",", $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1']);

$count = 0; // ตัวนับจำนวนข้อมูล
$div = "";
foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
    if ($count >= $half && $count < $half * 2) {
        $html .= "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
        $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
        foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
            $check_3_6_1 = in_array($item_option_is_subtopic_in_subtopics->sub_division, $newArray_item_option_is_subtopic_in_subtopics3_6_1) ? 'checked="checked"' : '';
            if ($item_option_is_subtopic_in_subtopics->division == $div) {
                $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                $html .= "<input type=\"checkbox\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
            }
        }
    }
    $count++;
}
$html .= '</div>';
$html .= '</td>';
$html .= '<td colspan="2" style="margin: 0; padding: 0; vertical-align: top;">';
$html .= '<div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '">';
$check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = array();
$check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1;
$newArray_item_option_is_subtopic_in_subtopics3_6_1 = explode(",", $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1']);

$count = 0; // ตัวนับจำนวนข้อมูล
$div = "";
foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
    if ($count >= $half * 2 && $count < $half * 4) {
        $html .= "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
        $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
        foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
            $check_3_6_1 = in_array($item_option_is_subtopic_in_subtopics->sub_division, $newArray_item_option_is_subtopic_in_subtopics3_6_1) ? 'checked="checked"' : '';
            if ($item_option_is_subtopic_in_subtopics->division == $div) {
                $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                $html .= "<input type=\"checkbox\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
            }
        }
    }
    $count++;
}
$html .= '</div>';
$html .= '<div style="' . ($self_evaluation_ids->others_3_6_1 == "" ? "display: none;" : "") . '">';
$html .= '<label>' . $self_evaluation_ids->others_3_6_1 . '</label>';
$html .= '</div>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6">';
foreach ($subtopic_in_subtopic as $subtopic_in_subtopics) {
    if ($subtopic_in_subtopics->main_topic == 3 && $subtopic_in_subtopics->sub_topic == 3.6 && $subtopic_in_subtopics->subtopic_in_subtopic == "3.6.2") {
        $html .= '<div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '"><b>' . $subtopic_in_subtopics->subtopic_in_subtopic . ' ' . $subtopic_in_subtopics->subtopic_in_subtopic_text . '</b></div>';
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="left">';
$check_item_option_is_subtopic_in_subtopic3_6_2['item_option_is_subtopic_in_subtopic3_6_2'] = array();
$check_item_option_is_subtopic_in_subtopic3_6_2['item_option_is_subtopic_in_subtopic3_6_2'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2;
$newArray_item_option_is_subtopic_in_subtopic3_6_2 = explode(",", $check_item_option_is_subtopic_in_subtopic3_6_2['item_option_is_subtopic_in_subtopic3_6_2']);
$html .= '<div style="' . ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "" ? "display: none;" : "") . '">';
foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
    $check_3_6_2 = in_array($item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text, $newArray_item_option_is_subtopic_in_subtopic3_6_2) ? 'checked="checked"' : '';
    if ($item_option_is_subtopic_in_subtopics->subtopic_in_subtopic == "3.6.2") {
        $id_input = '3_6_2item_option_is_subtopic_in_subtopic' . $key;
        $html .= "<input type=\"checkbox\" id=\"$id_input\" value=\"$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text\" $check_3_6_2 style=\"display: inline-block;\"> <label for=\"$id_input\" style=\"display: inline-block;\">$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text</label><br>";
    }
}
$html .= '</div>';
$html .= '<div style="' . ($self_evaluation_ids->others_3_6_2 == "" ? "display: none;" : "") . '">';
$html .= '<label>' . $self_evaluation_ids->others_3_6_2 . '</label>';
$html .= '</div>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="left">';
foreach ($topic_selfevaluation as $topic_selfevaluations) {
    if ($topic_selfevaluations->main_topic == 4) {
        $html .= "<b>" . $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic . "</b>";
    }
}
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" style="border: 1px solid #000; height: 150px; margin: 0; padding: 0; vertical-align: top;">';
$html .= '<label>' . $self_evaluation_ids->your_feedback . '</label>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="right">';
$html .= '<table style="margin-top: 20px;">';
$html .= '<tr>';
$html .= '<td>Employee Sign</td>';
$html .= '<td>' . nbs(3) . '</td>';
$html .= '<td style="vertical-align: bottom; border-bottom: 1px solid #000000; width: 250px;"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="right">';
$html .= '<table style="margin-top: 20px;">';
$html .= '<tr>';
$html .= '<td>Employee print name</td>';
$html .= '<td>' . nbs(3) . '</td>';
$html .= '<td style="vertical-align: bottom; border-bottom: 1px solid #000000; width: 250px;"></td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<th colspan="6" align="left">';
foreach ($topic_selfevaluation as $topic_selfevaluations) {
    if ($topic_selfevaluations->main_topic == 5) {
        $html .= $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic;
    }
}
$html .= '</th>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td colspan="6" align="center">';
$html .= '<table style="width: 100%;">';
$html .= '<tr>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000;">Manager</td>';
$html .= '<td style="width: 60%; height: 150px; border: 1px solid #000; vertical-align: bottom;"></td>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000; vertical-align: bottom;">-Signed name-</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000;">Senior Manager</td>';
$html .= '<td style="width: 60%; height: 150px; border: 1px solid #000; vertical-align: bottom;"></td>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000; vertical-align: bottom;">-Signed name-</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000;">General Manager</td>';
$html .= '<td style="width: 60%; height: 150px; border: 1px solid #000; vertical-align: bottom;"></td>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000; vertical-align: bottom;">-Signed name-</td>';
$html .= '</tr>';
$html .= '<tr>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000;">Senior Executive Officer</td>';
$html .= '<td style="width: 60%; height: 150px; border: 1px solid #000; vertical-align: bottom;"></td>';
$html .= '<td style="width: 20%; height: 150px; border: 1px solid #000; vertical-align: bottom;">-Signed name-</td>';
$html .= '</tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '</tr>';
$html .= '</table>';
//////
$html .= '</body>';
$html .= '</html>';

$mpdf->WriteHTML($html);
$mpdf->Output("MySelfEvaluation" . $current_year . ".pdf");
