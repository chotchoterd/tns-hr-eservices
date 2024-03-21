<?php
include "checkUser.php";
$check_count = 0;
?>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="display-4 text-center border-0">Self-Evaluation Record</th>
        </tr>
    </table>
</div>
<div class="container-fluid text-end">
    <a href="<?php echo base_url('index.php/hr_controller/SelfEvaluationForm') ?>" class="btn btn-primary btn_color_df" style="width: 200px !important;">Self-Evaluation Form</a>
</div>
<?php foreach ($self_evaluation_one_user as $self_evaluation_one_users) {
    if (count($self_evaluation_one_user) != 0) {
        $check_count = 1;
    } else {
        $check_count = 0;
    }
} ?>
<?php if ($check_count == 1) { ?>
    <div class="container mt-3">
        <table class="table table-form">
            <tr>
                <th class="border topic-background mit">#</th>
                <th class="border topic-background mit">Date</th>
                <th class="border topic-background mit">Year Submit</th>
                <th class="border topic-background mit">Employee ID</th>
                <th class="border topic-background mit">Employee Name</th>
                <th class="border topic-background mit">Hired Date</th>
                <th class="border topic-background mit">Status</th>
                <th class="border topic-background mit">PDF</th>
            </tr>
            <?php foreach ($self_evaluation_one_user as $self_evaluation_one_users) : ?>
                <tr>
                    <td class="border mit td_border">
                        <?php if ($self_evaluation_one_users->self_evaluation_status == "Submit") { ?>
                            <a href="<?php echo base_url('index.php/hr_controller/FormStaticSelfEvaluation/') ?><?php echo $self_evaluation_one_users->id ?>">Self-Evaluation<?php echo $self_evaluation_one_users->year_submit ?></a>
                        <?php } else { ?>
                            <a href="<?php echo base_url('index.php/hr_controller/SelfEvaluationForm/?id=') ?><?php echo $self_evaluation_one_users->id ?>">Self-Evaluation<?php echo $self_evaluation_one_users->year_submit ?></a>
                        <?php } ?>
                    </td>
                    <td class="border mit td_border"><?php echo $self_evaluation_one_users->date_submit ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_one_users->year_submit ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_one_users->emp_id ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_one_users->emp_name ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_one_users->hired_date ?></td>
                    <td class="border mit td_border"><?php echo $self_evaluation_one_users->self_evaluation_status ?></td>
                    <td class="border mit td_border">
                        <?php if ($self_evaluation_one_users->self_evaluation_status == "Draft") {
                            echo "Null";
                        } else { ?>
                            <a href="<?php echo base_url('index.php/hr_controller/PrintPDFSelfEvaluation/') ?><?php echo $self_evaluation_one_users->id ?>">Download</a>
                        <?php } ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
<?php } else { ?>
    <div class="container-fluid mt-3 mb-3 display-5 text-center">
        No Self-Evaluation Record !!!
    </div>
<?php } ?>