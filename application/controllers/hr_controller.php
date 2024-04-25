<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hr_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('modelHR', 'hr');
    }

    function SelfEvaluationForm()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        $period_time['period_time'] = $this->hr->model_period_time();
        $self_evaluation['self_evaluation'] = $this->hr->model_self_evaluation();
        $self_evaluation_id['self_evaluation_id'] = $this->hr->model_self_evaluation_id($id);
        $item_option_is_subtopic_in_subtopic['item_option_is_subtopic_in_subtopic'] = $this->hr->model_item_option_is_subtopic_in_subtopic();
        $item_option_is_subtopic_in_subtopic_division['item_option_is_subtopic_in_subtopic_division'] = $this->hr->model_item_option_is_subtopic_in_subtopic_division();
        $subtopic_in_subtopic['subtopic_in_subtopic'] = $this->hr->model_subtopic_in_subtopic();
        $item_option_selfevaluation['item_option_selfevaluation'] = $this->hr->model_item_option_selfevaluation();
        $sub_topic_selfevaluation['sub_topic_selfevaluation'] = $this->hr->model_sub_topic_selfevaluation();
        $topic_selfevaluation['topic_selfevaluation'] = $this->hr->model_topic_selfevaluation();
        $title['title'] = 'Self-Evaluation Permanent Employee Grade 2 - Grade 6';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('SelfEvaluationForm', $self_evaluation + $self_evaluation_id + $topic_selfevaluation + $sub_topic_selfevaluation + $item_option_selfevaluation + $subtopic_in_subtopic + $item_option_is_subtopic_in_subtopic + $item_option_is_subtopic_in_subtopic_division + $period_time);
        $this->load->view('include/footer');
    }

    function submit_self_evaluation_ajax()
    {
        $year_submit = $this->input->post('year_submit');
        $date_submit = $this->input->post('date_submit');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $emp_grade = $this->input->post('emp_grade');
        $section = $this->input->post('section');
        $position = $this->input->post('position');
        $division = $this->input->post('division');
        $hired_date = $this->input->post('hired_date');
        $sup_name = $this->input->post('sup_name');
        $sup_grade = $this->input->post('sup_grade');
        $sup_name2 = $this->input->post('sup_name2');
        $sup_grade2 = $this->input->post('sup_grade2');
        $foreman = $this->input->post('foreman');
        $factory_Manager_GM = $this->input->post('factory_Manager_GM');
        $emp_year_of_service = $this->input->post('emp_year_of_service');
        $job_target_1 = $this->input->post('job_target_1');
        $actual_achievement = $this->input->post('actual_achievement');
        $job_target_2 = $this->input->post('job_target_2');
        $item_option_selfevaluations3_1 = $this->input->post('item_option_selfevaluations3_1');
        $item_option_selfevaluation3_2 = $this->input->post('item_option_selfevaluation3_2');
        $others_capability = $this->input->post('others_capability');
        $improve_yourself = $this->input->post('improve_yourself');
        $weaknesses = $this->input->post('weaknesses');
        $strengths = $this->input->post('strengths');
        $target_in_next_year = $this->input->post('target_in_next_year');
        $item_option_selfevaluation3_6 = $this->input->post('item_option_selfevaluation3_6');
        $item_option_is_subtopic_in_subtopics3_6_1 = $this->input->post('item_option_is_subtopic_in_subtopics3_6_1');
        $others_3_6_1 = $this->input->post('others_3_6_1');
        $item_option_is_subtopic_in_subtopics3_6_2 = $this->input->post('item_option_is_subtopic_in_subtopics3_6_2');
        $others_3_6_2 = $this->input->post('others_3_6_2');
        $your_feedback = $this->input->post('your_feedback');
        $emp_email = $this->input->post('emp_email');
        $self_evaluation_status = $this->input->post('self_evaluation_status');

        $rs = $this->hr->model_submit_self_evaluation($year_submit, $date_submit, $emp_name, $emp_id, $emp_grade, $position, $section, $division, $hired_date, $sup_name, $sup_grade, $sup_name2, $sup_grade2, $foreman, $factory_Manager_GM, $emp_year_of_service, $job_target_1, $actual_achievement, $job_target_2, $item_option_selfevaluations3_1, $item_option_selfevaluation3_2, $others_capability, $improve_yourself, $weaknesses, $strengths, $target_in_next_year, $item_option_selfevaluation3_6, $item_option_is_subtopic_in_subtopics3_6_1, $others_3_6_1, $item_option_is_subtopic_in_subtopics3_6_2, $others_3_6_2, $your_feedback, $emp_email, $self_evaluation_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function up_submit_self_evaluation_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_year_submit = $this->input->post('up_year_submit');
        $up_date_submit = $this->input->post('up_date_submit');
        $up_emp_name = $this->input->post('up_emp_name');
        $up_emp_id = $this->input->post('up_emp_id');
        $up_emp_grade = $this->input->post('up_emp_grade');
        $up_position = $this->input->post('up_position');
        $up_section = $this->input->post('up_section');
        $up_division = $this->input->post('up_division');
        $up_hired_date = $this->input->post('up_hired_date');
        $up_emp_email = $this->input->post('up_emp_email');
        $up_sup_name = $this->input->post('up_sup_name');
        $up_sup_grade = $this->input->post('up_sup_grade');
        $up_sup_name2 = $this->input->post('up_sup_name2');
        $up_sup_grade2 = $this->input->post('up_sup_grade2');
        $up_foreman = $this->input->post('up_foreman');
        $up_factory_Manager_GM = $this->input->post('up_factory_Manager_GM');
        $up_emp_year_of_service = $this->input->post('up_emp_year_of_service');
        $up_job_target_1 = $this->input->post('up_job_target_1');
        $up_actual_achievement = $this->input->post('up_actual_achievement');
        $up_job_target_2 = $this->input->post('up_job_target_2');
        $up_item_option_selfevaluations3_1 = $this->input->post('up_item_option_selfevaluations3_1');
        $up_item_option_selfevaluation3_2 = $this->input->post('up_item_option_selfevaluation3_2');
        $up_others_capability = $this->input->post('up_others_capability');
        $up_improve_yourself = $this->input->post('up_improve_yourself');
        $up_weaknesses = $this->input->post('up_weaknesses');
        $up_strengths = $this->input->post('up_strengths');
        $up_target_in_next_year = $this->input->post('up_target_in_next_year');
        $up_item_option_selfevaluation3_6 = $this->input->post('up_item_option_selfevaluation3_6');
        $up_item_option_is_subtopic_in_subtopics3_6_1 = $this->input->post('up_item_option_is_subtopic_in_subtopics3_6_1');
        $up_others_3_6_1 = $this->input->post('up_others_3_6_1');
        $up_item_option_is_subtopic_in_subtopics3_6_2 = $this->input->post('up_item_option_is_subtopic_in_subtopics3_6_2');
        $up_others_3_6_2 = $this->input->post('up_others_3_6_2');
        $up_your_feedback = $this->input->post('up_your_feedback');
        $up_self_evaluation_status = $this->input->post('up_self_evaluation_status');

        $rs = $this->hr->model_up_submit_self_evaluation($up_id, $up_year_submit, $up_date_submit, $up_emp_name, $up_emp_id, $up_emp_grade, $up_position, $up_section, $up_division, $up_hired_date, $up_emp_email, $up_sup_name, $up_sup_grade, $up_sup_name2, $up_sup_grade2, $up_foreman, $up_factory_Manager_GM, $up_emp_year_of_service, $up_job_target_1, $up_actual_achievement, $up_job_target_2, $up_item_option_selfevaluations3_1, $up_item_option_selfevaluation3_2, $up_others_capability, $up_improve_yourself, $up_weaknesses, $up_strengths, $up_target_in_next_year, $up_item_option_selfevaluation3_6, $up_item_option_is_subtopic_in_subtopics3_6_1, $up_others_3_6_1, $up_item_option_is_subtopic_in_subtopics3_6_2, $up_others_3_6_2, $up_your_feedback, $up_self_evaluation_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function submit_formStatic_self_evaluation_ajax()
    {
        $up_id = $this->input->post('up_id');
        $year_submit = $this->input->post('year_submit');
        $date_submit = $this->input->post('date_submit');
        $emp_name = $this->input->post('emp_name');
        $emp_id = $this->input->post('emp_id');
        $emp_grade = $this->input->post('emp_grade');
        $section = $this->input->post('section');
        $division = $this->input->post('division');
        $hired_date = $this->input->post('hired_date');
        $sup_name = $this->input->post('sup_name');
        $sup_grade = $this->input->post('sup_grade');
        $emp_year_of_service = $this->input->post('emp_year_of_service');
        $job_target_1 = $this->input->post('job_target_1');
        $actual_achievement = $this->input->post('actual_achievement');
        $job_target_2 = $this->input->post('job_target_2');
        $item_option_selfevaluations3_1 = $this->input->post('item_option_selfevaluations3_1');
        $item_option_selfevaluation3_2 = $this->input->post('item_option_selfevaluation3_2');
        $others_capability = $this->input->post('others_capability');
        $improve_yourself = $this->input->post('improve_yourself');
        $weaknesses = $this->input->post('weaknesses');
        $strengths = $this->input->post('strengths');
        $target_in_next_year = $this->input->post('target_in_next_year');
        $item_option_selfevaluation3_6 = $this->input->post('item_option_selfevaluation3_6');
        $item_option_is_subtopic_in_subtopics3_6_1 = $this->input->post('item_option_is_subtopic_in_subtopics3_6_1');
        $others_3_6_1 = $this->input->post('others_3_6_1');
        $item_option_is_subtopic_in_subtopics3_6_2 = $this->input->post('item_option_is_subtopic_in_subtopics3_6_2');
        $others_3_6_2 = $this->input->post('others_3_6_2');
        $your_feedback = $this->input->post('your_feedback');
        $emp_email = $this->input->post('emp_email');
        $self_evaluation_status = $this->input->post('self_evaluation_status');

        $rs = $this->hr->model_submit_formStatic_self_evaluation($up_id, $year_submit, $date_submit, $emp_name, $emp_id, $emp_grade, $section, $division, $hired_date, $emp_email, $sup_name, $sup_grade, $emp_year_of_service, $job_target_1, $actual_achievement, $job_target_2, $item_option_selfevaluations3_1, $item_option_selfevaluation3_2, $others_capability, $improve_yourself, $weaknesses, $strengths, $target_in_next_year, $item_option_selfevaluation3_6, $item_option_is_subtopic_in_subtopics3_6_1, $others_3_6_1, $item_option_is_subtopic_in_subtopics3_6_2, $others_3_6_2, $your_feedback, $self_evaluation_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function read_json($json)
    {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        echo $json;
    }

    function RecordFormAll()
    {
        $title['title'] = 'Record Form All';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('RecordFormAll');
        // $this->load->view('include/footer');
    }

    function TableRecordSelfEvaluation()
    {
        if (isset($_SESSION["emp_email"])) {
            $emp_email = $_SESSION["emp_email"];
        } else {
            $emp_email = "";
        }
        $self_evaluation_one_user['self_evaluation_one_user'] = $this->hr->model_self_evaluation_one_user($emp_email);
        $title['title'] = 'Table Record Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('TableRecordSelfEvaluation', $self_evaluation_one_user);
        $this->load->view('include/footer');
    }

    function TableRecordSelfEvaluationForHr()
    {
        if (isset($_SESSION["emp_email"])) {
            $emp_email = $_SESSION["emp_email"];
        } else {
            $emp_email = "";
        }
        $self_evaluation_hr['self_evaluation_hr'] = $this->hr->model_self_evaluation_hr($emp_email);
        $title['title'] = 'Table Record Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('TableRecordSelfEvaluationForHr', $self_evaluation_hr);
        $this->load->view('include/footer');
    }

    function FormStaticSelfEvaluation($id)
    {
        $period_time['period_time'] = $this->hr->model_period_time();
        $item_option_is_subtopic_in_subtopic['item_option_is_subtopic_in_subtopic'] = $this->hr->model_item_option_is_subtopic_in_subtopic();
        $item_option_is_subtopic_in_subtopic_division['item_option_is_subtopic_in_subtopic_division'] = $this->hr->model_item_option_is_subtopic_in_subtopic_division();
        $subtopic_in_subtopic['subtopic_in_subtopic'] = $this->hr->model_subtopic_in_subtopic();
        $item_option_selfevaluation['item_option_selfevaluation'] = $this->hr->model_item_option_selfevaluation();
        $sub_topic_selfevaluation['sub_topic_selfevaluation'] = $this->hr->model_sub_topic_selfevaluation();
        $topic_selfevaluation['topic_selfevaluation'] = $this->hr->model_topic_selfevaluation();
        $self_evaluation_id['self_evaluation_id'] = $this->hr->model_self_evaluation_id($id);
        $title['title'] = 'Table Record Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormStaticSelfEvaluation', $self_evaluation_id + $topic_selfevaluation + $sub_topic_selfevaluation + $item_option_selfevaluation + $subtopic_in_subtopic + $item_option_is_subtopic_in_subtopic + $item_option_is_subtopic_in_subtopic_division + $period_time);
        $this->load->view('include/footer');
    }

    public function PrintPDFSelfEvaluation($id)
    {
        $item_option_is_subtopic_in_subtopic['item_option_is_subtopic_in_subtopic'] = $this->hr->model_item_option_is_subtopic_in_subtopic();
        $item_option_is_subtopic_in_subtopic_division['item_option_is_subtopic_in_subtopic_division'] = $this->hr->model_item_option_is_subtopic_in_subtopic_division();
        $subtopic_in_subtopic['subtopic_in_subtopic'] = $this->hr->model_subtopic_in_subtopic();
        $item_option_selfevaluation['item_option_selfevaluation'] = $this->hr->model_item_option_selfevaluation();
        $sub_topic_selfevaluation['sub_topic_selfevaluation'] = $this->hr->model_sub_topic_selfevaluation();
        $topic_selfevaluation['topic_selfevaluation'] = $this->hr->model_topic_selfevaluation();
        $self_evaluation_id['self_evaluation_id'] = $this->hr->model_self_evaluation_id($id);

        $html = $this->load->view('PrintPDFSelfEvaluation', $self_evaluation_id + $topic_selfevaluation + $sub_topic_selfevaluation + $item_option_selfevaluation + $subtopic_in_subtopic + $item_option_is_subtopic_in_subtopic + $item_option_is_subtopic_in_subtopic_division, true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        $title['title'] = 'File PDF Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FilePDFSelfEvaluation');
        $this->load->view('include/footer');
    }

    function ImportFileExcelEMP()
    {
        if (isset($_GET['s_emp_id'])) {
            $s_emp_id = $_GET['s_emp_id'];
        } else {
            $s_emp_id = "";
        }
        if (isset($_GET['s_emp_name'])) {
            $s_emp_name = $_GET['s_emp_name'];
        } else {
            $s_emp_name = "";
        }
        if (isset($_GET['s_emp_grade'])) {
            $s_emp_grade = $_GET['s_emp_grade'];
        } else {
            $s_emp_grade = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_GET['s_emp_section'])) {
            $s_emp_section = $_GET['s_emp_section'];
        } else {
            $s_emp_section = "";
        }
        if (isset($_GET['s_emp_division'])) {
            $s_emp_division = $_GET['s_emp_division'];
        } else {
            $s_emp_division = "";
        }
        if (isset($_GET['s_superior_name'])) {
            $s_superior_name = $_GET['s_superior_name'];
        } else {
            $s_superior_name = "";
        }
        if (isset($_GET['s_superior_grade'])) {
            $s_superior_grade = $_GET['s_superior_grade'];
        } else {
            $s_superior_grade = "";
        }
        $emp_hr_import_page['emp_hr_import_page'] = $this->hr->model_emp_hr_import_page($s_emp_id, $s_emp_name, $s_emp_grade, $s_status, $s_emp_section, $s_emp_division, $s_superior_name, $s_superior_grade);
        $title['title'] = 'HR Import File Excel Employee';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ImportFileExcelEMP', $emp_hr_import_page);
        $this->load->view('include/footer');
    }

    function ImportFileExcelLeaveRecord()
    {
        if (isset($_GET['s_emp_id'])) {
            $s_emp_id = $_GET['s_emp_id'];
        } else {
            $s_emp_id = "";
        }
        // if (isset($_GET['s_year'])) {
        //     $s_year = $_GET['s_year'];
        // } else {
        //     $s_year = date("Y");
        // }
        if (isset($_GET['s_business_leave'])) {
            $s_business_leave = $_GET['s_business_leave'];
        } else {
            $s_business_leave = "";
        }
        if (isset($_GET['s_sick_leave'])) {
            $s_sick_leave = $_GET['s_sick_leave'];
        } else {
            $s_sick_leave = "";
        }
        if (isset($_GET['s_absenteeism'])) {
            $s_absenteeism = $_GET['s_absenteeism'];
        } else {
            $s_absenteeism = "";
        }
        if (isset($_GET['s_late'])) {
            $s_late = $_GET['s_late'];
        } else {
            $s_late = "";
        }
        $emp_hr_import_leave['emp_hr_import_leave'] = $this->hr->model_emp_hr_import_leave($s_emp_id, $s_business_leave, $s_sick_leave, $s_absenteeism, $s_late);
        $title['title'] = 'HR Import File Excel Leave Record';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ImportFileExcelLeaveRecord', $emp_hr_import_leave);
        $this->load->view('include/footer');
    }

    function ManageAdmin()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $id = "";
        }
        if (isset($_GET['s_emp_id'])) {
            $s_emp_id = $_GET['s_emp_id'];
        } else {
            $s_emp_id = '';
        }
        if (isset($_GET['s_emp_name'])) {
            $s_emp_name = $_GET['s_emp_name'];
        } else {
            $s_emp_name = '';
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $manage_admin_id['manage_admin_id'] = $this->hr->model_manage_admin_id($id);
        $admin_record['admin_record'] = $this->hr->model_admin_record($s_emp_id, $s_emp_name, $s_status);
        $title['title'] = 'Manage Admin';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageAdmin', $admin_record + $manage_admin_id);
        $this->load->view('include/footer');
    }

    function Add_hr_ajax()
    {
        $emp_id = $this->input->post('emp_id');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Add_hr($emp_id, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Update_hr_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_emp_id = $this->input->post('up_emp_id');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_hr($up_id, $up_emp_id, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageAllPage()
    {
        $title['title'] = 'Manage All';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageAllPage');
        // $this->load->view('include/footer');
    }
}
