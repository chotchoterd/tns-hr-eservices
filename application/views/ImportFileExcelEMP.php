<?php
$i = 0;
include 'scriptImportFileExcelEMP.php';
include "checkAdmin.php";
if (isset($_GET['s_emp_id'])) {
    $s_emp_id = $_GET['s_emp_id'];
} else {
    $s_emp_id = "";
}
if (isset($_GET['s_emp_name'])) {
    $s_emp_name = $_GET['s_emp_name'];
} else {
    $s_emp_name = "";
}
if (isset($_GET['s_emp_grade'])) {
    $s_emp_grade = $_GET['s_emp_grade'];
} else {
    $s_emp_grade = "";
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
if (isset($_GET['s_emp_section'])) {
    $s_emp_section = $_GET['s_emp_section'];
} else {
    $s_emp_section = "";
}
if (isset($_GET['s_emp_division'])) {
    $s_emp_division = $_GET['s_emp_division'];
} else {
    $s_emp_division = "";
}
if (isset($_GET['s_superior_name'])) {
    $s_superior_name = $_GET['s_superior_name'];
} else {
    $s_superior_name = "";
}
if (isset($_GET['s_superior_grade'])) {
    $s_superior_grade = $_GET['s_superior_grade'];
} else {
    $s_superior_grade = "";
}
?>
<div class="container mt-3">
    <form id="import_form" method="POST" enctype="multipart/form-data">
        <table class="table table-form border">
            <tr>
                <th colspan="2" class="topic-background mit border h1">Import File Excel Employee</th>
            </tr>
            <tr>
                <td class="td_border border">
                    <input type="file" name="file" id="file" required accept=".xls, .xlsx" class="form-control">
                    <div class="mt-1 font-eigth red" id="alert_file_excel" style="display: none;">Please fill in file excel !</div>
                    <div class="mt-1 font-eigth red" id="alert_file_excel_fields" style="display: none;">The excel file has fields that were not filled in !</div>
                    <div class="mt-1 text-end">
                        <a href="<?php echo base_url('/img/Import_employee.xlsx') ?>">Download Format Excel.</a>
                    </div>
                </td>
                <td class="td_border border mit">
                    <input type="submit" name="import" id="import" class="btn btn-primary btn_color_df" style="width: 100px;" value="Import">
                </td>
            </tr>
        </table>
    </form>
</div>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search Employee</legend>
        <table class="table table-form border-0">
            <tr>
                <th class="border-0">
                    Employee ID :
                    <input type="text" class="form-control" id="s_emp_id" value="<?php echo $s_emp_id ?>">
                </th>
                <th class="border-0">
                    Employee name :
                    <input type="text" class="form-control" id="s_emp_name" value="<?php echo $s_emp_name ?>">
                </th>
                <th class="border-0">
                    Employee Grade :
                    <input type="text" class="form-control" id="s_emp_grade" value="<?php echo $s_emp_grade ?>">
                </th>
                <th class="border-0">
                    Status :
                    <select name="s_status" id="s_status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($s_status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($s_status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                </th>
            </tr>
            <tr>
                <th class="border-0">
                    Section :
                    <input type="text" class="form-control" id="s_emp_section" value="<?php echo $s_emp_section ?>">
                </th>
                <th class="border-0">
                    Division :
                    <input type="text" class="form-control" id="s_emp_division" value="<?php echo $s_emp_division ?>">
                </th>
                <th class="border-0">
                    Superior name :
                    <input type="text" class="form-control" id="s_superior_name" value="<?php echo $s_superior_name ?>">
                </th>
                <th class="border-0">
                    Superior Grade :
                    <input type="text" class="form-control" id="s_superior_grade" value="<?php echo $s_superior_grade ?>">
                </th>
            </tr>
            <tr>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0 text-end">
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Search_Employee()">Search</button>
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Clear_Search_Employee()">Clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">#</th>
            <th class="topic-background mit border">Employee ID</th>
            <th class="topic-background mit border">Employee name</th>
            <th class="topic-background mit border">Employee Grade</th>
            <th class="topic-background mit border">Hired date</th>
            <th class="topic-background mit border">Section</th>
            <th class="topic-background mit border">Division</th>
            <th class="topic-background mit border">Superior name</th>
            <th class="topic-background mit border">Superior Grade</th>
            <th class="topic-background mit border">Status</th>
        </tr>
        <?php foreach ($emp_hr_import_page as $emp_hr_import_pages) {
            $i++; ?>
            <tr>
                <td class="border">
                    <?php echo $i; ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->emp_id; ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->emp_name; ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->emp_grade; ?>
                </td>
                <td class="border">
                    <?php
                    $date_format = DateTime::createFromFormat('d/m/Y', $emp_hr_import_pages->emp_hired_date)->format('d-M-Y');
                    echo $date_format;
                    // echo $emp_hr_import_pages->emp_hired_date;
                    ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->emp_section; ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->emp_division; ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->superior_name; ?>
                </td>
                <td class="border">
                    <?php echo $emp_hr_import_pages->superior_grade; ?>
                </td>
                <td class="border">
                    <?php
                    if ($emp_hr_import_pages->status == "1") {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    }
                    ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>