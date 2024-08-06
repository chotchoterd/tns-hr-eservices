<?php
include "scriptFormBonusAnnualEvaluateG4G6.php";
$current_year = date('Y');
$update_indicator = 0;
$check_date = date('m/d/Y');
?>
<div class="container-fluid mt-3">
    <table class="table table-form border-0">
        <tr>
            <th class="border-0 h4">
                <img src="<?php echo base_url('/img/images.png'); ?>" width="50px" class="mx-2">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
            </th>
        </tr>
        <tr>
            <th class="border-0">
                <u>[YYYY] BONUS & ANNUAL Assessment for Grade 4 – Grade 6</u>
            </th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <?php foreach ($emp_data as $emp_datas) ?>
    <?php foreach ($emp_leave_data as $emp_leave_datas) ?>
    <?php foreach ($data_EvaluateG4G6_id as $data_EvaluateG4G6_ids) {
        if (count($data_EvaluateG4G6_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form border-0">
        <tr>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0 text-end mit-v" style="width: 15em;">Date</td>
            <td class="border-0" style="width: 20em;">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" class="form-control" id="up_date_submit" name="up_date_submit" placeholder="DD/MM/YYYY" value="<?php echo date('d-M-Y') ?>" disabled>
                <?php } else { ?>
                    <input type="text" class="form-control" id="date_submit" name="date_submit" placeholder="DD/MM/YYYY" value="<?php echo date('d-M-Y') ?>" disabled>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Employee name</td>
            <td class="border-0">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_emp_name" name="up_emp_name" class="form-control" value="<?php echo $emp_datas->emp_name; ?>" disabled>
                <?php } else { ?>
                    <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?php echo $emp_datas->emp_name; ?>" disabled>
                <?php } ?>
            </td>
            <td class="border-0 mit-v text-end">Employee ID</td>
            <td class="border-0">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_emp_id" name="up_emp_id" class="form-control" value="<?php echo $emp_datas->emp_id; ?>" disabled>
                <?php } else { ?>
                    <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $emp_datas->emp_id; ?>" disabled>
                <?php } ?>
            </td>
            <td class="border-0 mit-v text-end">Position</td>
            <td class="border-0">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" class="form-control" id="up_position" name="up_position" value="<?php echo $emp_datas->emp_position; ?>" disabled>
                <?php } else { ?>
                    <input type="text" class="form-control" id="position" name="position" value="<?php echo $emp_datas->emp_position; ?>" disabled>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Section</td>
            <td class="border-0">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" id="up_section" name="up_section" class="form-control" value="<?php echo $emp_datas->emp_section; ?>" disabled>
                <?php } else { ?>
                    <input type="text" id="section" name="section" class="form-control" value="<?php echo $emp_datas->emp_section; ?>" disabled>
                <?php } ?>
            </td>
            <td class="border-0 mit-v text-end">Employment date</td>
            <td class="border-0">
                <?php if ($update_indicator == 1) { ?>
                    <input type="text" class="form-control" id="up_hired_date" name="up_hired_date" placeholder="DD/MM/YYYY" value="<?php
                                                                                                                                    $date_hired_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('d-M-Y');
                                                                                                                                    echo $date_hired_format
                                                                                                                                    ?>" disabled>
                <?php } else { ?>
                    <input type="text" class="form-control" id="hired_date" name="hired_date" placeholder="DD/MM/YYYY" value="<?php
                                                                                                                                $date_hired_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('d-M-Y');
                                                                                                                                echo $date_hired_format
                                                                                                                                ?>" disabled>
                <?php } ?>
            </td>
            <td class="border-0 mit-v text-end">Years of service</td>
            <td class="border-0">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_year_submit" id="up_year_submit" value="<?php echo date('Y') ?>">
                    <?php
                    $emp_hired_date_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('Y-m-d');
                    $emp_hired_date = new DateTime($emp_hired_date_format);
                    $current_date = new DateTime();
                    $diff = $current_date->diff($emp_hired_date);
                    $year_text = ($diff->y > 0) ? $diff->y . " Year" : "";
                    $month_text = ($diff->m > 0) ? $diff->m . " Month" : "";
                    $day_text = ($diff->d > 0) ? $diff->d . " Day" : "";
                    if ($diff->y >= 1 && $diff->m >= 0) {
                        $date_emp_year_of_service = $year_text . " " . $month_text . " " . $day_text;
                        echo "<input type=\"text\" id=\"up_emp_year_of_service\" name=\"up_emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                    } else {
                        $date_emp_year_of_service = $month_text . " " . $day_text;
                        echo "<input type=\"text\" id=\"up_emp_year_of_service\" name=\"up_emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                    } ?>
                <?php } else { ?>
                    <input type="hidden" name="year_submit" id="year_submit" value="<?php echo date('Y') ?>">
                    <?php
                    $emp_hired_date_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('Y-m-d');
                    $emp_hired_date = new DateTime($emp_hired_date_format);
                    $current_date = new DateTime();
                    $diff = $current_date->diff($emp_hired_date);
                    $year_text = ($diff->y > 0) ? $diff->y . " Year" : "";
                    $month_text = ($diff->m > 0) ? $diff->m . " Month" : "";
                    $day_text = ($diff->d > 0) ? $diff->d . " Day" : "";
                    if ($diff->y >= 1 && $diff->m >= 0) {
                        $date_emp_year_of_service = $year_text . " " . $month_text . " " . $day_text;
                        echo "<input type=\"text\" id=\"emp_year_of_service\" name=\"emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                    } else {
                        $date_emp_year_of_service = $month_text . " " . $day_text;
                        echo "<input type=\"text\" id=\"emp_year_of_service\" name=\"emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                    } ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <?php if ($emp_datas->superior_name1 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 1</td>
                <td class="border-0">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="text" id="up_sup_name1" name="up_sup_name1" class="form-control" value="<?php echo $emp_datas->superior_name1; ?>" disabled>
                    <?php } else { ?>
                        <input type="text" id="sup_name1" name="sup_name1" class="form-control" value="<?php echo $emp_datas->superior_name1; ?>" disabled>
                    <?php } ?>
                </td>
            <?php } ?>
            <?php if ($emp_datas->superior_name2 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 2</td>
                <td class="border-0">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="text" id="up_sup_name2" name="up_sup_name2" class="form-control" value="<?php echo $emp_datas->superior_name2; ?>" disabled>
                    <?php } else { ?>
                        <input type="text" id="sup_name2" name="sup_name2" class="form-control" value="<?php echo $emp_datas->superior_name2; ?>" disabled>
                    <?php } ?>
                </td>
            <?php } ?>
            <?php if ($emp_datas->factory_Manager_GM != "") { ?>
                <td class="border-0 mit-v text-end">Factory Manager / GM</td>
                <td class="border-0">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="text" id="up_Factory_Manager_GM" name="up_Factory_Manager_GM" class="form-control" value="<?php echo $emp_datas->factory_Manager_GM; ?>" disabled>
                    <?php } else { ?>
                        <input type="text" id="Factory_Manager_GM" name="Factory_Manager_GM" class="form-control" value="<?php echo $emp_datas->factory_Manager_GM; ?>" disabled>
                    <?php } ?>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form border-0">
        <tr>
            <th class="border-0">1. Leave record evaluation / ประเมินจากสถิติการลา.</th>
        </tr>
        <tr>
            <th class="mit border topic-background">Leave day(s) – จำนวนวันลา</th>
            <th class="mit border topic-background">0 – 6</th>
            <th class="mit border topic-background">7 – 13</th>
            <th class="mit border topic-background">14 – 20</th>
            <th class="mit border topic-background">21 – 27</th>
            <th class="mit border topic-background">28 days up/ 28วันขึ้นไป</th>
        </tr>
        <tr>
            <td class="border td_border mit">20 points - 20 คะแนน</td>
            <td class="border td_border mit">20</td>
            <td class="border td_border mit">17</td>
            <td class="border td_border mit">14</td>
            <td class="border td_border mit">11</td>
            <td class="border td_border mit">0</td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form border">
        <tr>
            <th colspan="3" class="mit border topic-background">
                Leave record between 1 Sep [YYYY] – 31 Aug [YYYY] <br>
                สถิติการลาระหว่าง 1 กันยายน [YYYY] ถึง 31 สิงหาคม [YYYY]
            </th>
        </tr>
        <tr>
            <th class="mit border topic-background">Leave record. บันทึกการลา</th>
            <th class="mit border topic-background">
                From 1 Sep [YYYY]
                to 31 Dec [YYYY]
            </th>
            <th class="mit border topic-background">
                From 1 Jan [YYYY]
                to 31 Aug [YYYY]
            </th>
        </tr>
        <tr>
            <th class="border td_border mit">Business leave ลากิจ</th>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" id="up_id" name="up_id" value="<?php echo $data_EvaluateG4G6_ids->id ?>">
                    <input type="hidden" id="up_business_leave1" name="up_business_leave1" value="<?php echo $emp_leave_datas->business_leave1 ?>">
                    <?php echo $emp_leave_datas->business_leave1 ?>
                <?php } else { ?>
                    <input type="hidden" id="business_leave1" name="business_leave1" value="<?php echo $emp_leave_datas->business_leave1 ?>">
                    <?php echo $emp_leave_datas->business_leave1 ?>
                <?php } ?>
            </td>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" id="up_business_leave2" name="up_business_leave2" value="<?php echo $emp_leave_datas->business_leave2 ?>">
                    <?php echo $emp_leave_datas->business_leave2 ?>
                <?php } else { ?>
                    <input type="hidden" id="business_leave2" name="business_leave2" value="<?php echo $emp_leave_datas->business_leave2 ?>">
                    <?php echo $emp_leave_datas->business_leave2 ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Sick leave ลาป่วย</th>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_sick_leave1" id="up_sick_leave1" value="<?php echo $emp_leave_datas->sick_leave1 ?>">
                    <?php echo $emp_leave_datas->sick_leave1 ?>
                <?php } else { ?>
                    <input type="hidden" name="sick_leave1" id="sick_leave1" value="<?php echo $emp_leave_datas->sick_leave1 ?>">
                    <?php echo $emp_leave_datas->sick_leave1 ?>
                <?php } ?>
            </td>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_sick_leave2" id="up_sick_leave2" value="<?php echo $emp_leave_datas->sick_leave2 ?>">
                    <?php echo $emp_leave_datas->sick_leave2 ?>
                <?php } else { ?>
                    <input type="hidden" name="sick_leave2" id="sick_leave2" value="<?php echo $emp_leave_datas->sick_leave2 ?>">
                    <?php echo $emp_leave_datas->sick_leave2 ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Absenteeism ขาดงาน</th>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_absenteeism1" id="up_absenteeism1" value="<?php echo $emp_leave_datas->absenteeism1 ?>">
                    <?php echo $emp_leave_datas->absenteeism1 ?>
                <?php } else { ?>
                    <input type="hidden" name="absenteeism1" id="absenteeism1" value="<?php echo $emp_leave_datas->absenteeism1 ?>">
                    <?php echo $emp_leave_datas->absenteeism1 ?>
                <?php } ?>
            </td>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_absenteeism2" id="up_absenteeism2" value="<?php echo $emp_leave_datas->absenteeism2 ?>">
                    <?php echo $emp_leave_datas->absenteeism2 ?>
                <?php } else { ?>
                    <input type="hidden" name="absenteeism2" id="absenteeism2" value="<?php echo $emp_leave_datas->absenteeism2 ?>">
                    <?php echo $emp_leave_datas->absenteeism2 ?>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Total รวม</th>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <?php $from1 = $emp_leave_datas->business_leave1 + $emp_leave_datas->sick_leave1 + $emp_leave_datas->absenteeism1;
                    echo $from1; ?>
                    <input type="hidden" id="up_total_leave1" name="up_total_leave1" value="<?php echo $from1 ?>">
                <?php } else { ?>
                    <?php $from1 = $emp_leave_datas->business_leave1 + $emp_leave_datas->sick_leave1 + $emp_leave_datas->absenteeism1;
                    echo $from1; ?>
                    <input type="hidden" id="total_leave1" name="total_leave1" value="<?php echo $from1 ?>">
                <?php } ?>
            </td>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <?php $from2 = $emp_leave_datas->business_leave2 + $emp_leave_datas->sick_leave2 + $emp_leave_datas->absenteeism2;
                    echo $from2; ?>
                    <input type="hidden" id="up_total_leave2" name="up_total_leave2" value="<?php echo $from2 ?>">
                <?php } else { ?>
                    <?php $from2 = $emp_leave_datas->business_leave2 + $emp_leave_datas->sick_leave2 + $emp_leave_datas->absenteeism2;
                    echo $from2; ?>
                    <input type="hidden" id="total_leave2" name="total_leave2" value="<?php echo $from2 ?>">
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Grand Total ผลรวม</th>
            <td class="border td_border mit" colspan="2">
                <?php if ($update_indicator == 1) { ?>
                    <?php $total = $emp_leave_datas->business_leave1 + $emp_leave_datas->business_leave2 + $emp_leave_datas->sick_leave1 + $emp_leave_datas->sick_leave2 + $emp_leave_datas->absenteeism1 + $emp_leave_datas->absenteeism2;
                    echo $total; ?>
                    <input type="hidden" name="up_grand_total" id="up_grand_total" value="<?php echo $total ?>">
                <?php } else { ?>
                    <?php $total = $emp_leave_datas->business_leave1 + $emp_leave_datas->business_leave2 + $emp_leave_datas->sick_leave1 + $emp_leave_datas->sick_leave2 + $emp_leave_datas->absenteeism1 + $emp_leave_datas->absenteeism2;
                    echo $total; ?>
                    <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $total ?>">
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Late มาสาย</th>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_late1" id="up_late1" value="<?php echo $emp_leave_datas->late1; ?>">
                    <?php echo $emp_leave_datas->late1; ?>
                <?php } else { ?>
                    <input type="hidden" name="late1" id="late1" value="<?php echo $emp_leave_datas->late1; ?>">
                    <?php echo $emp_leave_datas->late1; ?>
                <?php } ?>
            </td>
            <td class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_late2" id="up_late2" value="<?php echo $emp_leave_datas->late2; ?>">
                    <?php echo $emp_leave_datas->late2; ?>
                <?php } else { ?>
                    <input type="hidden" name="late2" id="late2" value="<?php echo $emp_leave_datas->late2; ?>">
                    <?php echo $emp_leave_datas->late2; ?>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="text-center">*** For reference****</div>
            <table class="table table-form">
                <tr>
                    <th colspan="3" class="border td_border mit">
                        การลงโทษทางวินัย / Punishment Record <br>
                        ระหว่าง 1 Sep [YYYY] - 31 Aug [YYYY]
                    </th>
                    <th class="border td_border mit">หมายเหตุ / Noted</th>
                </tr>
                <tr>
                    <td class="border td_border">ตักเตือนด้วยวาจา/ Verbal Warning</td>
                    <td class="border td_border mit">
                        <?php if ($update_indicator == 1) { ?>
                            <?php if ($emp_leave_datas->verbal_warning == "0") {
                                echo "-";
                            } else {
                                echo "<b style='color: red;'>" . $emp_leave_datas->verbal_warning . "</b>";
                            } ?>
                            <input type="hidden" name="up_verbal_warning" id="up_verbal_warning" value="<?php echo $emp_leave_datas->verbal_warning; ?>">
                        <?php } else { ?>
                            <?php if ($emp_leave_datas->verbal_warning == "0") {
                                echo "-";
                            } else {
                                echo "<b style='color: red;'>" . $emp_leave_datas->verbal_warning . "</b>";
                            } ?>
                            <input type="hidden" name="verbal_warning" id="verbal_warning" value="<?php echo $emp_leave_datas->verbal_warning; ?>">
                        <?php } ?>
                    </td>
                    <td class="border td_border mit">ครั้ง</td>
                    <td class="border td_border">ไม่นำไปใช้ร่วมการประเมิน</td>
                </tr>
                <tr>
                    <td class="border td_border">ตักเตือนด้วยหนังสือ/Letter warning</td>
                    <td class="border td_border mit">
                        <?php if ($update_indicator == 1) { ?>
                            <?php if ($emp_leave_datas->letter_warning == "0") {
                                echo "-";
                            } else {
                                echo $emp_leave_datas->letter_warning;
                            } ?>
                            <input type="hidden" name="up_letter_warning" id="up_letter_warning" value="<?php echo $emp_leave_datas->letter_warning; ?>">
                        <?php } else { ?>
                            <?php if ($emp_leave_datas->letter_warning == "0") {
                                echo "-";
                            } else {
                                echo $emp_leave_datas->letter_warning;
                            } ?>
                            <input type="hidden" name="letter_warning" id="letter_warning" value="<?php echo $emp_leave_datas->letter_warning; ?>">
                        <?php } ?>
                    </td>
                    <td class="border td_border mit">ครั้ง</td>
                    <td class="border td_border">นำไปใช้ร่วมการประเมิน</td>
                </tr>
            </table>
        </div>
        <div class="col">
            <br>
            <table class="table table-form">
                <tr>
                    <th class="border td_border mit">Leave Score</th>
                </tr>
                <tr>
                    <th class="border td_border mit" style="background-color: #006494; color: #fff;">
                        <?php if ($update_indicator == 1) { ?>
                            <label for="">
                                <?php
                                $leave_score = 0;
                                if ($total >= 0 && $total < 7) {
                                    echo $leave_score = 20;
                                } else if ($total >= 7 && $total < 14) {
                                    echo $leave_score = 17;
                                } else if ($total >= 14 && $total < 21) {
                                    echo $leave_score = 14;
                                } else if ($total >= 21 && $total < 28) {
                                    echo $leave_score = 11;
                                } else {
                                    echo $leave_score;
                                } ?>
                            </label>
                            <input type="hidden" name="up_leave_score_h" id="up_leave_score_h" value="<?php echo $leave_score; ?>">
                        <?php } else { ?>
                            <label for="">
                                <?php
                                $leave_score = 0;
                                if ($total >= 0 && $total < 7) {
                                    echo $leave_score = 20;
                                } else if ($total >= 7 && $total < 14) {
                                    echo $leave_score = 17;
                                } else if ($total >= 14 && $total < 21) {
                                    echo $leave_score = 14;
                                } else if ($total >= 21 && $total < 28) {
                                    echo $leave_score = 11;
                                } else {
                                    echo $leave_score;
                                } ?>
                            </label>
                            <input type="hidden" name="leave_score_h" id="leave_score_h" value="<?php echo $leave_score; ?>">
                        <?php } ?>
                    </th>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="container mt-3">
    <table class="table table-form border-0">
        <tr>
            <th colspan="6" class="border-0">2. Assessment by Manager / Superior การประเมินผลการปฏิบัติงานโดย ผู้จัดการ / ผู้บังคับบัญชา</th>
        </tr>
        <tr>
            <th class="mit border topic-background">Performance Evaluation / หัวข้อการประเมินผลการปฏิบัติงาน</th>
            <th class="mit border topic-background" style="width: 8%;">Excellent<br>ดีเลิศ<br>(8)</th>
            <th class="mit border topic-background" style="width: 8%;">Good<br>ดี<br>(6)</th>
            <th class="mit border topic-background" style="width: 8%;">Fair<br>พอใช้<br>(4)</th>
            <th class="mit border topic-background" style="width: 8%;">Need Improvemen<br>ต้องปรับปรุง<br>(2)</th>
            <th class="mit border topic-background" style="width: 8%;">Un Satisfactory<br>ไม่เป็นที่พอใจ<br>(1)</th>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 1) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_Quality_of_work" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="8" <?php if ($data_EvaluateG4G6_ids->item1 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="6" <?php if ($data_EvaluateG4G6_ids->item1 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="4" <?php if ($data_EvaluateG4G6_ids->item1 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="2" <?php if ($data_EvaluateG4G6_ids->item1 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="1" <?php if ($data_EvaluateG4G6_ids->item1 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="quality_of_work[]" id="quality_of_work" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="quality_of_work[]" id="quality_of_work" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="quality_of_work[]" id="quality_of_work" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="quality_of_work[]" id="quality_of_work" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="quality_of_work[]" id="quality_of_work" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 2) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_Job_Responsibility" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="8" <?php if ($data_EvaluateG4G6_ids->item2 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="6" <?php if ($data_EvaluateG4G6_ids->item2 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="4" <?php if ($data_EvaluateG4G6_ids->item2 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="2" <?php if ($data_EvaluateG4G6_ids->item2 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="1" <?php if ($data_EvaluateG4G6_ids->item2 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="job_responsibility[]" id="job_responsibility" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="job_responsibility[]" id="job_responsibility" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="job_responsibility[]" id="job_responsibility" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="job_responsibility[]" id="job_responsibility" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="job_responsibility[]" id="job_responsibility" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 3) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_Cooperation" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_cooperation[]" id="cooperation" value="8" <?php if ($data_EvaluateG4G6_ids->item3 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_cooperation[]" id="cooperation" value="6" <?php if ($data_EvaluateG4G6_ids->item3 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_cooperation[]" id="cooperation" value="4" <?php if ($data_EvaluateG4G6_ids->item3 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_cooperation[]" id="cooperation" value="2" <?php if ($data_EvaluateG4G6_ids->item3 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_cooperation[]" id="cooperation" value="1" <?php if ($data_EvaluateG4G6_ids->item3 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="cooperation[]" id="cooperation" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="cooperation[]" id="cooperation" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="cooperation[]" id="cooperation" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="cooperation[]" id="cooperation" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="cooperation[]" id="cooperation" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 4) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_Communication" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_communication[]" id="communication" value="8" <?php if ($data_EvaluateG4G6_ids->item4 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_communication[]" id="communication" value="6" <?php if ($data_EvaluateG4G6_ids->item4 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_communication[]" id="communication" value="4" <?php if ($data_EvaluateG4G6_ids->item4 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_communication[]" id="communication" value="2" <?php if ($data_EvaluateG4G6_ids->item4 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_communication[]" id="communication" value="1" <?php if ($data_EvaluateG4G6_ids->item4 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="communication[]" id="communication" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="communication[]" id="communication" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="communication[]" id="communication" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="communication[]" id="communication" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="communication[]" id="communication" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 5) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_Teamwork" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_teamwork[]" id="Teamwork" value="8" <?php if ($data_EvaluateG4G6_ids->item5 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_teamwork[]" id="Teamwork" value="6" <?php if ($data_EvaluateG4G6_ids->item5 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_teamwork[]" id="Teamwork" value="4" <?php if ($data_EvaluateG4G6_ids->item5 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_teamwork[]" id="Teamwork" value="2" <?php if ($data_EvaluateG4G6_ids->item5 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_teamwork[]" id="Teamwork" value="1" <?php if ($data_EvaluateG4G6_ids->item5 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="teamwork[]" id="Teamwork" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="teamwork[]" id="Teamwork" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="teamwork[]" id="Teamwork" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="teamwork[]" id="Teamwork" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="teamwork[]" id="Teamwork" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 6) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_technical_capability" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_technical_capability[]" id="technical_capability" value="8" <?php if ($data_EvaluateG4G6_ids->item6 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_technical_capability[]" id="technical_capability" value="6" <?php if ($data_EvaluateG4G6_ids->item6 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_technical_capability[]" id="technical_capability" value="4" <?php if ($data_EvaluateG4G6_ids->item6 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_technical_capability[]" id="technical_capability" value="2" <?php if ($data_EvaluateG4G6_ids->item6 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_technical_capability[]" id="technical_capability" value="1" <?php if ($data_EvaluateG4G6_ids->item6 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="technical_capability[]" id="technical_capability" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="technical_capability[]" id="technical_capability" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="technical_capability[]" id="technical_capability" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="technical_capability[]" id="technical_capability" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="technical_capability[]" id="technical_capability" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 7) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_potential" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_potential[]" id="potential" value="8" <?php if ($data_EvaluateG4G6_ids->item7 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_potential[]" id="potential" value="6" <?php if ($data_EvaluateG4G6_ids->item7 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_potential[]" id="potential" value="4" <?php if ($data_EvaluateG4G6_ids->item7 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_potential[]" id="potential" value="2" <?php if ($data_EvaluateG4G6_ids->item7 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_potential[]" id="potential" value="1" <?php if ($data_EvaluateG4G6_ids->item7 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="potential[]" id="potential" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="potential[]" id="potential" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="potential[]" id="potential" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="potential[]" id="potential" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="potential[]" id="potential" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 8) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_effectiveness" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_effectiveness[]" id="effectiveness" value="8" <?php if ($data_EvaluateG4G6_ids->item8 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_effectiveness[]" id="effectiveness" value="6" <?php if ($data_EvaluateG4G6_ids->item8 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_effectiveness[]" id="effectiveness" value="4" <?php if ($data_EvaluateG4G6_ids->item8 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_effectiveness[]" id="effectiveness" value="2" <?php if ($data_EvaluateG4G6_ids->item8 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_effectiveness[]" id="effectiveness" value="1" <?php if ($data_EvaluateG4G6_ids->item8 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="effectiveness[]" id="effectiveness" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="effectiveness[]" id="effectiveness" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="effectiveness[]" id="effectiveness" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="effectiveness[]" id="effectiveness" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="effectiveness[]" id="effectiveness" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 9) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_adaptability" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_adaptability[]" id="adaptability" value="8" <?php if ($data_EvaluateG4G6_ids->item9 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_adaptability[]" id="adaptability" value="6" <?php if ($data_EvaluateG4G6_ids->item9 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_adaptability[]" id="adaptability" value="4" <?php if ($data_EvaluateG4G6_ids->item9 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_adaptability[]" id="adaptability" value="2" <?php if ($data_EvaluateG4G6_ids->item9 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_adaptability[]" id="adaptability" value="1" <?php if ($data_EvaluateG4G6_ids->item9 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="adaptability[]" id="adaptability" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="adaptability[]" id="adaptability" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="adaptability[]" id="adaptability" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="adaptability[]" id="adaptability" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="adaptability[]" id="adaptability" value="1">
                </td>
            <?php } ?>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 10) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
                <div class="mt-1 font-eigth red" id="alert_creative" style="display: none;">Please Select Score !</div>
            </th>
            <?php if ($update_indicator == 1) { ?>
                <td class="border td_border mit">
                    <input type="radio" name="up_creative[]" id="creative" value="8" <?php if ($data_EvaluateG4G6_ids->item10 == "8") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_creative[]" id="creative" value="6" <?php if ($data_EvaluateG4G6_ids->item10 == "6") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_creative[]" id="creative" value="4" <?php if ($data_EvaluateG4G6_ids->item10 == "4") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_creative[]" id="creative" value="2" <?php if ($data_EvaluateG4G6_ids->item10 == "2") echo "checked"; ?>>
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="up_creative[]" id="creative" value="1" <?php if ($data_EvaluateG4G6_ids->item10 == "1") echo "checked"; ?>>
                </td>
            <?php } else { ?>
                <td class="border td_border mit">
                    <input type="radio" name="creative[]" id="creative" value="8">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="creative[]" id="creative" value="6">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="creative[]" id="creative" value="4">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="creative[]" id="creative" value="2">
                </td>
                <td class="border td_border mit">
                    <input type="radio" name="creative[]" id="creative" value="1">
                </td>
            <?php } ?>
        </tr>
    </table>
    <table class="table table-form" style="border: solid #000 2px !important;">
        <tr>
            <th style="width: 50%;" class="border td_border">Section Assessment score คะแนนประเมินโดยแผนก</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_assessment_score_h" id="up_assessment_score_h" value="">
                    <b>
                        <div id="up_assessment_score"><?php echo $data_EvaluateG4G6_ids->assessment_score ?></div>
                    </b>
                <?php } else { ?>
                    <input type="hidden" name="assessment_score_h" id="assessment_score_h" value="">
                    <b>
                        <div id="assessment_score"></div>
                    </b>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th style="width: 50%;" class="border td_border">Leave record score คะแนนจากสถิติการลา</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <b>
                        <div class="" id="leave_record_score"><?php echo $leave_score ?></div>
                    </b>
                <?php } else { ?>
                    <b>
                        <div class="" id="leave_record_score"></div>
                    </b>
                <?php } ?>
            </td>
        </tr>
        <tr>
            <th style="width: 50%;" class="border td_border">Total Score คะแนนรวม</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_total_score_h" id="up_total_score_h" value="">
                    <b>
                        <div class="" id="up_total_score"><?php echo $data_EvaluateG4G6_ids->total_score ?></div>
                    </b>
                <?php } else { ?>
                    <input type="hidden" name="total_score_h" id="total_score_h" value="">
                    <b>
                        <div class="" id="total_score"></div>
                    </b>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form border-0">
        <tr>
            <td colspan="5" class="border-0">Rating Score / ผลการประเมิน</td>
        </tr>
        <tr>
            <?php if ($update_indicator == 1) { ?>
                <td class="border-0">Grade / ระดับ</td>
                <td class="border-0"><b>A </b><input type="checkbox" name="up_grade_a" id="up_grade_a" class="form-check-input" disabled <?php if ($data_EvaluateG4G6_ids->total_score >= 91) echo 'checked'; ?>> <label for="grade_a">91 Above /สูงกว่า 91</label></td>
                <td class="border-0"><b>B </b><input type="checkbox" name="up_grade_b" id="up_grade_b" class="form-check-input" disabled <?php if ($data_EvaluateG4G6_ids->total_score >= 73 && $data_EvaluateG4G6_ids->total_score <= 90) echo 'checked'; ?>> <label for="grade_b">90 - 73</label></td>
                <td class="border-0"><b>C </b><input type="checkbox" name="up_grade_c" id="up_grade_c" class="form-check-input" disabled <?php if ($data_EvaluateG4G6_ids->total_score >= 56 && $data_EvaluateG4G6_ids->total_score <= 72) echo 'checked'; ?>> <label for="grade_c">72 - 56</label></td>
                <td class="border-0"><b>D </b><input type="checkbox" name="up_grade_d" id="up_grade_d" class="form-check-input" disabled <?php if ($data_EvaluateG4G6_ids->total_score <= 55) echo 'checked'; ?>> <label for="grade_d">55 Below / ต่ำกว่า 55</label></td>
            <?php } else { ?>
                <td class="border-0">Grade / ระดับ</td>
                <td class="border-0"><b>A </b><input type="checkbox" name="grade_a" id="grade_a" class="form-check-input" disabled> <label for="grade_a">91 Above /สูงกว่า 91</label></td>
                <td class="border-0"><b>B </b><input type="checkbox" name="grade_b" id="grade_b" class="form-check-input" disabled> <label for="grade_b">90 - 73</label></td>
                <td class="border-0"><b>C </b><input type="checkbox" name="grade_c" id="grade_c" class="form-check-input" disabled> <label for="grade_c">72 - 56</label></td>
                <td class="border-0"><b>D </b><input type="checkbox" name="grade_d" id="grade_d" class="form-check-input" disabled> <label for="grade_d">55 Below / ต่ำกว่า 55</label></td>
            <?php } ?>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th colspan="4" class="border-0">3. Assessment by Management </th>
        </tr>
        <tr>
            <th class="mit border topic-background">Position /ตำแหน่ง</th>
            <th class="mit border topic-background">Final Rating</th>
            <th class="mit border topic-background">Comment in writing <br> ความคิดเห็นเป็นลายลักษณ์อักษร</th>
            <th class="mit border topic-background">signed name. <br> ลงนาม</th>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Manager <br> ผู้จัดการ</td>
            <td style="height: 100px;" rowspan="4" class="border mit">
                <?php if ($update_indicator == 1) { ?>
                    <div id="up_final_rating">
                        <?php if ($data_EvaluateG4G6_ids->total_score >= 91) {
                            echo '<b style="font-size: 40px">A</b>';
                        } else if ($data_EvaluateG4G6_ids->total_score >= 73) {
                            echo '<b style="font-size: 40px">B</b>';
                        } else if ($data_EvaluateG4G6_ids->total_score >= 56) {
                            echo '<b style="font-size: 40px">C</b>';
                        } else {
                            echo '<b style="font-size: 40px">D</b>';
                        } ?>
                    </div>
                <?php } else { ?>
                    <div id="final_rating"></div>
                <?php } ?>
            </td>
            <td style="height: 100px;" class="border mit-v"></td>
            <td style="height: 100px;" class="border mit-v"></td>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Senior Manager <br> ผู้จัดการอาวุโส</td>
            <td style="height: 100px;" class="border mit-v"></td>
            <td style="height: 100px;" class="border mit-v"></td>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">General Manager <br> ผู้จัดการทั่วไป</td>
            <td style="height: 100px;" class="border mit-v"></td>
            <td style="height: 100px;" class="border mit-v"></td>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Senior Executive Officer <br> เจ้าหน้าที่บริหารอาวุโส</td>
            <td style="height: 100px;" class="border mit-v"></td>
            <td style="height: 100px;" class="border mit-v"></td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form border-9">
        <?php
        foreach ($period_time as $period_times) {
            $format_date_from = DateTime::createFromFormat('d/m/Y', $period_times->date_from)->format('d-M-Y');
            $format_date_to = DateTime::createFromFormat('d/m/Y', $period_times->date_to)->format('d-M-Y');
            $period_from = DateTime::createFromFormat('d/m/Y', $period_times->date_from)->format('m/d/Y');
            $period_to = DateTime::createFromFormat('d/m/Y', $period_times->date_to)->format('m/d/Y');
        } ?>
        <tr>
            <?php if ($update_indicator == 1) { ?>
                <td colspan="5" class="mit border-0">
                    <button type="button" class="btn btn-primary btn_color_df" id="up_bt_Save_draft">Save Draft</button>
                    <?php if ($check_date >= $period_from && $check_date <= $period_to) { ?>
                        <button type="button" class="btn btn-primary btn_color_df" id="up_bt_Submit">Submit</button>
                    <?php } else { ?>
                        <br><u class="red">"Period time for submit From <?php echo $format_date_from ?> To <?php echo $format_date_to ?>"</u>
                    <?php } ?>
                </td>
            <?php } else { ?>
                <td colspan="5" class="mit border-0">
                    <button type="button" class="btn btn-primary btn_color_df" id="bt_Save_draft">Save Draft</button>
                    <?php if ($check_date >= $period_from && $check_date <= $period_to) { ?>
                        <button type="button" class="btn btn-primary btn_color_df" id="bt_Submit">Submit</button>
                    <?php } else { ?>
                        <br><u class="red">"Period time for submit From <?php echo $format_date_from ?> To <?php echo $format_date_to ?>"</u>
                    <?php } ?>
                </td>
            <?php } ?>
        </tr>
    </table>
</div>