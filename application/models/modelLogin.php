<?php
class ModelLogin extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->db_macs = $this->load->database('db_macs', TRUE);
        $this->db_hr = $this->load->database('db_hr', TRUE);
    }

    function get_data_user($username, $ldaprdn)
    {
        $sql = "SELECT * FROM tb_emp_hr_import
        WHERE emp_email = '" . $ldaprdn . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }

    function get_data_emp_admin($emp_id)
    {
        $sql = "SELECT * FROM tb_admin
        WHERE status = 1
        AND emp_id = '" . $emp_id . "'";
        $rs = $this->db_hr
            ->query($sql)
            ->result();
        // print_r($sql);
        return $rs;
    }
}
