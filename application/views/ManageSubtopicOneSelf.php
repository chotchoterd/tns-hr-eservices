<?php
include "scriptManageSubtopicOneSelf.php";
include "checkAdmin.php";
$i = 0;
$update_indicator = 0;
if (isset($_GET['s_main_topic'])) {
    $s_main_topic = $_GET['s_main_topic'];
} else {
    $s_main_topic = '';
}
if (isset($_GET['s_sub_topic'])) {
    $s_sub_topic = $_GET['s_sub_topic'];
} else {
    $s_sub_topic = '';
}
if (isset($_GET['s_sub_topic_details'])) {
    $s_sub_topic_details = $_GET['s_sub_topic_details'];
} else {
    $s_sub_topic_details = '';
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
            <th class="topic-background mit border">Copy Subtopics of the Main Topic From</th>
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
<div class="container-fluid mt-3">
    <?php foreach ($sub_topic_self_id as $sub_topic_self_ids) {
        if (count($sub_topic_self_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th colspan="6" class="topic-background mit border h1">Manage Subtopics of the Main Topic Self-Evaluation</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit" style="width: 200px;">Main Topic</th>
            <th class="border topic-background mit" style="width: 200px;">Sub-Topic</th>
            <th class="border topic-background mit">Sub-Topic Details</th>
            <th class="border topic-background mit" style="width: 150px;">Status</th>
            <th class="border topic-background mit" style="width: 150px;">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_year" id="up_year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option class="mit" value="<?php echo $y; ?>" <?php if ($y == $sub_topic_self_ids->year) echo "selected"; ?>><?php echo $y; ?></option>
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
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $sub_topic_self_ids->id ?>">
                    <select name="up_main_topic" id="up_main_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                            <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($sub_topic_self_ids->main_topic == $main_topic_status_1s->main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                        <?php } ?>
                    </select>
                    <div class="mt-1 font-eigth red" id="up_alert_main_topic" style="display: none;">Please fill in Main Topic !</div>
                <?php } else { ?>
                    <select name="main_topic" id="main_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                            <option value="<?php echo $main_topic_status_1s->main_topic ?>"><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                        <?php } ?>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_main_topic" style="display: none;">Please fill in Main Topic !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <input id="up_sub_topic" name="up_sub_topic" type="number" min="0" class="form-control" placeholder="Please fill in Sub-Topic !" value="<?php echo $sub_topic_self_ids->sub_topic; ?>">
                    <div class="mt-1 font-eigth red" id="up_alert_sub_topic" style="display: none;">Please fill in Sub-Topic !</div>
                    <div class="mt-1 font-eigth red" id="up_alert_Due_Sub_Topic" style="display: none;">Due to Sub-Topic existing already !</div>
                <?php } else { ?>
                    <input id="sub_topic" name="sub_topic" type="number" min="0" class="form-control" placeholder="Please fill in Sub-Topic !">
                    <div class="mt-1 font-eigth red" id="alert_sub_topic" style="display: none;">Please fill in Sub-Topic !</div>
                    <div class="mt-1 font-eigth red" id="alert_Due_Sub_Topic" style="display: none;">Due to Sub-Topic existing already !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea name="up_sub_item_details" id="up_sub_item_details" class="form-control h-textarea" style="height: 100px;"><?php echo $sub_topic_self_ids->sub_topic_text; ?></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Sub-Topic Details
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="up_alert_Sub_Topic_Details" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic Details !</div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea name="sub_item_details" id="sub_item_details" class="form-control h-textarea" style="height: 100px;"></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Sub-Topic Details
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_Sub_Topic_Details" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic Details !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <option value="1" <?php if ($sub_topic_self_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($sub_topic_self_ids->status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_status" style="display: none;">Please select Status !</div>
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
        <legend class="mx-2 mt-2 h2">Search Subtopics of the Main Topic Self-Evaluation</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0">
                Main Topic :
                <select name="s_main_topic" id="s_main_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                        <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($s_main_topic == $main_topic_status_1s->main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0">
                Sub-Topic :
                <input type="number" id="s_sub_topic" name="s_sub_topic" class="form-control" value="<?php echo $s_sub_topic; ?>">
            </th>
            <th class="border-0">
                Year :
                <select name="s_year" id="s_year" class="form-select">
                    <?php
                    $current_year = date('Y');
                    for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                        <option value="<?php echo $y; ?>" <?php if ($y == $s_year) echo "selected"; ?>><?php echo $y; ?></option>
                    <?php } ?>
                </select>
            </th>
        </tr>
        <tr>
            <th class="border-0">
                Sub-Topic Details :
                <input type="text" id="s_sub_topic_details" name="s_sub_topic_details" class="form-control" value="<?php echo $s_sub_topic_details; ?>">
            </th>
            <th class="border-0">
                Status :
                <select name="s_status" id="s_status" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <option value="1" <?php if ($s_status == "1") echo "selected"; ?>>Active</option>
                    <option value="0" <?php if ($s_status == "0") echo "selected"; ?>>Inactive</option>
                </select>
            </th>
            <th class="border-0 text-end align-bottom">
                <button class="btn btn-primary btn_color_df" onclick="Search_Subtopics_Main_Topic();">Search</button>
                <button class="btn btn-primary btn_color_df" onclick="Clear_Search_Subtopics_Main_Topic();">Clear</button>
            </th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">#</th>
            <th class="topic-background mit border">Main Topic</th>
            <th class="topic-background mit border">Sub-Topic</th>
            <th class="topic-background mit border">Sub-Topic Details</th>
            <th class="topic-background mit border">Year</th>
            <th class="topic-background mit border">Status</th>
            <th class="topic-background mit border">Action</th>
        </tr>
        <?php foreach ($sub_topic_self_data as $sub_topic_self_datas) :
            $i++; ?>
            <tr>
                <td class="border mit"><?php echo $i; ?>.</td>
                <td class="border mit-v"><?php echo $sub_topic_self_datas->main_topic . ". " . $sub_topic_self_datas->main_text; ?></td>
                <td class="border mit"><?php echo $sub_topic_self_datas->sub_topic; ?></td>
                <td class="border mit-v"><?php echo $sub_topic_self_datas->sub_topic_text; ?></td>
                <td class="border mit"><?php echo $sub_topic_self_datas->year; ?></td>
                <td class="border mit">
                    <?php if ($sub_topic_self_datas->status == "1") {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicOneSelf/?id=') ?><?php echo $sub_topic_self_datas->id; ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>