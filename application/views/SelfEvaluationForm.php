<?php
include('scriptSelfEvaluationForm.php');
include('scriptUpdateSelfEvaluationForm.php');
include "checkAdminUser.php";
$current_year = date('Y');
$emp_email = $_SESSION["emp_email"];
$update_indicator = 0;
$check_date = date('m/d/Y');
?>
<?php foreach ($self_evaluation_id as $self_evaluation_ids) {
    if (count($self_evaluation_id) != 0) {
        $update_indicator = 1;
    } else {
        $update_indicator = 0;
    }
} ?>
<?php foreach ($period_time as $period_times) {
    $format_date_from = DateTime::createFromFormat('d/m/Y', $period_times->date_from)->format('d-M-Y');
    $format_date_to = DateTime::createFromFormat('d/m/Y', $period_times->date_to)->format('d-M-Y');
    $period_from = DateTime::createFromFormat('d/m/Y', $period_times->date_from)->format('m/d/Y');
    $period_to = DateTime::createFromFormat('d/m/Y', $period_times->date_to)->format('m/d/Y');
}
?>
<?php if ($check_date >= $period_from && $check_date <= $period_to) { ?>
    <?php
    $evaluation_submitted = false;
    foreach ($self_evaluation as $self_evaluations) {
        if ($self_evaluations->emp_email == $emp_email && $self_evaluations->year_submit == $current_year && $update_indicator == 0 && $self_evaluations->status == 1) {
            $evaluation_submitted = true;
            break;
        }
    }
    if ($evaluation_submitted) { ?>
        <div class="container mt-5">
            <?php if ($_SESSION["group"] != "") { ?>
                <a href="<?php echo base_url('index.php/hr_controller/TableRecordSelfEvaluationForHr') ?>"><img src="<?php echo base_url('/img/Self-Eval-Banner.jpg') ?>" width="100%" height="300"><br><?php echo br(2) ?></a>
            <?php } else { ?>
                <a href="<?php echo base_url('index.php/hr_controller/TableRecordSelfEvaluation') ?>"><img src="<?php echo base_url('/img/Self-Eval-Banner.jpg') ?>" width="100%" height="300"><br><?php echo br(2) ?></a>
            <?php } ?>
            <u class="red h4">"This year, you have already submitted your self-evaluation, so you cannot submit it again. Please verify."</u><?php echo br(5) ?>
        </div>
    <?php } else { ?>
        <div class="container-fluid mt-3">
            <table class="table table-form border-0">
                <tr>
                    <th class="border-0 h4">
                        <img src="<?php echo base_url('/img/images.png'); ?>" width="50px" class="mx-2">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
                    </th>
                </tr>
                <tr>
                    <th class="text-center border-0 h4">
                        Self-Evaluation
                    </th>
                </tr>
                <tr>
                    <th class="text-center border-0 h4">
                        Permanent Employee Grade 2 - Grade 6
                    </th>
                </tr>
                <tr>
                    <td class="border-0"><b>Instruction: </b>Please completely assess your work performance to reflect on your achievements this year (<?php echo $current_year ?>) and your ongoing commitment to improving your performance within the organization and your job target in the following year (<?php echo $current_year + 1 ?>). <b>After which, submit this form to your superior by 30 October <?php echo $current_year ?>.</b></td>
                </tr>
                <tr>
                    <td class="border-0">HR Note: In order to comply with the company's policy to minimize printing/ paperless scheme.<br>
                        We, the HR team, would like to request for your cooperation in submitting the completed evaluation form as a PDF file and using an electronic signature before forwarding it to your superior. Your kind cooperation would be highly appreciated. /Thank you. <br>
                    </td>
                </tr>
                <tr>
                    <td class="border-0"><b>คำแนะนำ:</b> กรุณาประเมินประสิทธิภาพการทำงานของคุณอย่างครบถ้วนเพื่อแสดงให้เห็นถึงผลสำเร็จตามเป้าหมายงานของคุณในปีนี้ <?php echo $current_year ?>. และความมุ่งมั่นอย่างต่อเนื่องของคุณในการปรับปรุงประสิทธิภาพการทำงานของคุณภายในองค์กรและเป้าหมายงานของคุณในปีถัดไป (<?php echo $current_year + 1 ?>). ให้เสร็จสิ้นภายในวันที่ 30 ตุลาคม <?php echo $current_year ?>.</td>
                </tr>
            </table>
            <form action="" method="post">
                <table class="table table-form">
                    <tr>
                        <td class="border-0">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="hidden" id="up_id" name="up_id" value="<?php echo $self_evaluation_ids->id ?>">
                                <input type="hidden" id="up_year_submit" name="up_year_submit" value="<?php echo date('Y'); ?>">
                                <input type="hidden" id="up_emp_email" name="up_emp_email" value="<?php echo $self_evaluation_ids->emp_email; ?>">
                            <?php } else { ?>
                                <input type="hidden" id="year_submit" name="year_submit" value="<?php echo date('Y'); ?>">
                                <input type="hidden" id="emp_email" name="emp_email" value="<?php echo $_SESSION["emp_email"]; ?>">
                            <?php } ?>
                        </td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border text-end mit-v topic-background">Date</td>
                        <td class="border mit-v td_border">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" class="form-control" id="up_date_submit" name="up_date_submit" placeholder="DD/MM/YYYY" value="<?php echo date('d-M-Y') ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Date_submit" style="display: none;">Please fill in Date !</div>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="date_submit" name="date_submit" placeholder="DD/MM/YYYY" value="<?php echo date('d-M-Y') ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Date_submit" style="display: none;">Please fill in Date !</div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="border topic-background mit-v text-end">Employee name <br> ชื่อ-นามสกุล </td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_emp_name" name="up_emp_name" class="form-control" value="<?php echo $self_evaluation_ids->emp_name ?>" disabled>
                                <!-- <input type="text" id="up_emp_name" name="up_emp_name" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Employee_name" style="display: none;">Please fill in Employee name !</div>
                            <?php } else { ?>
                                <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?php echo $_SESSION["username"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Employee_name" style="display: none;">Please fill in Employee name !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end">Employee ID <br> เลขที่พนักงาน</td>
                        <td class="border mit-v td_border">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_emp_id" name="up_emp_id" class="form-control" value="<?php echo $self_evaluation_ids->emp_id ?>" disabled>
                                <!-- <input type="text" id="up_emp_id" name="up_emp_id" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Employee_ID" style="display: none;">Please fill in Employee ID !</div>
                            <?php } else { ?>
                                <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $_SESSION["emp_id"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Employee_ID" style="display: none;">Please fill in Employee ID !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end">Employee Grade <br> เกรดพนักงาน</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_emp_grade" name="up_emp_grade" class="form-control" value="<?php echo $self_evaluation_ids->emp_grade ?>" disabled>
                                <!-- <input type="text" id="up_emp_grade" name="up_emp_grade" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Employee_Grade" style="display: none;">Please fill in Employee Grade !</div>
                            <?php } else { ?>
                                <input type="text" id="emp_grade" name="emp_grade" class="form-control" value="<?php echo $_SESSION["emp_grade"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Employee_Grade" style="display: none;">Please fill in Employee Grade !</div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="border topic-background mit-v text-end">Position <br> ตำแหน่ง</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_position" name="up_position" class="form-control" value="<?php echo $self_evaluation_ids->position ?>" disabled>
                                <!-- <input type="text" id="up_section" name="up_section" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
                            <?php } else { ?>
                                <input type="text" id="position" name="position" class="form-control" value="<?php echo $_SESSION["emp_position"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end">Section <br> แผนก</td>
                        <td class="border mit-v td_border">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_section" name="up_section" class="form-control" value="<?php echo $self_evaluation_ids->section ?>" disabled>
                                <!-- <input type="text" id="up_section" name="up_section" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
                            <?php } else { ?>
                                <input type="text" id="section" name="section" class="form-control" value="<?php echo $_SESSION["emp_section"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end">Hired date <br> วันเริ่มงาน</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" class="form-control" id="up_hired_date" name="up_hired_date" placeholder="DD/MM/YYYY" value="<?php echo $self_evaluation_ids->hired_date ?>" disabled>
                                <!-- <input type="text" class="form-control" id="up_hired_date" name="up_hired_date" placeholder="DD/MM/YYYY" value="Test" disabled> -->
                                <div class="mt-1 font-eigth red" id="alert_Hired_date" style="display: none;">Please fill in Hired date !</div>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="hired_date" name="hired_date" placeholder="DD/MM/YYYY" value="<?php
                                                                                                                                            $date_hired_format = DateTime::createFromFormat('d/m/Y', $_SESSION["emp_hired_date"])->format('d-M-Y');
                                                                                                                                            echo $date_hired_format
                                                                                                                                            ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Hired_date" style="display: none;">Please fill in Hired date !</div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="border topic-background mit-v text-end">Division <br> ฝ่ายงาน</td>
                        <td class="border mit-v td_border" colspan="3">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" class="form-control" id="up_division" name="up_division" value="<?php echo $self_evaluation_ids->division ?>" disabled>
                                <!-- <input style="font-size: 10px;" type="text" class="form-control" id="up_division" name="up_division" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Division" style="display: none;">Please select Division !</div>
                            <?php } else { ?>
                                <input type="text" class="form-control" id="division" name="division" value="<?php echo $_SESSION["emp_division"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Division" style="display: none;">Please select Division !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end" colspan="2">Employee Years of service</td>
                        <td class="border mit td_border" colspan="2">
                            <!-- <input type="text" id="emp_year_of_service" name="emp_year_of_service" class="form-control" value=""> -->
                            <?php if ($update_indicator == 1) { ?>
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
                                    // echo "<input type=\"text\" id=\"up_emp_year_of_service\" name=\"up_emp_year_of_service\" class=\"form-control\" value=\"test\" disabled>";
                                    echo "<input type=\"text\" id=\"up_emp_year_of_service\" name=\"up_emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                                } else {
                                    $date_emp_year_of_service = $month_text . " " . $day_text;
                                    echo "<input type=\"text\" id=\"up_emp_year_of_service\" name=\"up_emp_year_of_service\" class=\"form-control\" value=\"$date_emp_year_of_service\" disabled>";
                                } ?>
                            <?php } else { ?>
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
                                } ?>
                            <?php } ?>
                            <!-- <div class="mt-1 font-eigth red" id="alert_Employee_Years_of_service" style="display: none;">Please fill in Employee Years of service !</div> -->
                        </td>
                    </tr>
                    <tr <?php if ($_SESSION["superior_name"] == "") echo "style=\"display: none;\""; ?>>
                        <td class="border topic-background mit-v text-end" colspan="2">Supervisor name 1 <br> ชื่อผู้บังคับบัญชา 1</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_sup_name" name="up_sup_name" class="form-control" value="<?php echo $self_evaluation_ids->sup_name ?>" disabled>
                                <!-- <input type="text" id="up_sup_name" name="up_sup_name" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Supervisor name !</div>
                            <?php } else { ?>
                                <input type="text" id="sup_name" name="sup_name" class="form-control" value="<?php echo $_SESSION["superior_name"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Supervisor name !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end" colspan="2">Supervisor Grade 1</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_sup_grade" name="up_sup_grade" class="form-control" value="<?php echo $self_evaluation_ids->sup_grade ?>" disabled>
                                <!-- <input type="text" id="up_sup_grade" name="up_sup_grade" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Supervisor Grade !</div>
                            <?php } else { ?>
                                <input type="text" id="sup_grade" name="sup_grade" class="form-control" value="<?php echo $_SESSION["superior_grade"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Supervisor Grade !</div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr <?php if ($_SESSION["superior_name2"] == "") echo "style=\"display: none;\""; ?>>
                        <td class="border topic-background mit-v text-end" colspan="2">Supervisor name 2 <br> ชื่อผู้บังคับบัญชา 2</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_sup_name2" name="up_sup_name2" class="form-control" value="<?php echo $self_evaluation_ids->sup_name2 ?>" disabled>
                                <!-- <input type="text" id="up_sup_name" name="up_sup_name" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Supervisor name !</div>
                            <?php } else { ?>
                                <input type="text" id="sup_name2" name="sup_name2" class="form-control" value="<?php echo $_SESSION["superior_name2"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Supervisor name !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end" colspan="2">Supervisor Grade 2</td>
                        <td class="border mit-v td_border" colspan="2">
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_sup_grade2" name="up_sup_grade2" class="form-control" value="<?php echo $self_evaluation_ids->sup_grade2 ?>" disabled>
                                <!-- <input type="text" id="up_sup_grade" name="up_sup_grade" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Supervisor Grade !</div>
                            <?php } else { ?>
                                <input type="text" id="sup_grade2" name="sup_grade2" class="form-control" value="<?php echo $_SESSION["superior_grade2"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Supervisor Grade !</div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="border topic-background mit-v text-end" colspan="2" <?php if ($_SESSION["foreman"] == "") echo "style=\"display: none;\"" ?>>Foreman</td>
                        <td class="border mit-v td_border" colspan="2" <?php if ($_SESSION["foreman"] == "") echo "style=\"display: none;\"" ?>>
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_foreman" name="up_foreman" class="form-control" value="<?php echo $self_evaluation_ids->foreman ?>" disabled>
                                <!-- <input type="text" id="up_sup_name" name="up_sup_name" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Supervisor name !</div>
                            <?php } else { ?>
                                <input type="text" id="foreman" name="foreman" class="form-control" value="<?php echo $_SESSION["foreman"]; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Supervisor name !</div>
                            <?php } ?>
                        </td>
                        <td class="border topic-background mit-v text-end" colspan="2" <?php if ($_SESSION['factory_Manager_GM'] == "") echo "style=\"display: none;\""; ?>>Factory Manager / GM</td>
                        <td class="border mit-v td_border" colspan="2" <?php if ($_SESSION['factory_Manager_GM'] == "") echo "style=\"display: none;\""; ?>>
                            <?php if ($update_indicator == 1) { ?>
                                <input type="text" id="up_factory_Manager_GM" name="up_factory_Manager_GM" class="form-control" value="<?php echo $self_evaluation_ids->factory_Manager_GM ?>" disabled>
                                <!-- <input type="text" id="up_sup_grade" name="up_sup_grade" class="form-control" value="Test"> -->
                                <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Supervisor Grade !</div>
                            <?php } else { ?>
                                <input type="text" id="factory_Manager_GM" name="factory_Manager_GM" class="form-control" value="<?php echo $_SESSION['factory_Manager_GM']; ?>" disabled>
                                <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Supervisor Grade !</div>
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <table class="table table-form">
                    <tr>
                        <th colspan="6" class="border-0">
                            <?php foreach ($topic_selfevaluation as $topic_selfevaluations) {
                                if ($topic_selfevaluations->main_topic == 1) {
                                    echo $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic . ' ' . '(' . ($current_year) . ').';
                                }
                            } ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3" class="mit border topic-background">
                            <l>Job Target <br> เป้าหมายงาน</l>
                                <div class="mt-1 font-eigth red" id="alert_Job_Target_1" style="display: none;">Please fill in Job Target !</div>
                        </td>
                        <td colspan="2" class="mit border topic-background">
                            <l>Actual achievement <br> ผลสำเร็จ</l>
                            <div class="mt-1 font-eigth red" id="alert_Actual_achievement" style="display: none;">Please fill in Actual achievement !</div>
                        </td>
                        <td class="mit border topic-background">Manage</td>
                    </tr>
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check_job_target_1['job_target_1'] = array();
                        $check_job_target_1['job_target_1'] = $self_evaluation_ids->job_target_1;
                        $newArray_job_target_1 = explode(",", $check_job_target_1['job_target_1']);

                        $check_actual_achievement['actual_achievement'] = array();
                        $check_actual_achievement['actual_achievement'] = $self_evaluation_ids->actual_achievement;
                        $newArray_actual_achievement = explode(",", $check_actual_achievement['actual_achievement']);
                        for ($b = 0; $b < count($newArray_job_target_1); $b++) { ?>
                            <tr>
                                <td colspan="3" class="border td_border">
                                    <div class="form-floating">
                                        <textarea name="up_job_target_1[]" id="up_job_target_1" class="form-control h-textarea"><?php echo $newArray_job_target_1[$b] ?></textarea>
                                        <label for="up_job_target_1" class="font-twelve">Please fill in Job Target<span class="red font-twelve">*</span></label>
                                    </div>
                                </td>
                                <td colspan="2" class="border td_border">
                                    <div class="form-floating">
                                        <textarea name="up_actual_achievement[]" id="up_actual_achievement" class="form-control h-textarea"><?php echo $newArray_actual_achievement[$b] ?></textarea>
                                        <label for="up_actual_achievement" class="font-twelve">Please fill in.<span class="red font-twelve">*</span></label>
                                    </div>
                                </td>
                                <td class="border mit td_border">
                                    <?php if ($b == 0) { ?>
                                        <button onclick="up_addInputJob_Target();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                                    <?php  } else { ?>
                                        <button onclick="up_deleteRowJob_Target(this);" class="btn btn-primary btn_color_df" type="button">Delete</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tbody id="tbody">
                        </tbody>
                    <?php } else { ?>
                        <tr>
                            <td colspan="3" class="border td_border">
                                <div class="form-floating">
                                    <textarea name="job_target_1[]" id="job_target_1" class="form-control h-textarea"></textarea>
                                    <label for="job_target_1" class="font-twelve">Please fill in Job Target<span class="red font-twelve">*</span></label>
                                </div>
                            </td>
                            <td colspan="2" class="border td_border">
                                <div class="form-floating">
                                    <textarea name="actual_achievement[]" id="actual_achievement" class="form-control h-textarea"></textarea>
                                    <label for="actual_achievement" class="font-twelve">Please fill in Actual achievement<span class="red font-twelve">*</span></label>
                                </div>
                            </td>
                            <td class="border mit td_border">
                                <button onclick="addInputJob_Target();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                            </td>
                        </tr>
                        <tbody id="tbody">
                        </tbody>
                    <?php } ?>
                    <tr>
                        <th colspan="6" class="border-0">
                            <?php foreach ($topic_selfevaluation as $topic_selfevaluations) {
                                if ($topic_selfevaluations->main_topic == 2) {
                                    echo $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic . ' ' . '(' . ($current_year + 1) . ').';
                                }
                            } ?>
                        </th>
                    </tr>
                    <tr>
                        <td class="border mit topic-background" colspan="5">
                            <l>Job Target <br> เป้าหมายงาน</l>
                            <div class="mt-1 font-eigth red" id="alert_Job_Target_2" style="display: none;">Please fill in Job Target !</div>
                        </td>
                        <td class="border mit topic-background">Manage</td>
                    </tr>
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check_job_target_2['job_target_2'] = array();
                        $check_job_target_2['job_target_2'] = $self_evaluation_ids->job_target_2;
                        $newArray_job_target_2 = explode(",", $check_job_target_2['job_target_2']);
                        for ($r = 0; $r < count($newArray_job_target_2); $r++) { ?>
                            <tr>
                                <td class="border td_border" colspan="5">
                                    <div class="form-floating">
                                        <textarea name="up_job_target_2[]" id="up_job_target_2" class="form-control h-textarea"><?php echo $newArray_job_target_2[$r] ?></textarea>
                                        <label for="up_job_target_2" class="font-twelve">Please fill in Job Target<span class="red font-twelve">*</span></label>
                                    </div>
                                </td>
                                <td class="border td_border mit">
                                    <?php if ($r == 0) { ?>
                                        <button onclick="up_addInputJob_Target_next_year();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                                    <?php } else { ?>
                                        <button onclick="up_deleteRowJob_Target_next_year(this);" class="btn btn-primary btn_color_df" type="button">Delete</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tbody id="tbody2">
                        </tbody>
                    <?php } else { ?>
                        <tr>
                            <td class="border td_border" colspan="5">
                                <div class="form-floating">
                                    <textarea name="job_target_2[]" id="job_target_2" class="form-control h-textarea"></textarea>
                                    <label for="job_target_2" class="font-twelve">Please fill in Job Target<span class="red font-twelve">*</span></label>
                                </div>
                            </td>
                            <td class="border td_border mit">
                                <button onclick="addInputJob_Target_next_year();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                            </td>
                        </tr>
                        <tbody id="tbody2">
                        </tbody>
                    <?php } ?>
                    <tr>
                        <th colspan="6" class="border-0">
                            <?php foreach ($topic_selfevaluation as $topic_selfevaluations) {
                                if ($topic_selfevaluations->main_topic == 3) {
                                    echo $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic;
                                }
                            } ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-0">
                            <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.1) {
                                    echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
                                }
                            } ?>
                            <div class="mt-1 font-eigth red" id="alert_3_1item_option" style="display: none;">Please tick one in check box !</div>
                        </td>
                    </tr>
                    <tr>
                        <?php if ($update_indicator == 1) { ?>
                            <td colspan="6" class="border-0">
                                <?php
                                $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1'] = array();
                                $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1'] = $self_evaluation_ids->item_option_selfevaluations3_1;
                                $newArray_item_option_selfevaluations3_1 = explode(",", $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1']);
                                ?>
                                <?php foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                    $check3_1 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluations3_1) ? "checked" : "";
                                    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.1) {
                                        $input_id = 'up_item_option_selfevaluation_' . $key;
                                        echo "<div class=\"mx-5\">
                                        <input type=\"radio\" name=\"up_3_1item_option_selfevaluations[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_1> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label>
                                        </div>";
                                    }
                                } ?>
                            </td>
                        <?php } else { ?>
                            <td colspan="6" class="border-0">
                                <?php foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.1) {
                                        $input_id = 'item_option_selfevaluation_' . $key;
                                        echo "<div class=\"mx-5\">
                                        <input type=\"radio\" name=\"3_1item_option_selfevaluations[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\"> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label>
                                        </div>";
                                    }
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php if ($update_indicator == 1) { ?>
                        <tr <?php if ($self_evaluation_ids->item_option_selfevaluations3_1 == "Fully achieved.") echo "style=\"display: none;\""; ?> class="tr_3_2">
                            <td colspan="6" class="border-0">
                                <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.2) {
                                        echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
                                    }
                                } ?>
                                <div class="mt-1 font-eigth red" id="alert_3_2item_option" style="display: none;">Please tick in check box all that apply !</div>
                            </td>
                        </tr>
                        <tr <?php if ($self_evaluation_ids->item_option_selfevaluations3_1 == "Fully achieved.") echo "style=\"display: none;\""; ?> class="tr_3_2">
                            <?php if ($update_indicator == 1) { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = array();
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = $self_evaluation_ids->item_option_selfevaluation3_2;
                                    $newArray_item_option_selfevaluation3_2 = explode(",", $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $half = ceil(count($item_option_selfevaluation) / 2); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        $check3_2 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_2) ? "checked" : "";
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = 'up_3_2item_option_selfevaluation_' . $key;
                                            if ($count < $half) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"up_3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2>
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                </td>
                            <?php } else { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $half = ceil(count($item_option_selfevaluation) / 2); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = '3_2item_option_selfevaluation_' . $key;
                                            if ($count < $half) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\">
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                </td>
                            <?php } ?>
                            <?php if ($update_indicator == 1) { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = array();
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = $self_evaluation_ids->item_option_selfevaluation3_2;
                                    $newArray_item_option_selfevaluation3_2 = explode(",", $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        $check3_2 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_2) ? "checked" : "";
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = 'up_3_2item_option_selfevaluation_' . $key;
                                            if ($count >= $half && $count < $half * 2) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"up_3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2>
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                    <div id="div_capability" <?php if ($self_evaluation_ids->others_capability == "") echo "style=\"display: none;\""; ?> class="mx-5">
                                        <div class="form-floating">
                                            <textarea name="up_others_capability" id="up_others_capability" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_capability ?></textarea>
                                            <label for="up_others_capability" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                        </div>
                                    </div>
                                    <div class="mt-1 font-eigth red mx-5" id="alert_3_2others" style="display: none;">Please fill in Others. !</div>
                                </td>
                            <?php } else { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = '3_2item_option_selfevaluation_' . $key;
                                            if ($count >= $half && $count < $half * 2) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\">
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                    <div id="div_capability" style="display: none;" class="mx-5">
                                        <div class="form-floating">
                                            <textarea name="others_capability" id="others_capability" class="form-control h-textarea"></textarea>
                                            <label for="others_capability" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                        </div>
                                    </div>
                                    <div class="mt-1 font-eigth red mx-5" id="alert_3_2others" style="display: none;">Please fill in Others. !</div>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php  } else { ?>
                        <tr style="display: none;" class="tr_3_2">
                            <td colspan="6" class="border-0">
                                <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                    if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.2) {
                                        echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
                                    }
                                } ?>
                                <div class="mt-1 font-eigth red" id="alert_3_2item_option" style="display: none;">Please tick in check box all that apply !</div>
                            </td>
                        </tr>
                        <tr style="display: none;" class="tr_3_2">
                            <?php if ($update_indicator == 1) { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = array();
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = $self_evaluation_ids->item_option_selfevaluation3_2;
                                    $newArray_item_option_selfevaluation3_2 = explode(",", $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $half = ceil(count($item_option_selfevaluation) / 2); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        $check3_2 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_2) ? "checked" : "";
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = 'up_3_2item_option_selfevaluation_' . $key;
                                            if ($count < $half) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"up_3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2>
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                </td>
                            <?php } else { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $half = ceil(count($item_option_selfevaluation) / 2); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = '3_2item_option_selfevaluation_' . $key;
                                            if ($count < $half) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\">
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                </td>
                            <?php } ?>
                            <?php if ($update_indicator == 1) { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = array();
                                    $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2'] = $self_evaluation_ids->item_option_selfevaluation3_2;
                                    $newArray_item_option_selfevaluation3_2 = explode(",", $check_item_option_selfevaluation3_2['item_option_selfevaluation3_2']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        $check3_2 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_2) ? "checked" : "";
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = 'up_3_2item_option_selfevaluation_' . $key;
                                            if ($count >= $half && $count < $half * 2) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"up_3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2>
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                    <div id="div_capability" <?php if ($self_evaluation_ids->others_capability == "") echo "style=\"display: none;\""; ?> class="mx-5">
                                        <div class="form-floating">
                                            <textarea name="up_others_capability" id="up_others_capability" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_capability ?></textarea>
                                            <label for="up_others_capability" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                        </div>
                                    </div>
                                    <div class="mt-1 font-eigth red mx-5" id="alert_3_2others" style="display: none;">Please fill in Others. !</div>
                                </td>
                            <?php } else { ?>
                                <td colspan="3" class="border-0">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.2) {
                                            // สร้าง input_id
                                            $input_id = '3_2item_option_selfevaluation_' . $key;
                                            if ($count >= $half && $count < $half * 2) {
                                                echo "<div class=\"mx-5\">
                                                <input type=\"checkbox\" name=\"3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\">
                                                <label for=\"$input_id\" style=\"font-size: 11px;\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                                </div>";
                                            }
                                        }
                                        $count++; // เพิ่มค่าตัวนับ
                                    } ?>
                                    <div id="div_capability" style="display: none;" class="mx-5">
                                        <div class="form-floating">
                                            <textarea name="others_capability" id="others_capability" class="form-control h-textarea"></textarea>
                                            <label for="others_capability" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                        </div>
                                    </div>
                                    <div class="mt-1 font-eigth red mx-5" id="alert_3_2others" style="display: none;">Please fill in Others. !</div>
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="6" class="border-0">
                            <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.3) {
                                    echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . " (" . ($current_year + 1) . ")?" . "</b>";
                                }
                            } ?>
                            <div class="mt-1 font-eigth red" id="alert_improve_yourself" style="display: none;">Please fill in order to improve yourself. !</div>
                        </td>
                    </tr>
                    <?php if ($update_indicator == 1) { ?>
                        <?php
                        $check_improve_yourself['improve_yourself'] = array();
                        $check_improve_yourself['improve_yourself'] = $self_evaluation_ids->improve_yourself;
                        $newArray_improve_yourself = explode(",", $check_improve_yourself['improve_yourself']);
                        for ($q = 0; $q < count($newArray_improve_yourself); $q++) { ?>
                            <tr>
                                <td class="border" colspan="5">
                                    <div class="form-floating">
                                        <textarea name="up_improve_yourself[]" id="up_improve_yourself" class="form-control h-textarea"><?php echo $newArray_improve_yourself[$q] ?></textarea>
                                        <label for="up_improve_yourself" class="font-twelve">Please enter things to improve yourself.<span class="red font-twelve">*</span></label>
                                    </div>
                                </td>
                                <td class="border mit">
                                    <?php if ($q == 0) { ?>
                                        <button onclick="up_addInput_improve_yourself();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                                    <?php } else { ?>
                                        <button onclick="up_deleteRowimprove_yourself(this);" class="btn btn-primary btn_color_df" type="button">Delete</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tbody id="tbody3">
                        </tbody>
                        <tr>
                        <?php } else { ?>
                        <tr>
                            <td class="border" colspan="5">
                                <div class="form-floating">
                                    <textarea name="improve_yourself[]" id="improve_yourself" class="form-control h-textarea"></textarea>
                                    <label for="improve_yourself" class="font-twelve">Please enter things to improve yourself.<span class="red font-twelve">*</span></label>
                                </div>
                            </td>
                            <td class="border mit">
                                <button onclick="addInput_improve_yourself();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                            </td>
                        </tr>
                        <tbody id="tbody3">
                        </tbody>
                    <?php } ?>
                    <tr>
                        <th colspan="6" class="border-0">
                            <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.4) {
                                    echo $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . " (" . ($current_year + 1) . ")?";
                                }
                            } ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="3" class="border mit topic-background" style="width: 50%;">
                            What are your weaknesses? <br> จุดอ่อนของคุณคืออะไร?
                            <div class="mt-1 font-eigth red" id="alert_weaknesses" style="display: none;">Please fill in your weaknesses !</div>
                        </td>
                        <td colspan="3" class="border mit topic-background" style="width: 50%;">
                            What are your strengths? <br> จุดแข็งของคุณคืออะไร?
                            <div class="mt-1 font-eigth red" id="alert_strengths" style="display: none;">Please fill in your strengths !</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border td_border">
                            <?php if ($update_indicator == 1) { ?>
                                <div class="form-floating">
                                    <textarea name="up_weaknesses" id="up_weaknesses" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->weaknesses ?></textarea>
                                    <label for="up_weaknesses" class="font-twelve">Please fill in What are your weaknesses?<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } else { ?>
                                <div class="form-floating">
                                    <textarea name="weaknesses" id="weaknesses" class="form-control h-textarea" style="height: 150px;"></textarea>
                                    <label for="weaknesses" class="font-twelve">Please fill in What are your weaknesses?<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } ?>
                        </td>
                        <td colspan="3" class="border td_border">
                            <?php if ($update_indicator == 1) { ?>
                                <div class="form-floating">
                                    <textarea name="up_strengths" id="up_strengths" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->strengths ?></textarea>
                                    <label for="up_strengths" class="font-twelve">Please fill in What are your strengths?<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } else { ?>
                                <div class="form-floating">
                                    <textarea name="strengths" id="strengths" class="form-control h-textarea" style="height: 150px;"></textarea>
                                    <label for="strengths" class="font-twelve">Please fill in What are your strengths?<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-0">
                            <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.5) {
                                    echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . " (" . ($current_year + 1) . ")?" . "</b>";
                                }
                            } ?>
                            <div class="mt-1 font-eigth red" id="alert_State_how_your" style="display: none;">Please fill in State how your /Supervisor / manager can help/support you !</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border">
                            <?php if ($update_indicator == 1) { ?>
                                <div class="form-floating">
                                    <textarea name="up_target_in_next_year" id="up_target_in_next_year" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->target_in_next_year ?></textarea>
                                    <label for="up_target_in_next_year" class="font-twelve">Please fill in State how your /Supervisor / manager can help/support you to achieve your job target in next year?<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } else { ?>
                                <div class="form-floating">
                                    <textarea name="target_in_next_year" id="target_in_next_year" class="form-control h-textarea" style="height: 150px;"></textarea>
                                    <label for="target_in_next_year" class="font-twelve">Please fill in State how your /Supervisor / manager can help/support you to achieve your job target in next year?<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-0">
                            <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                                if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.6) {
                                    echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
                                }
                            } ?>
                            <div class="mt-1 font-eigth red" id="alert_current_job_assignment" style="display: none;">Please select How do you think of your current job assignment !</div>
                        </td>
                    </tr>
                    <tr>
                        <?php if ($update_indicator == 1) { ?>
                            <td colspan="6" class="border-0">
                                <?php
                                $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6'] = array();
                                $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6'] = $self_evaluation_ids->item_option_selfevaluation3_6;
                                $newArray_item_option_selfevaluation3_6 = explode(",", $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6']);
                                ?>
                                <?php foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                    $check3_6 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_6) ? "checked" : "";
                                    $input_id = 'up_3_6item_option_selfevaluation_' . $key;
                                    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.6) {
                                        echo "<div class=\"mx-5\">
                                        <input type=\"radio\" name=\"up_3_6item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_6> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label>
                                        </div>";
                                    }
                                } ?>
                            </td>
                        <?php } else { ?>
                            <td colspan="6" class="border-0">
                                <?php foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                                    $input_id = '3_6item_option_selfevaluation_' . $key;
                                    if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.6) {
                                        echo "<div class=\"mx-5\">
                                        <input type=\"radio\" name=\"3_6item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\"> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label>
                                        </div>";
                                    }
                                } ?>
                            </td>
                        <?php } ?>
                    </tr>
                    <?php if ($update_indicator == 1) { ?>
                        <tr class="tr_3_6_All" <?php if ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "") echo "style=\"display: none;\""; ?>>
                            <td colspan="6" class="border-0">
                                <?php foreach ($subtopic_in_subtopic as $subtopic_in_subtopics) {
                                    if ($subtopic_in_subtopics->main_topic == 3 && $subtopic_in_subtopics->sub_topic == 3.6 && $subtopic_in_subtopics->subtopic_in_subtopic == "3.6.1") {
                                        echo "<div class=\"mx-3 fw-bold\">$subtopic_in_subtopics->subtopic_in_subtopic " . " " . "$subtopic_in_subtopics->subtopic_in_subtopic_text</div>
                                        <div class=\"mx-5\">$subtopic_in_subtopics->remark</div>
                                        <div class=\"mx-5 font-eigth red\" id=\"alert_most_suitable\" style=\"display: none;\">Please select 3.6.1 What kind of job shall be most suitable to you !</div>";
                                    }
                                } ?>
                            </td>
                        </tr>
                        <tr class="tr_3_6_All" <?php if ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "") echo "style=\"display: none;\""; ?>>
                            <td colspan="2" class="border-0">
                                <div class="mx-5">
                                    <?php
                                    $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = array();
                                    $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1;
                                    $newArray_item_option_is_subtopic_in_subtopics3_6_1 = explode(",", $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $half = ceil(count($item_option_is_subtopic_in_subtopic_division) / 3); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
                                    $div = "";
                                    foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
                                        if ($count < $half) {
                                            echo "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
                                            $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
                                            foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                                $check_3_6_1 = in_array($item_option_is_subtopic_in_subtopics->sub_division, $newArray_item_option_is_subtopic_in_subtopics3_6_1) ? "checked" : "";
                                                if ($item_option_is_subtopic_in_subtopics->division == $div) {
                                                    $input_id = 'up_3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                                    echo "<input type=\"checkbox\" name=\"up_3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                                }
                                            }
                                        }
                                        $count++;
                                    } ?>
                                </div>
                            </td>
                            <td colspan="2" class="border-0">
                                <div class="mx-5">
                                    <?php
                                    $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = array();
                                    $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1;
                                    $newArray_item_option_is_subtopic_in_subtopics3_6_1 = explode(",", $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $div = "";
                                    foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
                                        if ($count >= $half && $count < $half * 2) {
                                            echo "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
                                            $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
                                            foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                                $check_3_6_1 = in_array($item_option_is_subtopic_in_subtopics->sub_division, $newArray_item_option_is_subtopic_in_subtopics3_6_1) ? "checked" : "";
                                                if ($item_option_is_subtopic_in_subtopics->division == $div) {
                                                    $input_id = 'up_3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                                    echo "<input type=\"checkbox\" name=\"up_3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                                }
                                            }
                                        }
                                        $count++;
                                    } ?>
                                </div>
                            </td>
                            <td colspan="2" class="border-0">
                                <div class="mx-5">
                                    <?php
                                    $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = array();
                                    $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1;
                                    $newArray_item_option_is_subtopic_in_subtopics3_6_1 = explode(",", $check_item_option_is_subtopic_in_subtopics3_6_1['item_option_is_subtopic_in_subtopics3_6_1']);
                                    ?>
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $div = "";
                                    foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
                                        if ($count >= $half * 2 && $count < $half * 4) {
                                            echo "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
                                            $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
                                            foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                                $check_3_6_1 = in_array($item_option_is_subtopic_in_subtopics->sub_division, $newArray_item_option_is_subtopic_in_subtopics3_6_1) ? "checked" : "";
                                                if ($item_option_is_subtopic_in_subtopics->division == $div) {
                                                    $input_id = 'up_3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                                    echo "<input type=\"checkbox\" name=\"up_3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                                }
                                            }
                                        }
                                        $count++;
                                    } ?>
                                </div>
                                <div id="div_others_3_6_1" <?php if ($self_evaluation_ids->others_3_6_1 == "") echo "style=\"display: none;\""; ?> class="mx-5">
                                    <div class="form-floating">
                                        <textarea name="up_others_3_6_1" id="up_others_3_6_1" style="height: 150px;" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_3_6_1 ?></textarea>
                                        <label for="up_others_3_6_1" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                    </div>
                                </div>
                                <div class="mt-1 mx-5 font-eigth red" id="alert_others_3_6_1" style="display: none;">Please fill in Others. !</div>
                            </td>
                        </tr>
                        <tr class="tr_3_6_All" <?php if ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "") echo "style=\"display: none;\""; ?>>
                            <td colspan="6" class="border-0">
                                <?php foreach ($subtopic_in_subtopic as $subtopic_in_subtopics) {
                                    if ($subtopic_in_subtopics->main_topic == 3 && $subtopic_in_subtopics->sub_topic == 3.6 && $subtopic_in_subtopics->subtopic_in_subtopic == "3.6.2") {
                                        echo "<div class=\"mx-3 fw-bold\">$subtopic_in_subtopics->subtopic_in_subtopic " . " " . "$subtopic_in_subtopics->subtopic_in_subtopic_text</div>
                                        <div class=\"mx-3 mt-1 font-eigth red\" id=\"alert_assignment_as_stated\" style=\"display: none;\">Please select 3.6.2 Please check box for a reason why you propose to change job assignment as stated in 3.6.1 !</div>";
                                    }
                                } ?>
                            </td>
                        </tr>
                        <tr class="tr_3_6_All" <?php if ($self_evaluation_ids->item_option_is_subtopic_in_subtopics3_6_1 == "" && $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2 == "") echo "style=\"display: none;\""; ?>>
                            <td colspan="6" class="border-0">
                                <?php
                                $check_item_option_is_subtopic_in_subtopic3_6_2['item_option_is_subtopic_in_subtopic3_6_2'] = array();
                                $check_item_option_is_subtopic_in_subtopic3_6_2['item_option_is_subtopic_in_subtopic3_6_2'] = $self_evaluation_ids->item_option_is_subtopic_in_subtopic3_6_2;
                                $newArray_item_option_is_subtopic_in_subtopic3_6_2 = explode(",", $check_item_option_is_subtopic_in_subtopic3_6_2['item_option_is_subtopic_in_subtopic3_6_2']);
                                ?>
                                <?php foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                    $check_3_6_2 = in_array($item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text, $newArray_item_option_is_subtopic_in_subtopic3_6_2) ? "checked" : "";
                                    if ($item_option_is_subtopic_in_subtopics->subtopic_in_subtopic == "3.6.2") {
                                        $id_input = 'up_3_6_2item_option_is_subtopic_in_subtopic' . $key;
                                        echo "<div class=\"mx-5\">
                                        <input type=\"checkbox\" name=\"up_3_6_2item_option_is_subtopic_in_subtopic[]\" id=\"$id_input\" value=\"$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text\" $check_3_6_2> <label for=\"$id_input\">$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text</label> <br>
                                        </div>";
                                    }
                                } ?>
                                <div id="div_others_3_6_2" <?php if ($self_evaluation_ids->others_3_6_2 == "") echo "style=\"display: none;\""; ?> class="mx-5">
                                    <div class="form-floating">
                                        <textarea name="up_others_3_6_2" id="up_others_3_6_2" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_3_6_2 ?></textarea>
                                        <label for="up_others_3_6_2" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                    </div>
                                </div>
                                <div class="mt-1 mx-5 font-eigth red" id="alert_others_3_6_2" style="display: none;">Please fill in Others. !</div>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr class="tr_3_6_All" style="display: none;">
                            <td colspan="6" class="border-0">
                                <?php foreach ($subtopic_in_subtopic as $subtopic_in_subtopics) {
                                    if ($subtopic_in_subtopics->main_topic == 3 && $subtopic_in_subtopics->sub_topic == 3.6 && $subtopic_in_subtopics->subtopic_in_subtopic == "3.6.1") {
                                        echo "<div class=\"mx-3 fw-bold\">$subtopic_in_subtopics->subtopic_in_subtopic " . " " . "$subtopic_in_subtopics->subtopic_in_subtopic_text</div>
                                        <div class=\"mx-5\">$subtopic_in_subtopics->remark</div>
                                        <div class=\"mx-5 font-eigth red\" id=\"alert_most_suitable\" style=\"display: none;\">Please select 3.6.1 What kind of job shall be most suitable to you !</div>";
                                    }
                                } ?>
                            </td>
                        </tr>
                        <tr class="tr_3_6_All" style="display: none;">
                            <td colspan="2" class="border-0">
                                <div class="mx-5">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $half = ceil(count($item_option_is_subtopic_in_subtopic_division) / 3); // หารจำนวนข้อมูลให้แบ่งเป็นครึ่ง
                                    $div = "";
                                    foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
                                        if ($count < $half) {
                                            echo "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
                                            $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
                                            foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                                if ($item_option_is_subtopic_in_subtopics->division == $div) {
                                                    $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                                    echo "<input type=\"checkbox\" name=\"3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\"> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                                }
                                            }
                                        }
                                        $count++;
                                    } ?>
                                </div>
                            </td>
                            <td colspan="2" class="border-0">
                                <div class="mx-5">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $div = "";
                                    foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
                                        if ($count >= $half && $count < $half * 2) {
                                            echo "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
                                            $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
                                            foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                                if ($item_option_is_subtopic_in_subtopics->division == $div) {
                                                    $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                                    echo "<input type=\"checkbox\" name=\"3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\"> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                                }
                                            }
                                        }
                                        $count++;
                                    } ?>
                                </div>
                            </td>
                            <td colspan="2" class="border-0">
                                <div class="mx-5">
                                    <?php
                                    $count = 0; // ตัวนับจำนวนข้อมูล
                                    $div = "";
                                    foreach ($item_option_is_subtopic_in_subtopic_division as $item_option_is_subtopic_in_subtopic_divisions) {
                                        if ($count >= $half * 2 && $count < $half * 4) {
                                            echo "<u><b>$item_option_is_subtopic_in_subtopic_divisions->division_option</b></u><br>";
                                            $div = $item_option_is_subtopic_in_subtopic_divisions->division_option;
                                            foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                                if ($item_option_is_subtopic_in_subtopics->division == $div) {
                                                    $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                                    echo "<input type=\"checkbox\" name=\"3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\"> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                                }
                                            }
                                        }
                                        $count++;
                                    } ?>
                                </div>
                                <div id="div_others_3_6_1" style="display: none;" class="mx-5">
                                    <div class="form-floating">
                                        <textarea name="others_3_6_1" id="others_3_6_1" style="height: 150px;" class="form-control h-textarea"></textarea>
                                        <label for="others_3_6_1" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                    </div>
                                </div>
                                <div class="mt-1 mx-5 font-eigth red" id="alert_others_3_6_1" style="display: none;">Please fill in Others. !</div>
                            </td>
                        </tr>
                        <tr class="tr_3_6_All" style="display: none;">
                            <td colspan="6" class="border-0">
                                <?php foreach ($subtopic_in_subtopic as $subtopic_in_subtopics) {
                                    if ($subtopic_in_subtopics->main_topic == 3 && $subtopic_in_subtopics->sub_topic == 3.6 && $subtopic_in_subtopics->subtopic_in_subtopic == "3.6.2") {
                                        echo "<div class=\"mx-3 fw-bold\">$subtopic_in_subtopics->subtopic_in_subtopic " . " " . "$subtopic_in_subtopics->subtopic_in_subtopic_text</div>
                                        <div class=\"mx-3 mt-1 font-eigth red\" id=\"alert_assignment_as_stated\" style=\"display: none;\">Please select 3.6.2 Please check box for a reason why you propose to change job assignment as stated in 3.6.1 !</div>";
                                    }
                                } ?>
                            </td>
                        </tr>
                        <tr class="tr_3_6_All" style="display: none;">
                            <td colspan="6" class="border-0">
                                <?php foreach ($item_option_is_subtopic_in_subtopic as $key => $item_option_is_subtopic_in_subtopics) {
                                    if ($item_option_is_subtopic_in_subtopics->subtopic_in_subtopic == "3.6.2") {
                                        $id_input = '3_6_2item_option_is_subtopic_in_subtopic' . $key;
                                        echo "<div class=\"mx-5\">
                                        <input type=\"checkbox\" name=\"3_6_2item_option_is_subtopic_in_subtopic[]\" id=\"$id_input\" value=\"$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text\"> <label for=\"$id_input\">$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text</label> <br>
                                        </div>";
                                    }
                                } ?>
                                <div id="div_others_3_6_2" style="display: none;" class="mx-5">
                                    <div class="form-floating">
                                        <textarea name="others_3_6_2" id="others_3_6_2" class="form-control h-textarea"></textarea>
                                        <label for="others_3_6_2" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                                    </div>
                                </div>
                                <div class="mt-1 mx-5 font-eigth red" id="alert_others_3_6_2" style="display: none;">Please fill in Others. !</div>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="6" class="border-0">
                            <?php foreach ($topic_selfevaluation as $topic_selfevaluations) {
                                if ($topic_selfevaluations->main_topic == 4) {
                                    echo "<b>" . $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic . "</b>";
                                }
                            } ?>
                            <div class="mt-1 font-eigth red" id="alert_your_feedback" style="display: none;">Please fill in Your feedback / opinion about Company, please describe. !</div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border">
                            <?php if ($update_indicator == 1) { ?>
                                <div class="form-floating">
                                    <textarea name="up_your_feedback" id="up_your_feedback" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->your_feedback ?></textarea>
                                    <label for="up_your_feedback" class="font-twelve">Please fill in Your feedback / opinion about Company, please describe.<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } else { ?>
                                <div class="form-floating">
                                    <textarea name="your_feedback" id="your_feedback" class="form-control h-textarea" style="height: 150px;"></textarea>
                                    <label for="your_feedback" class="font-twelve">Please fill in Your feedback / opinion about Company, please describe.<span class="red font-twelve">*</span></label>
                                </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-0" align="right">
                            <table class="mt-5">
                                <tr>
                                    <td>Employee Sign</td>
                                    <td><?php nbs(5); ?></td>
                                    <td style="vertical-align: bottom;">
                                        <div class="mx-3" style="border: 0.5px solid #000000; width: 250px"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-0" align="right">
                            <table class="mt-3">
                                <tr>
                                    <td>Employee print name</td>
                                    <td><?php nbs(5); ?></td>
                                    <td style="vertical-align: bottom;">
                                        <div class="mx-3" style="border: 0.5px solid #000000; width: 250px"></div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="mit border-0">
                            <?php if ($update_indicator == 1) { ?>
                                <button type="button" class="btn btn-primary btn_color_df" id="up_bt_Save_Draft">Save Draft</button>
                                <button type="button" class="btn btn-primary btn_color_df" id="up_bt_Submit">Submit</button>
                            <?php } else { ?>
                                <button type="button" class="btn btn-primary btn_color_df" id="bt_Save_Draft">Save Draft</button>
                                <button type="button" class="btn btn-primary btn_color_df" id="bt_Submit">Submit</button>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="6" class="border-0">
                            <?php foreach ($topic_selfevaluation as $topic_selfevaluations) {
                                if ($topic_selfevaluations->main_topic == 5) {
                                    echo $topic_selfevaluations->main_topic . " . " . $topic_selfevaluations->topic;
                                }
                            } ?>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="6" class="border-0">
                            <table class="table table-form border">
                                <tr>
                                    <td class="border mit" style="width: 20%; height: 150px;">Manager</td>
                                    <td class="border" style="width: 60%; height: 150px; vertical-align: bottom;"></td>
                                    <td class="border mit" style="width: 20%; height: 150px; vertical-align: bottom;">-Signed name-</td>
                                </tr>
                                <tr>
                                    <td class="border mit" style="width: 20%; height: 150px;">Senior Manager</td>
                                    <td class="border" style="width: 60%; height: 150px; vertical-align: bottom;"></td>
                                    <td class="border mit" style="width: 20%; height: 150px; vertical-align: bottom;">-Signed name-</td>
                                </tr>
                                <tr>
                                    <td class="border mit" style="width: 20%; height: 150px;">General Manager</td>
                                    <td class="border" style="width: 60%; height: 150px; vertical-align: bottom;"></td>
                                    <td class="border mit" style="width: 20%; height: 150px; vertical-align: bottom;">-Signed name-</td>
                                </tr>
                                <tr>
                                    <td class="border mit" style="width: 20%; height: 150px;">Senior Executive Officer</td>
                                    <td class="border" style="width: 60%; height: 150px; vertical-align: bottom;"></td>
                                    <td class="border mit" style="width: 20%; height: 150px; vertical-align: bottom;">-Signed name-</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="container mt-5">
        <?php if ($_SESSION["group"] != "") { ?>
            <a href="<?php echo base_url('index.php/hr_controller/TableRecordSelfEvaluationForHr') ?>"><img src="<?php echo base_url('/img/Self-Eval-Banner.jpg') ?>" width="100%" height="300"><br><?php echo br(2) ?></a>
        <?php } else { ?>
            <a href="<?php echo base_url('index.php/hr_controller/TableRecordSelfEvaluation') ?>"><img src="<?php echo base_url('/img/Self-Eval-Banner.jpg') ?>" width="100%" height="300"><br><?php echo br(2) ?></a>
        <?php } ?>
        <u class="red h4">"Form not available now, Period time for submit From <?php echo $format_date_from ?> To <?php echo $format_date_to ?>"</u><?php echo br(5) ?>
    </div>
<?php } ?>