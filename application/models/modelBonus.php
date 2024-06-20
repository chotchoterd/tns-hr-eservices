<?php
class ModelBonus extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_hr = $this->load->database('db_hr', TRUE);
    }

    function model_subordinate_emp()
    {
        // $sql = "SELECT * FROM `tb_emp_hr_import` WHERE superior_email1 = '" . $_SESSION["emp_email"] . "'
        // UNION
        // SELECT * FROM `tb_emp_hr_import` WHERE superior_email2 = '" . $_SESSION["emp_email"] . "'
        // UNION
        // SELECT * FROM `tb_emp_hr_import` WHERE factory_Manager_GM_email = '" . $_SESSION["emp_email"] . "'
        // ORDER BY emp_name ASC";
        $current_year = date('Y');
        $sql = "SELECT subordinate.*,assessment.id AS id_as, assessment.date_submit, assessment.year_submit, assessment.assessment_status FROM
        (SELECT * FROM `tb_emp_hr_import` WHERE superior_email1 = '" . $_SESSION["emp_email"] . "'
        UNION 
        SELECT * FROM `tb_emp_hr_import` WHERE superior_email2 = '" . $_SESSION["emp_email"] . "' 
        UNION 
        SELECT * FROM `tb_emp_hr_import` WHERE factory_Manager_GM_email = '" . $_SESSION["emp_email"] . "' 
        ORDER BY emp_name ASC) subordinate 
        LEFT JOIN (SELECT id, emp_id, date_submit,year_submit,assessment_status FROM `tb_submit_bonus_evaluate_foreman_and_below`
        UNION
        SELECT id, emp_id, date_submit,year_submit,assessment_status FROM `tb_submit_bonus_evaluate_g2_g3`
        UNION
        SELECT id, emp_id, date_submit,year_submit,assessment_status FROM `tb_submit_bonus_evaluate_g4_g6`
        WHERE status != 0) assessment ON (subordinate.emp_id = assessment.emp_id)
        WHERE subordinate.status = 1
        AND (assessment.year_submit = '" . $current_year . "' OR assessment.year_submit IS NULL OR assessment.year_submit = '')";
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

    function model_Submit_bonus_evaluate_foreman($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $foreman, $sup_name1, $sup_name2, $Factory_Manager_GM, $quality_of_work, $job_responsibility, $cooperation, $teamwork, $job_knowledge, $technical_skill, $assessment_score_h, $leave_score_h, $total_score_h, $assessment_status, $year_submit, $business_leave1, $business_leave2, $sick_leave1, $sick_leave2, $absenteeism1, $absenteeism2, $total_leave1, $total_leave2, $grand_total, $late1, $late2, $verbal_warning, $letter_warning)
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
            ->set('status', 1)
            ->set('assessment_status', $assessment_status)
            ->set('item1', $quality_of_work)
            ->set('item2', $job_responsibility)
            ->set('item3', $cooperation)
            ->set('item4', $teamwork)
            ->set('item5', $job_knowledge)
            ->set('item6', $technical_skill)
            ->set('assessment_score', $assessment_score_h)
            ->set('leave_score', $leave_score_h)
            ->set('total_score', $total_score_h)
            ->set('year_submit  ', $year_submit)
            ->set('business_leave1', $business_leave1)
            ->set('business_leave2', $business_leave2)
            ->set('sick_leave1', $sick_leave1)
            ->set('sick_leave2', $sick_leave2)
            ->set('absenteeism1', $absenteeism1)
            ->set('absenteeism2', $absenteeism2)
            ->set('total_leave1', $total_leave1)
            ->set('total_leave2', $total_leave2)
            ->set('grand_total', $grand_total)
            ->set('late1', $late1)
            ->set('late2', $late2)
            ->set('verbal_warning', $verbal_warning)
            ->set('letter_warning', $letter_warning)
            ->insert('tb_submit_bonus_evaluate_foreman_and_below');
        return $rs;
    }

    function model_up_Submit_bonus_evaluate_foreman($up_id, $up_date_submit, $up_emp_name, $up_emp_id, $up_position, $up_section, $up_hired_date, $up_emp_year_of_service, $up_foreman, $up_sup_name1, $up_sup_name2, $up_Factory_Manager_GM, $up_quality_of_work, $up_job_responsibility, $up_cooperation, $up_teamwork, $up_job_knowledge, $up_technical_skill, $up_assessment_score_h, $up_leave_score_h, $up_total_score_h, $up_assessment_status, $up_year_submit, $up_business_leave1, $up_business_leave2, $up_sick_leave1, $up_sick_leave2, $up_absenteeism1, $up_absenteeism2, $up_total_leave1, $up_total_leave2, $up_grand_total, $up_late1, $up_late2, $up_verbal_warning, $up_letter_warning)
    {
        $rs = $this->db_hr
            ->set('emp_name', $up_emp_name)
            ->set('emp_id', $up_emp_id)
            ->set('date_submit', $up_date_submit)
            ->set('position', $up_position)
            ->set('section', $up_section)
            ->set('employment_date', $up_hired_date)
            ->set('year_fo_service', $up_emp_year_of_service)
            ->set('foreman', $up_foreman)
            ->set('sup_name1', $up_sup_name1)
            ->set('sup_name2', $up_sup_name2)
            ->set('Factory_Manager_GM', $up_Factory_Manager_GM)
            ->set('status', 1)
            ->set('assessment_status', $up_assessment_status)
            ->set('item1', $up_quality_of_work)
            ->set('item2', $up_job_responsibility)
            ->set('item3', $up_cooperation)
            ->set('item4', $up_teamwork)
            ->set('item5', $up_job_knowledge)
            ->set('item6', $up_technical_skill)
            ->set('assessment_score', $up_assessment_score_h)
            ->set('leave_score', $up_leave_score_h)
            ->set('total_score', $up_total_score_h)
            ->set('year_submit  ', $up_year_submit)
            ->set('business_leave1', $up_business_leave1)
            ->set('business_leave2', $up_business_leave2)
            ->set('sick_leave1', $up_sick_leave1)
            ->set('sick_leave2', $up_sick_leave2)
            ->set('absenteeism1', $up_absenteeism1)
            ->set('absenteeism2', $up_absenteeism2)
            ->set('total_leave1', $up_total_leave1)
            ->set('total_leave2', $up_total_leave2)
            ->set('grand_total', $up_grand_total)
            ->set('late1', $up_late1)
            ->set('late2', $up_late2)
            ->set('verbal_warning', $up_verbal_warning)
            ->set('letter_warning', $up_letter_warning)
            ->where('id', $up_id)
            ->update('tb_submit_bonus_evaluate_foreman_and_below');
        return $rs;
    }

    function model_Submit_bonus_evaluate_g4_g6($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $sup_name1, $sup_name2, $Factory_Manager_GM, $quality_of_work, $job_responsibility, $cooperation, $communication, $teamwork, $technical_capability, $potential, $effectiveness, $adaptability, $creative, $assessment_score_h, $leave_score_h, $total_score_h, $assessment_status, $year_submit, $business_leave1, $business_leave2, $sick_leave1, $sick_leave2, $absenteeism1, $absenteeism2, $total_leave1, $total_leave2, $grand_total, $late1, $late2, $verbal_warning, $letter_warning)
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
            ->set('item1', $quality_of_work)
            ->set('item2', $job_responsibility)
            ->set('item3', $cooperation)
            ->set('item4', $communication)
            ->set('item5', $teamwork)
            ->set('item6', $technical_capability)
            ->set('item7', $potential)
            ->set('item8', $effectiveness)
            ->set('item9', $adaptability)
            ->set('item10', $creative)
            ->set('status', 1)
            ->set('assessment_status', $assessment_status)
            ->set('assessment_score', $assessment_score_h)
            ->set('leave_score', $leave_score_h)
            ->set('total_score', $total_score_h)
            ->set('year_submit  ', $year_submit)
            ->set('business_leave1', $business_leave1)
            ->set('business_leave2', $business_leave2)
            ->set('sick_leave1', $sick_leave1)
            ->set('sick_leave2', $sick_leave2)
            ->set('absenteeism1', $absenteeism1)
            ->set('absenteeism2', $absenteeism2)
            ->set('total_leave1', $total_leave1)
            ->set('total_leave2', $total_leave2)
            ->set('grand_total', $grand_total)
            ->set('late1', $late1)
            ->set('late2', $late2)
            ->set('verbal_warning', $verbal_warning)
            ->set('letter_warning', $letter_warning)
            ->insert('tb_submit_bonus_evaluate_g4_g6');
        return $rs;
    }

    function model_up_Submit_bonus_evaluate_g4_g6($up_id, $up_date_submit, $up_emp_name, $up_emp_id, $up_position, $up_section, $up_hired_date, $up_emp_year_of_service, $up_sup_name1, $up_sup_name2, $up_Factory_Manager_GM, $up_quality_of_work, $up_job_responsibility, $up_cooperation, $up_communication, $up_teamwork, $up_technical_capability, $up_potential, $up_effectiveness, $up_adaptability, $up_creative, $up_assessment_score_h, $up_leave_score_h, $up_total_score_h, $up_assessment_status, $up_year_submit, $up_business_leave1, $up_business_leave2, $up_sick_leave1, $up_sick_leave2, $up_absenteeism1, $up_absenteeism2, $up_total_leave1, $up_total_leave2, $up_grand_total, $up_late1, $up_late2, $up_verbal_warning, $up_letter_warning)
    {
        $rs = $this->db_hr
            ->set('emp_name', $up_emp_name)
            ->set('emp_id', $up_emp_id)
            ->set('date_submit', $up_date_submit)
            ->set('position', $up_position)
            ->set('section', $up_section)
            ->set('employment_date', $up_hired_date)
            ->set('year_fo_service', $up_emp_year_of_service)
            ->set('sup_name1', $up_sup_name1)
            ->set('sup_name2', $up_sup_name2)
            ->set('Factory_Manager_GM', $up_Factory_Manager_GM)
            ->set('item1', $up_quality_of_work)
            ->set('item2', $up_job_responsibility)
            ->set('item3', $up_cooperation)
            ->set('item4', $up_communication)
            ->set('item5', $up_teamwork)
            ->set('item6', $up_technical_capability)
            ->set('item7', $up_potential)
            ->set('item8', $up_effectiveness)
            ->set('item9', $up_adaptability)
            ->set('item10', $up_creative)
            ->set('status', 1)
            ->set('assessment_status', $up_assessment_status)
            ->set('assessment_score', $up_assessment_score_h)
            ->set('leave_score', $up_leave_score_h)
            ->set('total_score', $up_total_score_h)
            ->set('year_submit  ', $up_year_submit)
            ->set('business_leave1', $up_business_leave1)
            ->set('business_leave2', $up_business_leave2)
            ->set('sick_leave1', $up_sick_leave1)
            ->set('sick_leave2', $up_sick_leave2)
            ->set('absenteeism1', $up_absenteeism1)
            ->set('absenteeism2', $up_absenteeism2)
            ->set('total_leave1', $up_total_leave1)
            ->set('total_leave2', $up_total_leave2)
            ->set('grand_total', $up_grand_total)
            ->set('late1', $up_late1)
            ->set('late2', $up_late2)
            ->set('verbal_warning', $up_verbal_warning)
            ->set('letter_warning', $up_letter_warning)
            ->where('id', $up_id)
            ->update('tb_submit_bonus_evaluate_g4_g6');
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

    function model_data_EvaluateForeman_id($id)
    {
        $sql = "SELECT * FROM tb_submit_bonus_evaluate_foreman_and_below WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_data_EvaluateG4G6_id($id)
    {
        $sql = "SELECT * FROM tb_submit_bonus_evaluate_g4_g6 WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }
}
