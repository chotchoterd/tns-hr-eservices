<script type="text/javascript">
    $(document).ready(function() {
        let up_qualityOfWorkValue = 0;
        let up_jobResponsibilityValue = 0;
        let up_cooperation = 0;
        let up_communication = 0;
        let up_teamwork = 0;
        let up_technical_capability = 0;
        let up_potential = 0;
        let up_effectiveness = 0;
        let up_adaptability = 0;
        let up_creative = 0;

        $('input[name="up_quality_of_work[]"]').change(function() {
            up_qualityOfWorkValue = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_job_responsibility[]"]').change(function() {
            up_jobResponsibilityValue = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_cooperation[]"]').change(function() {
            up_cooperation = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_communication[]"]').change(function() {
            up_communication = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_teamwork[]"]').change(function() {
            up_teamwork = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_technical_capability[]"]').change(function() {
            up_technical_capability = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_potential[]"]').change(function() {
            up_potential = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_effectiveness[]"]').change(function() {
            up_effectiveness = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_adaptability[]"]').change(function() {
            up_adaptability = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        $('input[name="up_creative[]"]').change(function() {
            up_creative = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        function initializeScores() {
            up_qualityOfWorkValue = parseFloat($('input[name="up_quality_of_work[]"]:checked').val()) || 0;
            up_jobResponsibilityValue = parseFloat($('input[name="up_job_responsibility[]"]:checked').val()) || 0;
            up_cooperation = parseFloat($('input[name="up_cooperation[]"]:checked').val()) || 0;
            up_communication = parseFloat($('input[name="up_communication[]"]:checked').val()) || 0;
            up_teamwork = parseFloat($('input[name="up_teamwork[]"]:checked').val()) || 0;
            up_technical_capability = parseFloat($('input[name="up_technical_capability[]"]:checked').val()) || 0;
            up_potential = parseFloat($('input[name="up_potential[]"]:checked').val()) || 0;
            up_effectiveness = parseFloat($('input[name="up_effectiveness[]"]:checked').val()) || 0;
            up_adaptability = parseFloat($('input[name="up_adaptability[]"]:checked').val()) || 0;
            up_creative = parseFloat($('input[name="up_creative[]"]:checked').val()) || 0;
            up_updateAssessmentScore();
        }

        initializeScores();

        function up_updateAssessmentScore() {
            let up_total = up_qualityOfWorkValue + up_jobResponsibilityValue + up_cooperation + up_communication + up_teamwork + up_technical_capability + up_potential + up_effectiveness + up_adaptability + up_creative;
            let up_leave_score_h = parseFloat($('#up_leave_score_h').val());
            let up_sum_score = up_total + up_leave_score_h;
            $('#up_assessment_score').html(up_total);
            $('#up_assessment_score_h').val(up_total);
            $('#up_total_score').html(up_sum_score);
            $('#up_total_score_h').val(up_sum_score);

            $('#up_grade_a').prop('checked', false);
            $('#up_grade_b').prop('checked', false);
            $('#up_grade_c').prop('checked', false);
            $('#up_grade_d').prop('checked', false);

            if (up_sum_score >= 91) {
                $('#up_grade_a').prop('checked', true);
            } else if (up_sum_score >= 73) {
                $('#up_grade_b').prop('checked', true);
            } else if (up_sum_score >= 56) {
                $('#up_grade_c').prop('checked', true);
            } else {
                $('#up_grade_d').prop('checked', true);
            }

            if (up_sum_score >= 91) {
                $('#up_final_rating').html('<b style="font-size: 40px">A</b>');
            } else if (up_sum_score >= 73) {
                $('#up_final_rating').html('<b style="font-size: 40px">B</b>');
            } else if (up_sum_score >= 56) {
                $('#up_final_rating').html('<b style="font-size: 40px">C</b>');
            } else {
                $('#up_final_rating').html('<b style="font-size: 40px">D</b>');
            }
        }
        $('#up_bt_Submit').click(function() {
            let up_id = document.getElementById("up_id").value;
            let up_date_submit = document.getElementById("up_date_submit").value;
            let up_emp_name = document.getElementById("up_emp_name").value;
            let up_emp_id = document.getElementById("up_emp_id").value;
            let up_position = document.getElementById("up_position").value;
            let up_section = document.getElementById("up_section").value;
            let up_hired_date = document.getElementById("up_hired_date").value;
            let up_emp_year_of_service = document.getElementById("up_emp_year_of_service").value;
            let up_sup_name1 = $('#up_sup_name1').val();
            let up_sup_name2 = $('#up_sup_name2').val();
            let up_Factory_Manager_GM = $('#up_Factory_Manager_GM').val();
            let up_quality_of_work = [];
            let up_quality_of_work_list = [];
            $.each($('input[name="up_quality_of_work[]"]:checked'), function() {
                up_quality_of_work_list.push($(this).val());
            });
            up_quality_of_work += up_quality_of_work_list;
            let up_job_responsibility = [];
            let up_job_responsibility_list = [];
            $.each($('input[name="up_job_responsibility[]"]:checked'), function() {
                up_job_responsibility_list.push($(this).val());
            });
            up_job_responsibility += up_job_responsibility_list;
            let up_cooperation = [];
            let up_cooperation_list = [];
            $.each($('input[name="up_cooperation[]"]:checked'), function() {
                up_cooperation_list.push($(this).val());
            });
            up_cooperation += up_cooperation_list;
            let up_communication = [];
            let up_communication_list = [];
            $.each($('input[name="up_communication[]"]:checked'), function() {
                up_communication_list.push($(this).val());
            });
            up_communication += up_communication_list;
            let up_teamwork = [];
            let up_teamwork_list = [];
            $.each($('input[name="up_teamwork[]"]:checked'), function() {
                up_teamwork_list.push($(this).val());
            });
            up_teamwork += up_teamwork_list;
            let up_technical_capability = [];
            let up_technical_capability_list = [];
            $.each($('input[name="up_technical_capability[]"]:checked'), function() {
                up_technical_capability_list.push($(this).val());
            });
            up_technical_capability += up_technical_capability_list;
            let up_potential = [];
            let up_potential_list = [];
            $.each($('input[name="up_potential[]"]:checked'), function() {
                up_potential_list.push($(this).val());
            });
            up_potential += up_potential_list;
            let up_effectiveness = [];
            let up_effectiveness_list = [];
            $.each($('input[name="up_effectiveness[]"]:checked'), function() {
                up_effectiveness_list.push($(this).val());
            });
            up_effectiveness += up_effectiveness_list;
            let up_adaptability = [];
            let up_adaptability_list = [];
            $.each($('input[name="up_adaptability[]"]:checked'), function() {
                up_adaptability_list.push($(this).val());
            });
            up_adaptability += up_adaptability_list;
            let up_creative = [];
            let up_creative_list = [];
            $.each($('input[name="up_creative[]"]:checked'), function() {
                up_creative_list.push($(this).val());
            });
            up_creative += up_creative_list;
            let up_year_submit = document.getElementById("up_year_submit").value;
            let up_assessment_score_h = document.getElementById("up_assessment_score_h").value;
            let up_leave_score_h = document.getElementById("up_leave_score_h").value;
            let up_total_score_h = document.getElementById("up_total_score_h").value;
            let up_assessment_status = "Submit";
            let up_business_leave1 = document.getElementById("up_business_leave1").value;
            let up_business_leave2 = document.getElementById("up_business_leave2").value;
            let up_sick_leave1 = document.getElementById("up_sick_leave1").value;
            let up_sick_leave2 = document.getElementById("up_sick_leave2").value;
            let up_absenteeism1 = document.getElementById("up_absenteeism1").value;
            let up_absenteeism2 = document.getElementById("up_absenteeism2").value;
            let up_total_leave1 = document.getElementById("up_total_leave1").value;
            let up_total_leave2 = document.getElementById("up_total_leave2").value;
            let up_grand_total = document.getElementById("up_grand_total").value;
            let up_late1 = document.getElementById("up_late1").value;
            let up_late2 = document.getElementById("up_late2").value;
            let up_verbal_warning = document.getElementById("up_verbal_warning").value;
            let up_letter_warning = document.getElementById("up_letter_warning").value;

            $.ajax({
                url: "<?php echo base_url('index.php/bonus_controller/up_Submit_bonus_evaluate_g4_g6_ajax') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    up_id: up_id,
                    up_date_submit: up_date_submit,
                    up_emp_name: up_emp_name,
                    up_emp_id: up_emp_id,
                    up_position: up_position,
                    up_section: up_section,
                    up_hired_date: up_hired_date,
                    up_emp_year_of_service: up_emp_year_of_service,
                    up_sup_name1: up_sup_name1,
                    up_sup_name2: up_sup_name2,
                    up_Factory_Manager_GM: up_Factory_Manager_GM, //////
                    up_quality_of_work: up_quality_of_work,
                    up_job_responsibility: up_job_responsibility,
                    up_cooperation: up_cooperation,
                    up_communication: up_communication,
                    up_teamwork: up_teamwork,
                    up_technical_capability: up_technical_capability,
                    up_potential: up_potential,
                    up_effectiveness: up_effectiveness,
                    up_adaptability: up_adaptability,
                    up_creative: up_creative,
                    up_assessment_score_h: up_assessment_score_h,
                    up_leave_score_h: up_leave_score_h,
                    up_total_score_h: up_total_score_h,
                    up_assessment_status: up_assessment_status,
                    up_year_submit: up_year_submit,
                    up_business_leave1: up_business_leave1,
                    up_business_leave2: up_business_leave2,
                    up_sick_leave1: up_sick_leave1,
                    up_sick_leave2: up_sick_leave2,
                    up_absenteeism1: up_absenteeism1,
                    up_absenteeism2: up_absenteeism2,
                    up_total_leave1: up_total_leave1,
                    up_total_leave2: up_total_leave2,
                    up_grand_total: up_grand_total,
                    up_late1: up_late1,
                    up_late2: up_late2,
                    up_verbal_warning: up_verbal_warning,
                    up_letter_warning: up_letter_warning
                },
                success: function(data) {
                    Swal.fire({
                        title: "Submit successfully",
                        text: "",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        customClass: {
                            title: 'custom-title-class'
                        }
                    }).then(function() {
                        window.location = '<?php echo base_url('index.php/bonus_controller/StaticFormBonusAnnualEvaluateG4G6/?id='); ?>' + up_id;
                    });
                }
            });
        });
    });
</script>