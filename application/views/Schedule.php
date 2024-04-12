<?php
include "scriptSchedule.php";
$update_indicator = 0;
?>
<div class="container mt-5">
    <table class="table table-form">
        <tr>
            <th class="topic-background mit border">Copy All Master Data From</th>
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
<div class="container mt-5">
    <?php foreach ($Period_Time_id as $Period_Time_ids) {
        if (count($Period_Time_id) != 0) {
            $update_indicator = 1;
        } else {
            $update_indicator = 0;
        }
    } ?>
    <table class="table table-form">
        <tr>
            <th colspan="5" class="topic-background mit border h1">Manage Period Time for Submit</th>
        </tr>
        <tr>
            <th class="border topic-background mit">Date From</th>
            <th class="border topic-background mit">Date To</th>
            <th class="border topic-background mit">Status</th>
            <th class="border topic-background mit">Year</th>
            <th class="border topic-background mit">Action</th>
        </tr>
        <?php foreach ($Period_Time as $Period_Times) { ?>
            <tr>
                <td class="border mit td_border">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="hidden" name="up_id" id="up_id" value="<?php echo $Period_Time_ids->id; ?>">
                        <input type="text" class="form-control" id="date_from" placeholder="DD/MM/YYYY" value="<?php echo $Period_Times->date_from ?>">
                        <div class="mt-1 font-eigth red" id="alert_date_from" style="display: none;">Please fill in !</div>
                    <?php } else { ?>
                        <?php
                        $date_format = DateTime::createFromFormat('d/m/Y', $Period_Times->date_from)->format('d-M-Y');
                        echo $date_format;
                        ?>
                    <?php } ?>
                </td>
                <td class="border mit td_border">
                    <?php if ($update_indicator == 1) { ?>
                        <input type="text" class="form-control" id="date_to" placeholder="DD/MM/YYYY" value="<?php echo $Period_Times->date_to ?>">
                        <div class="mt-1 font-eigth red" id="alert_date_to" style="display: none;">Please fill in !</div>
                    <?php } else { ?>
                        <?php
                        $date_format = DateTime::createFromFormat('d/m/Y', $Period_Times->date_to)->format('d-M-Y');
                        echo $date_format;
                        ?>
                    <?php } ?>
                </td>
                <td class="border mit td_border">
                    <?php if ($update_indicator == 1) { ?>
                        <select name="status" id="status" class="form-select">
                            <option value="1" <?php if ($Period_Time_ids->status == "1") echo "selected"; ?>>Active</option>
                            <option value="0" <?php if ($Period_Time_ids->status == "0") echo "selected"; ?>>Inactive</option>
                        </select>
                    <?php } else { ?>
                        <?php if ($Period_Times->status == 1) {
                            echo "Active";
                        } else {
                            echo "Inactive";
                        } ?>
                    <?php } ?>
                </td>
                <td class="border mit td_border">
                    <?php if ($update_indicator == 1) {
                        $current_year = date('Y');
                    ?>
                        <select name="year" id="year" class="form-select">
                            <?php for ($i = $current_year - 5; $i < $current_year + 5; $i++) { ?>
                                <option value="<?php echo $i ?>" <?php if ($i == $Period_Time_ids->year) echo "selected"; ?>><?php echo $i ?></option>
                            <?php } ?>
                        </select>
                    <?php } else {
                        echo $Period_Times->year;
                    } ?>
                </td>
                <td class="border mit td_border">
                    <?php if ($update_indicator == 1) { ?>
                        <button class="btn btn-primary btn_color_df" id="update_data">Update</button>
                    <?php } else { ?>
                        <a href="<?php echo base_url('index.php/manage_Self_Evaluation/Schedule/?id=') ?><?php echo $Period_Times->id ?>" class="btn btn-primary btn_color_df">Edit</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<section class="">
    <footer class="text-center text-white fixed-bottom" style="background-color: #203764;">
        <div class="container p-2 pb-0">
            <section class="">
                <p class="d-flex justify-content-center align-items-center">
                    <span class="me-3">HR E-Services Developed by PMIS & ERP Programmer Team.</span>
                </p>
            </section>
        </div>
        <div class="text-center p-3 bg-nav-background">
            Copyright © 2024 THAI NIPPON STEEL ENGINEERING & CONSTRUCTION CORPORATION LTD.
        </div>
    </footer>
</section>