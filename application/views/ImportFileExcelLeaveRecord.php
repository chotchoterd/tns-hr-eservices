<?php
include "scriptImportFileExcelLeaveRecord.php";
include "checkAdmin.php";
$current_year = date('Y');
$a = 0;
if (isset($_GET['s_emp_id'])) {
    $s_emp_id = $_GET['s_emp_id'];
} else {
    $s_emp_id = "";
}
// if (isset($_GET['s_year'])) {
//     $s_year = $_GET['s_year'];
// } else {
//     $s_year = date("Y");
// }
if (isset($_GET['s_business_leave'])) {
    $s_business_leave = $_GET['s_business_leave'];
} else {
    $s_business_leave = "";
}
if (isset($_GET['s_sick_leave'])) {
    $s_sick_leave = $_GET['s_sick_leave'];
} else {
    $s_sick_leave = "";
}
if (isset($_GET['s_absenteeism'])) {
    $s_absenteeism = $_GET['s_absenteeism'];
} else {
    $s_absenteeism = "";
}
if (isset($_GET['s_late'])) {
    $s_late = $_GET['s_late'];
} else {
    $s_late = "";
}
?>
<div class="container mt-3">
    <form id="import_form_leave_record" method="POST" enctype="multipart/form-data">
        <table class="table table-form border">
            <tr>
                <th colspan="2" class="topic-background mit border h1">Import File Excel Import Leave & Punishment Record</th>
            </tr>
            <tr>
                <td class="td_border border">
                    <input type="file" name="file_leave" id="file_leave" required accept=".xls, .xlsx" class="form-control">
                    <div class="mt-1 font-eigth red" id="alert_file_excel" style="display: none;">Please fill in file excel !</div>
                    <div class="mt-1 text-end">
                        <a href="<?php echo base_url('/img/Import_Leave_Record.xlsx') ?>">Download Format Excel.</a>
                    </div>
                </td>
                <td class="td_border border mit">
                    <input type="submit" class="btn btn-primary btn_color_df" value="Import" id="import_leave" name="import_leave" style="width: 100px;">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search Leave Record</legend>
        <table class="table table-form border-0">
            <tr>
                <th class="border-0">
                    Employee ID :
                    <input type="text" class="form-control" id="s_emp_id" name="s_emp_id" value="<?php echo $s_emp_id; ?>">
                </th>
                <th class="border-0">
                    Sick leave :
                    <input type="text" class="form-control" id="s_sick_leave" name="s_sick_leave" value="<?php echo $s_sick_leave; ?>">
                </th>
                <th class="border-0">
                    Business leave :
                    <input type="text" class="form-control" id="s_business_leave" name="s_business_leave" value="<?php echo $s_business_leave; ?>">
                </th>
                <th class="border-0">
                    Absenteeism :
                    <input type="text" class="form-control" id="s_absenteeism" name="s_absenteeism" value="<?php echo $s_absenteeism; ?>">
                </th>
            </tr>
            <tr>
                <th class="border-0">
                    Late :
                    <input type="text" class="form-control" id="s_late" name="s_late" value="<?php echo $s_late; ?>">
                </th>
                <th class="border-0">

                </th>
                <th class="border-0"></th>
                <td class="border-0 text-center align-bottom">
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Search_Leave_Record();">Search</button>
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Clear_Search_Leave_Record();">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border" rowspan="2">#</th>
            <th class="topic-background mit border" rowspan="2">Employee ID</th>
            <th class="topic-background mit border" rowspan="2">Created Date</th>
            <th class="topic-background mit border" colspan="4">From 1 Sep [YYYY] to 31 Dec [YYYY]</th>
            <th class="topic-background mit border" colspan="4">From 1 Jan [YYYY] to 31 Aug [YYYY]</th>
            <th class="topic-background mit border" rowspan="2">Verbal Warning</th>
            <th class="topic-background mit border" rowspan="2">Letter warning</th>
        </tr>
        <tr>
            <th class="topic-background mit border">Business leave</th>
            <th class="topic-background mit border">Sick leave</th>
            <th class="topic-background mit border">Absenteeism</th>
            <th class="topic-background mit border">Late</th>
            <th class="topic-background mit border">Business leave</th>
            <th class="topic-background mit border">Sick leave</th>
            <th class="topic-background mit border">Absenteeism</th>
            <th class="topic-background mit border">Late</th>
        </tr>
        <?php foreach ($emp_hr_import_leave as $emp_hr_import_leaves) {
            $a++; ?>
            <tr>
                <td class="border mit"><?php echo $a; ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->emp_id ?></td>
                <td class="border mit">
                    <?php echo $emp_hr_import_leaves->created_date ?>
                </td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->business_leave1 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->sick_leave1 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->absenteeism1 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->late1 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->business_leave2 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->sick_leave2 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->absenteeism2 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->late2 ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->verbal_warning ?></td>
                <td class="border mit"><?php echo $emp_hr_import_leaves->letter_warning ?></td>
            </tr>
        <?php } ?>
    </table>
</div>