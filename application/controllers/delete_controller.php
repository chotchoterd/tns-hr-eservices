<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Delete_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->model('modelHR', 'hr');
    }

    function Delete_Self_Evaluation($del)
    {
        $title['title'] = 'Are you sure Delete Self-Evaluation ?';
        $this->load->view('include/header', $title);
        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
          Swal.fire({
            title: 'Are you sure ?',
            html: 'Do you want to Delete this Self-Evaluation,<br> <b style=\"font-size: 18px;\">Yes or No ?</b>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#203764',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            allowOutsideClick: false,
            allowEscapeKey: false,
            customClass: {
                title: 'custom-title-class'
            }
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = '" . base_url() . "index.php/delete_controller/Delete_Self_Evaluation_confirm/$del';
            } else {
              window.location.href = '" . base_url() . "index.php/hr_controller/TableRecordSelfEvaluationForHr';
            }
          });
        });
        </script>";
    }

    function Delete_Self_Evaluation_confirm($del)
    {
        $title['title'] = 'Delete Successfully';
        $this->load->view('include/header', $title);
        $this->hr->model_Delete_Self_Evaluation_confirm($del);

        echo "<script type='text/javascript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Cancel Successfully',
                text: '',
                icon: 'success',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: false,
                timer: 1500
            }).then(function() {
                window.location.href = '" . base_url() . "index.php/hr_controller/TableRecordSelfEvaluationForHr';
            });
        });
    </script>";
    }
}
