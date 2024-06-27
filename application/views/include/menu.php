<?php
if (isset($_SESSION['username'])) {
    if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 1800) {
        session_unset();
        session_destroy();
        redirect("Logincontrol/login");
    } else {
        $username = $_SESSION['username'];
    }
    $_SESSION['last_activity'] = time();
} else {
    redirect("Logincontrol/login");
}
?>
<div class="navbar navbar-expand-lg navbar-light bg-nav-background">
    <div class="container-fluid">
        <a href="<?php echo base_url('index.php/hr_controller/RecordFormAll') ?>"><img src="<?php echo base_url('/img/images.png'); ?>" alt="" width="50px" class="mx-2"></a>
        <div class="collapse navbar-collapse">
            <?php if ($_SESSION["group"] != "") { ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active white" aria-current="page" href="#">Requisition Form</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link active white" aria-current="page" href="<?php echo base_url('index.php/hr_controller/ManageAllPage'); ?>">Management All</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle white" aria-current="page" role="button" data-bs-toggle="dropdown" aria-expanded="false">HR Import</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/hr_controller/ImportFileExcelEMP'); ?>">Import Employee</a></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('index.php/hr_controller/ImportFileExcelLeaveRecord'); ?>">Import Leave record</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex text-end">
                    <div class="align-middle">
                        <l class="mx-3 mit"><?php echo $_SESSION["username"] ?></l>
                        <a href="<?php echo base_url('index.php/Logincontrol/login') ?>" class="btn btn-primary btn_color_df" type="submit">Log Out</a>
                    </div>
                </form>
            <?php } else { ?>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active white" aria-current="page" href="#">Requisition Form</a>
                    </li> -->
                </ul>
                <form class="d-flex text-end">
                    <div class="align-middle">
                        <l class="mx-3 mit"><?php echo $_SESSION["username"] ?></l>
                        <a href="<?php echo base_url('index.php/Logincontrol/login') ?>" class="btn btn-primary btn_color_df" type="submit">Log Out</a>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>