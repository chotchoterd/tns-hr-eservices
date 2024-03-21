<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Manage_Self_Evaluation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('modelManageSelfEvaluation', 'hr');
    }

    function read_json($json)
    {
        ini_set('display_errors', 0);
        header('Content-Type: application/json');
        echo $json;
    }

    function PageSelfEvaluationManage()
    {
        $title['title'] = 'Self-Evaluation Page';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('PageSelfEvaluationManage');
        // $this->load->view('include/footer');
    }

    function ManageMainTopicSelf()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        if (isset($_GET['s_main_topic'])) {
            $s_main_topic = $_GET['s_main_topic'];
        } else {
            $s_main_topic = '';
        }
        if (isset($_GET['s_topic'])) {
            $s_topic = $_GET['s_topic'];
        } else {
            $s_topic = '';
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $main_topic_data_id['main_topic_data_id'] = $this->hr->model_main_topic_data_id($id);
        $main_topic_data['main_topic_data'] = $this->hr->model_main_topic_data($s_main_topic, $s_topic, $s_year, $s_status);
        $title['title'] = 'Manage Main Topic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageMainTopicSelf', $main_topic_data + $main_topic_data_id);
        $this->load->view('include/footer');
    }

    function Submit_Main_Topic_ajax()
    {
        $main_topic = $this->input->post('main_topic');
        $topic = $this->input->post('topic');
        $year = $this->input->post('year');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Submit_Main_Topic($main_topic, $topic, $year, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Update_Main_Topic_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_main_topic = $this->input->post('up_main_topic');
        $up_topic = $this->input->post('up_topic');
        $up_year = $this->input->post('up_year');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_Main_Topic($up_id, $up_main_topic, $up_topic, $up_year, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageSubtopicOneSelf()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        if (isset($_GET['s_main_topic'])) {
            $s_main_topic = $_GET['s_main_topic'];
        } else {
            $s_main_topic = '';
        }
        if (isset($_GET['s_sub_topic'])) {
            $s_sub_topic = $_GET['s_sub_topic'];
        } else {
            $s_sub_topic = '';
        }
        if (isset($_GET['s_sub_topic_details'])) {
            $s_sub_topic_details = $_GET['s_sub_topic_details'];
        } else {
            $s_sub_topic_details = '';
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $main_topic_status_1['main_topic_status_1'] = $this->hr->model_main_topic_status_1();
        $sub_topic_self_id['sub_topic_self_id'] = $this->hr->model_sub_topic_self_id($id);
        $sub_topic_self_data['sub_topic_self_data'] = $this->hr->model_sub_topic_self_data($s_main_topic, $s_sub_topic, $s_sub_topic_details, $s_status);
        $title['title'] = 'Manage Subtopics of the Main Topic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageSubtopicOneSelf', $sub_topic_self_data + $sub_topic_self_id + $main_topic_status_1);
        $this->load->view('include/footer');
    }

    function Submit_ManageSub_topicOneSelf_ajax()
    {
        $main_topic = $this->input->post('main_topic');
        $sub_topic = $this->input->post('sub_topic');
        $sub_item_details = $this->input->post('sub_item_details');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Submit_ManageSub_topicOneSelf($main_topic, $sub_topic, $sub_item_details, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Update_ManageSub_topicOneSelf_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_main_topic = $this->input->post('up_main_topic');
        $up_sub_topic = $this->input->post('up_sub_topic');
        $up_sub_item_details = $this->input->post('up_sub_item_details');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_ManageSub_topicOneSelf($up_id, $up_main_topic, $up_sub_topic, $up_sub_item_details, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }
}
