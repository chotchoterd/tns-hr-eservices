<?php
include "checkAdminUser.php";
?>
<div class="container mt-3">
    <table class="table table-form">
        <tr>
            <th class="display-3 text-center border-0">Your Record Form All</th>
        </tr>
    </table>
</div>
<div class="container">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th class="mit">#</th>
                <th class="mit">Topic Form</th>
                <th class="mit">Status</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr>
                <td class="mit">1</td>
                <td class="mit-v">
                    <?php if ($_SESSION["group"] == "") { ?>
                        <a href="<?php echo base_url('index.php/hr_controller/TableRecordSelfEvaluation') ?>" class="record_border">Self-Evaluation</a>
                    <?php } else { ?>
                        <a href="<?php echo base_url('index.php/hr_controller/TableRecordSelfEvaluationForHr') ?>" class="record_border">Self-Evaluation</a>
                    <?php } ?>
                </td>
                <td class="mit">Record</td>
            </tr>
            <tr>
                <td class="mit">2</td>
                <td class="mit-v">
                    <a href="" class="record_border">BONUS & ANNUAL Assessment</a>
                </td>
                <td class="mit">Record</td>
            </tr>
            <tr>
                <td class="mit">3</td>
                <td class="mit-v">
                    <a href="" class="record_border">Exit Interview</a>
                </td>
                <td class="mit">Record</td>
            </tr>
        </tbody>
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