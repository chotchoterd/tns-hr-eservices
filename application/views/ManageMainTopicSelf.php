<?php
include "scriptManageMainTopicSelf.php";
include "checkAdmin.php";
$i = 0;
$update_indicator = 0;
if (isset($_GET['s_main_topic'])) {
    $s_main_topic = $_GET['s_main_topic'];
} else {
    $s_main_topic = '';
}
if (isset($_GET['s_topic'])) {
    $s_topic = $_GET['s_topic'];
} else {
    $s_topic = '';
}
if (isset($_GET['s_year'])) {
    $s_year = $_GET['s_year'];
} else {
    $s_year = date('Y');
}
if (isset($_GET['s_status'])) {
    $s_status = $_GET['s_status'];
} else {
    $s_status = '';
}
?>
<div class="container-fluid mt-3">
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/PageSelfEvaluationManage'); ?>" class="btn btn-primary btn_color_df" style="width: 300px !important;">Manage Topic & Sub-Item Self-Evaluation</a>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">Copy Main Topic From</th>
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
    <?php foreach ($main_topic_data_id as $main_topic_data_ids) {
        if (count($main_topic_data_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th colspan="5" class="topic-background mit border h1">Manage Main Topic Self-Evaluation</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit" style="width: 150px;">Main Topic</th>
            <th class="border topic-background mit">Topic</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_year" id="up_year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($q = $current_year - 5; $q < $current_year + 5; $q++) { ?>
                            <option class="mit" value="<?php echo $q; ?>" <?php if ($q == $main_topic_data_ids->year) echo "selected"; ?>><?php echo $q; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="year" id="year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($q = $current_year - 5; $q < $current_year + 5; $q++) { ?>
                            <option class="mit" value="<?php echo $q; ?>" <?php if ($q == $current_year) echo "selected"; ?>><?php echo $q; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $main_topic_data_ids->id; ?>">
                    <input type="number" min="0" name="up_main_topic" id="up_main_topic" class="form-control" placeholder="Please fill in Main Topic !" value="<?php echo $main_topic_data_ids->main_topic; ?>">
                    <div id="up_alert_main_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Main Topic !</div>
                    <div id="up_alert_due_main_topic" class="mt-1 font-eigth red" style="display: none;">Due to Main Topic existing already !</div>
                <?php } else { ?>
                    <input type="number" min="0" name="main_topic" id="main_topic" class="form-control" placeholder="Please fill in Main Topic !">
                    <div id="alert_main_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Main Topic !</div>
                    <div id="alert_due_main_topic" class="mt-1 font-eigth red" style="display: none;">Due to Main Topic existing already !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea name="up_topic" id="up_topic" class="form-control h-textarea" style="height: 100px;"><?php echo $main_topic_data_ids->topic; ?></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Topic
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="up_alert_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Topic !</div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea name="topic" id="topic" class="form-control h-textarea" style="height: 100px;"></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Topic
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Topic !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <option value="1" <?php if ($main_topic_data_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($main_topic_data_ids->status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div id="alert_status" class="mt-1 font-eigth red" style="display: none;">Please select status !</div>
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
        <legend class="mx-2 mt-2 h2">Search Main Topic Self-Evaluation</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0">
                Main Topic :
                <input type="text" class="form-control" id="s_main_topic" name="s_main_topic" value="<?php echo $s_main_topic; ?>">
            </th>
            <th class="border-0">
                Topic :
                <input type="text" class="form-control" id="s_topic" name="s_topic" value="<?php echo $s_topic; ?>">
            </th>
            <th class="border-0">
                Year :
                <select name="s_year" id="s_year" class="form-select">
                    <?php
                    $current_year = date('Y');
                    for ($q = $current_year - 5; $q < $current_year + 5; $q++) { ?>
                        <option value="<?php echo $q; ?>" <?php if ($s_year == $q) echo "selected"; ?>><?php echo $q; ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0">
                Status :
                <select name="s_status" id="s_status" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <option value="1" <?php if ($s_status == "1") echo "selected"; ?>>Active</option>
                    <option value="0" <?php if ($s_status == "0") echo "selected"; ?>>Inactive</option>
                </select>
            </th>
        </tr>
        <tr>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0"></td>
            <td class="border-0 text-end">
                <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Search_Main_Topic();">Search</button>
                <button class="btn btn-primary btn_color_df" style="width: 100px;" onclick="Clear_Search_Main_Topic();">Clear</button>
            </td>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">#</th>
            <th class="topic-background mit border">Main Topic</th>
            <th class="topic-background mit border">Topic</th>
            <th class="topic-background mit border">Year</th>
            <th class="topic-background mit border">Status</th>
            <th class="topic-background mit border">Action</th>
        </tr>
        <?php foreach ($main_topic_data as $main_topic_datas) :
            $i++ ?>
            <tr>
                <td class="border mit"><?php echo $i; ?>.</td>
                <td class="border mit"><?php echo $main_topic_datas->main_topic; ?></td>
                <td class="border"><?php echo $main_topic_datas->topic; ?></td>
                <td class="border mit"><?php echo $main_topic_datas->year; ?></td>
                <td class="border mit">
                    <?php if ($main_topic_datas->status == "1") {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageMainTopicSelf/?id='); ?><?php echo $main_topic_datas->id; ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>