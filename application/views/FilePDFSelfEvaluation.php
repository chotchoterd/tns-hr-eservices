<?php
include "checkAdminUser.php";
?>
<div class="container mt-3 mb-3" align="center">
    <img src="<?php echo base_url('/img/bg-download.png'); ?>" alt="" style="width: 700px;"><br>
    <a href="<?php echo base_url('MySelfEvaluation' . date('Y') . '.pdf'); ?>" class="btn btn-primary btn-bg btn_color_df" target="_blank">Download</a>
</div>