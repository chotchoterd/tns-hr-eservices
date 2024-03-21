<?php
include "checkAdmin.php";
include "scriptManageAdmin.php";
$update_indicator = 0;
$a = 0;
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
    <table class="table table-form border">
        <tr>
            <th colspan="4" class="topic-background mit border h1">Manage Admin</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Employee ID</th>
            <th class="border topic-background mit">HR Status</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <tr>
            <?php foreach ($manage_admin_id as $manage_admin_ids) {
                if (count($manage_admin_id) != 0) {
                    $update_indicator = 1;
                } else {
                    $update_indicator = 0;
                }
            } ?>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $manage_admin_ids->id ?>">
                    <input id="up_emp_id" name="up_emp_id" type="text" class="form-control" placeholder="Please fill in Employee ID !" value="<?php echo $manage_admin_ids->emp_id; ?>">
                    <div class="mt-1 font-eigth red" id="up_alert_emp_id" style="display: none;">Please fill in Employee ID !</div>
                    <div class="mt-1 font-eigth red" id="up_alert_update_unsuccessfully" style="display: none;">Due to Employee ID existing already or Employee ID doesn't in employee data !</div>
                <?php } else { ?>
                    <input id="emp_id" name="emp_id" type="text" class="form-control" placeholder="Please fill in Employee ID !">
                    <div class="mt-1 font-eigth red" id="alert_emp_id" style="display: none;">Please fill in Employee ID !</div>
                    <div class="mt-1 font-eigth red" id="alert_update_unsuccessfully" style="display: none;">Due to Employee ID existing already or Employee ID doesn't in employee data !</div>
                <?php } ?>
            </td>
            <td class="border mit td_border">
                Admin
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select" aria-label="Default select example">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($manage_admin_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($manage_admin_ids->status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select" aria-label="Default select example">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_status" style="display: none;">Please select status !</div>
                <?php } ?>
            </td>
            <td class="border mit td_border">
                <?php if ($update_indicator == 1) { ?>
                    <button class="btn btn-primary btn_color_df" id="update_hr" name="update_hr">Update</button>
                <?php } else { ?>
                    <button class="btn btn-primary btn_color_df" id="add_hr" name="add_hr">Add</button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search Admin</legend>
        <table class="table table-form border-0">
            <tr>
                <th class="border-0">
                    Employee ID :
                    <input type="text" class="form-control" id="s_emp_id" name="s_emp_id" value="<?php echo $s_emp_id; ?>">
                </th>
                <th class="border-0">
                    Employee Name :
                    <input type="text" class="form-control" id="s_emp_name" name="s_emp_name" value="<?php echo $s_emp_name; ?>">
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
                <td class="border-0"></td>
                <td class="border-0"></td>
                <td class="border-0 text-end">
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Search_Admin();">Search</button>
                    <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Clear_Search_Admin();">clear</button>
                </td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">#</th>
            <th class="topic-background mit border">Employee ID</th>
            <th class="topic-background mit border">Employee Name</th>
            <th class="topic-background mit border">HR Status</th>
            <th class="topic-background mit border">Status</th>
            <th class="topic-background mit border">Action</th>
        </tr>
        <?php foreach ($admin_record as $admin_records) {
            $a++; ?>
            <tr>
                <td class="border mit"><?php echo $a; ?></td>
                <td class="border mit"><?php echo $admin_records->emp_id; ?></td>
                <td class="border mit"><?php echo $admin_records->name_hr; ?></td>
                <td class="border mit"><?php if ($admin_records->admin_code == 1) echo "Admin"; ?></td>
                <td class="border mit">
                    <?php if ($admin_records->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/hr_controller/ManageAdmin/?id='); ?><?php echo $admin_records->id; ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>