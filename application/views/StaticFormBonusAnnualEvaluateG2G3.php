<?php
include "checkAdminUser.php";
include "scriptStaticFormBonusAnnualEvaluateG2G3.php";
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
                <u>[YYYY] BONUS & ANNUAL Assessment for Grade 2 – Grade 3</u>
            </th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <?php foreach ($data_EvaluateG2G3_id as $data_EvaluateG2G3_ids) ?>
    <table class="table table-form border-0">
        <tr>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0 text-end mit-v" style="width: 15em;">Date</td>
            <td class="border-0" style="width: 20em;">
                <input type="hidden" name="up_id" id="up_id" value="<?php echo $data_EvaluateG2G3_ids->id ?>">
                <input type="text" class="form-control" id="up_date_submit" name="up_date_submit" placeholder="DD/MM/YYYY" value="<?php echo $data_EvaluateG2G3_ids->date_submit ?>" disabled>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Employee name</td>
            <td class="border-0">
                <input type="text" class="form-control" id="up_emp_name" name="up_emp_name" value="<?php echo $data_EvaluateG2G3_ids->emp_name ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Employee ID</td>
            <td class="border-0">
                <input type="text" id="up_emp_id" name="up_emp_id" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->emp_id ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Position</td>
            <td class="border-0">
                <input type="text" name="up_position" id="up_position" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->position ?>" disabled>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Section</td>
            <td class="border-0">
                <input type="text" id="up_section" name="up_section" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->section ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Employment date</td>
            <td class="border-0">
                <input type="text" name="up_hired_date" id="up_hired_date" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->employment_date ?>" disabled>
            </td>
            <td class="border-0 mit-v text-end">Years of service</td>
            <td class="border-0">
                <input type="hidden" name="up_year_submit" id="up_year_submit" value="<?php echo date('Y') ?>">
                <input type="text" id="up_emp_year_of_service" name="up_emp_year_of_service" value="<?php echo $data_EvaluateG2G3_ids->year_fo_service ?>" class="form-control" disabled>
            </td>
        </tr>
        <tr>
            <?php if ($data_EvaluateG2G3_ids->sup_name1 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 1</td>
                <td class="border-0">
                    <input type="text" name="up_sup_name1" id="up_sup_name1" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->sup_name1 ?>" disabled>
                </td>
            <?php } ?>
            <?php if ($data_EvaluateG2G3_ids->sup_name2 != "") { ?>
                <td class="border-0 mit-v text-end">Supervisor Name 2</td>
                <td class="border-0">
                    <input type="text" name="up_sup_name2" id="up_sup_name2" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->sup_name2 ?>" disabled>
                </td>
            <?php } ?>
            <?php if ($data_EvaluateG2G3_ids->Factory_Manager_GM != "") { ?>
                <td class="border-0 mit-v text-end">Factory Manager / GM</td>
                <td class="border-0">
                    <input type="text" name="up_Factory_Manager_GM" id="up_Factory_Manager_GM" class="form-control" value="<?php echo $data_EvaluateG2G3_ids->Factory_Manager_GM ?>" disabled>
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
            <td class="border td_border mit">16 points - 16 คะแนน</td>
            <td class="border td_border mit">16</td>
            <td class="border td_border mit">13</td>
            <td class="border td_border mit">10</td>
            <td class="border td_border mit">7</td>
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
                <input type="hidden" id="up_business_leave1" name="up_business_leave1" value="<?php echo $data_EvaluateG2G3_ids->business_leave1 ?>">
                <?php echo $data_EvaluateG2G3_ids->business_leave1 ?>
            </td>
            <td class="border td_border mit">
                <input type="hidden" id="up_business_leave2" name="up_business_leave2" value="<?php echo $data_EvaluateG2G3_ids->business_leave2 ?>">
                <?php echo $data_EvaluateG2G3_ids->business_leave2 ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Sick leave ลาป่วย</th>
            <td class="border td_border mit">
                <input type="hidden" name="up_sick_leave1" id="up_sick_leave1" value="<?php echo $data_EvaluateG2G3_ids->sick_leave1 ?>">
                <?php echo $data_EvaluateG2G3_ids->sick_leave1 ?>
            </td>
            <td class="border td_border mit">
                <input type="hidden" name="up_sick_leave2" id="up_sick_leave2" value="<?php echo $data_EvaluateG2G3_ids->sick_leave2 ?>">
                <?php echo $data_EvaluateG2G3_ids->sick_leave2 ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Absenteeism ขาดงาน</th>
            <td class="border td_border mit">
                <input type="hidden" name="up_absenteeism1" id="up_absenteeism1" value="<?php echo $data_EvaluateG2G3_ids->absenteeism1 ?>">
                <?php echo $data_EvaluateG2G3_ids->absenteeism1 ?>
            </td>
            <td class="border td_border mit">
                <input type="hidden" name="up_absenteeism2" id="up_absenteeism2" value="<?php echo $data_EvaluateG2G3_ids->absenteeism2 ?>">
                <?php echo $data_EvaluateG2G3_ids->absenteeism2 ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Total รวม</th>
            <td class="border td_border mit">
                <input type="hidden" id="up_total_leave1" name="up_total_leave1" value="<?php echo $data_EvaluateG2G3_ids->total_leave1 ?>">
                <?php echo $data_EvaluateG2G3_ids->total_leave1 ?>
            </td>
            <td class="border td_border mit">
                <input type="hidden" id="up_total_leave2" name="up_total_leave2" value="<?php echo $data_EvaluateG2G3_ids->total_leave2 ?>">
                <?php echo $data_EvaluateG2G3_ids->total_leave2 ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Grand Total ผลรวม</th>
            <td colspan="2" class="border td_border mit">
                <input type="hidden" name="up_grand_total" id="up_grand_total" value="<?php echo $data_EvaluateG2G3_ids->grand_total ?>">
                <?php echo $data_EvaluateG2G3_ids->grand_total ?>
            </td>
        </tr>
        <tr>
            <th class="border td_border mit">Late มาสาย</th>
            <td class="border td_border mit">
                <input type="hidden" name="up_late1" id="up_late1" value="<?php echo $data_EvaluateG2G3_ids->late1 ?>">
                <?php echo $data_EvaluateG2G3_ids->late1 ?>
            </td>
            <td class="border td_border mit">
                <input type="hidden" name="up_late2" id="up_late2" value="<?php echo $data_EvaluateG2G3_ids->late2 ?>">
                <?php echo $data_EvaluateG2G3_ids->late2 ?>
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
                    <td class="border td_border">ตักเตือนด้วยวาจา/Verbal Warning</td>
                    <td class="border td_border mit">
                        <input type="hidden" name="up_verbal_warning" id="up_verbal_warning" value="<?php echo $data_EvaluateG2G3_ids->verbal_warning ?>">
                        <?php echo $data_EvaluateG2G3_ids->verbal_warning ?>
                    </td>
                    <td class="border td_border mit">ครั้ง</td>
                    <td class="border td_border">ไม่นำไปใช้ร่วมการประเมิน</td>
                </tr>
                <tr>
                    <td class="border td_border">ตักเตือนด้วยหนังสือ/Letter warning</td>
                    <td class="border td_border mit">
                        <input type="hidden" name="up_letter_warning" id="up_letter_warning" value="<?php echo $data_EvaluateG2G3_ids->letter_warning ?>">
                        <?php echo $data_EvaluateG2G3_ids->letter_warning ?>
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
                        <label for="">
                            <?php echo $data_EvaluateG2G3_ids->leave_score ?>
                        </label>
                        <input type="hidden" name="lup_eave_score_h" id="up_leave_score_h" value="<?php echo $data_EvaluateG2G3_ids->leave_score ?>">
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
            <th class="mit border topic-background">Evaluation Item / หัวข้อการประเมิน</th>
            <th class="mit border topic-background" style="width: 8%;">Excellent<br>ดีเลิศ<br>(7)</th>
            <th class="mit border topic-background" style="width: 8%;">Good<br>ดี<br>(5)</th>
            <th class="mit border topic-background" style="width: 8%;">Fair<br>พอใช้<br>(4)</th>
            <th class="mit border topic-background" style="width: 8%;">Need Improvemen<br>ต้องปรับปรุง<br>(2)</th>
            <th class="mit border topic-background" style="width: 8%;">Un Satisfactory<br>ไม่เป็นที่พอใจ<br>(1)</th>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 1) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_quality_of_work" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="7" <?php if ($data_EvaluateG2G3_ids->item1 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="5" <?php if ($data_EvaluateG2G3_ids->item1 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="4" <?php if ($data_EvaluateG2G3_ids->item1 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="2" <?php if ($data_EvaluateG2G3_ids->item1 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_quality_of_work[]" id="quality_of_work" value="1" <?php if ($data_EvaluateG2G3_ids->item1 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 2) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_job_responsibility" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="7" <?php if ($data_EvaluateG2G3_ids->item2 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="5" <?php if ($data_EvaluateG2G3_ids->item2 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="4" <?php if ($data_EvaluateG2G3_ids->item2 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="2" <?php if ($data_EvaluateG2G3_ids->item2 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_job_responsibility[]" id="job_responsibility" value="1" <?php if ($data_EvaluateG2G3_ids->item2 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 3) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_cooperation" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_cooperation[]" id="cooperation" value="7" <?php if ($data_EvaluateG2G3_ids->item3 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_cooperation[]" id="cooperation" value="5" <?php if ($data_EvaluateG2G3_ids->item3 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_cooperation[]" id="cooperation" value="4" <?php if ($data_EvaluateG2G3_ids->item3 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_cooperation[]" id="cooperation" value="2" <?php if ($data_EvaluateG2G3_ids->item3 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_cooperation[]" id="cooperation" value="1" <?php if ($data_EvaluateG2G3_ids->item3 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 4) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_communication" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_communication[]" id="communication" value="7" <?php if ($data_EvaluateG2G3_ids->item4 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_communication[]" id="communication" value="5" <?php if ($data_EvaluateG2G3_ids->item4 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_communication[]" id="communication" value="4" <?php if ($data_EvaluateG2G3_ids->item4 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_communication[]" id="communication" value="2" <?php if ($data_EvaluateG2G3_ids->item4 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_communication[]" id="communication" value="1" <?php if ($data_EvaluateG2G3_ids->item4 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 5) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_teamwork" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_teamwork[]" id="Teamwork" value="7" <?php if ($data_EvaluateG2G3_ids->item5 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_teamwork[]" id="Teamwork" value="5" <?php if ($data_EvaluateG2G3_ids->item5 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_teamwork[]" id="Teamwork" value="4" <?php if ($data_EvaluateG2G3_ids->item5 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_teamwork[]" id="Teamwork" value="2" <?php if ($data_EvaluateG2G3_ids->item5 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_teamwork[]" id="Teamwork" value="1" <?php if ($data_EvaluateG2G3_ids->item5 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 6) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_potential" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_potential[]" id="potential" value="7" <?php if ($data_EvaluateG2G3_ids->item6 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_potential[]" id="potential" value="5" <?php if ($data_EvaluateG2G3_ids->item6 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_potential[]" id="potential" value="4" <?php if ($data_EvaluateG2G3_ids->item6 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_potential[]" id="potential" value="2" <?php if ($data_EvaluateG2G3_ids->item6 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_potential[]" id="potential" value="1" <?php if ($data_EvaluateG2G3_ids->item6 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 7) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_effectiveness" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_effectiveness[]" id="effectiveness" value="7" <?php if ($data_EvaluateG2G3_ids->item7 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_effectiveness[]" id="effectiveness" value="5" <?php if ($data_EvaluateG2G3_ids->item7 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_effectiveness[]" id="effectiveness" value="4" <?php if ($data_EvaluateG2G3_ids->item7 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_effectiveness[]" id="effectiveness" value="2" <?php if ($data_EvaluateG2G3_ids->item7 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_effectiveness[]" id="effectiveness" value="1" <?php if ($data_EvaluateG2G3_ids->item7 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 8) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_planning" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_planning[]" id="planning" value="7" <?php if ($data_EvaluateG2G3_ids->item8 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_planning[]" id="planning" value="5" <?php if ($data_EvaluateG2G3_ids->item8 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_planning[]" id="planning" value="4" <?php if ($data_EvaluateG2G3_ids->item8 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_planning[]" id="planning" value="2" <?php if ($data_EvaluateG2G3_ids->item8 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_planning[]" id="planning" value="1" <?php if ($data_EvaluateG2G3_ids->item8 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 9) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_preventive" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_preventive[]" id="preventive" value="7" <?php if ($data_EvaluateG2G3_ids->item9 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_preventive[]" id="preventive" value="5" <?php if ($data_EvaluateG2G3_ids->item9 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_preventive[]" id="preventive" value="4" <?php if ($data_EvaluateG2G3_ids->item9 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_preventive[]" id="preventive" value="2" <?php if ($data_EvaluateG2G3_ids->item9 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_preventive[]" id="preventive" value="1" <?php if ($data_EvaluateG2G3_ids->item9 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 10) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_creative" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_creative[]" id="creative" value="7" <?php if ($data_EvaluateG2G3_ids->item10 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_creative[]" id="creative" value="5" <?php if ($data_EvaluateG2G3_ids->item10 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_creative[]" id="creative" value="4" <?php if ($data_EvaluateG2G3_ids->item10 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_creative[]" id="creative" value="2" <?php if ($data_EvaluateG2G3_ids->item10 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_creative[]" id="creative" value="1" <?php if ($data_EvaluateG2G3_ids->item10 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 11) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_management_mind" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_management_mind[]" id="management_mind" value="7" <?php if ($data_EvaluateG2G3_ids->item11 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_management_mind[]" id="management_mind" value="5" <?php if ($data_EvaluateG2G3_ids->item11 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_management_mind[]" id="management_mind" value="4" <?php if ($data_EvaluateG2G3_ids->item11 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_management_mind[]" id="management_mind" value="2" <?php if ($data_EvaluateG2G3_ids->item11 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_management_mind[]" id="management_mind" value="1" <?php if ($data_EvaluateG2G3_ids->item11 == "1") echo "checked"; ?>>
            </td>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g2_g3 as $bonus_evaluate_g2_g3s) {
                    if ($bonus_evaluate_g2_g3s->topic == 12) {
                        echo $bonus_evaluate_g2_g3s->topic . " . " . $bonus_evaluate_g2_g3s->evaluation_Item_en . "<br>" . $bonus_evaluate_g2_g3s->evaluation_Item_th;
                    }
                } ?>
                <div id="alert_problem_solving" class="mt-1 font-eigth red" style="display: none;">Please select Score !</div>
            </th>
            <td class="border td_border mit">
                <input type="radio" name="up_problem_solving[]" id="problem_solving" value="7" <?php if ($data_EvaluateG2G3_ids->item12 == "7") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_problem_solving[]" id="problem_solving" value="5" <?php if ($data_EvaluateG2G3_ids->item12 == "5") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_problem_solving[]" id="problem_solving" value="4" <?php if ($data_EvaluateG2G3_ids->item12 == "4") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_problem_solving[]" id="problem_solving" value="2" <?php if ($data_EvaluateG2G3_ids->item12 == "2") echo "checked"; ?>>
            </td>
            <td class="border td_border mit">
                <input type="radio" name="up_problem_solving[]" id="problem_solving" value="1" <?php if ($data_EvaluateG2G3_ids->item12 == "1") echo "checked"; ?>>
            </td>
        </tr>
    </table>
    <table class="table table-form" style="border: solid #000 2px !important;">
        <tr>
            <th style="width: 50%;" class="border td_border">Section Assessment score คะแนนประเมินโดยแผนก</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <input type="hidden" name="up_assessment_score_h" id="up_assessment_score_h" value="<?php echo $data_EvaluateG2G3_ids->assessment_score ?>">
                <b>
                    <div class="" id="up_assessment_score"><?php echo $data_EvaluateG2G3_ids->assessment_score ?></div>
                </b>
            </td>
        </tr>
        <tr>
            <th style="width: 50%;" class="border td_border">Leave record score คะแนนจากสถิติการลา</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <b>
                    <div class="" id="up_leave_record_score"><?php echo $data_EvaluateG2G3_ids->leave_score ?></div>
                </b>
            </td>
        </tr>
        <tr>
            <th style="width: 50%;" class="border td_border">Total Score คะแนนรวม</th>
            <td style="width: 50%;" colspan="5" class="border td_border mit">
                <input type="hidden" name="up_total_score_h" id="up_total_score_h" value="<?php echo $data_EvaluateG2G3_ids->total_score ?>">
                <b>
                    <div class="" id="up_total_score"><?php echo $data_EvaluateG2G3_ids->total_score ?></div>
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
            <?php
            $total_score = $data_EvaluateG2G3_ids->total_score;
            $grade_a_checked = '';
            $grade_b_checked = '';
            $grade_c_checked = '';
            $grade_d_checked = '';
            switch (true) {
                case ($total_score >= 91):
                    $grade_a_checked = 'checked';
                    break;
                case ($total_score >= 73 && $total_score <= 90):
                    $grade_b_checked = 'checked';
                    break;
                case ($total_score >= 56 && $total_score <= 72):
                    $grade_c_checked = 'checked';
                    break;
                case ($total_score <= 55):
                    $grade_d_checked = 'checked';
                    break;
            } ?>
            <td class="border-0">Grade / ระดับ</td>
            <td class="border-0"><b>A </b><input type="checkbox" name="up_grade_a" id="up_grade_a" class="form-check-input" disabled <?php echo $grade_a_checked; ?>> <label for="grade_a">91 Above /สูงกว่า 91</label></td>
            <td class="border-0"><b>B </b><input type="checkbox" name="up_grade_b" id="up_grade_b" class="form-check-input" disabled <?php echo $grade_b_checked; ?>> <label for="grade_b">90 - 73</label></td>
            <td class="border-0"><b>C </b><input type="checkbox" name="up_grade_c" id="up_grade_c" class="form-check-input" disabled <?php echo $grade_c_checked; ?>> <label for="grade_c">72 - 56</label></td>
            <td class="border-0"><b>D </b><input type="checkbox" name="up_grade_d" id="up_grade_d" class="form-check-input" disabled <?php echo $grade_d_checked; ?>> <label for="grade_d">55 Below / ต่ำกว่า 55</label></td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th colspan="3" class="border-0">3. Assessment by Sr. Manager / Factory Manager / General Manager</th>
        </tr>
        <tr>
            <th class="mit border topic-background" style="width: 350px;">Position /ตำแหน่ง</th>
            <th class="mit border topic-background">Final Rating</th>
            <th class="mit border topic-background">Comment in writing <br> ความคิดเห็นเป็นลายลักษณ์อักษร</th>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Senior Manager <br> ผู้จัดการอาวุโส</td>
            <td style="height: 100px;" rowspan="2" class="border mit">
                <div id="up_final_rating">
                    <?php if ($data_EvaluateG2G3_ids->total_score >= 91) {
                        echo '<b style="font-size: 40px">A</b>';
                    } else if ($data_EvaluateG2G3_ids->total_score >= 73) {
                        echo '<b style="font-size: 40px">B</b>';
                    } else if ($data_EvaluateG2G3_ids->total_score >= 56) {
                        echo '<b style="font-size: 40px">C</b>';
                    } else {
                        echo '<b style="font-size: 40px">D</b>';
                    } ?>
                </div>
            </td>
            <td style="height: 100px;" class="border mit-v"></td>
        </tr>
        <tr>
            <td style="height: 100px;" class="border mit-v">Fact Mgr / GM <br> ผู้จัดการโรงงาน / ผู้จัดการทั่วไป</td>
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
                <label for="" class="mit">Sr. Mgr / Factory Mgr / GM</label><br>
                <label for="">ผู้จัดการอาวุโส / ผู้จัดการโรงงาน / ผู้จัดการทั่วไป</label>
            </th>
            <th class="border-0" style="vertical-align: bottom;">
                <div class="mb-3" style="border: 0.5px solid #000000; width: 250px; margin-left: 54px"></div>
                <label for="">(<?php echo nbs(56) ?>)</label><br>
                <label for="" class="mit">Senior Executive Officer</label><br>
                <label for="">เจ้าหน้าที่บริหารอาวุโส</label>
            </th>
            <th class="border-0" style="vertical-align: bottom;">
                <div class="mb-3" style="border: 0.5px solid #000000; width: 250px; margin-left: 54px"></div>
                <label for="">(<?php echo nbs(56) ?>)</label><br>
                <label for="" class="mit">Chief Operation Officer</label><br>
                <label for="">ประธานเจ้าหน้าที่ฝ่ายปฏิบัติการ</label>
            </th>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form border-0">
        <?php
        foreach ($period_time as $period_times) {
            $format_date_from = DateTime::createFromFormat('d/m/Y', $period_times->date_from)->format('d-M-Y');
            $format_date_to = DateTime::createFromFormat('d/m/Y', $period_times->date_to)->format('d-M-Y');
            $period_from = DateTime::createFromFormat('d/m/Y', $period_times->date_from)->format('m/d/Y');
            $period_to = DateTime::createFromFormat('d/m/Y', $period_times->date_to)->format('m/d/Y');
        } ?>
        <tr>
            <td colspan="5" class="mit border-0">
                <a href="<?php echo base_url('index.php/bonus_controller/PrintPDFG2G3/') ?><?php echo $data_EvaluateG2G3_ids->id ?>" class="btn btn-primary btn_color_df">Click to PDF</a>
                <?php if ($check_date >= $period_from && $check_date <= $period_to) { ?>
                    <button type="button" class="btn btn-primary btn_color_df" id="bt_re_Submit">Re-Submit</button>
                <?php } else { ?>
                    <br><u class="red">"Period time for submit From <?php echo $format_date_from ?> To <?php echo $format_date_to ?>"</u>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>