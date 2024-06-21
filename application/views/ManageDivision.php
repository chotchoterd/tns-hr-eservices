<?php
$n = 0;
$update_indicator = 0;
$check_indicator = 0;
include "scriptManageDivision.php";
include "checkAdmin.php";
if (isset($_GET['s_division'])) {
    $s_division = $_GET['s_division'];
} else {
    $s_division = "";
}
if (isset($_GET['s_year'])) {
    $s_year = $_GET['s_year'];
} else {
    $s_year = date('Y');
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = "";
}
?>
<div class="container-fluid mt-3">
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOptionIsSubtopic'); ?>" class="btn btn-primary btn_color_df" style="width: 250px !important;">Manage Item-Option is Subtopic</a>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">Copy Division From</th>
            <th class="topic-background mit border">
                <select name="year_from" id="year_from" class="form-select">
                    <?php
                    $current_year = date('Y');
                    for ($f = $current_year - 5; $f < $current_year + 5; $f++) { ?>
                        <option value="<?php echo $f ?>" <?php if ($f == $current_year - 1) echo "selected"; ?>><?php echo $f ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="topic-background mit border">To</th>
            <th class="topic-background mit border">
                <select name="year_to" id="year_to" class="form-select">
                    <?php
                    $current_year = date('Y');
                    for ($f = $current_year - 5; $f < $current_year + 5; $f++) { ?>
                        <option value="<?php echo $f ?>" <?php if ($f == $current_year) echo "selected"; ?>><?php echo $f ?></option>
                    <?php } ?>
                </select>
            </th>
            <td class="topic-background mit border">
                <button class="btn btn-primary btn_color_df" id="btn_copy">Copy</button>
                <div class="mt-1 font-eigth red" id="alert_copy" style="display: none;">Copy unsuccessfully due to Year From equal Year To</div>
            </td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <?php
    foreach ($division_data_id as $division_data_ids) {
        if (count($division_data_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <?php foreach ($edit_data_check as $edit_data_checks) {
        if (count($edit_data_check) != 0) {
            $check_indicator = 1;
        } else {
            $check_indicator = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th colspan="4" class="topic-background mit border h1">Manage Division</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit">Division</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_year" id="up_year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option class="mit" value="<?php echo $y; ?>" <?php if ($y == $division_data_ids->year) echo "selected"; ?>><?php echo $y; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="year" id="year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option class="mit" value="<?php echo $y; ?>" <?php if ($y == $current_year) echo "selected"; ?>><?php echo $y; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $division_data_ids->id ?>">
                    <input id="up_division" name="up_division" type="text" class="form-control" placeholder="Please fill in Division !" value="<?php echo $division_data_ids->division ?>">
                    <div class="mt-1 font-eigth red" id="alert_division" style="display: none;">Please fill in Division !</div>
                <?php } else { ?>
                    <input id="division" name="division" type="text" class="form-control" placeholder="Please fill in Division !">
                    <div class="mt-1 font-eigth red" id="alert_division" style="display: none;">Please fill in Division !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <option value="1" <?php if ($division_data_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($division_data_ids->status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_status" style="display: none;">Please select Status !</div>
                <?php } ?>
            </td>
            <td class="border mit td_border">
                <?php if ($update_indicator == 1) { ?>
                    <button class="btn btn-primary btn_color_df" id="update">Update</button>
                <?php } else { ?>
                    <button class="btn btn-primary btn_color_df" id="submit">Add</button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search Division</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0" style="width: 300px;">
                Division :
                <input type="text" class="form-control" id="s_division" name="s_division" value="<?php echo $s_division ?>">
            </th>
            <th class="border-0" style="width: 300px;">
                Year :
                <select name="s_year" id="s_year" class="form-select">
                    <?php
                    $current_year = date('Y');
                    for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                        <option class="mit" value="<?php echo $y; ?>" <?php if ($y == $s_year) echo "selected"; ?>><?php echo $y; ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Status :
                <select name="s_status" id="s_status" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <option value="1" <?php if ($s_status == "1") echo "selected"; ?>>Active</option>
                    <option value="0" <?php if ($s_status == "0") echo "selected"; ?>>Inactive</option>
                </select>
            </th>
        </tr>
        <tr>
            <th class="border-0"></th>
            <th class="border-0"></th>
            <th class="border-0 text-end">
                <button class="btn btn-primary btn_color_df" onclick="Search_division();">Search</button>
                <button class="btn btn-primary btn_color_df" onclick="Clear_Search_division();">Clear</button>
            </th>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">#</th>
            <th class="topic-background mit border">Division</th>
            <th class="topic-background mit border">Year</th>
            <th class="topic-background mit border">Status</th>
            <th class="topic-background mit border">Action</th>
        </tr>
        <?php foreach ($division_data as $division_datas) {
            $n++
        ?>
            <tr>
                <td class="border mit"><?php echo $n; ?>.</td>
                <td class="border">
                    <?php echo $division_datas->division ?>
                </td>
                <td class="border mit">
                    <?php echo $division_datas->year ?>
                </td>
                <td class="border mit">
                    <?php if ($division_datas->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <?php if ($check_indicator == 1) {
                        echo "Not Allow";
                    } else { ?>
                        <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageDivision/?id=') ?><?php echo $division_datas->id ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>