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

    function model_Submit_bonus_evaluate_foreman($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $foreman, $sup_name1, $sup_name2, $Factory_Manager_GM)
    {
        $rs = $this->db_hr
            ->set('emp_name', $emp_name)
            ->set('emp_id', $emp_id)
            ->set('date_submit', $date_submit)
            ->set('position', $position)
            ->set('section', $section)
            ->set('employment_date', $hired_date)
            ->set('year_fo_service', $emp_year_of_service)
            ->set('foreman', $foreman)
            ->set('sup_name1', $sup_name1)
            ->set('sup_name2', $sup_name2)
            ->set('Factory_Manager_GM', $Factory_Manager_GM)
            ->insert('tb_submit_bonus_evaluate_foreman_and_below');
        return $rs;
    }

    function model_Submit_bonus_evaluate_g4_g6($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $sup_name1, $sup_name2, $Factory_Manager_GM)
    {
        $rs = $this->db_hr
            ->set('emp_name', $emp_name)
            ->set('emp_id', $emp_id)
            ->set('date_submit', $date_submit)
            ->set('position', $position)
            ->set('section', $section)
            ->set('employment_date', $hired_date)
            ->set('year_fo_service', $emp_year_of_service)
            ->set('sup_name1', $sup_name1)
            ->set('sup_name2', $sup_name2)
            ->set('Factory_Manager_GM', $Factory_Manager_GM)
            ->insert('tb_submit_bonus_evaluate_g4_g6');
        return $rs;
    }

    function model_Submit_bonus_evaluate_g2_g3($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $sup_name1, $sup_name2, $Factory_Manager_GM)
    {
        $rs = $this->db_hr
            ->set('emp_name', $emp_name)
            ->set('emp_id', $emp_id)
            ->set('date_submit', $date_submit)
            ->set('position', $position)
            ->set('section', $section)
            ->set('employment_date', $hired_date)
            ->set('year_fo_service', $emp_year_of_service)
            ->set('sup_name1', $sup_name1)
            ->set('sup_name2', $sup_name2)
            ->set('Factory_Manager_GM', $Factory_Manager_GM)
            ->insert('tb_submit_bonus_evaluate_g2_g3');
        return $rs;
    }
}
