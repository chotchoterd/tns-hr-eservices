<?php
include "scriptTableAssessmentRecord.php";
if (isset($_GET['s_date'])) {
    $s_date = $_GET['s_date'];
} else {
    $s_date = '';
}
if (isset($_GET['s_year'])) {
    $s_year = $_GET['s_year'];
} else {
    $s_year = date('Y');
}
if (isset($_GET['s_emp_id'])) {
    $s_emp_id = $_GET['s_emp_id'];
} else {
    $s_emp_id = '';
}
if (isset($_GET['s_emp_name'])) {
    $s_emp_name = $_GET['s_emp_name'];
} else {
    $s_emp_name = '';
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = '';
}
?>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="display-4 text-center border-0">BONUS & ANNUAL Assessment</th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search BONUS & ANNUAL Assessment</legend>
        <table class="table table-form border-0">
            <tr>
                <!-- <th class="border-0">
                    Date :
                    <input type="text" id="s_date" name="s_date" class="form-control" value="<?php echo $s_date; ?>">
                </th> -->
                <th class="border-0">
                    Year Submit :
                    <select name="s_year" id="s_year" class="form-select" aria-label="Default select example">
                        <?php
                        $current_year = date('Y');
                        for ($i = $current_year - 5; $i < $current_year + 5; $i++) { ?>
                            <option value="<?php echo $i ?>" <?php if ($i == $s_year) echo "selected"; ?> class="mit"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th class="border-0">
                    Employee ID :
                    <input type="text" id="s_emp_id" name="s_emp_id" class="form-control" value="<?php echo $s_emp_id ?>">
                </th>
            </tr>
            <tr>
                <th class="border-0">
                    Employee Name :
                    <input type="text" id="s_emp_name" name="s_emp_name" class="form-control" value="<?php echo $s_emp_name ?>">
                </th>
                <th class="border-0">
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="Submit" <?php if ($s_status == "Submit") echo "selected"; ?>>Submit</option>
                        <option value="Draft" <?php if ($s_status == "Draft") echo "selected"; ?>>Draft</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th colspan="2" class="border-0 text-end align-bottom">
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Search_AssessmentRecord();">Search</button>
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Clear_Search_AssessmentRecord();">Clear</button>
                </th>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="border topic-background mit">Employee Name</th>
            <th class="border topic-background mit">Grade</th>
            <th class="border topic-background mit">Employee ID</th>
            <th class="border topic-background mit">Submit Date</th>
            <th class="border topic-background mit">Year Assessment</th>
            <th class="border topic-background mit">Status</th>
        </tr>
        <?php foreach ($subordinate_emp as $subordinate_emps) { ?>
            <tr>
                <td class="border mit-v td_border">
                    <?php if (($subordinate_emps->emp_grade == "G4" || $subordinate_emps->emp_grade == "G5" || $subordinate_emps->emp_grade == "G6" || $subordinate_emps->emp_grade == "J") && $subordinate_emps->assessment_status != "Submit" && $subordinate_emps->assessment_status == "Draft") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateG4G6/?emp_id=') . $subordinate_emps->emp_id . '&id=' . $subordinate_emps->id_as; ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } elseif (($subordinate_emps->emp_grade == "G4" || $subordinate_emps->emp_grade == "G5" || $subordinate_emps->emp_grade == "G6" || $subordinate_emps->emp_grade == "J") && $subordinate_emps->assessment_status != "Submit") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateG4G6/?emp_id=') . $subordinate_emps->emp_id ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } elseif (($subordinate_emps->emp_grade == "G1" || $subordinate_emps->emp_grade == "G2" || $subordinate_emps->emp_grade == "G3" || $subordinate_emps->emp_grade == "P") && $subordinate_emps->assessment_status != "Submit") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateG2G3/?emp_id=') . $subordinate_emps->emp_id ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } elseif (($subordinate_emps->emp_grade == "K" || $subordinate_emps->emp_grade == "NA") && $subordinate_emps->assessment_status != "Submit" && $subordinate_emps->assessment_status == "Draft") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateForemanAndbelow/?emp_id=') . $subordinate_emps->emp_id . '&id=' . $subordinate_emps->id_as; ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } elseif (($subordinate_emps->emp_grade == "K" || $subordinate_emps->emp_grade == "NA") && $subordinate_emps->assessment_status != "Submit") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateForemanAndbelow/?emp_id=') . $subordinate_emps->emp_id ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } elseif (($subordinate_emps->emp_grade == "K" || $subordinate_emps->emp_grade == "NA") && $subordinate_emps->assessment_status == "Submit") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/StaticFormBonusAnnualEvaluateForemanAndbelow/?id=') . $subordinate_emps->id_as; ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } elseif (($subordinate_emps->emp_grade == "G4" || $subordinate_emps->emp_grade == "G5" || $subordinate_emps->emp_grade == "G6" || $subordinate_emps->emp_grade == "J") && $subordinate_emps->assessment_status == "Submit") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/StaticFormBonusAnnualEvaluateG4G6/?id=') . $subordinate_emps->id_as; ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } ?>
                </td>
                <td class="border mit td_border">
                    <?php echo $subordinate_emps->emp_grade; ?>
                </td>
                <td class="border mit td_border">
                    <?php echo $subordinate_emps->emp_id; ?>
                </td>
                <td class="border mit td_border">
                    <?php echo $subordinate_emps->date_submit; ?>
                </td>
                <td class="border mit td_border">
                    <?php echo $subordinate_emps->year_submit; ?>
                </td>
                <td class="border mit td_border">
                    <?php if ($subordinate_emps->assessment_status == "") {
                        echo "N/A";
                    } else {
                        echo $subordinate_emps->assessment_status;
                    } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>