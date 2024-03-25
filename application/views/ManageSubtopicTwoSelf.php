<div class="container-fluid mt-3">
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/PageSelfEvaluationManage'); ?>" class="btn btn-primary btn_color_df" style="width: 300px !important;">Manage Topic & Sub-Item Self-Evaluation</a>
</div>
<div class="container-fluid mt-3">
    <table class="table table-form border">
        <tr>
            <th colspan="6" class="topic-background mit border h1">Manage Subtopics of subtopics of the Main Topic Self-Evaluation</th>
        </tr>
        <tr>
            <th class="border topic-background mit" style="width: 200px;">Main Topic</th>
            <th class="border topic-background mit" style="width: 200px;">Sub-Topic</th>
            <th class="border topic-background mit" style="width: 200px;">Sub-Topic in Sub-Topic</th>
            <th class="border topic-background mit">Sub-Topic in Sub-Topic Details</th>
            <th class="border topic-background mit" style="width: 150px;">Status</th>
            <th class="border topic-background mit" style="width: 150px;">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <select name="main_topic" id="main_topic" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($main_topic_status_1 as $main_topic_status_1s) { ?>
                        <option value="<?php echo $main_topic_status_1s->main_topic ?>"><?php echo $main_topic_status_1s->main_topic . ". " . $main_topic_status_1s->topic ?></option>
                    <?php } ?>
                </select>
                <div id="alert_main_topic" class="mt-1 font-eigth red" style="display: none;">Please select Main Topic !</div>
            </td>
            <td class="border mit-v td_border">
                <select name="" id="" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <?php foreach ($sub_topic_self_status_1 as $sub_topic_self_status_1s) { ?>
                        <option value="<?php echo $sub_topic_self_status_1s->sub_topic ?>"><?php echo $sub_topic_self_status_1s->sub_topic . ". " . $sub_topic_self_status_1s->sub_topic_text ?></option>
                    <?php } ?>
                </select>
                <div id="alert_sub_topic" class="mt-1 font-eigth red" style="display: none;">Please select Sub-Topic !</div>
            </td>
            <td class="border mit-v td_border">
                <input type="number" name="" id="" class="form-control">
                <div id="alert_sub_topic_in_sub_topic" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic in Sub-Topic !</div>
            </td>
            <td class="border mit-v td_border">
                <div class="form-floating">
                    <textarea name="" id="" class="form-control h-textarea" style="height: 100px;"></textarea>
                    <label for="" class="font-twelve">
                        Please fill in Sub-Topic in Sub-Topic Details
                        <span class="red font-twelve">*</span>
                    </label>
                </div>
                <div id="alert_sub_topic_in_sub_topic_details" class="mt-1 font-eigth red" style="display: none;">Please fill in Sub-Topic in Sub-Topic Details !</div>
            </td>
            <td class="border mit-v td_border">
                <select name="" id="" class="form-select">
                    <option value="" class="mit">- Select -</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <div id="alert_select_status" class="mt-1 font-eigth red" style="display: none;">Please select Status !</div>
            </td>
            <td class="border mit td_border">
                <button class="btn btn-primary btn_color_df" id="submit">Add</button>
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
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
</div>