<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Bonus_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('modelBonus', 'hr');
    }

    function read_json($json)
    {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        echo $json;
    }

    function FormBonusAnnualEvaluateG4G6()
    {
        if (isset($_GET['emp_id'])) {
            $emp_id = $_GET['emp_id'];
        } else {
            $emp_id = "";
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        $data_EvaluateG4G6_id['data_EvaluateG4G6_id'] = $this->hr->model_data_EvaluateG4G6_id($id);
        $emp_data['emp_data'] = $this->hr->model_emp_data($emp_id);
        $emp_leave_data['emp_leave_data'] = $this->hr->model_emp_leave_data($emp_id);
        $bonus_evaluate_g4_g6['bonus_evaluate_g4_g6'] = $this->hr->model_bonus_evaluate_g4_g6();
        $title['title'] = 'AA002-Bonus&Annual Evaluate G4-G6';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormBonusAnnualEvaluateG4G6', $bonus_evaluate_g4_g6 + $emp_data + $emp_leave_data + $data_EvaluateG4G6_id);
        $this->load->view('include/footer');
    }

    function TableAssessmentRecord()
    {
        $subordinate_emp['subordinate_emp'] = $this->hr->model_subordinate_emp();
        $title['title'] = 'Assessment Record';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('TableAssessmentRecord', $subordinate_emp);
        $this->load->view('include/footer');
    }

    function FormBonusAnnualEvaluateG2G3()
    {
        if (isset($_GET['emp_id'])) {
            $emp_id = $_GET['emp_id'];
        } else {
            $emp_id = "";
        }
        $emp_data['emp_data'] = $this->hr->model_emp_data($emp_id);
        $emp_leave_data['emp_leave_data'] = $this->hr->model_emp_leave_data($emp_id);
        $bonus_evaluate_g2_g3['bonus_evaluate_g2_g3'] = $this->hr->model_bonus_evaluate_g2_g3();
        $title['title'] = 'AA003-Bonus&Annual Evaluate G2-G3';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormBonusAnnualEvaluateG2G3', $bonus_evaluate_g2_g3 + $emp_data + $emp_leave_data);
        $this->load->view('include/footer');
    }

    function FormBonusAnnualEvaluateForemanAndbelow()
    {
        if (isset($_GET['emp_id'])) {
            $emp_id = $_GET['emp_id'];
        } else {
            $emp_id = "";
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        $data_EvaluateForeman_id['data_EvaluateForeman_id'] = $this->hr->model_data_EvaluateForeman_id($id);
        $emp_data['emp_data'] = $this->hr->model_emp_data($emp_id);
        $emp_leave_data['emp_leave_data'] = $this->hr->model_emp_leave_data($emp_id);
        $bonus_evaluate_Foreman_below['bonus_evaluate_Foreman_below'] = $this->hr->model_bonus_evaluate_Foreman_below();
        $title['title'] = 'AA001-Bonus&Annual Evaluate Foreman & below';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormBonusAnnualEvaluateForemanAndbelow', $bonus_evaluate_Foreman_below + $emp_data + $emp_leave_data + $data_EvaluateForeman_id);
        $this->load->view('include/footer');
    }

    function Submit_bonus_evaluate_foreman_ajax()
    {
        $date_submit = $this->input->post('date_submit');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $hired_date = $this->input->post('hired_date');
        $emp_year_of_service = $this->input->post('emp_year_of_service');
        $foreman = $this->input->post('foreman');
        $sup_name1 = $this->input->post('sup_name1');
        $sup_name2 = $this->input->post('sup_name2');
        $Factory_Manager_GM = $this->input->post('Factory_Manager_GM');
        $quality_of_work = $this->input->post('quality_of_work');
        $job_responsibility = $this->input->post('job_responsibility');
        $cooperation = $this->input->post('cooperation');
        $teamwork = $this->input->post('teamwork');
        $job_knowledge = $this->input->post('job_knowledge');
        $technical_skill = $this->input->post('technical_skill');
        $assessment_score_h = $this->input->post('assessment_score_h');
        $leave_score_h = $this->input->post('leave_score_h');
        $total_score_h = $this->input->post('total_score_h');
        $assessment_status = $this->input->post('assessment_status');
        $year_submit = $this->input->post('year_submit');
        $business_leave1 = $this->input->post('business_leave1');
        $business_leave2 = $this->input->post('business_leave2');
        $sick_leave1 = $this->input->post('sick_leave1');
        $sick_leave2 = $this->input->post('sick_leave2');
        $absenteeism1 = $this->input->post('absenteeism1');
        $absenteeism2 = $this->input->post('absenteeism2');
        $total_leave1 = $this->input->post('total_leave1');
        $total_leave2 = $this->input->post('total_leave2');
        $grand_total = $this->input->post('grand_total');
        $late1 = $this->input->post('late1');
        $late2 = $this->input->post('late2');
        $verbal_warning = $this->input->post('verbal_warning');
        $letter_warning = $this->input->post('letter_warning');

        $rs = $this->hr->model_Submit_bonus_evaluate_foreman($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $foreman, $sup_name1, $sup_name2, $Factory_Manager_GM, $quality_of_work, $job_responsibility, $cooperation, $teamwork, $job_knowledge, $technical_skill, $assessment_score_h, $leave_score_h, $total_score_h, $assessment_status, $year_submit, $business_leave1, $business_leave2, $sick_leave1, $sick_leave2, $absenteeism1, $absenteeism2, $total_leave1, $total_leave2, $grand_total, $late1, $late2, $verbal_warning, $letter_warning);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function up_Submit_bonus_evaluate_foreman_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_date_submit = $this->input->post('up_date_submit');
        $up_emp_name = $this->input->post('up_emp_name');
        $up_emp_id = $this->input->post('up_emp_id');
        $up_position = $this->input->post('up_position');
        $up_section = $this->input->post('up_section');
        $up_hired_date = $this->input->post('up_hired_date');
        $up_emp_year_of_service = $this->input->post('up_emp_year_of_service');
        $up_foreman = $this->input->post('up_foreman');
        $up_sup_name1 = $this->input->post('up_sup_name1');
        $up_sup_name2 = $this->input->post('up_sup_name2');
        $up_Factory_Manager_GM = $this->input->post('up_Factory_Manager_GM');
        $up_quality_of_work = $this->input->post('up_quality_of_work');
        $up_job_responsibility = $this->input->post('up_job_responsibility');
        $up_cooperation = $this->input->post('up_cooperation');
        $up_teamwork = $this->input->post('up_teamwork');
        $up_job_knowledge = $this->input->post('up_job_knowledge');
        $up_technical_skill = $this->input->post('up_technical_skill');
        $up_assessment_score_h = $this->input->post('up_assessment_score_h');
        $up_leave_score_h = $this->input->post('up_leave_score_h');
        $up_total_score_h = $this->input->post('up_total_score_h');
        $up_assessment_status = $this->input->post('up_assessment_status');
        $up_year_submit = $this->input->post('up_year_submit');
        $up_business_leave1 = $this->input->post('up_business_leave1');
        $up_business_leave2 = $this->input->post('up_business_leave2');
        $up_sick_leave1 = $this->input->post('up_sick_leave1');
        $up_sick_leave2 = $this->input->post('up_sick_leave2');
        $up_absenteeism1 = $this->input->post('up_absenteeism1');
        $up_absenteeism2 = $this->input->post('up_absenteeism2');
        $up_total_leave1 = $this->input->post('up_total_leave1');
        $up_total_leave2 = $this->input->post('up_total_leave2');
        $up_grand_total = $this->input->post('up_grand_total');
        $up_late1 = $this->input->post('up_late1');
        $up_late2 = $this->input->post('up_late2');
        $up_verbal_warning = $this->input->post('up_verbal_warning');
        $up_letter_warning = $this->input->post('up_letter_warning');

        $rs = $this->hr->model_up_Submit_bonus_evaluate_foreman($up_id, $up_date_submit, $up_emp_name, $up_emp_id, $up_position, $up_section, $up_hired_date, $up_emp_year_of_service, $up_foreman, $up_sup_name1, $up_sup_name2, $up_Factory_Manager_GM, $up_quality_of_work, $up_job_responsibility, $up_cooperation, $up_teamwork, $up_job_knowledge, $up_technical_skill, $up_assessment_score_h, $up_leave_score_h, $up_total_score_h, $up_assessment_status, $up_year_submit, $up_business_leave1, $up_business_leave2, $up_sick_leave1, $up_sick_leave2, $up_absenteeism1, $up_absenteeism2, $up_total_leave1, $up_total_leave2, $up_grand_total, $up_late1, $up_late2, $up_verbal_warning, $up_letter_warning);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Submit_bonus_evaluate_g4_g6_ajax()
    {
        $date_submit = $this->input->post('date_submit');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $hired_date = $this->input->post('hired_date');
        $emp_year_of_service = $this->input->post('emp_year_of_service');
        $sup_name1 = $this->input->post('sup_name1');
        $sup_name2 = $this->input->post('sup_name2');
        $Factory_Manager_GM = $this->input->post('Factory_Manager_GM');
        $quality_of_work = $this->input->post('quality_of_work');
        $job_responsibility = $this->input->post('job_responsibility');
        $cooperation = $this->input->post('cooperation');
        $communication = $this->input->post('communication');
        $teamwork = $this->input->post('teamwork');
        $technical_capability = $this->input->post('technical_capability');
        $potential = $this->input->post('potential');
        $effectiveness = $this->input->post('effectiveness');
        $adaptability = $this->input->post('adaptability');
        $creative = $this->input->post('creative');
        $assessment_score_h = $this->input->post('assessment_score_h');
        $leave_score_h = $this->input->post('leave_score_h');
        $total_score_h = $this->input->post('total_score_h');
        $assessment_status = $this->input->post('assessment_status');
        $year_submit = $this->input->post('year_submit');
        $business_leave1 = $this->input->post('business_leave1');
        $business_leave2 = $this->input->post('business_leave2');
        $sick_leave1 = $this->input->post('sick_leave1');
        $sick_leave2 = $this->input->post('sick_leave2');
        $absenteeism1 = $this->input->post('absenteeism1');
        $absenteeism2 = $this->input->post('absenteeism2');
        $total_leave1 = $this->input->post('total_leave1');
        $total_leave2 = $this->input->post('total_leave2');
        $grand_total = $this->input->post('grand_total');
        $late1 = $this->input->post('late1');
        $late2 = $this->input->post('late2');
        $verbal_warning = $this->input->post('verbal_warning');
        $letter_warning = $this->input->post('letter_warning');

        $rs = $this->hr->model_Submit_bonus_evaluate_g4_g6($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $sup_name1, $sup_name2, $Factory_Manager_GM, $quality_of_work, $job_responsibility, $cooperation, $communication, $teamwork, $technical_capability, $potential, $effectiveness, $adaptability, $creative, $assessment_score_h, $leave_score_h, $total_score_h, $assessment_status, $year_submit, $business_leave1, $business_leave2, $sick_leave1, $sick_leave2, $absenteeism1, $absenteeism2, $total_leave1, $total_leave2, $grand_total, $late1, $late2, $verbal_warning, $letter_warning);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function up_Submit_bonus_evaluate_g4_g6_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_date_submit = $this->input->post('up_date_submit');
        $up_emp_name = $this->input->post('up_emp_name');
        $up_emp_id = $this->input->post('up_emp_id');
        $up_position = $this->input->post('up_position');
        $up_section = $this->input->post('up_section');
        $up_hired_date = $this->input->post('up_hired_date');
        $up_emp_year_of_service = $this->input->post('up_emp_year_of_service');
        $up_sup_name1 = $this->input->post('up_sup_name1');
        $up_sup_name2 = $this->input->post('up_sup_name2');
        $up_Factory_Manager_GM = $this->input->post('up_Factory_Manager_GM');
        $up_quality_of_work = $this->input->post('up_quality_of_work');
        $up_job_responsibility = $this->input->post('up_job_responsibility');
        $up_cooperation = $this->input->post('up_cooperation');
        $up_communication = $this->input->post('up_communication');
        $up_teamwork = $this->input->post('up_teamwork');
        $up_technical_capability = $this->input->post('up_technical_capability');
        $up_potential = $this->input->post('up_potential');
        $up_effectiveness = $this->input->post('up_effectiveness');
        $up_adaptability = $this->input->post('up_adaptability');
        $up_creative = $this->input->post('up_creative');
        $up_assessment_score_h = $this->input->post('up_assessment_score_h');
        $up_leave_score_h = $this->input->post('up_leave_score_h');
        $up_total_score_h = $this->input->post('up_total_score_h');
        $up_assessment_status = $this->input->post('up_assessment_status');
        $up_year_submit = $this->input->post('up_year_submit');
        $up_business_leave1 = $this->input->post('up_business_leave1');
        $up_business_leave2 = $this->input->post('up_business_leave2');
        $up_sick_leave1 = $this->input->post('up_sick_leave1');
        $up_sick_leave2 = $this->input->post('up_sick_leave2');
        $up_absenteeism1 = $this->input->post('up_absenteeism1');
        $up_absenteeism2 = $this->input->post('up_absenteeism2');
        $up_total_leave1 = $this->input->post('up_total_leave1');
        $up_total_leave2 = $this->input->post('up_total_leave2');
        $up_grand_total = $this->input->post('up_grand_total');
        $up_late1 = $this->input->post('up_late1');
        $up_late2 = $this->input->post('up_late2');
        $up_verbal_warning = $this->input->post('up_verbal_warning');
        $up_letter_warning = $this->input->post('up_letter_warning');

        $rs = $this->hr->model_up_Submit_bonus_evaluate_g4_g6($up_id, $up_date_submit, $up_emp_name, $up_emp_id, $up_position, $up_section, $up_hired_date, $up_emp_year_of_service, $up_sup_name1, $up_sup_name2, $up_Factory_Manager_GM, $up_quality_of_work, $up_job_responsibility, $up_cooperation, $up_communication, $up_teamwork, $up_technical_capability, $up_potential, $up_effectiveness, $up_adaptability, $up_creative, $up_assessment_score_h, $up_leave_score_h, $up_total_score_h, $up_assessment_status, $up_year_submit, $up_business_leave1, $up_business_leave2, $up_sick_leave1, $up_sick_leave2, $up_absenteeism1, $up_absenteeism2, $up_total_leave1, $up_total_leave2, $up_grand_total, $up_late1, $up_late2, $up_verbal_warning, $up_letter_warning);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Submit_bonus_evaluate_g2_g3_ajax()
    {
        $date_submit = $this->input->post('date_submit');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $position = $this->input->post('position');
        $section = $this->input->post('section');
        $hired_date = $this->input->post('hired_date');
        $emp_year_of_service = $this->input->post('emp_year_of_service');
        $sup_name1 = $this->input->post('sup_name1');
        $sup_name2 = $this->input->post('sup_name2');
        $Factory_Manager_GM = $this->input->post('Factory_Manager_GM');

        $rs = $this->hr->model_Submit_bonus_evaluate_g2_g3($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $sup_name1, $sup_name2, $Factory_Manager_GM);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function StaticFormBonusAnnualEvaluateForemanAndbelow()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        $data_EvaluateForeman_id['data_EvaluateForeman_id'] = $this->hr->model_data_EvaluateForeman_id($id);
        $bonus_evaluate_Foreman_below['bonus_evaluate_Foreman_below'] = $this->hr->model_bonus_evaluate_Foreman_below();
        $title['title'] = 'AA001-Bonus&Annual Evaluate Foreman & below';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('StaticFormBonusAnnualEvaluateForemanAndbelow', $bonus_evaluate_Foreman_below + $data_EvaluateForeman_id);
        $this->load->view('include/footer');
    }

    function StaticFormBonusAnnualEvaluateG4G6()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        $data_EvaluateG4G6_id['data_EvaluateG4G6_id'] = $this->hr->model_data_EvaluateG4G6_id($id);
        $bonus_evaluate_g4_g6['bonus_evaluate_g4_g6'] = $this->hr->model_bonus_evaluate_g4_g6();
        $title['title'] = 'AA001-Bonus&Annual Evaluate Grade 4 – Grade 6';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('StaticFormBonusAnnualEvaluateG4G6', $bonus_evaluate_g4_g6 + $data_EvaluateG4G6_id);
        $this->load->view('include/footer');
    }

    public function PrintPDFForeman($id)
    {
        $data_EvaluateForeman_id['data_EvaluateForeman_id'] = $this->hr->model_data_EvaluateForeman_id($id);
        $bonus_evaluate_Foreman_below['bonus_evaluate_Foreman_below'] = $this->hr->model_bonus_evaluate_Foreman_below();

        $html = $this->load->view('PrintPDFForeman', $data_EvaluateForeman_id + $bonus_evaluate_Foreman_below, true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        $title['title'] = 'File PDF BONUS & ANNUAL Assessment for Foreman & below';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FilePDFForeman');
        $this->load->view('include/footer');
    }

    public function PrintPDFG4G6($id)
    {
        $data_EvaluateG4G6_id['data_EvaluateG4G6_id'] = $this->hr->model_data_EvaluateG4G6_id($id);
        $bonus_evaluate_g4_g6['bonus_evaluate_g4_g6'] = $this->hr->model_bonus_evaluate_g4_g6();

        $html = $this->load->view('PrintPDFG4G6', $data_EvaluateG4G6_id + $bonus_evaluate_g4_g6, true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        $title['title'] = 'File PDF BONUS & ANNUAL Assessment for Grade 4 – Grade 6';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FilePDFG4G6');
        $this->load->view('include/footer');
    }
}
