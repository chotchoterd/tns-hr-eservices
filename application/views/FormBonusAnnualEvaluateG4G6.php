<?php
include "scriptFormBonusAnnualEvaluateG4G6.php";
$current_year = date('Y');
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
    <table class="table table-form border-0">
        <tr>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0 text-end mit-v" style="width: 15em;">Date</td>
            <td class="border-0" style="width: 20em;">
                <input type="text" class="form-control" id="date_submit" name="date_submit" placeholder="DD/MM/YYYY" value="<?php echo date('d-M-Y') ?>" disabled>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Employee name</td>
            <td class="border-0">
                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?php echo $emp_datas->emp_name; ?>" disabled>
                <div class="mt-1 font-eigth red" id="alert_Employee_name" style="display: none;">Please fill in Employee name !</div>
            </td>
            <td class="border-0 mit-v text-end">Employee ID</td>
            <td class="border-0">
                <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $emp_datas->emp_id; ?>" disabled>
                <div class="mt-1 font-eigth red" id="alert_Employee_ID" style="display: none;">Please fill in Employee ID !</div>
            </td>
            <td class="border-0 mit-v text-end">Position</td>
            <td class="border-0">
                <input type="text" class="form-control" id="position" name="position" value="<?php echo $emp_datas->emp_position; ?>" disabled>
                <div class="mt-1 font-eigth red" id="alert_" style="display: none;">Please !</div>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Section</td>
            <td class="border-0">
                <input type="text" id="section" name="section" class="form-control" value="<?php echo $emp_datas->emp_section; ?>" disabled>
                <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
            </td>
            <td class="border-0 mit-v text-end">Employment date</td>
            <td class="border-0">
                <input type="text" class="form-control" id="hired_date" name="hired_date" placeholder="DD/MM/YYYY" value="<?php
                                                                                                                            $date_hired_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('d-M-Y');
                                                                                                                            echo $date_hired_format
                                                                                                                            ?>" disabled>
                <div class="mt-1 font-eigth red" id="alert_Hired_date" style="display: none;">Please fill in Hired date !</div>
            </td>
            <td class="border-0 mit-v text-end">Years of service</td>
            <td class="border-0">
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
            </td>
        </tr>
        <tr>
            <?php if ($emp_datas->superior_name1 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 1</td>
                <td class="border-0">
                    <input type="text" id="sup_name1" name="sup_name1" class="form-control" value="<?php echo $emp_datas->superior_name1; ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in !</div>
                </td>
            <?php } ?>
            <?php if ($emp_datas->superior_name2 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 2</td>
                <td class="border-0">
                    <input type="text" id="sup_name2" name="sup_name2" class="form-control" value="<?php echo $emp_datas->superior_name2; ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_" style="display: none;">Please fill in !</div>
                </td>
            <?php } ?>
            <?php if ($emp_datas->factory_Manager_GM != "") { ?>
                <td class="border-0 mit-v text-end">Factory Manager / GM</td>
                <td class="border-0">
                    <input type="text" id="Factory_Manager_GM" name="Factory_Manager_GM" class="form-control" value="<?php echo $emp_datas->factory_Manager_GM; ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_" style="display: none;">Please fill in !</div>
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
            <td class="border td_border mit"><?php echo $emp_leave_datas->business_leave1 ?></td>
            <td class="border td_border mit"><?php echo $emp_leave_datas->business_leave2 ?></td>
        </tr>
        <tr>
            <th class="border td_border mit">Sick leave ลาป่วย</th>
            <td class="border td_border mit"><?php echo $emp_leave_datas->sick_leave1 ?></td>
            <td class="border td_border mit"><?php echo $emp_leave_datas->sick_leave2 ?></td>
        </tr>
        <tr>
            <th class="border td_border mit">Absenteeism ขาดงาน</th>
            <td class="border td_border mit"><?php echo $emp_leave_datas->absenteeism1 ?></td>
            <td class="border td_border mit"><?php echo $emp_leave_datas->absenteeism2 ?></td>
        </tr>
        <tr>
            <th class="border td_border mit">Total รวม</th>
            <td class="border td_border mit">
                <?php $from1 = $emp_leave_datas->business_leave1 + $emp_leave_datas->sick_leave1 + $emp_leave_datas->absenteeism1;
                echo $from1; ?>
            </td>
            <td class="border td_border mit">
                <?php $from2 = $emp_leave_datas->business_leave2 + $emp_leave_datas->sick_leave2 + $emp_leave_datas->absenteeism2;
                echo $from2; ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Grand Total ผลรวม</th>
            <td class="border td_border mit" colspan="2">
                <?php $total = $emp_leave_datas->business_leave1 + $emp_leave_datas->business_leave2 + $emp_leave_datas->sick_leave1 + $emp_leave_datas->sick_leave2 + $emp_leave_datas->absenteeism1 + $emp_leave_datas->absenteeism2;
                echo $total; ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Late มาสาย</th>
            <td class="border td_border mit"><?php echo $emp_leave_datas->late1; ?></td>
            <td class="border td_border mit"><?php echo $emp_leave_datas->late2; ?></td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col">
            <br>
            <table class="table table-form">
                <tr>
                    <th class="border td_border mit">Leave Score</th>
                </tr>
                <tr>
                    <th class="border td_border mit" style="background-color: #006494; color: #fff;">
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
                        <input type="hidden" name="leave_score_h" id="leave_score_h" value="<?php echo $leave_score ?>">
                    </th>
                </tr>
            </table>
        </div>
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
                        <?php if ($emp_leave_datas->verbal_warning == "0") {
                            echo "-";
                        } else {
                            echo $emp_leave_datas->verbal_warning;
                        } ?>
                    </td>
                    <td class="border td_border mit">ครั้ง</td>
                    <td class="border td_border">ไม่นำไปใช้ร่วมการประเมิน</td>
                </tr>
                <tr>
                    <td class="border td_border">ตักเตือนด้วยหนังสือ/Letter warning</td>
                    <td class="border td_border mit">
                        <?php if ($emp_leave_datas->letter_warning == "0") {
                            echo "-";
                        } else {
                            echo $emp_leave_datas->letter_warning;
                        } ?>
                    </td>
                    <td class="border td_border mit">ครั้ง</td>
                    <td class="border td_border">นำไปใช้ร่วมการประเมิน</td>
                </tr>
                <!-- <tr>
                    <td class="border td_border">ตักเตือนด้วยหนังสือ/Letter warning</td>
                    <td class="border td_border mit">0</td>
                    <td class="border td_border mit">ครั้ง</td>
                    <td class="border td_border">นำไปใช้ร่วมการประเมิน</td>
                </tr> -->
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
        </tr>
    </table>
    <table class="table table-form" style="border: solid #000 2px !important;">
        <tr>
            <th style="width: 50%;" class="border td_border">Section Assessment score คะแนนประเมินโดยแผนก</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <input type="hidden" name="assessment_score_h" id="assessment_score_h" value="">
                <b>
                    <div class="" id="assessment_score"></div>
                </b>
            </td>
        </tr>
        <tr>
            <th style="width: 50%;" class="border td_border">Leave record score คะแนนจากสถิติการลา</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <b>
                    <div class="" id="leave_record_score"></div>
                </b>
            </td>
        </tr>
        <tr>
            <th style="width: 50%;" class="border td_border">Total Score คะแนนรวม</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <input type="hidden" name="total_score_h" id="total_score_h" value="">
                <b>
                    <div class="" id="total_score"></div>
                </b>
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
            <td class="border-0">Grade / ระดับ</td>
            <td class="border-0"><b>A </b><input type="checkbox" name="grade_a" id="grade_a" class="form-check-input" disabled> <label for="grade_a">91 Above /สูงกว่า 91</label></td>
            <td class="border-0"><b>B </b><input type="checkbox" name="grade_b" id="grade_b" class="form-check-input" disabled> <label for="grade_b">90 - 73</label></td>
            <td class="border-0"><b>C </b><input type="checkbox" name="grade_c" id="grade_c" class="form-check-input" disabled> <label for="grade_c">72 - 56</label></td>
            <td class="border-0"><b>D </b><input type="checkbox" name="grade_d" id="grade_d" class="form-check-input" disabled> <label for="grade_d">55 Below / ต่ำกว่า 55</label></td>
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
                <div id="final_rating"></div>
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
        <tr>
            <td class="mit border-0">
                <button type="button" class="btn btn-primary btn_color_df" id="bt_Save_draft">Save Draft</button>
                <button type="button" class="btn btn-primary btn_color_df" id="bt_Submit">Submit</button>
            </td>
        </tr>
    </table>
</div>