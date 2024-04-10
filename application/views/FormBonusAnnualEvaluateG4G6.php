<?php
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
                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?php echo $_SESSION["username"]; ?>">
                <div class="mt-1 font-eigth red" id="alert_Employee_name" style="display: none;">Please fill in Employee name !</div>
            </td>
            <td class="border-0 mit-v text-end">Employee ID</td>
            <td class="border-0">
                <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $_SESSION["emp_id"]; ?>">
                <div class="mt-1 font-eigth red" id="alert_Employee_ID" style="display: none;">Please fill in Employee ID !</div>
            </td>
            <td class="border-0 mit-v text-end">Position</td>
            <td class="border-0">
                <input type="text" class="form-control" id="" name="" value="">
                <div class="mt-1 font-eigth red" id="alert_" style="display: none;">Please !</div>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Section</td>
            <td class="border-0">
                <input type="text" id="section" name="section" class="form-control" value="<?php echo $_SESSION["emp_section"]; ?>">
                <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
            </td>
            <td class="border-0 mit-v text-end">Employment date</td>
            <td class="border-0">
                <input type="text" class="form-control" id="hired_date" name="hired_date" placeholder="DD/MM/YYYY" value="<?php
                                                                                                                            $date_hired_format = DateTime::createFromFormat('d/m/Y', $_SESSION["emp_hired_date"])->format('d-M-Y');
                                                                                                                            echo $date_hired_format
                                                                                                                            ?>" disabled>
                <div class="mt-1 font-eigth red" id="alert_Hired_date" style="display: none;">Please fill in Hired date !</div>
            </td>
            <td class="border-0 mit-v text-end">Years of service</td>
            <td class="border-0">
                <?php
                $emp_hired_date_format = DateTime::createFromFormat('d/m/Y', $_SESSION["emp_hired_date"])->format('Y-m-d');
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
                }
                ?>
            </td>
        </tr>
        <tr>
            <td class="border-0 mit-v text-end">Supervisor</td>
            <td class="border-0">
                <input type="text" id="sup_name" name="sup_name" class="form-control" value="<?php echo $_SESSION["superior_name"]; ?>">
                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Superior name !</div>
            </td>
            <td class="border-0 mit-v text-end">Manager</td>
            <td class="border-0">
                <input type="text" id="" name="" class="form-control" value="">
                <div class="mt-1 font-eigth red" id="alert_" style="display: none;">Please fill in !</div>
            </td>
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
                From 1 Sep [YY]
                to 31 Dec [YY]
            </th>
            <th class="mit border topic-background">
                From 1 Jan [YY]
                to 31 Aug [YY]
            </th>
        </tr>
        <tr>
            <th class="border td_border mit">Business leave ลากิจ</th>
            <td class="border td_border mit">0</td>
            <td class="border td_border mit">0</td>
        </tr>
        <tr>
            <th class="border td_border mit">Sick leave ลาป่วย</th>
            <td class="border td_border mit">0</td>
            <td class="border td_border mit">0</td>
        </tr>
        <tr>
            <th class="border td_border mit">Absenteeism ขาดงาน</th>
            <td class="border td_border mit">0</td>
            <td class="border td_border mit">0</td>
        </tr>
        <tr>
            <th class="border td_border mit">Total รวม</th>
            <td class="border td_border mit" colspan="2">0</td>
            <!-- <td>0</td> -->
        </tr>
        <tr>
            <th class="border td_border mit">Grand Total ผลรวม</th>
            <td class="border td_border mit">0</td>
            <td class="border td_border mit">0</td>
        </tr>
        <tr>
            <th class="border td_border mit">Late มาสาย</th>
            <td class="border td_border mit">0</td>
            <td class="border td_border mit">0</td>
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
                    <td class="border td_border mit">0</td>
                </tr>
            </table>
        </div>
        <div class="col">
            <div class="text-center">*** For reference****</div>
            <table class="table table-form">
                <tr>
                    <th colspan="2" class="border td_border mit">
                        Punishment Record
                        สถิติการลงโทษทางวินัย
                    </th>
                </tr>
                <tr>
                    <td class="border td_border mit">Yes / มี</td>
                    <td class="border td_border mit">-</td>
                </tr>
                <tr>
                    <td class="border td_border mit">No / ไม่มี</td>
                    <td class="border td_border mit">-</td>
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
            <th class="mit border topic-background">Excellent<br>ดีเลิศ</th>
            <th class="mit border topic-background">Good<br>ดี</th>
            <th class="mit border topic-background">Fair<br>พอใช้</th>
            <th class="mit border topic-background">Need Improvemen<br>ต้องปรับปรุง </th>
            <th class="mit border topic-background">Un Satisfactory<br>ไม่เป็นที่พอใจ </th>
        </tr>
        <tr>
            <th class="border td_border">
                <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
                    if ($bonus_evaluate_g4_g6s->topic == 1) {
                        echo $bonus_evaluate_g4_g6s->topic . " . " . $bonus_evaluate_g4_g6s->evaluation_Item_en . "<br>" . $bonus_evaluate_g4_g6s->evaluation_Item_th;
                    }
                } ?>
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
        <tr>
            <th class="border td_border">Evaluate Score คะแนนการประเมิน</th>
            <td class="border td_border mit"></td>
            <td class="border td_border mit"></td>
            <td class="border td_border mit"></td>
            <td class="border td_border mit"></td>
            <td class="border td_border mit"></td>
        </tr>
        <tr>
            <th class="border td_border">Section Assessment score คะแนนประเมินโดยแผนก</th>
            <td colspan="5" class="border td_border mit"></td>
        </tr>
        <tr>
            <th class="border td_border">Leave record score คะแนนจากสถิติการลา</th>
            <td colspan="5" class="border td_border mit"></td>
        </tr>
        <tr>
            <th style="border: solid #000 2px !important;" class="border td_border">Total Score คะแนนรวม</th>
            <td style="border: solid #000 2px !important;" colspan="5" class="border td_border mit"></td>
        </tr>
    </table>
</div>