<?php
$i = 0;
$update_indicator = 0;
include "scriptManageSubtopicTwoSelf.php";
?>
<div class="container-fluid mt-3">
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/PageSelfEvaluationManage'); ?>" class="btn btn-primary btn_color_df" style="width: 300px !important;">Manage Topic & Sub-Item Self-Evaluation</a>
</div>
<div class="container-fluid mt-3">
    <?php foreach ($subtopic_in_subtopic_self_id as $subtopic_in_subtopic_self_ids) {
        if (count($subtopic_in_subtopic_self_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th colspan="7" class="topic-background mit border h1">Manage Subtopics of subtopics of the Main Topic Self-Evaluation</th>
        </tr>
        <tr>
            <th class="border topic-background mit" style="width: 150px;">Main Topic</th>
            <th class="border topic-background mit" style="width: 150px;">Sub-Topic</th>
            <th class="border topic-background mit" style="width: 150px;">Sub-Topic in Sub-Topic</th>
            <th class="border topic-background mit">Sub-Topic in Sub-Topic Details</th>
            <th class="border topic-background mit">Remark</th>
            <th class="border topic-background mit" style="width: 150px;">Status</th>
            <th class="border topic-background mit" style="width: 100px;">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_main_topic" id="up_main_topic" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                            <option value="<?php echo $main_topic_status_1s->main_topic ?>" <?php if ($subtopic_in_subtopic_self_ids->main_topic == $main_topic_status_1s->main_topic) echo "selected"; ?>><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
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
                            <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>" <?php if ($subtopic_in_subtopic_self_ids->sub_topic == $sub_topic_self_status_1s->sub_topic) echo "selected"; ?>><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
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
                    <input type="text" name="up_sub_in_sub" id="up_sub_in_sub" class="form-control" value="<?php echo $subtopic_in_subtopic_self_ids->subtopic_in_subtopic; ?>">
                    <div id="alert_sub_topic_in_sub_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic in Sub-Topic !</div>
                <?php } else { ?>
                    <input type="text" name="sub_in_sub" id="sub_in_sub" class="form-control">
                    <div id="alert_sub_topic_in_sub_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic in Sub-Topic !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea name="up_sub_in_sub_details" id="up_sub_in_sub_details" class="form-control h-textarea" style="height: 100px;"><?php echo $subtopic_in_subtopic_self_ids->subtopic_in_subtopic_text ?></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Sub-Topic in Sub-Topic Details
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_sub_topic_in_sub_topic_details" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic in Sub-Topic Details !</div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea name="sub_in_sub_details" id="sub_in_sub_details" class="form-control h-textarea" style="height: 100px;"></textarea>
                        <label for="" class="font-twelve">
                            Please fill in Sub-Topic in Sub-Topic Details
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_sub_topic_in_sub_topic_details" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic in Sub-Topic Details !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <textarea name="up_remark" id="up_remark" class="form-control h-textarea" style="height: 100px;"><?php echo $subtopic_in_subtopic_self_ids->remark ?></textarea>
                <?php } else { ?>
                    <textarea name="remark" id="remark" class="form-control h-textarea" style="height: 100px;"></textarea>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <option value="1" <?php if ($subtopic_in_subtopic_self_ids->status == 1) echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($subtopic_in_subtopic_self_ids->status == 0) echo "selected"; ?>>Inactive</option>
                    </select>
                    <div id="alert_select_status" class="mt-1 font-eigth red" style="display: none;">Please select Status !</div>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div id="alert_select_status" class="mt-1 font-eigth red" style="display: none;">Please select Status !</div>
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
        <legend class="mx-2 mt-2 h2">Search Subtopics of subtopics of the Main Topic Self-Evaluation</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0" style="width: 350px;">
                Main Topic :
                <select name="main_topic" id="main_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                        <option value="<?php echo $main_topic_status_1s->main_topic ?>"><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 350px;">
                Sub-Topic :
                <select name="" id="" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                        <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>"><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
                    <?php } ?>
                </select>
            </th>
            <th class="border-0" style="width: 300px;">
                Sub-Topic in Sub-Topic :
                <input type="number" name="" id="" class="form-control">
            </th>
        </tr>
        <tr>
            <th class="border-0">
                Sub-Topic in Sub-Topic Details :
                <input type="text" id="" name="" class="form-control">
            </th>
            <th class="border-0">
                Status :
                <select name="" id="" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </th>
            <th class="border-0 text-end align-bottom">
                <button class="btn btn-primary btn_color_df">Search</button>
                <button class="btn btn-primary btn_color_df">Clear</button>
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
            <th class="border topic-background mit">Sub-Topic in Sub-Topic</th>
            <th class="border topic-background mit">Sub-Topic in Sub-Topic Details</th>
            <th class="border topic-background mit">Remark</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <?php foreach ($subtopic_in_subtopic_self as $subtopic_in_subtopic_selfs) {
            $i++; ?>
            <tr>
                <td class="border mit"><?php echo $i; ?>.</td>
                <td class="border">
                    <?php echo $subtopic_in_subtopic_selfs->main_topic . '.' . $subtopic_in_subtopic_selfs->t_topic; ?>
                </td>
                <td class="border">
                    <?php echo $subtopic_in_subtopic_selfs->sub_topic . ' ' . $subtopic_in_subtopic_selfs->s_sub_topic; ?>
                </td>
                <td class="border mit">
                    <?php echo $subtopic_in_subtopic_selfs->subtopic_in_subtopic; ?>
                </td>
                <td class="border">
                    <?php echo $subtopic_in_subtopic_selfs->subtopic_in_subtopic_text; ?>
                </td>
                <td class="border">
                    <?php echo $subtopic_in_subtopic_selfs->remark; ?>
                </td>
                <td class="border mit">
                    <?php if ($subtopic_in_subtopic_selfs->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicTwoSelf/?id=') ?><?php echo $subtopic_in_subtopic_selfs->id; ?>" class="btn btn-primary btn_color_df btn-sm">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>