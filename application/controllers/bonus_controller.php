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
        $bonus_evaluate_g4_g6['bonus_evaluate_g4_g6'] = $this->hr->model_bonus_evaluate_g4_g6();
        $title['title'] = 'AA002-Bonus&Annual Evaluate G4-G6';
        $this->load->view('include/header', $title);
        $this->load->view('include/menu');
        $this->load->view('FormBonusAnnualEvaluateG4G6', $bonus_evaluate_g4_g6);
        $this->load->view('include/footer');
    }
}
