<?php
class ModelBonus extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_hr = $this->load->database('db_hr', TRUE);
    }

    function model_bonus_evaluate_g4_g6()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_bonus_evaluate_g4_g6 WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_subordinate_emp()
    {
        $sql = "SELECT * FROM `tb_emp_hr_import` WHERE superior_email1 = '" . $_SESSION["emp_email"] . "'
        UNION
        SELECT * FROM `tb_emp_hr_import` WHERE superior_email2 = '" . $_SESSION["emp_email"] . "'
        UNION
        SELECT * FROM `tb_emp_hr_import` WHERE factory_Manager_GM_email = '" . $_SESSION["emp_email"] . "'
        ORDER BY emp_name ASC";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_emp_data($emp_id)
    {
        $sql = "SELECT * FROM tb_emp_hr_import WHERE emp_id = '" . $emp_id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_emp_leave_data($emp_id)
    {
        $sql = "SELECT * FROM tb_emp_hr_import_leave_and_punishment WHERE emp_id = '" . $emp_id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_bonus_evaluate_g2_g3()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_bonus_evaluate_g2_g3 WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_bonus_evaluate_Foreman_below()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_bonus_evaluate_foreman_and_below WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }
}
