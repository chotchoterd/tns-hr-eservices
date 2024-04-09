<?php
$n = 0;
$update_indicator = 0;
include "scriptManageItemOptionIsSubtopic.php";
if (isset($_GET['s_main_topic'])) {
    $s_main_topic = $_GET['s_main_topic'];
} else {
    $s_main_topic = "";
}
if (isset($_GET['s_sub_topic'])) {
    $s_sub_topic = $_GET['s_sub_topic'];
} else {
    $s_sub_topic = "";
}
if (isset($_GET['s_sub_in_sub'])) {
    $s_sub_in_sub = $_GET['s_sub_in_sub'];
} else {
    $s_sub_in_sub = "";
}
if (isset($_GET['s_sub_in_sub_details'])) {
    $s_sub_in_sub_details = $_GET['s_sub_in_sub_details'];
} else {
    $s_sub_in_sub_details = "";
}
if (isset($_GET['s_division'])) {
    $s_division = $_GET['s_division'];
} else {
    $s_division = "";
}
if (isset($_GET['s_sub_division'])) {
    $s_sub_division = $_GET['s_sub_division'];
} else {
    $s_sub_division = "";
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
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/PageSelfEvaluationManage'); ?>" class="btn btn-primary btn_color_df" style="width: 300px !important;">Manage Topic & Sub-Item Self-Evaluation</a>
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageDivision'); ?>" class="btn btn-primary btn_color_df" style="width: 150px !important;">Manage Division</a>
</div>
<div class="container-fluid mt-3">
    <?php foreach ($item_is_sub_in_sub_id as $item_is_sub_in_sub_ids) {
        if (count($item_is_sub_in_sub_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th colspan="9" class="topic-background mit border h1">Manage Item-Option is Subtopic</th>
        </tr>
        <tr>
            <th class="border topic-background mit" style="width: 120px;">Main Topic</th>
            <th class="border topic-background mit" style="width: 120px;">Sub-Topic</th>
            <th class="border topic-background mit" style="width: 120px;">Sub-Topic in Sub-Topic</th>
            <th class="border topic-background mit">Sub-Topic in Sub-Topic Details</th>
            <th class="border topic-background mit" style="width: 120px;">Division</th>
            <th class="border topic-background mit">Sub Division</th>
            <th class="border topic-background mit" style="width: 120px;">Year</th>
            <th class="border topic-background mit" style="width: 120px;">Status</th>
            <th class="border topic-background mit" style="width: 120px;">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" id="up_id" name="up_id" value="<?php echo $item_is_sub_in_sub_ids->id ?>">
                    <select name="up_main_topic" id="up_main_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                            <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($main_topic_status_1s->main_topic == $item_is_sub_in_sub_ids->main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                        <?php } ?>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_main_topic" style="display: none;">Please fill in Main Topic !</div>
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
                    <select name="up_sub_topic" id="up_sub_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                            <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>" <?php if ($sub_topic_self_status_1s->sub_topic == $item_is_sub_in_sub_ids->sub_topic) echo "selected"; ?>><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
                        <?php } ?>
                    </select>
                    <div id="alert_sub_topic" class="mt-1 font-eigth red" style="display: none;">Please select Sub-Topic !</div>
                <?php } else { ?>
                    <select name="sub_topic" id="sub_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                            <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>"><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
                        <?php } ?>
                    </select>
                    <div id="alert_sub_topic" class="mt-1 font-eigth red" style="display: none;">Please select Sub-Topic !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_sub_in_sub" id="up_sub_in_sub" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($sub_in_sub_status_1 as $sub_in_sub_status_1s) { ?>
                            <option value="<?php echo $sub_in_sub_status_1s->subtopic_in_subtopic ?>" <?php if ($sub_in_sub_status_1s->subtopic_in_subtopic == $item_is_sub_in_sub_ids->subtopic_in_subtopic) echo "selected"; ?>><?php echo $sub_in_sub_status_1s->subtopic_in_subtopic . " " . $sub_in_sub_status_1s->subtopic_in_subtopic_text ?></option>
                        <?php } ?>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_sub_in_sub" style="display: none;">Please select Sub-Topic in Sub-Topic !</div>
                <?php } else { ?>
                    <select name="sub_in_sub" id="sub_in_sub" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($sub_in_sub_status_1 as $sub_in_sub_status_1s) { ?>
                            <option value="<?php echo $sub_in_sub_status_1s->subtopic_in_subtopic ?>"><?php echo $sub_in_sub_status_1s->subtopic_in_subtopic . " " . $sub_in_sub_status_1s->subtopic_in_subtopic_text ?></option>
                        <?php } ?>
                    </select>
                    <div class="mt-1 font-eigth red" id="alert_sub_in_sub" style="display: none;">Please select Sub-Topic in Sub-Topic !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div>
                        <textarea name="up_sub_in_sub_details" id="up_sub_in_sub_details" class="form-control h-textarea" style="height: 100px;"><?php echo $item_is_sub_in_sub_ids->subtopic_in_subtopic_text; ?></textarea>
                    </div>
                <?php } else { ?>
                    <div>
                        <textarea name="sub_in_sub_details" id="sub_in_sub_details" class="form-control h-textarea" style="height: 100px;"></textarea>
                    </div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_division" id="up_division" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($division_status_1 as $division_status_1s) { ?>
                            <option value="<?php echo $division_status_1s->division ?>" <?php if ($division_status_1s->division == $item_is_sub_in_sub_ids->division) echo "selected"; ?>><?php echo $division_status_1s->division ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="division" id="division" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($division_status_1 as $division_status_1s) { ?>
                            <option value="<?php echo $division_status_1s->division ?>"><?php echo $division_status_1s->division ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div>
                        <textarea name="up_sub_division" id="up_sub_division" class="form-control h-textarea" style="height: 100px;"><?php echo $item_is_sub_in_sub_ids->sub_division ?></textarea>
                    </div>
                <?php } else { ?>
                    <div>
                        <textarea name="sub_division" id="sub_division" class="form-control h-textarea" style="height: 100px;"></textarea>
                    </div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_year" id="up_year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option value="<?php echo $y; ?>" class="mit" <?php if ($y == $item_is_sub_in_sub_ids->year) echo "selected"; ?>><?php echo $y; ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="year" id="year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option value="<?php echo $y; ?>" class="mit" <?php if ($y == $current_year) echo "selected"; ?>><?php echo $y; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <option value="1" <?php if ($item_is_sub_in_sub_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($item_is_sub_in_sub_ids->status == "0") echo "selected"; ?>>Inactive</option>
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
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <button class="btn btn-primary btn_color_df" id="update">Update</button>
                <?php } else { ?>
                    <button class="btn btn-primary btn_color_df" id="submit">Add</button>
                <?php } ?>
            </td>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <fieldset>
        <legend class="mx-2 mt-2 h2">Search Item-Option is Subtopic</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0" style="width: 300px;">
                Main Topic :
                <select name="s_main_topic" id="s_main_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                        <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($main_topic_status_1s->main_topic == $s_main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Sub-Topic :
                <select name="s_sub_topic" id="s_sub_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                        <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>" <?php if ($sub_topic_self_status_1s->sub_topic == $s_sub_topic) echo "selected"; ?>><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Sub-Topic in Sub-Topic :
                <select name="s_sub_in_sub" id="s_sub_in_sub" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($sub_in_sub_status_1 as $sub_in_sub_status_1s) { ?>
                        <option value="<?php echo $sub_in_sub_status_1s->subtopic_in_subtopic ?>" <?php if ($sub_in_sub_status_1s->subtopic_in_subtopic == $s_sub_in_sub) echo "selected"; ?>><?php echo $sub_in_sub_status_1s->subtopic_in_subtopic . " " . $sub_in_sub_status_1s->subtopic_in_subtopic_text ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Sub-Topic in Sub-Topic Details :
                <input type="text" class="form-control" id="s_sub_in_sub_details" name="s_sub_in_sub_details" value="<?php echo $s_sub_in_sub_details ?>">
            </th>
        </tr>
        <tr>
            <th class="border-0">
                Division :
                <select name="s_division" id="s_division" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($division_status_1 as $division_status_1s) { ?>
                        <option value="<?php echo $division_status_1s->division ?>" <?php if ($division_status_1s->division == $s_division) echo "selected"; ?>><?php echo $division_status_1s->division ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0">
                Sub Division :
                <input type="text" class="form-control" id="s_sub_division" name="s_sub_division" value="<?php echo $s_sub_division ?>">
            </th>
            <th class="border-0">
                Year :
                <select name="s_year" id="s_year" class="form-select">
                    <?php
                    $current_year = date('Y');
                    for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                        <option value="<?php echo $y; ?>" class="mit" <?php if ($y == $s_year) echo "selected"; ?>><?php echo $y; ?></option>
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
            <th class="border-0"></th>
            <th class="border-0"></th>
            <th class="border-0"></th>
            <th class="border-0 text-end">
                <button class="btn btn-primary btn_color_df" onclick="Search_Item_Option_Subtopic()">Search</button>
                <button class="btn btn-primary btn_color_df" onclick="Clear_Search_Item_Option_Subtopic()">Clear</button>
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
            <th class="topic-background mit border">Sub in Sub</th>
            <th class="topic-background mit border">Sub in Sub Details</th>
            <th class="topic-background mit border">Division</th>
            <th class="topic-background mit border" style="width: 100px !important;">Sub Division</th>
            <th class="topic-background mit border">Year</th>
            <th class="topic-background mit border">Status</th>
            <th class="topic-background mit border">Action</th>
        </tr>
        <?php foreach ($item_is_sub_in_sub as $item_is_sub_in_subs) {
            $n++;
        ?>
            <tr>
                <td class="border mit"><?php echo $n; ?>.</td>
                <td class="border">
                    <?php echo $item_is_sub_in_subs->main_topic . ". " . $item_is_sub_in_subs->t_topic; ?>
                </td>
                <td class="border">
                    <?php echo $item_is_sub_in_subs->sub_topic . ". " . $item_is_sub_in_subs->s_sub_topic; ?>
                </td>
                <td class="border">
                    <?php echo $item_is_sub_in_subs->subtopic_in_subtopic . ". " . $item_is_sub_in_subs->t_sub_in_sub; ?>
                </td>
                <td class="border">
                    <?php echo $item_is_sub_in_subs->subtopic_in_subtopic_text; ?>
                </td>
                <td class="border">
                    <?php echo $item_is_sub_in_subs->division; ?>
                </td>
                <td class="border">
                    <?php echo $item_is_sub_in_subs->sub_division; ?>
                </td>
                <td class="border mit">
                    <?php echo $item_is_sub_in_subs->year; ?>
                </td>
                <td class="border mit">
                    <?php if ($item_is_sub_in_subs->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOptionIsSubtopic?id=') ?><?php echo $item_is_sub_in_subs->id ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>