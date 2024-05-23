<?php
include "scriptTableRecordSelfEvaluationForHr.php";
include "checkAdmin.php";
$check_count = 0;
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
if (isset($_GET['s_hired_date'])) {
    $s_hired_date = $_GET['s_hired_date'];
} else {
    $s_hired_date = '';
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
            <th class="display-4 text-center border-0">Self-Evaluation Record For HR</th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search Self-Evaluation</legend>
        <table class="table table-form border-0">
            <tr>
                <th class="border-0">
                    Date :
                    <input type="text" id="s_date" name="s_date" class="form-control" value="<?php echo $s_date; ?>">
                </th>
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
                    <input type="text" id="s_emp_id" name="s_emp_id" class="form-control" value="<?php echo $s_emp_id; ?>">
                </th>
            </tr>
            <tr>
                <th class="border-0">
                    Employee Name :
                    <input type="text" id="s_emp_name" name="s_emp_name" class="form-control" value="<?php echo $s_emp_name; ?>">
                </th>
                <th class="border-0">
                    Hired Date :
                    <input type="text" id="s_hired_date" name="s_hired_date" class="form-control" value="<?php echo $s_hired_date; ?>">
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
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0 text-end">
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Search_Self_Evaluation_Record();">Search</button>
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Clear_Search_Self_Evaluation_Record();">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid text-end">
    <a href="<?php echo base_url('index.php/hr_controller/SelfEvaluationForm') ?>" class="btn btn-primary btn_color_df" style="width: 200px !important;">Self-Evaluation Form</a>
</div>
<?php foreach ($self_evaluation_hr as $self_evaluation_hrs) {
    if (count($self_evaluation_hr) != 0) {
        $check_count = 1;
    } else {
        $check_count = 0;
    }
} ?>
<?php if ($check_count == 1) { ?>
    <div class="container mt-3">
        <table class="table table-form">
            <tr>
                <th class="border topic-background mit">#</th>
                <th class="border topic-background mit">Date</th>
                <th class="border topic-background mit">Year Submit</th>
                <th class="border topic-background mit">Employee ID</th>
                <th class="border topic-background mit">Employee Name</th>
                <th class="border topic-background mit">Hired Date</th>
                <th class="border topic-background mit">Status</th>
                <th class="border topic-background mit">PDF</th>
                <th class="border topic-background mit">Delete</th>
            </tr>
            <?php foreach ($self_evaluation_hr as $self_evaluation_hrs) { ?>
                <tr>
                    <td class="border mit td_border">
                        <?php if ($self_evaluation_hrs->self_evaluation_status == "Submit") { ?>
                            <a href="<?php echo base_url('index.php/hr_controller/FormStaticSelfEvaluation/') ?><?php echo $self_evaluation_hrs->id ?>">Self-Evaluation<?php echo $self_evaluation_hrs->year_submit ?></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('index.php/hr_controller/SelfEvaluationForm/?id=') ?><?php echo $self_evaluation_hrs->id ?>">Self-Evaluation<?php echo $self_evaluation_hrs->year_submit ?></a>
                        <?php } ?>
                    </td>
                    <td class="border mit td_border"><?php echo $self_evaluation_hrs->date_submit ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_hrs->year_submit ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_hrs->emp_id ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_hrs->emp_name ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_hrs->hired_date ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_hrs->self_evaluation_status ?></td>
                    <td class="border mit td_border">
                        <?php if ($self_evaluation_hrs->self_evaluation_status == "Draft") {
                            echo "Draft";
                        } else { ?>
                            <a href="<?php echo base_url('index.php/hr_controller/PrintPDFSelfEvaluation/') ?><?php echo $self_evaluation_hrs->id ?>">Download</a>
                        <?php } ?>
                    </td>
                    <td class="border mit td_border">
                        <a href="<?php echo base_url('index.php/delete_controller/Delete_Self_Evaluation/') ?><?php echo $self_evaluation_hrs->id ?>"><img src="<?php echo base_url('/img/delete.png') ?>" alt="" width="30px"></a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } else { ?>
    <div class="container-fluid mt-3 mb-3 display-5 text-center">
        No Self-Evaluation Record !!!
    </div>
<?php } ?>