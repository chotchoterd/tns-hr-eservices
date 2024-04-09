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
        // print_r($sql);
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

    function model_Submit_ManageSub_topicOneSelf($main_topic, $sub_topic, $sub_item_details, $year, $status)
    {
        $this->db_hr->where("sub_topic", $sub_topic);
        $check_tb_sub_topic_self = $this->db_hr->get("tb_sub_topic_self_evaluation");
        if ($check_tb_sub_topic_self->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $main_topic)
                ->set("sub_topic", $sub_topic)
                ->set("sub_topic_text", $sub_item_details)
                ->set("year", $year)
                ->set("status", $status)
                ->set("modified_date", date('Y-m-d H:i:s'))
                ->insert("tb_sub_topic_self_evaluation");
        }
        return $rs;
    }

    function model_Update_ManageSub_topicOneSelf($up_id, $up_main_topic, $up_sub_topic, $up_sub_item_details, $up_year, $up_status)
    {
        $this->db_hr->where("sub_topic", $up_sub_topic)->where("id !=", $up_id)->where("status != 0");
        $check_tb_sub_topic_self = $this->db_hr->get("tb_sub_topic_self_evaluation");
        if ($check_tb_sub_topic_self->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $up_main_topic)
                ->set("sub_topic", $up_sub_topic)
                ->set("sub_topic_text", $up_sub_item_details)
                ->set("year", $up_year)
                ->set("status", $up_status)
                ->set("modified_date", date('Y-m-d H:i:s'))
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

    function model_subtopic_in_subtopic_self($s_main_topic, $s_sub_topic, $s_sub_in_sub, $s_sub_in_sub_details, $s_status, $s_year)
    {
        $sql = "SELECT topic.topic AS t_topic, sub_topic.sub_topic_text AS s_sub_topic, subtopic_in_subtopic.* FROM tb_subtopic_in_subtopic_self_evaluation subtopic_in_subtopic
        LEFT JOIN tb_sub_topic_self_evaluation sub_topic ON (sub_topic.sub_topic = subtopic_in_subtopic.sub_topic)
        LEFT JOIN tb_topic_self_evaluation topic ON (topic.main_topic = sub_topic.main_topic)
        WHERE subtopic_in_subtopic.main_topic LIKE '%" . $s_main_topic . "%'
        AND subtopic_in_subtopic.sub_topic LIKE '%" . $s_sub_topic . "%'
        AND subtopic_in_subtopic.subtopic_in_subtopic LIKE '%" . $s_sub_in_sub . "%'
        AND subtopic_in_subtopic.subtopic_in_subtopic_text LIKE '%" . $s_sub_in_sub_details . "%'
        AND subtopic_in_subtopic.status LIKE '%" . $s_status . "%'
        AND subtopic_in_subtopic.year LIKE '%" . $s_year . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_subtopic_in_subtopic_self_id($id)
    {
        $sql = "SELECT * FROM tb_subtopic_in_subtopic_self_evaluation WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_submit_sub_in_sub($main_topic, $sub_topic, $sub_in_sub, $sub_in_sub_details, $remark, $year, $status)
    {
        $this->db_hr->where('subtopic_in_subtopic', $sub_in_sub);
        $check_sub_in_sub = $this->db_hr->get('tb_subtopic_in_subtopic_self_evaluation');
        if ($check_sub_in_sub->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $main_topic)
                ->set("sub_topic", $sub_topic)
                ->set("subtopic_in_subtopic", $sub_in_sub)
                ->set("subtopic_in_subtopic_text", $sub_in_sub_details)
                ->set("remark", $remark)
                ->set("year", $year)
                ->set("status", $status)
                ->set("modified_date", date('Y-m-d H:i:s'))
                ->insert("tb_subtopic_in_subtopic_self_evaluation");
        }
        return $rs;
    }

    function model_update_sub_in_sub($up_id, $up_main_topic, $up_sub_topic, $up_sub_in_sub, $up_sub_in_sub_details, $up_remark, $up_year, $up_status)
    {
        $this->db_hr->where('subtopic_in_subtopic', $up_sub_in_sub)->where("id !=", $up_id)->where("status != 0");
        $check_sub_in_sub = $this->db_hr->get('tb_subtopic_in_subtopic_self_evaluation');
        if ($check_sub_in_sub->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $up_main_topic)
                ->set("sub_topic", $up_sub_topic)
                ->set("subtopic_in_subtopic", $up_sub_in_sub)
                ->set("subtopic_in_subtopic_text", $up_sub_in_sub_details)
                ->set("remark", $up_remark)
                ->set("year", $up_year)
                ->set("status", $up_status)
                ->set("modified_date", date('Y-m-d H:i:s'))
                ->where("id", $up_id)
                ->update("tb_subtopic_in_subtopic_self_evaluation");
        }
        return $rs;
    }

    function model_item_option_data($s_main_topic, $s_sub_topic, $s_item_option, $s_year, $s_status)
    {
        $sql = "SELECT topic.topic AS t_topic, sub_topic.sub_topic_text AS s_sub_topic, item_option.* FROM tb_item_option_self_evaluation item_option
        LEFT JOIN tb_sub_topic_self_evaluation sub_topic ON (sub_topic.sub_topic = item_option.sub_topic)
        LEFT JOIN tb_topic_self_evaluation topic ON (topic.main_topic = sub_topic.main_topic)
        WHERE item_option.main_topic LIKE '%" . $s_main_topic . "%'
        AND item_option.sub_topic LIKE '%" . $s_sub_topic . "%'
        AND item_option.item_option LIKE '%" . $s_item_option . "%'
        AND item_option.year LIKE '%" . $s_year . "%'
        AND item_option.status LIKE '%" . $s_status . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_item_option_data_id($id)
    {
        $sql = "SELECT * FROM tb_item_option_self_evaluation WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Submit_item_option($main_topic, $sub_topic, $item_option, $year, $status)
    {
        $rs = $this->db_hr
            ->set("main_topic", $main_topic)
            ->set("sub_topic", $sub_topic)
            ->set("item_option", $item_option)
            ->set("year", $year)
            ->set("status", $status)
            ->set("modified_date", date('Y-m-d H:i:s'))
            ->insert("tb_item_option_self_evaluation");
        return $rs;
    }

    function model_Update_item_option($up_id, $up_main_topic, $up_sub_topic, $up_item_option, $up_year, $up_status)
    {
        $rs = $this->db_hr
            ->set("main_topic", $up_main_topic)
            ->set("sub_topic", $up_sub_topic)
            ->set("item_option", $up_item_option)
            ->set("year", $up_year)
            ->set("status", $up_status)
            ->set("modified_date", date('Y-m-d H:i:s'))
            ->where("id", $up_id)
            ->update("tb_item_option_self_evaluation");
        return $rs;
    }

    function model_sub_in_sub_status_1()
    {
        $sql = "SELECT * FROM tb_subtopic_in_subtopic_self_evaluation WHERE status = 1";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_division_status_1()
    {
        $sql = "SELECT * FROM tb_division WHERE status = 1";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_item_is_sub_in_sub($s_main_topic, $s_sub_topic, $s_sub_in_sub, $s_sub_in_sub_details, $s_division, $s_sub_division, $s_year, $s_status)
    {
        $sql = "SELECT topic.topic AS t_topic, sub_topic.sub_topic_text AS s_sub_topic, sub_in_sub.subtopic_in_subtopic_text AS t_sub_in_sub, item_is_sub_in_sub.* FROM tb_item_option_is_subtopic_in_subtopic_self_evaluation item_is_sub_in_sub
        LEFT JOIN tb_sub_topic_self_evaluation sub_topic ON (sub_topic.sub_topic = item_is_sub_in_sub.sub_topic)
        LEFT JOIN tb_topic_self_evaluation topic ON (topic.main_topic = sub_topic.main_topic)
        LEFT JOIN tb_subtopic_in_subtopic_self_evaluation sub_in_sub ON (sub_in_sub.subtopic_in_subtopic = item_is_sub_in_sub.subtopic_in_subtopic)
        WHERE item_is_sub_in_sub.main_topic LIKE '%" . $s_main_topic . "%'
        AND item_is_sub_in_sub.sub_topic LIKE '%" . $s_sub_topic . "%'
        AND item_is_sub_in_sub.subtopic_in_subtopic LIKE '%" . $s_sub_in_sub . "%'";
        if ($s_sub_in_sub_details != "") {
            $sql .= " AND item_is_sub_in_sub.subtopic_in_subtopic_text LIKE '%" . $s_sub_in_sub_details . "%'";
        }
        if ($s_division != "") {
            $sql .= " AND item_is_sub_in_sub.division LIKE '%" . $s_division . "%'";
        }
        if ($s_sub_division != "") {
            $sql .= " AND item_is_sub_in_sub.sub_division LIKE '%" . $s_sub_division . "%'";
        }
        $sql .= " AND item_is_sub_in_sub.year LIKE '%" . $s_year . "%'
        AND item_is_sub_in_sub.status LIKE '%" . $s_status . "%'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function model_item_is_sub_in_sub_id($id)
    {
        $sql = "SELECT * FROM tb_item_option_is_subtopic_in_subtopic_self_evaluation WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Submit_Item_Option_is_Subtopic($main_topic, $sub_topic, $sub_in_sub, $sub_in_sub_details, $division, $sub_division, $year, $status)
    {
        $rs = $this->db_hr
            ->set("main_topic", $main_topic)
            ->set("sub_topic", $sub_topic)
            ->set("subtopic_in_subtopic", $sub_in_sub)
            ->set("subtopic_in_subtopic_text", $sub_in_sub_details)
            ->set("division", $division)
            ->set("sub_division", $sub_division)
            ->set("status", $status)
            ->set("year", $year)
            ->set("modified_date", date('Y-m-d H:i:s'))
            ->insert("tb_item_option_is_subtopic_in_subtopic_self_evaluation");
        return $rs;
    }

    function model_Update_Item_Option_is_Subtopic($up_id, $up_main_topic, $up_sub_topic, $up_sub_in_sub, $up_sub_in_sub_details, $up_division, $up_sub_division, $up_year, $up_status)
    {
        $this->db_hr->where('sub_division', $up_sub_division)->where("id !=", $up_id)->where("status != 0");
        $check_dup = $this->db_hr->get("tb_item_option_is_subtopic_in_subtopic_self_evaluation");
        if ($check_dup->num_rows() == 0) {
            $rs = $this->db_hr
                ->set("main_topic", $up_main_topic)
                ->set("sub_topic", $up_sub_topic)
                ->set("subtopic_in_subtopic", $up_sub_in_sub)
                ->set("subtopic_in_subtopic_text", $up_sub_in_sub_details)
                ->set("division", $up_division)
                ->set("sub_division", $up_sub_division)
                ->set("status", $up_status)
                ->set("year", $up_year)
                ->set("modified_date", date('Y-m-d H:i:s'))
                ->where("id", $up_id)
                ->update("tb_item_option_is_subtopic_in_subtopic_self_evaluation");
        }
        return $rs;
    }

    function model_division_data()
    {
        $sql = "SELECT * FROM tb_division";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_division_data_id($id)
    {
        $sql = "SELECT * FROM tb_division WHERE id = '" . $id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }

    function model_Submit_division($division, $year, $status)
    {
        $rs = $this->db_hr
            ->set("division", $division)
            ->set("year", $year)
            ->set("status", $status)
            ->insert("tb_division");
        return $rs;
    }

    function model_Update_division($up_id, $up_division, $up_year, $up_status)
    {
        $rs = $this->db_hr
            ->set("division", $up_division)
            ->set("year", $up_year)
            ->set("status", $up_status)
            ->where("id", $up_id)
            ->update("tb_division");
        return $rs;
    }
}
