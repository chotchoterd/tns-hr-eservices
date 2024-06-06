<?php
include "scriptFormBonusAnnualEvaluateForemanAndbelow.php";
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
                <u>[YYYY] BONUS & ANNUAL Assessment for Foreman & below</u>
            </th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form border-0">
        <?php foreach ($emp_data as $emp_datas) ?>
        <?php foreach ($emp_leave_data as $emp_leave_datas) ?>
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
                <input type="text" class="form-control" id="emp_name" name="emp_name" value="<?php echo $emp_datas->emp_name; ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Employee ID</td>
            <td class="border-0">
                <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $emp_datas->emp_id; ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Position</td>
            <td class="border-0">
                <input type="text" name="position" id="position" class="form-control" value="<?php echo $emp_datas->emp_position; ?>" disabled>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Section</td>
            <td class="border-0">
                <input type="text" id="section" name="section" class="form-control" value="<?php echo $emp_datas->emp_section; ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Employment date</td>
            <td class="border-0">
                <input type="text" name="hired_date" id="hired_date" class="form-control" value="<?php
                                                                                                    $date_hired_format = DateTime::createFromFormat('d/m/Y', $emp_datas->emp_hired_date)->format('d-M-Y');
                                                                                                    echo $date_hired_format
                                                                                                    ?>" disabled>
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
            <?php if ($emp_datas->foreman != "") { ?>
                <td class="border-0 mit-v text-end">Foreman</td>
                <td class="border-0">
                    <input type="text" name="foreman" id="foreman" class="form-control" value="<?php echo $emp_datas->foreman; ?>" disabled>
                </td>
            <?php } ?>
            <?php if ($emp_datas->superior_name1 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 1</td>
                <td class="border-0">
                    <input type="text" name="sup_name1" id="sup_name1" class="form-control" value="<?php echo $emp_datas->superior_name1; ?>" disabled>
                </td>
            <?php } ?>
            <?php if ($emp_datas->superior_name2 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 2</td>
                <td class="border-0">
                    <input type="text" name="sup_name2" id="sup_name2" class="form-control" value="<?php echo $emp_datas->superior_name2; ?>" disabled>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <?php if ($emp_datas->factory_Manager_GM != "") { ?>
                <td class="border-0 mit-v text-end">Factory Manager / GM</td>
                <td class="border-0">
                    <input type="text" name="Factory_Manager_GM" id="Factory_Manager_GM" class="form-control" value="<?php echo $emp_datas->factory_Manager_GM; ?>" disabled>
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
            <td class="border td_border mit">40 points - 40 คะแนน</td>
            <td class="border td_border mit">40</td>
            <td class="border td_border mit">35</td>
            <td class="border td_border mit">30</td>
            <td class="border td_border mit">25</td>
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
            <td colspan="2" class="border td_border mit">
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
                            if ($total >= 0 && $total <= 6) {
                                echo $leave_score = 40;
                            } else if ($total >= 7 && $total <= 13) {
                                echo $leave_score = 35;
                            } else if ($total >= 14 && $total <= 20) {
                                echo $leave_score = 30;
                            } else if ($total >= 21 && $total <= 27) {
                                echo $leave_score = 25;
                            } else {
                                echo $leave_score;
                            } ?>
                        </label>
                        <input type="hidden" name="leave_score_h" id="leave_score_h" value="<?php echo $leave_score; ?>">
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
                    <td class="border td_border">ตักเตือนด้วยวาจา/Verbal Warning</td>
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
            </table>
        </div>
    </div>
</div>
<div class="container mt-3">
    <table class="table table-form border-0">
        <tr>
            <th colspan="6" class="border-0">2. Assessment by Supervisor 1 ประเมินโดยหัวหน้างาน</th>
        </tr>
        <tr>
            <th class="mit border topic-background">Evaluation Item / หัวข้อการประเมิน</th>
            <th class="mit border topic-background" style="width: 8%;">Excellent<br>ดีเลิศ<br>(10)</th>
            <th class="mit border topic-background" style="width: 8%;">Good<br>ดี<br>(8)</th>
            <th class="mit border topic-background" style="width: 8%;">Fair<br>พอใช้<br>(5)</th>
            <th class="mit border topic-background" style="width: 8%;">Need Improvemen<br>ต้องปรับปรุง<br>(3)</th>
            <th class="mit border topic-background" style="width: 8%;">Un Satisfactory<br>ไม่เป็นที่พอใจ<br>(2)</th>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
                    if ($bonus_evaluate_Foreman_belows->topic == 1) {
                        echo $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_quality_of_work" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="quality_of_work[]" id="quality_of_work" value="10">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="quality_of_work[]" id="quality_of_work" value="8">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="quality_of_work[]" id="quality_of_work" value="5">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="quality_of_work[]" id="quality_of_work" value="3">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="quality_of_work[]" id="quality_of_work" value="2">
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
                    if ($bonus_evaluate_Foreman_belows->topic == 2) {
                        echo $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_job_responsibility" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="job_responsibility[]" id="job_responsibility" value="10">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_responsibility[]" id="job_responsibility" value="8">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_responsibility[]" id="job_responsibility" value="5">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_responsibility[]" id="job_responsibility" value="3">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_responsibility[]" id="job_responsibility" value="2">
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
                    if ($bonus_evaluate_Foreman_belows->topic == 3) {
                        echo $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_cooperation" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="cooperation[]" id="cooperation" value="10">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="cooperation[]" id="cooperation" value="8">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="cooperation[]" id="cooperation" value="5">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="cooperation[]" id="cooperation" value="3">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="cooperation[]" id="cooperation" value="2">
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
                    if ($bonus_evaluate_Foreman_belows->topic == 4) {
                        echo $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_teamwork" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="teamwork[]" id="teamwork" value="10">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="teamwork[]" id="teamwork" value="8">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="teamwork[]" id="teamwork" value="5">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="teamwork[]" id="teamwork" value="3">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="teamwork[]" id="teamwork" value="2">
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
                    if ($bonus_evaluate_Foreman_belows->topic == 5) {
                        echo $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_job_knowledge" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="job_knowledge[]" id="job_knowledge" value="10">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_knowledge[]" id="job_knowledge" value="8">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_knowledge[]" id="job_knowledge" value="5">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_knowledge[]" id="job_knowledge" value="3">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="job_knowledge[]" id="job_knowledge" value="2">
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_Foreman_below as $bonus_evaluate_Foreman_belows) {
                    if ($bonus_evaluate_Foreman_belows->topic == 6) {
                        echo $bonus_evaluate_Foreman_belows->topic . " . " . $bonus_evaluate_Foreman_belows->evaluation_Item_en . "<br>" . $bonus_evaluate_Foreman_belows->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_technical_skill" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="technical_skill[]" id="technical_skill" value="10">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="technical_skill[]" id="technical_skill" value="8">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="technical_skill[]" id="technical_skill" value="5">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="technical_skill[]" id="technical_skill" value="3">
            </td>
            <td class="border td_border mit">
                <input type="radio" name="technical_skill[]" id="technical_skill" value="2">
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
            <th colspan="3" class="border-0">3. Assessment by Manager / Sr. Manager / Factory Manager ประเมินโดยผู้จัดการแผนก / ผู้จัดการอาวุโส / ผู้จัดการโรงงาน Comment in writing ความคิดเห็นเป็นลายลักษณ์อักษร.</th>
        </tr>
        <tr>
            <th class="mit border topic-background" style="width: 350px;">Position /ตำแหน่ง</th>
            <th class="mit border topic-background">Final Rating</th>
            <th class="mit border topic-background">Comment in writing <br> ความคิดเห็นเป็นลายลักษณ์อักษร</th>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Direct Supervisor <br> หัวหน้างานสายตรง</td>
            <td style="height: 100px;" rowspan="3" class="border mit">
                <div id="final_rating"></div>
            </td>
            <td style="height: 100px;" class="border mit-v"></td>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Senior Manager / Section Manager <br> ผู้จัดการอาวุโส / ผู้จัดการแผนก</td>
            <td style="height: 100px;" class="border mit"></td>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Factory Manager <br> ผู้จัดการโรงงาน</td>
            <td style="height: 100px;" class="border mit"></td>
        </tr>
    </table>
</div>
<div class="container mt-5 pt-3">
    <table class="table table-form border-0">
        <tr class="mit">
            <th class="border-0" style="vertical-align: bottom;">
                <div class="mb-3" style="border: 0.5px solid #000000; width: 250px; margin-left: 54px"></div>
                <label for="">(<?php echo nbs(56) ?>)</label><br>
                <label for="" class="mit">Direct Supervisor</label><br>
                <label for="">หัวหน้างานสายตรง </label>
            </th>
            <th class="border-0" style="vertical-align: bottom;">
                <div class="mb-3" style="border: 0.5px solid #000000; width: 250px; margin-left: 54px"></div>
                <label for="">(<?php echo nbs(56) ?>)</label><br>
                <label for="" class="mit">Senior Manager / Section Manager</label><br>
                <label for="">ผู้จัดการอาวุโส / ผู้จัดการแผนก</label>
            </th>
            <th class="border-0" style="vertical-align: bottom;">
                <div class="mb-3" style="border: 0.5px solid #000000; width: 250px; margin-left: 54px"></div>
                <label for="">(<?php echo nbs(56) ?>)</label><br>
                <label for="" class="mit">Factory Manager / GM</label><br>
                <label for="">ผู้จัดการโรงงาน / ผู้จัดการทั่วไป</label>
            </th>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form border-0">
        <tr>
            <td colspan="5" class="mit border-0">
                <button type="button" class="btn btn-primary btn_color_df" id="bt_Save_draft">Save Draft</button>
                <button type="button" class="btn btn-primary btn_color_df" id="bt_Submit">Submit</button>
            </td>
        </tr>
    </table>
</div>