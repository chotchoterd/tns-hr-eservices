<?php
include "scriptManageItemOption.php";
include "checkAdmin.php";
$i = 0;
$update_indicator = 0;
$check_indicator = 0;
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
if (isset($_GET['s_item_option'])) {
    $s_item_option = $_GET['s_item_option'];
} else {
    $s_item_option = "";
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
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/PageSelfEvaluationManage') ?>" class="btn btn-primary btn_color_df" style="width: 300px !important;">Manage Topic & Sub-Item Self-Evaluation</a>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">Copy Item Option From</th>
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
    <?php foreach ($item_option_data_id as $item_option_data_ids) {
        if (count($item_option_data_id) != 0) {
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
            <th colspan="6" class="topic-background mit border h1">Manage Item Option</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit" style="width: 250px;">Main Topic</th>
            <th class="border topic-background mit" style="width: 250px;">Sub-Topic</th>
            <th class="border topic-background mit">Item Option</th>
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
                            <option class="mit" value="<?php echo $y; ?>" <?php if ($y == $item_option_data_ids->year) echo "selected"; ?>><?php echo $y; ?></option>
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
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $item_option_data_ids->id; ?>">
                    <select name="up_main_topic" id="up_main_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                            <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($item_option_data_ids->main_topic == $main_topic_status_1s->main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                        <?php } ?>
                    </select>
                    <div id="alert_main_topic" class="mt-1 font-eigth red" style="display: none;">Please select Main Topic !</div>
                <?php } else { ?>
                    <select name="main_topic" id="main_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                            <option value="<?php echo $main_topic_status_1s->main_topic ?>"><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                        <?php } ?>
                    </select>
                    <div id="alert_main_topic" class="mt-1 font-eigth red" style="display: none;">Please select Main Topic !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_sub_topic" id="up_sub_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                            <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>" <?php if ($item_option_data_ids->sub_topic == $sub_topic_self_status_1s->sub_topic) echo "selected";  ?>><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
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
                    <div class="form-floating">
                        <textarea name="up_item_option" id="up_item_option" class="form-control h-textarea" style="height: 100px;"><?php echo $item_option_data_ids->item_option; ?></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Item Option !
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_item_option" class="mt-1 font-eigth red" style="display: none;">Please fill in Item Option !</div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea name="item_option" id="item_option" class="form-control h-textarea" style="height: 100px;"></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Item Option !
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_item_option" class="mt-1 font-eigth red" style="display: none;">Please fill in Item Option !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <option value="1" <?php if ($item_option_data_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($item_option_data_ids->status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                    <div id="alert_status" class="mt-1 font-eigth red" style="display: none;">Please select Status !</div>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div id="alert_status" class="mt-1 font-eigth red" style="display: none;">Please select Status !</div>
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
        <legend class="mx-2 mt-2 h2">Search Item Option</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0" style="width: 300px;">
                Main Topic :
                <select name="s_main_topic" id="s_main_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                        <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($s_main_topic == $main_topic_status_1s->main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Sub-Topic :
                <select name="s_sub_topic" id="s_sub_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                        <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>" <?php if ($s_sub_topic == $sub_topic_self_status_1s->sub_topic) echo "selected"; ?>><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Item Option :
                <input type="text" name="s_item_option" id="s_item_option" class="form-control" value="<?php echo $s_item_option ?>">
            </th>
        </tr>
        <tr>
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
            <th class="border-0">
                Status :
                <select name="s_status" id="s_status" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <option value="1" <?php if ($s_status === "1") echo "selected"; ?>>Active</option>
                    <option value="0" <?php if ($s_status === "0") echo "selected"; ?>>Inactive</option>
                </select>
            </th>
            <th class="border-0 text-end align-bottom">
                <button class="btn btn-primary btn_color_df" onclick="Search_Item_Option();">Search</button>
                <button class="btn btn-primary btn_color_df" onclick="Clear_Search_Item_Option();">Clear</button>
            </th>
        </tr>
    </table>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form">
        <tr>
            <th class="border topic-background mit">#</th>
            <th class="border topic-background mit">Main Topic</th>
            <th class="border topic-background mit">Sub-Topic</th>
            <th class="border topic-background mit">Item Option</th>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <?php foreach ($item_option_data as $item_option_datas) {
            $i++; ?>
            <tr>
                <td class="border mit"><?php echo $i; ?>.</td>
                <td class="border"><?php echo $item_option_datas->main_topic . ". " . $item_option_datas->t_topic; ?></td>
                <td class="border"><?php echo $item_option_datas->sub_topic . ". " . $item_option_datas->s_sub_topic; ?></td>
                <td class="border"><?php echo $item_option_datas->item_option; ?></td>
                <td class="border mit"><?php echo $item_option_datas->year; ?></td>
                <td class="border mit">
                    <?php if ($item_option_datas->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <?php if ($check_indicator == 1) {
                        echo "Not Allow";
                    } else { ?>
                        <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOption/?id=') ?><?php echo $item_option_datas->id ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>