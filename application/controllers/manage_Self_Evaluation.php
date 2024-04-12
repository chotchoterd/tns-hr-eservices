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
        $title['title'] = 'Manage Main Topic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageSubtopicTwoSelf', $main_topic_status_1 + $sub_topic_self_status_1 + $subtopic_in_subtopic_self + $subtopic_in_subtopic_self_id);
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
        $title['title'] = 'Manage Item Option Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageItemOption', $main_topic_status_1 + $sub_topic_self_status_1 + $item_option_data + $item_option_data_id);
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
        $title['title'] = 'Manage Item Option is Subtopic Self-Evaluation';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageItemOptionIsSubtopic', $main_topic_status_1 + $sub_topic_self_status_1 + $sub_in_sub_status_1 + $division_status_1 + $item_is_sub_in_sub + $item_is_sub_in_sub_id);
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
        $title['title'] = 'Manage Division';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('ManageDivision', $division_data + $division_data_id);
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

}
