<?php
include('scriptFormStaticSelfEvaluation.php');
include "checkAdminUser.php";
$current_year = date('Y');
?>
<div class="container-fluid mt-3">
    <table class="table table-form border-0">
        <tr>
            <th class="border-0 h4">
                <img src="<?php echo base_url('/img/images.png'); ?>" alt="" width="50px" class="mx-2">THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
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
                <!-- Tips: How to Modify Ms. Word file to PDF, [Tab menu → File → Save as Adobe PDF → Save file] -->
            </td>
        </tr>
    </table>
    <form action="" method="post">
        <table class="table table-form">
            <?php foreach ($self_evaluation_id as $self_evaluation_ids) ?>
            <!-- <?php foreach ($emp_hr_import as $emp_hr_imports) ?> -->
            <tr>
                <td class="border-0">
                    <input type="hidden" id="up_id" name="up_id" value="<?php echo $self_evaluation_ids->id; ?>">
                    <input type="hidden" id="year_submit" name="year_submit" value="<?php echo date('Y'); ?>">
                    <input type="hidden" id="emp_email" name="emp_email" value="<?php echo $_SESSION["emp_email"]; ?>">
                </td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td style="width: 15em;" class="border text-end mit-v topic-background">Date</td>
                <td style="width: 20em;" class="border mit-v td_border">
                    <input type="text" class="form-control" id="date_submit" name="date_submit" placeholder="DD/MM/YYYY" value="<?php echo $self_evaluation_ids->date_submit ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Date_submit" style="display: none;">Please fill in Date !</div>
                </td>
            </tr>
            <tr>
                <td class="border topic-background mit-v text-end">Employee name</td>
                <td class="border mit-v td_border">
                    <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?php echo $self_evaluation_ids->emp_name ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Employee_name" style="display: none;">Please fill in Employee name !</div>
                </td>
                <td class="border topic-background mit-v text-end">Employee ID</td>
                <td class="border mit-v td_border">
                    <input type="text" id="emp_id" name="emp_id" class="form-control" value="<?php echo $self_evaluation_ids->emp_id ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Employee_ID" style="display: none;">Please fill in Employee ID !</div>
                </td>
                <td class="border topic-background mit-v text-end">Employee Grade</td>
                <td class="border mit-v td_border">
                    <input type="text" id="emp_grade" name="emp_grade" class="form-control" value="<?php echo $self_evaluation_ids->emp_grade ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Employee_Grade" style="display: none;">Please fill in Employee Grade !</div>
                </td>
            </tr>
            <tr>
                <td class="border topic-background mit-v text-end">Section</td>
                <td class="border mit-v td_border">
                    <input type="text" id="section" name="section" class="form-control" value="<?php echo $self_evaluation_ids->section ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Section" style="display: none;">Please fill in Section !</div>
                </td>
                <td class="border topic-background mit-v text-end">Division</td>
                <td class="border mit-v td_border">
                    <input style="font-size: 10px;" type="text" class="form-control" id="division" name="division" value="<?php echo $self_evaluation_ids->division ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Division" style="display: none;">Please select Division !</div>
                </td>
                <td class="border topic-background mit-v text-end">Hired date</td>
                <td class="border mit-v td_border">
                    <input type="text" class="form-control" id="hired_date" name="hired_date" placeholder="DD/MM/YYYY" value="<?php echo $self_evaluation_ids->hired_date ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Hired_date" style="display: none;">Please fill in Hired date !</div>
                </td>
            </tr>
            <tr>
                <td class="border topic-background mit-v text-end">Superior name</td>
                <td class="border mit-v td_border">
                    <input type="text" id="sup_name" name="sup_name" class="form-control" value="<?php echo $self_evaluation_ids->sup_name ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Superior_name" style="display: none;">Please fill in Superior name !</div>
                </td>
                <td class="border topic-background mit-v text-end">Superior Grade</td>
                <td class="border mit-v td_border">
                    <input type="text" id="sup_grade" name="sup_grade" class="form-control" value="<?php echo $self_evaluation_ids->sup_grade ?>" disabled>
                    <div class="mt-1 font-eigth red" id="alert_Superior_Grade" style="display: none;">Please fill in Superior Grade !</div>
                </td>
                <td class="border topic-background mit-v text-end">Employee Years of service</td>
                <td class="border mit td_border">
                    <input type="text" id="emp_year_of_service" name="emp_year_of_service" class="form-control" value="<?php echo $self_evaluation_ids->emp_year_of_service ?>" disabled>
                    <!-- <div class="mt-1 font-eigth red" id="alert_Employee_Years_of_service" style="display: none;">Please fill in Employee Years of service !</div> -->
                </td>
            </tr>
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
                    <l>Job Target</l>
                    <div class="mt-1 font-eigth red" id="alert_Job_Target_1" style="display: none;">Please fill in Job Target !</div>
                </td>
                <td colspan="2" class="mit border topic-background">
                    <l>Actual achievement</l>
                    <div class="mt-1 font-eigth red" id="alert_Actual_achievement" style="display: none;">Please fill in Actual achievement !</div>
                </td>
                <td class="mit border topic-background">Manage</td>
            </tr>
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
                            <textarea name="job_target_1[]" id="job_target_1" class="form-control h-textarea"><?php echo $newArray_job_target_1[$b] ?></textarea>
                            <label for="job_target_1" class="font-twelve">Please fill in Job Target<span class="red font-twelve">*</span></label>
                        </div>
                    </td>
                    <td colspan="2" class="border td_border">
                        <div class="form-floating">
                            <textarea name="actual_achievement[]" id="actual_achievement" class="form-control h-textarea"><?php echo $newArray_actual_achievement[$b] ?></textarea>
                            <label for="actual_achievement" class="font-twelve">Please fill in Actual achievement<span class="red font-twelve">*</span></label>
                        </div>
                    </td>
                    <td class="border mit td_border">
                        <?php if ($b == 0) { ?>
                            <button onclick="addInputJob_Target();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                        <?php  } else { ?>
                            <button onclick="deleteRowJob_Target(this);" class="btn btn-primary btn_color_df" type="button">Delete</button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            <tbody id="tbody">
            </tbody>
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
                    <l>Job Target</l>
                    <div class="mt-1 font-eigth red" id="alert_Job_Target_2" style="display: none;">Please fill in Job Target !</div>
                </td>
                <td class="border mit topic-background">Manage</td>
            </tr>
            <?php
            $check_job_target_2['job_target_2'] = array();
            $check_job_target_2['job_target_2'] = $self_evaluation_ids->job_target_2;
            $newArray_job_target_2 = explode(",", $check_job_target_2['job_target_2']);
            for ($r = 0; $r < count($newArray_job_target_2); $r++) { ?>
                <tr>
                    <td class="border td_border" colspan="5">
                        <div class="form-floating">
                            <textarea name="job_target_2[]" id="job_target_2" class="form-control h-textarea"><?php echo $newArray_job_target_2[$r] ?></textarea>
                            <label for="job_target_2" class="font-twelve">Please fill in Job Target<span class="red font-twelve">*</span></label>
                        </div>
                    </td>
                    <td class="border td_border mit">
                        <?php if ($r == 0) { ?>
                            <button onclick="addInputJob_Target_next_year();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                        <?php } else { ?>
                            <button onclick="deleteRowJob_Target_next_year(this);" class="btn btn-primary btn_color_df" type="button">Delete</button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            <tbody id="tbody2">
            </tbody>
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
                <td colspan="6" class="border-0">
                    <?php
                    $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1'] = array();
                    $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1'] = $self_evaluation_ids->item_option_selfevaluations3_1;
                    $newArray_item_option_selfevaluations3_1 = explode(",", $check_item_option_selfevaluations3_1['item_option_selfevaluations3_1']);
                    ?>
                    <?php foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                        $check3_1 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluations3_1) ? "checked" : "";
                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.1) {
                            $input_id = 'item_option_selfevaluation_' . $key;
                            echo "<div class=\"mx-5\">
                            <input type=\"radio\" name=\"3_1item_option_selfevaluations[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_1> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label>
                            </div>";
                        }
                    } ?>
                </td>
            </tr>
            <tr>
                <td colspan="6" class="border-0">
                    <?php foreach ($sub_topic_selfevaluation as $sub_topic_selfevaluations) {
                        if ($sub_topic_selfevaluations->main_topic == 3 && $sub_topic_selfevaluations->sub_topic == 3.2) {
                            echo "<b>" . $sub_topic_selfevaluations->sub_topic . " " . $sub_topic_selfevaluations->sub_topic_text . "</b>";
                        }
                    } ?>
                    <div class="mt-1 font-eigth red" id="alert_3_2item_option" style="display: none;">Please tick in check box all that apply !</div>
                </td>
            </tr>
            <tr>
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
                            $input_id = '3_2item_option_selfevaluation_' . $key;
                            if ($count < $half) {
                                echo "<div class=\"mx-5\">
                                <input type=\"checkbox\" name=\"3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2>
                                <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                </div>";
                            }
                        }
                        $count++; // เพิ่มค่าตัวนับ
                    } ?>
                </td>
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
                            $input_id = '3_2item_option_selfevaluation_' . $key;
                            if ($count >= $half && $count < $half * 2) {
                                echo "<div class=\"mx-5\">
                                <input type=\"checkbox\" name=\"3_2item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_2>
                                <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label> <br>
                                </div>";
                            }
                        }
                        $count++; // เพิ่มค่าตัวนับ
                    } ?>
                    <div id="div_capability" <?php if ($self_evaluation_ids->others_capability == "") echo "style=\"display: none;\""; ?> class="mx-5">
                        <div class="form-floating">
                            <textarea name="others_capability" id="others_capability" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_capability ?></textarea>
                            <label for="others_capability" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                        </div>
                    </div>
                    <div class="mt-1 font-eigth red mx-5" id="alert_3_2others" style="display: none;">Please fill in Others. !</div>
                </td>
            </tr>
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
            <?php
            $check_improve_yourself['improve_yourself'] = array();
            $check_improve_yourself['improve_yourself'] = $self_evaluation_ids->improve_yourself;
            $newArray_improve_yourself = explode(",", $check_improve_yourself['improve_yourself']);
            for ($q = 0; $q < count($newArray_improve_yourself); $q++) { ?>
                <tr>
                    <td class="border" colspan="5">
                        <div class="form-floating">
                            <textarea name="improve_yourself[]" id="improve_yourself" class="form-control h-textarea"><?php echo $newArray_improve_yourself[$q] ?></textarea>
                            <label for="improve_yourself" class="font-twelve">Please enter things to improve yourself.<span class="red font-twelve">*</span></label>
                        </div>
                    </td>
                    <td class="border mit">
                        <?php if ($q == 0) { ?>
                            <button onclick="addInput_improve_yourself();" class="btn btn-primary btn_color_df" type="button">Add Item</button>
                        <?php } else { ?>
                            <button onclick="deleteRowimprove_yourself(this);" class="btn btn-primary btn_color_df" type="button">Delete</button>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
            <tbody id="tbody3">
            </tbody>
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
                    What are your weaknesses?
                    <div class="mt-1 font-eigth red" id="alert_weaknesses" style="display: none;">Please fill in your weaknesses !</div>
                </td>
                <td colspan="3" class="border mit topic-background" style="width: 50%;">
                    What are your strengths?
                    <div class="mt-1 font-eigth red" id="alert_strengths" style="display: none;">Please fill in your strengths !</div>
                </td>
            </tr>
            <tr>
                <td colspan="3" class="border td_border">
                    <div class="form-floating">
                        <textarea name="weaknesses" id="weaknesses" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->weaknesses ?></textarea>
                        <label for="weaknesses" class="font-twelve">Please fill in What are your weaknesses?<span class="red font-twelve">*</span></label>
                    </div>
                </td>
                <td colspan="3" class="border td_border">
                    <div class="form-floating">
                        <textarea name="strengths" id="strengths" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->strengths ?></textarea>
                        <label for="strengths" class="font-twelve">Please fill in What are your strengths?<span class="red font-twelve">*</span></label>
                    </div>
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
                    <div class="form-floating">
                        <textarea name="target_in_next_year" id="target_in_next_year" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->target_in_next_year ?></textarea>
                        <label for="target_in_next_year" class="font-twelve">Please fill in State how your /Supervisor / manager can help/support you to achieve your job target in next year?<span class="red font-twelve">*</span></label>
                    </div>
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
                <td colspan="6" class="border-0">
                    <?php
                    $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6'] = array();
                    $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6'] = $self_evaluation_ids->item_option_selfevaluation3_6;
                    $newArray_item_option_selfevaluation3_6 = explode(",", $check_item_option_selfevaluation3_6['item_option_selfevaluation3_6']);
                    ?>
                    <?php foreach ($item_option_selfevaluation as $key => $item_option_selfevaluations) {
                        $check3_6 = in_array($item_option_selfevaluations->item_option, $newArray_item_option_selfevaluation3_6) ? "checked" : "";
                        $input_id = '3_6item_option_selfevaluation_' . $key;
                        if ($item_option_selfevaluations->main_topic == 3 && $item_option_selfevaluations->sub_topic == 3.6) {
                            echo "<div class=\"mx-5\">
                            <input type=\"radio\" name=\"3_6item_option_selfevaluation[]\" id=\"$input_id\" value=\"$item_option_selfevaluations->item_option\" $check3_6> <label for=\"$input_id\">" . $item_option_selfevaluations->item_option . "</label>
                            </div>";
                        }
                    } ?>
                </td>
            </tr>
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
                                        $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                        echo "<input type=\"checkbox\" name=\"3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
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
                                        $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                        echo "<input type=\"checkbox\" name=\"3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
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
                                        $input_id = '3_6_1item_option_is_subtopic_in_subtopics_' . $key;
                                        echo "<input type=\"checkbox\" name=\"3_6_1item_option_is_subtopic_in_subtopics[]\" id=\"$input_id\" value=\"$item_option_is_subtopic_in_subtopics->sub_division\" $check_3_6_1> <label for=\"$input_id\">$item_option_is_subtopic_in_subtopics->sub_division</label><br>";
                                    }
                                }
                            }
                            $count++;
                        } ?>
                    </div>
                    <div id="div_others_3_6_1" <?php if ($self_evaluation_ids->others_3_6_1 == "") echo "style=\"display: none;\""; ?> class="mx-5">
                        <div class="form-floating">
                            <textarea name="others_3_6_1" id="others_3_6_1" style="height: 150px;" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_3_6_1 ?></textarea>
                            <label for="others_3_6_1" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
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
                            $id_input = '3_6_2item_option_is_subtopic_in_subtopic' . $key;
                            echo "<div class=\"mx-5\">
                            <input type=\"checkbox\" name=\"3_6_2item_option_is_subtopic_in_subtopic[]\" id=\"$id_input\" value=\"$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text\" $check_3_6_2> <label for=\"$id_input\">$item_option_is_subtopic_in_subtopics->subtopic_in_subtopic_text</label> <br>
                            </div>";
                        }
                    } ?>
                    <div id="div_others_3_6_2" <?php if ($self_evaluation_ids->others_3_6_2 == "") echo "style=\"display: none;\""; ?> class="mx-5">
                        <div class="form-floating">
                            <textarea name="others_3_6_2" id="others_3_6_2" class="form-control h-textarea"><?php echo $self_evaluation_ids->others_3_6_2 ?></textarea>
                            <label for="others_3_6_2" class="font-twelve">Please fill in Others.<span class="red font-twelve">*</span></label>
                        </div>
                    </div>
                    <div class="mt-1 mx-5 font-eigth red" id="alert_others_3_6_2" style="display: none;">Please fill in Others. !</div>
                </td>
            </tr>
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
                    <div class="form-floating">
                        <textarea name="your_feedback" id="your_feedback" class="form-control h-textarea" style="height: 150px;"><?php echo $self_evaluation_ids->your_feedback ?></textarea>
                        <label for="your_feedback" class="font-twelve">Please fill in Your feedback / opinion about Company, please describe.<span class="red font-twelve">*</span></label>
                    </div>
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
                    <?php if ($_SESSION["emp_email"] == $self_evaluation_ids->emp_email) { ?>
                        <a href="<?php echo base_url('index.php/hr_controller/PrintPDFSelfEvaluation/') ?><?php echo $self_evaluation_ids->id ?>" class="btn btn-primary btn_color_df" id="">Click to PDF</a>
                        <button style="display: none;" onclick="window.print();" class="btn btn-primary btn_color_df">Click to PDF</button>
                        <button type="button" class="btn btn-primary btn_color_df" id="bt_Submit">Re-Submit</button>
                    <?php } else { ?>
                        <a href="<?php echo base_url('index.php/hr_controller/PrintPDFSelfEvaluation/') ?><?php echo $self_evaluation_ids->id ?>" class="btn btn-primary btn_color_df" id="">Click to PDF</a>
                        <button style="display: none;" onclick="window.print();" class="btn btn-primary btn_color_df">Click to PDF</button>
                        <!-- <button type="button" class="btn btn-primary btn_color_df" id="bt_Submit">Re-Submit</button> -->
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