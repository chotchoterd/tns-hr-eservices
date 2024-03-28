<?php
class ModelManageSelfEvaluation extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_hr = $this->load->database('db_hr', TRUE);
    }

    function model_main_topic_data($s_main_topic, $s_topic, $s_year, $s_status)
    {
        $sql = "SELECT * FROM tb_topic_self_evaluation WHERE topic LIKE '%" . $s_topic . "%'
        AND main_topic LIKE '%" . $s_main_topic . "%'
        AND year LIKE '%" . $s_year . "%'
        AND status LIKE '%" . $s_status . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_main_topic_data_id($id)
    {
        $sql = "SELECT * FROM tb_topic_self_evaluation WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Submit_Main_Topic($main_topic, $topic, $year, $status)
    {
        $this->db_hr->where("main_topic", $main_topic)->where('status != 0');
        $check_tb_topic_self = $this->db_hr->get("tb_topic_self_evaluation");
        if ($check_tb_topic_self->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $main_topic)
                ->set("topic", $topic)
                ->set("year", $year)
                ->set("status", $status)
                ->set("modified_date", date('Y-m-d H:i:s'))
                ->insert("tb_topic_self_evaluation");
        }
        return $rs;
    }

    function model_Update_Main_Topic($up_id, $up_main_topic, $up_topic, $up_year, $up_status)
    {
        $this->db_hr->where("main_topic", $up_main_topic)->where('id !=', $up_id)->where('status != 0');
        $check_tb_topic_self = $this->db_hr->get("tb_topic_self_evaluation");
        if ($check_tb_topic_self->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $up_main_topic)
                ->set("topic", $up_topic)
                ->set("status", $up_status)
                ->set("year", $up_year)
                ->set("modified_date", date('Y-m-d H:i:s'))
                ->where("id", $up_id)
                ->update("tb_topic_self_evaluation");
        }
        return $rs;
    }

    function model_sub_topic_self_data($s_main_topic, $s_sub_topic, $s_sub_topic_details, $s_status)
    {
        $sql = "SELECT main.topic AS main_text, topic.* FROM tb_sub_topic_self_evaluation topic
        LEFT JOIN tb_topic_self_evaluation main ON (main.main_topic = topic.main_topic)
        WHERE topic.main_topic LIKE '%" . $s_main_topic . "%'
        AND topic.sub_topic LIKE '%" . $s_sub_topic . "%'
        AND topic.sub_topic_text LIKE '%" . $s_sub_topic_details . "%'
        AND topic.status LIKE '%" . $s_status . "%'
        ORDER BY topic.main_topic,topic.sub_topic ASC";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_sub_topic_self_id($id)
    {
        $sql = "SELECT * FROM tb_sub_topic_self_evaluation WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_main_topic_status_1()
    {
        $sql = "SELECT * FROM tb_topic_self_evaluation WHERE status = 1";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Submit_ManageSub_topicOneSelf($main_topic, $sub_topic, $sub_item_details, $status)
    {
        $this->db_hr->where("sub_topic", $sub_topic);
        $check_tb_sub_topic_self = $this->db_hr->get("tb_sub_topic_self_evaluation");
        if ($check_tb_sub_topic_self->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $main_topic)
                ->set("sub_topic", $sub_topic)
                ->set("sub_topic_text", $sub_item_details)
                ->set("status", $status)
                ->insert("tb_sub_topic_self_evaluation");
        }
        return $rs;
    }

    function model_Update_ManageSub_topicOneSelf($up_id, $up_main_topic, $up_sub_topic, $up_sub_item_details, $up_status)
    {
        $this->db_hr->where("sub_topic", $up_sub_topic)->where("id !=", $up_id)->where("status != 0");;
        $check_tb_sub_topic_self = $this->db_hr->get("tb_sub_topic_self_evaluation");
        if ($check_tb_sub_topic_self->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $up_main_topic)
                ->set("sub_topic", $up_sub_topic)
                ->set("sub_topic_text", $up_sub_item_details)
                ->set("status", $up_status)
                ->where("id", $up_id)
                ->update("tb_sub_topic_self_evaluation");
        }
        return $rs;
    }

    function model_sub_topic_self_status_1()
    {
        $sql = "SELECT * FROM tb_sub_topic_self_evaluation WHERE status = 1";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_subtopic_in_subtopic_self()
    {
        $sql = "SELECT topic.topic AS t_topic, sub_topic.sub_topic_text AS s_sub_topic, subtopic_in_subtopic.* FROM tb_subtopic_in_subtopic_self_evaluation subtopic_in_subtopic
        LEFT JOIN tb_sub_topic_self_evaluation sub_topic ON (sub_topic.sub_topic = subtopic_in_subtopic.sub_topic)
        LEFT JOIN tb_topic_self_evaluation topic ON (topic.main_topic = sub_topic.main_topic)";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }
}
