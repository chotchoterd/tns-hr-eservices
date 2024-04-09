<?php
class ModelHR extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_hr = $this->load->database('db_hr', TRUE);
    }

    function model_form_division()
    {
        $sql = "SELECT DISTINCT([DIV_CODE]) AS division_id,[DIV_NAME] AS division_name FROM [TNS-MACS].[dbo].[VW_EDMS_DIVISION_DISCIPLINES]
        WHERE DIV_CODE not in ('MYMA','NSE')
        ORDER BY DIV_NAME";
        $rs = $this->db_macs
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_topic_selfevaluation()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_topic_self_evaluation WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_sub_topic_selfevaluation()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_sub_topic_self_evaluation WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_item_option_selfevaluation()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_item_option_self_evaluation WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_subtopic_in_subtopic()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_subtopic_in_subtopic_self_evaluation WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_item_option_is_subtopic_in_subtopic()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_item_option_is_subtopic_in_subtopic_self_evaluation WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_item_option_is_subtopic_in_subtopic_division()
    {
        $current_year = date('Y');
        $sql = "SELECT DISTINCT(division) AS division_option FROM tb_item_option_is_subtopic_in_subtopic_self_evaluation 
        WHERE status = 1
        AND division != ' '
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_emp_hr_import_page($s_emp_id, $s_emp_name, $s_emp_grade, $s_status, $s_emp_section, $s_emp_division, $s_superior_name, $s_superior_grade)
    {
        $sql = "SELECT * FROM tb_emp_hr_import 
        WHERE emp_id LIKE '%" . $s_emp_id . "%'
        AND emp_name LIKE '%" . $s_emp_name . "%'
        AND emp_grade LIKE '%" . $s_emp_grade . "%'
        AND status LIKE '%" . $s_status . "%'
        AND emp_section LIKE '%" . $s_emp_section . "%'
        AND emp_division LIKE '%" . $s_emp_division . "%'
        AND superior_name1 LIKE '%" . $s_superior_name . "%'
        AND superior_grade1 LIKE '%" . $s_superior_grade . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_emp_hr_import_leave($s_emp_id, $s_year, $s_business_leave, $s_sick_leave, $s_absenteeism, $s_late)
    {
        $sql = "SELECT * FROM tb_emp_hr_import_leave
        WHERE emp_id LIKE '%" . $s_emp_id . "%'
        AND year LIKE '%" . $s_year . "%'
        AND business_leave LIKE '%" . $s_business_leave . "%'
        AND sick_leave LIKE '%" . $s_sick_leave . "%'
        AND absenteeism LIKE '%" . $s_absenteeism . "%'
        AND late LIKE '%" . $s_late . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_submit_self_evaluation($year_submit, $date_submit, $emp_name, $emp_id, $emp_grade, $section, $division, $hired_date, $sup_name, $sup_grade, $emp_year_of_service, $job_target_1, $actual_achievement, $job_target_2, $item_option_selfevaluations3_1, $item_option_selfevaluation3_2, $others_capability, $improve_yourself, $weaknesses, $strengths, $target_in_next_year, $item_option_selfevaluation3_6, $item_option_is_subtopic_in_subtopics3_6_1, $others_3_6_1, $item_option_is_subtopic_in_subtopics3_6_2, $others_3_6_2, $your_feedback, $emp_email, $self_evaluation_status)
    {
        $rs = $this->db_hr
            ->set('year_submit', $year_submit)
            ->set('date_submit', $date_submit)
            ->set('emp_name', $emp_name)
            ->set('emp_id', $emp_id)
            ->set('emp_grade', $emp_grade)
            ->set('section', $section)
            ->set('division', $division)
            ->set('hired_date', $hired_date)
            ->set('emp_email', $emp_email)
            ->set('sup_name', $sup_name)
            ->set('sup_grade', $sup_grade)
            ->set('emp_year_of_service', $emp_year_of_service)
            ->set('job_target_1', $job_target_1)
            ->set('actual_achievement', $actual_achievement)
            ->set('job_target_2', $job_target_2)
            ->set('item_option_selfevaluations3_1', $item_option_selfevaluations3_1)
            ->set('item_option_selfevaluation3_2', $item_option_selfevaluation3_2)
            ->set('others_capability', $others_capability)
            ->set('improve_yourself', $improve_yourself)
            ->set('weaknesses', $weaknesses)
            ->set('strengths', $strengths)
            ->set('target_in_next_year', $target_in_next_year)
            ->set('item_option_selfevaluation3_6', $item_option_selfevaluation3_6)
            ->set('item_option_is_subtopic_in_subtopics3_6_1', $item_option_is_subtopic_in_subtopics3_6_1)
            ->set('others_3_6_1', $others_3_6_1)
            ->set('item_option_is_subtopic_in_subtopic3_6_2', $item_option_is_subtopic_in_subtopics3_6_2)
            ->set('others_3_6_2', $others_3_6_2)
            ->set('your_feedback', $your_feedback)
            ->set('status', 1)
            ->set('self_evaluation_status', $self_evaluation_status)
            ->insert('tb_submit_self_evaluation');
        return $rs;
    }

    function model_up_submit_self_evaluation($up_id, $up_year_submit, $up_date_submit, $up_emp_name, $up_emp_id, $up_emp_grade, $up_section, $up_division, $up_hired_date, $up_emp_email, $up_sup_name, $up_sup_grade, $up_emp_year_of_service, $up_job_target_1, $up_actual_achievement, $up_job_target_2, $up_item_option_selfevaluations3_1, $up_item_option_selfevaluation3_2, $up_others_capability, $up_improve_yourself, $up_weaknesses, $up_strengths, $up_target_in_next_year, $up_item_option_selfevaluation3_6, $up_item_option_is_subtopic_in_subtopics3_6_1, $up_others_3_6_1, $up_item_option_is_subtopic_in_subtopics3_6_2, $up_others_3_6_2, $up_your_feedback, $up_self_evaluation_status)
    {
        $rs = $this->db_hr
            ->set('year_submit', $up_year_submit)
            ->set('date_submit', $up_date_submit)
            ->set('emp_name', $up_emp_name)
            ->set('emp_id', $up_emp_id)
            ->set('emp_grade', $up_emp_grade)
            ->set('section', $up_section)
            ->set('division', $up_division)
            ->set('hired_date', $up_hired_date)
            ->set('emp_email', $up_emp_email)
            ->set('sup_name', $up_sup_name)
            ->set('sup_grade', $up_sup_grade)
            ->set('emp_year_of_service', $up_emp_year_of_service)
            ->set('job_target_1', $up_job_target_1)
            ->set('actual_achievement', $up_actual_achievement)
            ->set('job_target_2', $up_job_target_2)
            ->set('item_option_selfevaluations3_1', $up_item_option_selfevaluations3_1)
            ->set('item_option_selfevaluation3_2', $up_item_option_selfevaluation3_2)
            ->set('others_capability', $up_others_capability)
            ->set('improve_yourself', $up_improve_yourself)
            ->set('weaknesses', $up_weaknesses)
            ->set('strengths', $up_strengths)
            ->set('target_in_next_year', $up_target_in_next_year)
            ->set('item_option_selfevaluation3_6', $up_item_option_selfevaluation3_6)
            ->set('item_option_is_subtopic_in_subtopics3_6_1', $up_item_option_is_subtopic_in_subtopics3_6_1)
            ->set('others_3_6_1', $up_others_3_6_1)
            ->set('item_option_is_subtopic_in_subtopic3_6_2', $up_item_option_is_subtopic_in_subtopics3_6_2)
            ->set('others_3_6_2', $up_others_3_6_2)
            ->set('your_feedback', $up_your_feedback)
            ->set('self_evaluation_status', $up_self_evaluation_status)
            ->set('status', 1)
            ->where('id', $up_id)
            ->update('tb_submit_self_evaluation');
        return $rs;
    }

    function model_submit_formStatic_self_evaluation($up_id, $year_submit, $date_submit, $emp_name, $emp_id, $emp_grade, $section, $division, $hired_date, $emp_email, $sup_name, $sup_grade, $emp_year_of_service, $job_target_1, $actual_achievement, $job_target_2, $item_option_selfevaluations3_1, $item_option_selfevaluation3_2, $others_capability, $improve_yourself, $weaknesses, $strengths, $target_in_next_year, $item_option_selfevaluation3_6, $item_option_is_subtopic_in_subtopics3_6_1, $others_3_6_1, $item_option_is_subtopic_in_subtopics3_6_2, $others_3_6_2, $your_feedback, $self_evaluation_status)
    {
        $rs = $this->db_hr
            ->set('year_submit', $year_submit)
            ->set('date_submit', $date_submit)
            ->set('emp_name', $emp_name)
            ->set('emp_id', $emp_id)
            ->set('emp_grade', $emp_grade)
            ->set('section', $section)
            ->set('division', $division)
            ->set('hired_date', $hired_date)
            ->set('emp_email', $emp_email)
            ->set('sup_name', $sup_name)
            ->set('sup_grade', $sup_grade)
            ->set('emp_year_of_service', $emp_year_of_service)
            ->set('job_target_1', $job_target_1)
            ->set('actual_achievement', $actual_achievement)
            ->set('job_target_2', $job_target_2)
            ->set('item_option_selfevaluations3_1', $item_option_selfevaluations3_1)
            ->set('item_option_selfevaluation3_2', $item_option_selfevaluation3_2)
            ->set('others_capability', $others_capability)
            ->set('improve_yourself', $improve_yourself)
            ->set('weaknesses', $weaknesses)
            ->set('strengths', $strengths)
            ->set('target_in_next_year', $target_in_next_year)
            ->set('item_option_selfevaluation3_6', $item_option_selfevaluation3_6)
            ->set('item_option_is_subtopic_in_subtopics3_6_1', $item_option_is_subtopic_in_subtopics3_6_1)
            ->set('others_3_6_1', $others_3_6_1)
            ->set('item_option_is_subtopic_in_subtopic3_6_2', $item_option_is_subtopic_in_subtopics3_6_2)
            ->set('others_3_6_2', $others_3_6_2)
            ->set('your_feedback', $your_feedback)
            ->set('self_evaluation_status', $self_evaluation_status)
            ->set('status', 1)
            ->where('id', $up_id)
            ->update('tb_submit_self_evaluation');
        return $rs;
    }

    function model_self_evaluation()
    {
        $sql = "SELECT * FROM tb_submit_self_evaluation";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_self_evaluation_one_user($emp_email)
    {
        $sql = "SELECT * FROM tb_submit_self_evaluation WHERE emp_email = '" . $emp_email . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_self_evaluation_hr($emp_email)
    {
        $sql = "(SELECT * FROM tb_submit_self_evaluation WHERE self_evaluation_status NOT IN ('Draft')
        AND emp_email != '" . $emp_email . "'
        AND year_submit = YEAR(CURRENT_DATE)
        ORDER BY id ASC)
        UNION
        (SELECT * FROM tb_submit_self_evaluation WHERE emp_email = '" . $emp_email . "'
        AND year_submit = YEAR(CURRENT_DATE)
        ORDER BY id ASC)";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_self_evaluation_id($id)
    {
        $sql = "SELECT * FROM tb_submit_self_evaluation WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_hr_insert_emp($data)
    {
        foreach ($data as $row) {
            $emp_id = $row['emp_id'];
            $emp_name = $row['emp_name'];
            $emp_grade = $row['emp_grade'];
            $emp_division = $row['emp_division'];
            $emp_section = $row['emp_section'];
            $emp_hired_date = $row['emp_hired_date'];
            $emp_email = $row['emp_email'];
            $status = $row['status'];

            if ($emp_name != "" && $emp_grade != "" && $emp_division != "" && $emp_section != "" && $emp_hired_date != "" && $emp_email != "" && $status != "") {
                $existing_record = $this->db_hr->get_where('tb_emp_hr_import', array('emp_id' => $emp_id))->row();
                if ($existing_record) {
                    $this->db_hr->where('emp_id', $emp_id);
                    $this->db_hr->update('tb_emp_hr_import', $row);
                } else {
                    $this->db_hr->insert('tb_emp_hr_import', $row);
                }
            }
        }
    }

    function model_hr_insert_leave($data)
    {
        foreach ($data as $row) {
            $emp_id = $row['emp_id'];
            $existing_record = $this->db_hr->get_where('tb_emp_hr_import_leave', array('emp_id' => $emp_id))->row();
            if ($existing_record) {
                $this->db_hr->where('emp_id', $emp_id);
                $this->db_hr->update('tb_emp_hr_import_leave', $row);
            } else {
                $this->db_hr->insert('tb_emp_hr_import_leave', $row);
            }
        }
    }

    function model_admin_record($s_emp_id, $s_emp_name, $s_status)
    {
        $sql = "SELECT admin.status, hr_import.emp_name AS name_hr, admin.* FROM tb_admin admin
        LEFT JOIN tb_emp_hr_import hr_import ON (hr_import.emp_id = admin.emp_id)
        WHERE admin.emp_id LIKE '%" . $s_emp_id . "%'
        AND hr_import.emp_name LIKE '%" . $s_emp_name . "%'
        AND admin.status LIKE '%" . $s_status . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Add_hr($emp_id, $status)
    {
        $emp_id = strtoupper($emp_id);
        $this->db_hr->where("emp_id", $emp_id);
        $check_tb_admin = $this->db_hr->get('tb_admin');
        $this->db_hr->where("emp_id", $emp_id);
        $check_tb_emp_hr_import = $this->db_hr->get('tb_emp_hr_import');
        if ($check_tb_admin->num_rows() == 0 && $check_tb_emp_hr_import->num_rows() != 0) {
            $rs = $this->db_hr
                ->set("emp_id", $emp_id)
                ->set("admin_code", 1)
                ->set("status", $status)
                ->insert("tb_admin");
        }
        return $rs;
    }

    function model_manage_admin_id($id)
    {
        $sql = "SELECT * FROM tb_admin WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Update_hr($up_id, $up_emp_id, $up_status)
    {
        $up_emp_id = strtoupper($up_emp_id);
        $this->db_hr->where("emp_id", $up_emp_id)->where('id !=', $up_id)->where('status != 0');
        $check_tb_admin = $this->db_hr->get('tb_admin');
        $this->db_hr->where("emp_id", $up_emp_id);
        $check_tb_emp_hr_import = $this->db_hr->get('tb_emp_hr_import');
        if ($check_tb_admin->num_rows() == 0 && $check_tb_emp_hr_import->num_rows() != 0) {
            $rs = $this->db_hr
                ->set("emp_id", $up_emp_id)
                ->set("admin_code", 1)
                ->set("status", $up_status)
                ->where("id", $up_id)
                ->update("tb_admin");
        }
        return $rs;
    }
}
