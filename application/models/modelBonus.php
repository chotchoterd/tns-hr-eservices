<?php
class ModelBonus extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_hr = $this->load->database('db_hr', TRUE);
    }

    function model_bonus_evaluate_g4_g6()
    {
        $current_year = date('Y');
        $sql = "SELECT * FROM tb_bonus_evaluate_g4_g6 WHERE status = 1
        AND year = " . $current_year . "";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        return $rs;
    }
}
