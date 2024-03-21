<?php
if (isset($_SESSION['group'])) {
    $user_group = $_SESSION['group'];
    if ($user_group == "") {
        redirect("Logincontrol/login");
    }
} else {
    redirect("Logincontrol/login");
}
