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
}
