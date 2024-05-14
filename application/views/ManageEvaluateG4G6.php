<?php
include "scriptManageEvaluateG4G6.php";
$n = 0;
$update_indicator = 0;
if (isset($_GET['s_Evaluation_Item_EN'])) {
    $s_Evaluation_Item_EN = $_GET['s_Evaluation_Item_EN'];
} else {
    $s_Evaluation_Item_EN = '';
}
if (isset($_GET['s_Evaluation_Item_TH'])) {
    $s_Evaluation_Item_TH = $_GET['s_Evaluation_Item_TH'];
} else {
    $s_Evaluation_Item_TH = '';
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
    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/PageBONUSandANNUALAssessment') ?>" class="btn btn-primary btn_color_df" style="width: 300px !important;">Manage Topic & Sub-Item Self-Evaluation</a>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">Copy AA002-Bonus&Annual Evaluate G4-G6 - PMIS From</th>
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
    <?php foreach ($bonus_evaluate_g4_g6_id as $bonus_evaluate_g4_g6_ids) {
        if (count($bonus_evaluate_g4_g6_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form border">
        <tr>
            <th colspan="5" class="topic-background mit border h1">Manage AA002-Bonus&Annual Evaluate G4-G6 - PMIS</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit">Evaluation Item EN </th>
            <th class="border topic-background mit">Evaluation Item TH</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <tr>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <input type="hidden" name="up_id" id="up_id" value="<?php echo $bonus_evaluate_g4_g6_ids->id; ?>">
                    <select name="up_year" id="up_year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option value="<?php echo $y ?>" <?php if ($y == $bonus_evaluate_g4_g6_ids->year) echo "selected"; ?>><?php echo $y ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select name="year" id="year" class="form-select">
                        <?php
                        $current_year = date('Y');
                        for ($y = $current_year - 5; $y < $current_year + 5; $y++) { ?>
                            <option value="<?php echo $y ?>" <?php if ($y == $current_year) echo "selected"; ?>><?php echo $y ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea name="up_evaluation_Item_en" id="up_evaluation_Item_en" class="form-control h-textarea" style="height: 100px;"><?php echo $bonus_evaluate_g4_g6_ids->evaluation_Item_en; ?></textarea>
                        <label for="" class="font-twelve">
                            Please fill in !
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_evaluation_Item_en" class="mt-1 font-eigth red" style="display: none;">Please fill in Evaluation Item EN !</div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea name="evaluation_Item_en" id="evaluation_Item_en" class="form-control h-textarea" style="height: 100px;"></textarea>
                        <label for="" class="font-twelve">
                            Please fill in !
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_evaluation_Item_en" class="mt-1 font-eigth red" style="display: none;">Please fill in Evaluation Item EN !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <div class="form-floating">
                        <textarea name="up_evaluation_Item_th" id="up_evaluation_Item_th" class="form-control h-textarea" style="height: 100px;"><?php echo $bonus_evaluate_g4_g6_ids->evaluation_Item_th; ?></textarea>
                        <label for="" class="font-twelve">
                            Please fill in !
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_evaluation_Item_th" class="mt-1 font-eigth red" style="display: none;">Please fill in Evaluation Item TH !</div>
                <?php } else { ?>
                    <div class="form-floating">
                        <textarea name="evaluation_Item_th" id="evaluation_Item_th" class="form-control h-textarea" style="height: 100px;"></textarea>
                        <label for="" class="font-twelve">
                            Please fill in !
                            <span class="red font-twelve">*</span>
                        </label>
                    </div>
                    <div id="alert_evaluation_Item_th" class="mt-1 font-eigth red" style="display: none;">Please fill in Evaluation Item TH !</div>
                <?php } ?>
            </td>
            <td class="border mit-v td_border">
                <?php if ($update_indicator == 1) { ?>
                    <select name="up_status" id="up_status" class="form-select">
                        <!-- <option value="" class="mit">- Select -</option> -->
                        <option value="1" <?php if ($bonus_evaluate_g4_g6_ids->status == "1") echo "selected"; ?>>Active</option>
                        <option value="0" <?php if ($bonus_evaluate_g4_g6_ids->status == "0") echo "selected"; ?>>Inactive</option>
                    </select>
                <?php } else { ?>
                    <select name="status" id="status" class="form-select">
                        <option value="" class="mit">- Select -</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                    <div id="alert_status" class="mt-1 font-eigth red" style="display: none;">Please Select !</div>
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
        <legend class="mx-2 mt-2 h2">Search Bonus&Annual Evaluate G4-G6 - PMIS</legend>
    </fieldset>
    <table class="table table-form border-0">
        <tr>
            <th class="border-0">
                Evaluation Item EN :
                <input type="text" class="form-control" id="s_Evaluation_Item_EN" name="s_Evaluation_Item_EN" value="<?php echo $s_Evaluation_Item_EN; ?>">
            </th>
            <th class="border-0">
                Evaluation Item TH :
                <input type="text" class="form-control" id="s_Evaluation_Item_TH" name="s_Evaluation_Item_TH" value="<?php echo $s_Evaluation_Item_TH; ?>">
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
                    <option value="1" <?php if ($s_status == "1") echo "selected"; ?>>Active</option>
                    <option value="0" <?php if ($s_status == "0") echo "selected"; ?>>Inactive</option>
                </select>
            </th>
        </tr>
        <tr>
            <th class="border-0"></th>
            <th class="border-0 text-end">
                <button class="btn btn-primary btn_color_df" onclick="search_Evaluation_Item()">Search</button>
                <button class="btn btn-primary btn_color_df" onclick="clear_search_Evaluation_Item()">Clear</button>
            </th>
        </tr>
    </table>
</div>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">#</th>
            <th class="topic-background mit border">Evaluation Item EN</th>
            <th class="topic-background mit border">Evaluation Item TH</th>
            <th class="topic-background mit border">Year</th>
            <th class="topic-background mit border">Status</th>
            <th class="topic-background mit border">Action</th>
        </tr>
        <?php foreach ($bonus_evaluate_g4_g6 as $bonus_evaluate_g4_g6s) {
            $n++; ?>
            <tr>
                <td class="border mit"><?php echo $n; ?>.</td>
                <td class="border"><?php echo $bonus_evaluate_g4_g6s->evaluation_Item_en ?></td>
                <td class="border"><?php echo $bonus_evaluate_g4_g6s->evaluation_Item_th ?></td>
                <td class="border mit"><?php echo $bonus_evaluate_g4_g6s->year ?></td>
                <td class="border mit">
                    <?php if ($bonus_evaluate_g4_g6s->status == 1) {
                        echo "Active";
                    } else {
                        echo "Inactive";
                    } ?>
                </td>
                <td class="border mit">
                    <a href="<?php echo base_url('index.php/manage_Self_Evaluation/ManageEvaluateG4G6/?id=') ?><?php echo $bonus_evaluate_g4_g6s->id ?>">Edit</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>