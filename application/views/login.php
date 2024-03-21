<?php
// Clear session variables
// phpinfo();
$_SESSION = array();
// Destroy the session
session_destroy();
?>
<body>
    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row main-content text-center">
            <div class="col-md-4 text-center company__info">
                <span class="company__logo">
                    <img src="<?php echo base_url('/img/images.png'); ?>" alt="" width="100px" class="mx-2">
                </span>
                <h4 class="company_title mt-3">HR E-Service</h4>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 login_form">
                <div class="container-fluid">
                    <div class="row mt-5">
                        <h2>Log In</h2>
                    </div>
                    <div class="row">
                        <form action="<?php echo base_url('index.php/logincontrol/loginHR') ?>" method="post" class="form-group">
                            <div class="row">
                                <input type="text" name="username" id="username" class="form__input" placeholder="Username">
                            </div>
                            <div class="row">
                                <!-- <span class="fa fa-lock"></span> -->
                                <input type="password" name="password" id="password" class="form__input" placeholder="Password">
                            </div>
                            <div class="row">
                                <input type="submit" value="Sign in" class="btn-new">
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <p class="mb-5"></p>
                        <!-- <p>Don't have an account? <a href="#">Register Here</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <!-- <div class="container-fluid text-center footer">
        Coded with &hearts; by <a href="https://bit.ly/yinkaenoch">Yinka.</a></p>
    </div> -->
</body>
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