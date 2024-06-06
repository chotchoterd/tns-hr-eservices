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
        $emp_data['emp_data'] = $this->hr->model_emp_data($emp_id);
        $emp_leave_data['emp_leave_data'] = $this->hr->model_emp_leave_data($emp_id);
        $bonus_evaluate_g4_g6['bonus_evaluate_g4_g6'] = $this->hr->model_bonus_evaluate_g4_g6();
        $title['title'] = 'AA002-Bonus&Annual Evaluate G4-G6';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormBonusAnnualEvaluateG4G6', $bonus_evaluate_g4_g6 + $emp_data + $emp_leave_data);
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
        $emp_data['emp_data'] = $this->hr->model_emp_data($emp_id);
        $emp_leave_data['emp_leave_data'] = $this->hr->model_emp_leave_data($emp_id);
        $bonus_evaluate_Foreman_below['bonus_evaluate_Foreman_below'] = $this->hr->model_bonus_evaluate_Foreman_below();
        $title['title'] = 'AA001-Bonus&Annual Evaluate Foreman & below';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormBonusAnnualEvaluateForemanAndbelow', $bonus_evaluate_Foreman_below + $emp_data + $emp_leave_data);
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
        $sub_name1 = $this->input->post('sub_name1');
        $sub_name2 = $this->input->post('sub_name2');
        $Factory_Manager_GM = $this->input->post('Factory_Manager_GM');

        $rs = $this->hr->model_Submit_bonus_evaluate_foreman($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $foreman, $sub_name1, $sub_name2, $Factory_Manager_GM);
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

        $rs = $this->hr->model_Submit_bonus_evaluate_g4_g6($date_submit, $emp_name, $emp_id, $position, $section, $hired_date, $emp_year_of_service, $sup_name1, $sup_name2, $Factory_Manager_GM);
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
}
