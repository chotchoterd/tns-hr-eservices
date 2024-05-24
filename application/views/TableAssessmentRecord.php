<?php
include "scriptTableAssessmentRecord.php";
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
                <th class="border-0">
                    Date :
                    <input type="text" id="s_date" name="s_date" class="form-control" value="">
                </th>
                <th class="border-0">
                    Year Submit :
                    <select name="s_year" id="s_year" class="form-select" aria-label="Default select example">
                        <?php
                        $current_year = date('Y');
                        for ($i = $current_year - 5; $i < $current_year + 5; $i++) { ?>
                            <option value="<?php echo $i ?>" <?php if ($i == $current_year) echo "selected"; ?> class="mit"><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                </th>
                <th class="border-0">
                    Employee ID :
                    <input type="text" id="s_emp_id" name="s_emp_id" class="form-control" value="">
                </th>
            </tr>
            <tr>
                <th class="border-0">
                    Employee Name :
                    <input type="text" id="s_emp_name" name="s_emp_name" class="form-control" value="">
                </th>
                <th class="border-0">
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="Submit">Submit</option>
                        <option value="Draft">Draft</option>
                    </select>
                </th>
                <th class="border-0 text-end align-bottom">
                    <button class="btn btn-primary btn_color_df" style="width: 100px;">Search</button>
                    <button class="btn btn-primary btn_color_df" style="width: 100px;">Clear</button>
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
            <th class="border topic-background mit">Date</th>
            <th class="border topic-background mit">Year Assessment</th>
            <th class="border topic-background mit">Status</th>
        </tr>
        <?php foreach ($subordinate_emp as $subordinate_emps) { ?>
            <tr>
                <td class="border mit-v td_border">
                    <?php if ($subordinate_emps->emp_grade == "G4" || $subordinate_emps->emp_grade == "G5" || $subordinate_emps->emp_grade == "G6") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateG4G6/?emp_id=') ?><?php echo $subordinate_emps->emp_id ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } else if ($subordinate_emps->emp_grade == "G1" || $subordinate_emps->emp_grade == "G2" || $subordinate_emps->emp_grade == "G3") { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateG2G3/?emp_id=') ?><?php echo $subordinate_emps->emp_id ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('index.php/bonus_controller/FormBonusAnnualEvaluateForemanAndbelow/?emp_id=') ?><?php echo $subordinate_emps->emp_id ?>"><?php echo $subordinate_emps->emp_name; ?></a>
                    <?php } ?>
                </td>
                <td class="border mit td_border">
                    <?php echo $subordinate_emps->emp_grade; ?>
                </td>
                <td class="border mit td_border">
                    <?php echo $subordinate_emps->emp_id; ?>
                </td>
                <td class="border mit td_border">
                    N/A
                </td>
                <td class="border mit td_border">
                    <?php echo date('Y'); ?>
                </td>
                <td class="border mit td_border">
                    Draft/Completed/N/A
                </td>
            </tr>
        <?php } ?>
    </table>
</div>