<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logincontrol extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('modelLogin', 'login');
    }

    function login()
    {
        $title['title'] = 'Log in HR E-Services';
        $this->load->view('include/header', $title);
        $this->load->view('login');
        // $this->load->view('include/footer');
    }

    function loginHR()
    {
        $title['title'] = 'Login';
        $this->load->view('include/header', $title);
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $count_rows = 0;
        if ($username != '' && $password != '') {
            $ldaprdn = $username; // ldap rdn or dn
            $ldappass = $password; // associated password
            $ldaprdn = $ldaprdn . "@thainippon.co.th";
            $ldapconn = ldap_connect("tns-ad.thainippon.co.th")
                or die("Could not connect to LDAP server.");
            if ($ldapconn) {
                $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass);
                if ($ldapbind) {
                    $get_emp_id = $this->login->get_data_user($username, $ldaprdn);
                    foreach ($get_emp_id as $get_emp_ids) {
                        $user_fullname = $get_emp_ids->emp_name;
                        $emp_id = $get_emp_ids->emp_id;
                        $emp_grade = $get_emp_ids->emp_grade;
                        $emp_position = $get_emp_ids->emp_position;
                        $emp_division = $get_emp_ids->emp_division;
                        $emp_section = $get_emp_ids->emp_section;
                        $emp_hired_date = $get_emp_ids->emp_hired_date;
                        $emp_email = $get_emp_ids->emp_email;
                        $superior_name = $get_emp_ids->superior_name1;
                        $superior_grade = $get_emp_ids->superior_grade1;
                        $superior_email = $get_emp_ids->superior_email1;
                        $superior_name2 = $get_emp_ids->superior_name2;
                        $superior_grade2 = $get_emp_ids->superior_grade2;
                        $superior_email2 = $get_emp_ids->superior_email2;
                        $foreman = $get_emp_ids->foreman;
                        $factory_Manager_GM = $get_emp_ids->factory_Manager_GM;
                        $count_rows += 1;
                    }
                    if ($count_rows > 0) {
                        if (session_id() == '') {
                            session_start();
                        }
                        // $_SESSION["username"] = str_replace("  ", " ", $user_fullname);
                        $_SESSION["username"] = $user_fullname;
                        $_SESSION["emp_id"] = $emp_id;
                        $_SESSION["emp_grade"] = $emp_grade;
                        $_SESSION["emp_position"] = $emp_position;
                        $_SESSION["emp_division"] = $emp_division;
                        $_SESSION["emp_section"] = $emp_section;
                        $_SESSION["emp_hired_date"] = $emp_hired_date;
                        $_SESSION["emp_email"] = $emp_email;
                        $_SESSION["superior_name"] = $superior_name;
                        $_SESSION["superior_grade"] = $superior_grade;
                        $_SESSION["superior_email"] = $superior_email;
                        $_SESSION["superior_name2"] = $superior_name2;
                        $_SESSION["superior_grade2"] = $superior_grade2;
                        $_SESSION["superior_email2"] = $superior_email2;
                        $_SESSION["foreman"] = $foreman;
                        $_SESSION['factory_Manager_GM'] = $factory_Manager_GM;
                        $_SESSION['last_activity'] = time();
                        $get_emp_admin = $this->login->get_data_emp_admin($emp_id);
                        foreach ($get_emp_admin as $get_emp_admins) {
                            $admin_code = $get_emp_admins->admin_code;
                        }

                        if (isset($admin_code)) {
                            $_SESSION["group"] = $admin_code;
                        } else {
                            $_SESSION["group"] = "";
                        }

                        if ($_SESSION["group"] != ""  &&  $_SESSION["username"] != "") {
                            echo "<script type=\"text/javascript\">
                        document.addEventListener('DOMContentLoaded', function() {
                                Swal.fire({
                                    title: 'Login!',
                                    text: 'Successfully',
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false,
                                    allowOutsideClick: false
                                }).then(() => {
                                    window.location.href = '" . base_url() . "index.php/hr_controller/RecordFormAll';
                                });
                            });
                        </script>";
                        }
                        if ($_SESSION["group"] == "" &&  $_SESSION["username"] != "") {
                            echo "<script type=\"text/javascript\">
                        document.addEventListener('DOMContentLoaded', function() {
                            Swal.fire({
                                title: 'Login!',
                                text: 'Successfully',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false,
                                allowOutsideClick: false
                            }).then(() => {
                                window.location.href = '" . base_url() . "index.php/hr_controller/RecordFormAll';
                            });
                        });
                        </script>";
                        }
                    } else {
                        echo "<script type=\"text/javascript\">
                        document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/Logincontrol/login';
                        });
                    });
                    </script>";
                    }
                } else {
                    echo "<script type=\"text/javascript\">
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/Logincontrol/login';
                        });
                    });
                    </script>";
                }
            } else {
                echo "<script type=\"text/javascript\">
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/Logincontrol/login';
                        });
                    });
                </script>";
            }
        } else {
            echo "<script type=\"text/javascript\">
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            title: 'Invalid!',
                            text: 'Username or Password.',
                            icon: 'error',
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.href = '" . base_url() . "index.php/Logincontrol/login';
                        });
                    });
                </script>";
        }
    }
}
