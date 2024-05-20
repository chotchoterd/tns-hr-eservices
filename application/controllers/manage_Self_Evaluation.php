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
        $edit_data_check['edit_data_check'] = $this->hr->model_edit_data_check($s_year);
        $title['title'] = 'Manage Main Topic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageMainTopicSelf', $main_topic_data + $main_topic_data_id + $edit_data_check);
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
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = date('Y');
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $main_topic_status_1['main_topic_status_1'] = $this->hr->model_main_topic_status_1();
        $sub_topic_self_id['sub_topic_self_id'] = $this->hr->model_sub_topic_self_id($id);
        $sub_topic_self_data['sub_topic_self_data'] = $this->hr->model_sub_topic_self_data($s_main_topic, $s_sub_topic, $s_sub_topic_details, $s_year, $s_status);
        $edit_data_check['edit_data_check'] = $this->hr->model_edit_data_check($s_year);
        $title['title'] = 'Manage Subtopics of the Main Topic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageSubtopicOneSelf', $sub_topic_self_data + $sub_topic_self_id + $main_topic_status_1 + $edit_data_check);
        $this->load->view('include/footer');
    }

    function Submit_ManageSub_topicOneSelf_ajax()
    {
        $main_topic = $this->input->post('main_topic');
        $sub_topic = $this->input->post('sub_topic');
        $sub_item_details = $this->input->post('sub_item_details');
        $year = $this->input->post('year');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Submit_ManageSub_topicOneSelf($main_topic, $sub_topic, $sub_item_details, $year, $status);
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
        $up_year = $this->input->post('up_year');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_ManageSub_topicOneSelf($up_id, $up_main_topic, $up_sub_topic, $up_sub_item_details, $up_year, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageSubtopicTwoSelf()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_main_topic'])) {
            $s_main_topic = $_GET['s_main_topic'];
        } else {
            $s_main_topic = "";
        }
        if (isset($_GET['s_sub_topic'])) {
            $s_sub_topic = $_GET['s_sub_topic'];
        } else {
            $s_sub_topic = "";
        }
        if (isset($_GET['s_sub_in_sub'])) {
            $s_sub_in_sub = $_GET['s_sub_in_sub'];
        } else {
            $s_sub_in_sub = "";
        }
        if (isset($_GET['s_sub_in_sub_details'])) {
            $s_sub_in_sub_details = $_GET['s_sub_in_sub_details'];
        } else {
            $s_sub_in_sub_details = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = "";
        }
        $subtopic_in_subtopic_self_id['subtopic_in_subtopic_self_id'] = $this->hr->model_subtopic_in_subtopic_self_id($id);
        $subtopic_in_subtopic_self['subtopic_in_subtopic_self'] = $this->hr->model_subtopic_in_subtopic_self($s_main_topic, $s_sub_topic, $s_sub_in_sub, $s_sub_in_sub_details, $s_status, $s_year);
        $sub_topic_self_status_1['sub_topic_self_status_1'] = $this->hr->model_sub_topic_self_status_1();
        $main_topic_status_1['main_topic_status_1'] = $this->hr->model_main_topic_status_1();
        $edit_data_check['edit_data_check'] = $this->hr->model_edit_data_check($s_year);
        $title['title'] = 'Manage Main Topic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageSubtopicTwoSelf', $main_topic_status_1 + $sub_topic_self_status_1 + $subtopic_in_subtopic_self + $subtopic_in_subtopic_self_id + $edit_data_check);
        $this->load->view('include/footer');
    }

    function submit_sub_in_sub_ajax()
    {
        $main_topic = $this->input->post('main_topic');
        $sub_topic = $this->input->post('sub_topic');
        $sub_in_sub = $this->input->post('sub_in_sub');
        $sub_in_sub_details = $this->input->post('sub_in_sub_details');
        $remark = $this->input->post('remark');
        $year = $this->input->post('year');
        $status = $this->input->post('status');

        $rs = $this->hr->model_submit_sub_in_sub($main_topic, $sub_topic, $sub_in_sub, $sub_in_sub_details, $remark, $year, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_sub_in_sub_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_main_topic = $this->input->post('up_main_topic');
        $up_sub_topic = $this->input->post('up_sub_topic');
        $up_sub_in_sub = $this->input->post('up_sub_in_sub');
        $up_sub_in_sub_details = $this->input->post('up_sub_in_sub_details');
        $up_remark = $this->input->post('up_remark');
        $up_year = $this->input->post('up_year');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_update_sub_in_sub($up_id, $up_main_topic, $up_sub_topic, $up_sub_in_sub, $up_sub_in_sub_details, $up_remark, $up_year, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageItemOption()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_main_topic'])) {
            $s_main_topic = $_GET['s_main_topic'];
        } else {
            $s_main_topic = "";
        }
        if (isset($_GET['s_sub_topic'])) {
            $s_sub_topic = $_GET['s_sub_topic'];
        } else {
            $s_sub_topic = "";
        }
        if (isset($_GET['s_item_option'])) {
            $s_item_option = $_GET['s_item_option'];
        } else {
            $s_item_option = "";
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        $item_option_data_id['item_option_data_id'] = $this->hr->model_item_option_data_id($id);
        $item_option_data['item_option_data'] = $this->hr->model_item_option_data($s_main_topic, $s_sub_topic, $s_item_option, $s_year, $s_status);
        $main_topic_status_1['main_topic_status_1'] = $this->hr->model_main_topic_status_1();
        $sub_topic_self_status_1['sub_topic_self_status_1'] = $this->hr->model_sub_topic_self_status_1();
        $edit_data_check['edit_data_check'] = $this->hr->model_edit_data_check($s_year);
        $title['title'] = 'Manage Item Option Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageItemOption', $main_topic_status_1 + $sub_topic_self_status_1 + $item_option_data + $item_option_data_id + $edit_data_check);
        $this->load->view('include/footer');
    }

    function Submit_item_option_ajax()
    {
        $main_topic = $this->input->post('main_topic');
        $sub_topic = $this->input->post('sub_topic');
        $item_option = $this->input->post('item_option');
        $year = $this->input->post('year');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Submit_item_option($main_topic, $sub_topic, $item_option, $year, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Update_item_option_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_main_topic = $this->input->post('up_main_topic');
        $up_sub_topic = $this->input->post('up_sub_topic');
        $up_item_option = $this->input->post('up_item_option');
        $up_year = $this->input->post('up_year');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_item_option($up_id, $up_main_topic, $up_sub_topic, $up_item_option, $up_year, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageItemOptionIsSubtopic()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_main_topic'])) {
            $s_main_topic = $_GET['s_main_topic'];
        } else {
            $s_main_topic = "";
        }
        if (isset($_GET['s_sub_topic'])) {
            $s_sub_topic = $_GET['s_sub_topic'];
        } else {
            $s_sub_topic = "";
        }
        if (isset($_GET['s_sub_in_sub'])) {
            $s_sub_in_sub = $_GET['s_sub_in_sub'];
        } else {
            $s_sub_in_sub = "";
        }
        if (isset($_GET['s_sub_in_sub_details'])) {
            $s_sub_in_sub_details = $_GET['s_sub_in_sub_details'];
        } else {
            $s_sub_in_sub_details = "";
        }
        if (isset($_GET['s_division'])) {
            $s_division = $_GET['s_division'];
        } else {
            $s_division = "";
        }
        if (isset($_GET['s_sub_division'])) {
            $s_sub_division = $_GET['s_sub_division'];
        } else {
            $s_sub_division = "";
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = "";
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        $main_topic_status_1['main_topic_status_1'] = $this->hr->model_main_topic_status_1();
        $sub_topic_self_status_1['sub_topic_self_status_1'] = $this->hr->model_sub_topic_self_status_1();
        $sub_in_sub_status_1['sub_in_sub_status_1'] = $this->hr->model_sub_in_sub_status_1();
        $division_status_1['division_status_1'] = $this->hr->model_division_status_1();
        $item_is_sub_in_sub['item_is_sub_in_sub'] = $this->hr->model_item_is_sub_in_sub($s_main_topic, $s_sub_topic, $s_sub_in_sub, $s_sub_in_sub_details, $s_division, $s_sub_division, $s_year, $s_status);
        $item_is_sub_in_sub_id['item_is_sub_in_sub_id'] = $this->hr->model_item_is_sub_in_sub_id($id);
        $edit_data_check['edit_data_check'] = $this->hr->model_edit_data_check($s_year);
        $title['title'] = 'Manage Item Option is Subtopic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageItemOptionIsSubtopic', $main_topic_status_1 + $sub_topic_self_status_1 + $sub_in_sub_status_1 + $division_status_1 + $item_is_sub_in_sub + $item_is_sub_in_sub_id + $edit_data_check);
        $this->load->view('include/footer');
    }

    function Submit_Item_Option_is_Subtopic_ajax()
    {
        $main_topic = $this->input->post('main_topic');
        $sub_topic = $this->input->post('sub_topic');
        $sub_in_sub = $this->input->post('sub_in_sub');
        $sub_in_sub_details = $this->input->post('sub_in_sub_details');
        $division = $this->input->post('division');
        $sub_division = $this->input->post('sub_division');
        $year = $this->input->post('year');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Submit_Item_Option_is_Subtopic($main_topic, $sub_topic, $sub_in_sub, $sub_in_sub_details, $division, $sub_division, $year, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Update_Item_Option_is_Subtopic_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_main_topic = $this->input->post('up_main_topic');
        $up_sub_topic = $this->input->post('up_sub_topic');
        $up_sub_in_sub = $this->input->post('up_sub_in_sub');
        $up_sub_in_sub_details = $this->input->post('up_sub_in_sub_details');
        $up_division = $this->input->post('up_division');
        $up_sub_division = $this->input->post('up_sub_division');
        $up_year = $this->input->post('up_year');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_Item_Option_is_Subtopic($up_id, $up_main_topic, $up_sub_topic, $up_sub_in_sub, $up_sub_in_sub_details, $up_division, $up_sub_division, $up_year, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageDivision()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_division'])) {
            $s_division = $_GET['s_division'];
        } else {
            $s_division = "";
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = date('Y');
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = "";
        }
        $division_data['division_data'] = $this->hr->model_division_data($s_division, $s_year, $s_status);
        $division_data_id['division_data_id'] = $this->hr->model_division_data_id($id);
        $edit_data_check['edit_data_check'] = $this->hr->model_edit_data_check($s_year);
        $title['title'] = 'Manage Division';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageDivision', $division_data + $division_data_id + $edit_data_check);
        $this->load->view('include/footer');
    }

    function Submit_division_ajax()
    {
        $division = $this->input->post('division');
        $year = $this->input->post('year');
        $status = $this->input->post('status');

        $rs = $this->hr->model_Submit_division($division, $year, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Update_division_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_division = $this->input->post('up_division');
        $up_year = $this->input->post('up_year');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_Update_division($up_id, $up_division, $up_year, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function copy_Main_Topic_ajax()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_copy_Main_Topic($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function copy_Item_Option_ajax()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_copy_Item_Option($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Item_Option_is_Subtopic_ajax()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_copy_Item_Option_is_Subtopic($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Copy_Sub_topicOneSelf_ajax()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_Copy_Sub_topicOneSelf($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Copy_sub_in_sub_ajax()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_Copy_sub_in_sub($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Copy_division()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_Copy_division($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Copy_evaluation_Item()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_evaluation_Item($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Copy_evaluation_ItemG4G6()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_evaluation_ItemG4G6($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Copy_evaluation_ItemG2G3()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        $rs = $this->hr->model_evaluation_ItemG2G3($year_from, $year_to);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function Schedule()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['ids'])) {
            $ids = $_GET['ids'];
        } else {
            $ids = "";
        }
        $Period_Time['Period_Time'] = $this->hr->model_Period_Time();
        $Period_Time_id['Period_Time_id'] = $this->hr->model_Period_Time_id($id);
        $Period_Time_bonus['Period_Time_bonus'] = $this->hr->model_Period_Time_bonus();
        $Period_Time_bonus_id['Period_Time_bonus_id'] = $this->hr->model_Period_Time_bonus_id($ids);

        $title['title'] = 'Schedule';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('Schedule', $Period_Time + $Period_Time_id + $Period_Time_bonus + $Period_Time_bonus_id);
        $this->load->view('include/footer');
    }

    function Copy_All_Master_Data_ajax()
    {
        $year_from = $this->input->post('year_from');
        $year_to = $this->input->post('year_to');

        // เรียกใช้งานฟังก์ชันแต่ละตัวและเก็บผลลัพธ์ไว้ในตัวแปร $rs แยกกัน
        $rs_main_topic = $this->hr->model_copy_Main_Topic($year_from, $year_to);
        $rs_item_option = $this->hr->model_copy_Item_Option($year_from, $year_to);
        $rs_item_option_subtopic = $this->hr->model_copy_Item_Option_is_Subtopic($year_from, $year_to);
        $rs_sub_topic_oneself = $this->hr->model_Copy_Sub_topicOneSelf($year_from, $year_to);
        $rs_sub_in_sub = $this->hr->model_Copy_sub_in_sub($year_from, $year_to);
        $rs_division = $this->hr->model_Copy_division($year_from, $year_to);

        // ตรวจสอบว่าทุกอย่างประสบความสำเร็จหรือไม่
        if ($rs_main_topic && $rs_item_option && $rs_item_option_subtopic && $rs_sub_topic_oneself && $rs_sub_in_sub && $rs_division) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }

        // ส่งผลลัพธ์กลับไป
        $this->read_json($json);
    }

    function update_data_Period_Time_ajax()
    {
        $up_id = $this->input->post('up_id');
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $status = $this->input->post('status');
        $year = $this->input->post('year');

        $rs = $this->hr->model_update_data_Period_Time_ajax($up_id, $date_from, $date_to, $status, $year);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_data_Period_Time_bonus_ajax()
    {
        $up_ids = $this->input->post('up_ids');
        $date_froms = $this->input->post('date_froms');
        $date_tos = $this->input->post('date_tos');
        $statuss = $this->input->post('statuss');
        $years = $this->input->post('years');

        $rs = $this->hr->model_update_data_Period_Time_bonus_ajax($up_ids, $date_froms, $date_tos, $statuss, $years);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function PageBONUSandANNUALAssessment()
    {
        $title['title'] = 'BONUS & ANNUAL Assessment';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('PageBONUSandANNUALAssessment');
        // $this->load->view('include/footer');
    }

    function ManageForemanAndBelow()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = "";
        }
        if (isset($_GET['s_Evaluation_Item_EN'])) {
            $s_Evaluation_Item_EN = $_GET['s_Evaluation_Item_EN'];
        } else {
            $s_Evaluation_Item_EN = '';
        }
        if (isset($_GET['s_Evaluation_Item_TH'])) {
            $s_Evaluation_Item_TH = $_GET['s_Evaluation_Item_TH'];
        } else {
            $s_Evaluation_Item_TH = '';
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = '';
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $bonus_evaluate_foreman_id['bonus_evaluate_foreman_id'] = $this->hr->model_bonus_evaluate_foreman_id($id);
        $bonus_evaluate_foreman['bonus_evaluate_foreman'] = $this->hr->model_bonus_evaluate_foreman($s_Evaluation_Item_EN, $s_Evaluation_Item_TH, $s_year, $s_status);
        $title['title'] = 'AA001-Bonus & Annual Evaluate Foreman & Below - PMIS';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageForemanAndBelow', $bonus_evaluate_foreman + $bonus_evaluate_foreman_id);
        $this->load->view('include/footer');
    }

    function submit_evaluation_Item_ajax()
    {
        $year = $this->input->post('year');
        $topic = $this->input->post('topic');
        $evaluation_Item_en = $this->input->post('evaluation_Item_en');
        $evaluation_Item_th = $this->input->post('evaluation_Item_th');
        $status = $this->input->post('status');

        $rs = $this->hr->model_submit_evaluation_Item($year, $topic, $evaluation_Item_en, $evaluation_Item_th, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_evaluation_Item_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_year = $this->input->post('up_year');
        $up_topic = $this->input->post('up_topic');
        $up_evaluation_Item_en = $this->input->post('up_evaluation_Item_en');
        $up_evaluation_Item_th = $this->input->post('up_evaluation_Item_th');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_update_evaluation_Item($up_id, $up_year, $up_topic, $up_evaluation_Item_en, $up_evaluation_Item_th, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageEvaluateG4G6()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        if (isset($_GET['s_Evaluation_Item_EN'])) {
            $s_Evaluation_Item_EN = $_GET['s_Evaluation_Item_EN'];
        } else {
            $s_Evaluation_Item_EN = '';
        }
        if (isset($_GET['s_Evaluation_Item_TH'])) {
            $s_Evaluation_Item_TH = $_GET['s_Evaluation_Item_TH'];
        } else {
            $s_Evaluation_Item_TH = '';
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = '';
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $bonus_evaluate_g4_g6_id['bonus_evaluate_g4_g6_id'] = $this->hr->model_bonus_evaluate_g4_g6_id($id);
        $bonus_evaluate_g4_g6['bonus_evaluate_g4_g6'] = $this->hr->model_bonus_evaluate_g4_g6($s_Evaluation_Item_EN, $s_Evaluation_Item_TH, $s_year, $s_status);
        $title['title'] = 'AA002-Bonus&Annual Evaluate G4-G6 - PMIS';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageEvaluateG4G6', $bonus_evaluate_g4_g6 + $bonus_evaluate_g4_g6_id);
        $this->load->view('include/footer');
    }

    function submit_evaluation_ItemG4G6_ajax()
    {
        $year = $this->input->post('year');
        $topic = $this->input->post('topic');
        $evaluation_Item_en = $this->input->post('evaluation_Item_en');
        $evaluation_Item_th = $this->input->post('evaluation_Item_th');
        $status = $this->input->post('status');

        $rs = $this->hr->model_submit_evaluation_ItemG4G6($year, $topic, $evaluation_Item_en, $evaluation_Item_th, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_evaluation_ItemG4G6_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_year = $this->input->post('up_year');
        $up_topic = $this->input->post('up_topic');
        $up_evaluation_Item_en = $this->input->post('up_evaluation_Item_en');
        $up_evaluation_Item_th = $this->input->post('up_evaluation_Item_th');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_update_evaluation_ItemG4G6($up_id, $up_year, $up_topic, $up_evaluation_Item_en, $up_evaluation_Item_th, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function ManageEvaluateG2G3()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        if (isset($_GET['s_Evaluation_Item_EN'])) {
            $s_Evaluation_Item_EN = $_GET['s_Evaluation_Item_EN'];
        } else {
            $s_Evaluation_Item_EN = '';
        }
        if (isset($_GET['s_Evaluation_Item_TH'])) {
            $s_Evaluation_Item_TH = $_GET['s_Evaluation_Item_TH'];
        } else {
            $s_Evaluation_Item_TH = '';
        }
        if (isset($_GET['s_year'])) {
            $s_year = $_GET['s_year'];
        } else {
            $s_year = '';
        }
        if (isset($_GET['s_status'])) {
            $s_status = $_GET['s_status'];
        } else {
            $s_status = '';
        }
        $bonus_evaluate_g2_g3_id['bonus_evaluate_g2_g3_id'] = $this->hr->model_bonus_evaluate_g2_g3_id($id);
        $bonus_evaluate_g2_g3['bonus_evaluate_g2_g3'] = $this->hr->model_bonus_evaluate_g2_g3($s_Evaluation_Item_EN, $s_Evaluation_Item_TH, $s_year, $s_status);
        $title['title'] = 'AA003-Bonus-Annual Evaluate G2-G3 - PMIS';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageEvaluateG2G3', $bonus_evaluate_g2_g3 + $bonus_evaluate_g2_g3_id);
        $this->load->view('include/footer');
    }

    function submit_evaluation_ItemG2G3_ajax()
    {
        $year = $this->input->post('year');
        $topic = $this->input->post('topic');
        $evaluation_Item_en = $this->input->post('evaluation_Item_en');
        $evaluation_Item_th = $this->input->post('evaluation_Item_th');
        $status = $this->input->post('status');

        $rs = $this->hr->model_submit_evaluation_ItemG2G3($year, $topic, $evaluation_Item_en, $evaluation_Item_th, $status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }

    function update_evaluation_ItemG2G3_ajax()
    {
        $up_id = $this->input->post('up_id');
        $up_year = $this->input->post('up_year');
        $up_topic = $this->input->post('up_topic');
        $up_evaluation_Item_en = $this->input->post('up_evaluation_Item_en');
        $up_evaluation_Item_th = $this->input->post('up_evaluation_Item_th');
        $up_status = $this->input->post('up_status');

        $rs = $this->hr->model_update_evaluation_ItemG2G3($up_id, $up_year, $up_topic, $up_evaluation_Item_en, $up_evaluation_Item_th, $up_status);
        if ($rs) {
            $json = '{"ok": true}';
        } else {
            $json = '{"ok": false}';
        }
        $this->read_json($json);
    }
}
