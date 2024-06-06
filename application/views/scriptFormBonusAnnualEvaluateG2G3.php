<script type="text/javascript">
    $(document).ready(function() {
        let quality_of_work = 0;
        let job_responsibility = 0;
        let cooperation = 0;
        let communication = 0;
        let teamwork = 0;
        let potential = 0;
        let effectiveness = 0;
        let planning = 0;
        let preventive = 0;
        let creative = 0;
        let management_mind = 0;
        let problem_solving = 0;

        $('input[name="quality_of_work[]"]').change(function() {
            quality_of_work = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="job_responsibility[]"]').change(function() {
            job_responsibility = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="cooperation[]"]').change(function() {
            cooperation = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="communication[]"]').change(function() {
            communication = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="teamwork[]"]').change(function() {
            teamwork = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="potential[]"]').change(function() {
            potential = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="effectiveness[]"]').change(function() {
            effectiveness = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="planning[]"]').change(function() {
            planning = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="preventive[]"]').change(function() {
            preventive = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="creative[]"]').change(function() {
            creative = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="management_mind[]"]').change(function() {
            management_mind = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="problem_solving[]"]').change(function() {
            problem_solving = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        function updateAssessmentScore() {
            let total = quality_of_work + job_responsibility + cooperation + communication + teamwork + potential + effectiveness + planning + preventive + creative + management_mind + problem_solving;
            let leave_score_h = parseFloat($('#leave_score_h').val());
            let sum_score = leave_score_h + total;

            $('#assessment_score').html(total);
            $('#assessment_score_h').val(total);
            $('#leave_record_score').html(leave_score_h);
            $('#total_score').html(sum_score);
            $('#total_score_h').val(sum_score);

            $('#grade_a').prop('checked', false);
            $('#grade_b').prop('checked', false);
            $('#grade_c').prop('checked', false);
            $('#grade_d').prop('checked', false);

            if (sum_score >= 91) {
                $('#grade_a').prop('checked', true);
            } else if (sum_score >= 73) {
                $('#grade_b').prop('checked', true);
            } else if (sum_score >= 56) {
                $('#grade_c').prop('checked', true);
            } else {
                $('#grade_d').prop('checked', true);
            }

            if (sum_score >= 91) {
                $('#final_rating').html('<b style="font-size: 40px">A</b>');
            } else if (sum_score >= 73) {
                $('#final_rating').html('<b style="font-size: 40px">B</b>');
            } else if (sum_score >= 56) {
                $('#final_rating').html('<b style="font-size: 40px">C</b>');
            } else {
                $('#final_rating').html('<b style="font-size: 40px">D</b>');
            }
        }

        $('#bt_Submit').click(function() {
            let check_error = 0;
            let quality_of_work = [];
            let quality_of_work_list = [];
            $.each($('input[name="quality_of_work[]"]:checked'), function() {
                quality_of_work_list.push($(this).val());
            });
            quality_of_work += quality_of_work_list;
            let job_responsibility = [];
            let job_responsibility_list = [];
            $.each($('input[name="job_responsibility[]"]:checked'), function() {
                job_responsibility_list.push($(this).val());
            });
            job_responsibility += job_responsibility_list;
            let cooperation = [];
            let cooperation_list = [];
            $.each($('input[name="cooperation[]"]:checked'), function() {
                cooperation_list.push($(this).val());
            });
            cooperation += cooperation_list;
            let communication = [];
            let communication_list = [];
            $.each($('input[name="communication[]"]:checked'), function() {
                communication_list.push($(this).val());
            });
            communication += communication_list;
            let teamwork = [];
            let teamwork_list = [];
            $.each($('input[name="teamwork[]"]:checked'), function() {
                teamwork_list.push($(this).val());
            });
            teamwork += teamwork_list;
            let potential = [];
            let potential_list = [];
            $.each($('input[name="potential[]"]:checked'), function() {
                potential_list.push($(this).val());
            });
            potential += potential_list;
            let effectiveness = [];
            let effectiveness_list = [];
            $.each($('input[name="effectiveness[]"]:checked'), function() {
                effectiveness_list.push($(this).val());
            });
            effectiveness += effectiveness_list;
            let planning = [];
            let planning_list = [];
            $.each($('input[name="planning[]"]:checked'), function() {
                planning_list.push($(this).val());
            });
            planning += planning_list;
            let preventive = [];
            let preventive_list = [];
            $.each($('input[name="preventive[]"]:checked'), function() {
                preventive_list.push($(this).val());
            });
            preventive += preventive_list;
            let creative = [];
            let creative_list = [];
            $.each($('input[name="creative[]"]:checked'), function() {
                creative_list.push($(this).val());
            });
            creative += creative_list;
            let management_mind = [];
            let management_mind_list = [];
            $.each($('input[name="management_mind[]"]:checked'), function() {
                management_mind_list.push($(this).val());
            });
            management_mind += management_mind_list;
            let problem_solving = [];
            let problem_solving_list = [];
            $.each($('input[name="problem_solving[]"]:checked'), function() {
                problem_solving_list.push($(this).val());
            });
            problem_solving += problem_solving_list;

            if (quality_of_work.length <= 0) {
                let alert_quality_of_work = document.getElementById("alert_quality_of_work");
                alert_quality_of_work.style.display = "block";
                check_error = 1;
                let qualityOfWorkElements = document.getElementsByName("quality_of_work[]");
                if (qualityOfWorkElements.length > 0) {
                    qualityOfWorkElements[0].focus();
                }
            }
            if (job_responsibility.length <= 0) {
                let alert_job_responsibility = document.getElementById("alert_job_responsibility");
                alert_job_responsibility.style.display = "block";
                check_error = 1;
                let jobResponsibilityElements = document.getElementsByName("job_responsibility[]");
                if (jobResponsibilityElements.length > 0) {
                    jobResponsibilityElements[0].focus();
                }
            }
            if (cooperation.length <= 0) {
                let alert_cooperation = document.getElementById("alert_cooperation");
                alert_cooperation.style.display = "block";
                check_error = 1;
                let cooperationElements = document.getElementsByName("cooperation[]");
                if (cooperationElements.length > 0) {
                    cooperationElements[0].focus();
                }
            }
            if (communication.length <= 0) {
                let alert_communication = document.getElementById("alert_communication");
                alert_communication.style.display = "block";
                check_error = 1;
                let communicationElements = document.getElementsByName("communication[]");
                if (communicationElements.length > 0) {
                    communicationElements[0].focus();
                }
            }
            if (teamwork.length <= 0) {
                let alert_teamwork = document.getElementById("alert_teamwork");
                alert_teamwork.style.display = "block";
                check_error = 1;
                let teamworkElements = document.getElementsByName('teamwork[]');
                if (teamworkElements.length > 0) {
                    teamworkElements[0].focus()
                }
            }
            if (potential.length <= 0) {
                let alert_potential = document.getElementById("alert_potential");
                alert_potential.style.display = "block";
                check_error = 1;
                let potentialElements = document.getElementsByName("potential[]");
                if (potentialElements.length > 0) {
                    potentialElements[0].focus();
                }
            }
            if (effectiveness.length <= 0) {
                let alert_effectiveness = document.getElementById("alert_effectiveness");
                alert_effectiveness.style.display = "block";
                check_error = 1;
                let effectivenessElements = document.getElementsByName("effectiveness[]");
                if (effectivenessElements.length > 0) {
                    effectivenessElements[0].focus();
                }
            }
            if (planning.length <= 0) {
                let alert_planning = document.getElementById("alert_planning");
                alert_planning.style.display = "block";
                check_error = 1;
                let planningElements = document.getElementsByName("planning[]");
                if (planningElements.length > 0) {
                    planningElements[0].focus();
                }
            }
            if (preventive.length <= 0) {
                let alert_preventive = document.getElementById("alert_preventive");
                alert_preventive.style.display = "block";
                check_error = 1;
                let preventiveElements = document.getElementsByName("preventive[]");
                if (preventiveElements.length > 0) {
                    preventiveElements[0].focus();
                }
            }
            if (creative.length <= 0) {
                let alert_creative = document.getElementById("alert_creative");
                alert_creative.style.display = "block";
                check_error = 1;
                let creativeElements = document.getElementsByName("creative[]");
                if (creativeElements.length > 0) {
                    creativeElements[0].focus();
                }
            }
            if (management_mind.length <= 0) {
                let alert_management_mind = document.getElementById("alert_management_mind");
                alert_management_mind.style.display = "block";
                check_error = 1;
                let managementMindElements = document.getElementsByName("management_mind[]");
                if (managementMindElements.length > 0) {
                    managementMindElements[0].focus();
                }
            }
            if (problem_solving.length <= 0) {
                let alert_problem_solving = document.getElementById("alert_problem_solving");
                alert_problem_solving.style.display = "block";
                check_error = 1;
                let problemSolvingElements = document.getElementsByName("problem_solving[]");
                if (problemSolvingElements.length > 0) {
                    problemSolvingElements[0].focus();
                }
            }
            if (check_error == 0) {
                Submit_bonus_evaluate_g2_g3();
            }
        });

        $('input[name="quality_of_work[]"]').on('change', function() {
            let alert_quality_of_work = document.getElementById("alert_quality_of_work");
            alert_quality_of_work.style.display = "none";
        });
        $('input[name="job_responsibility[]"]').on('change', function() {
            let alert_job_responsibility = document.getElementById("alert_job_responsibility");
            alert_job_responsibility.style.display = "none";
        });
        $('input[name="cooperation[]"]').on('change', function() {
            let alert_cooperation = document.getElementById("alert_cooperation");
            alert_cooperation.style.display = "none";
        })
        $('input[name="communication[]"]').on('change', function() {
            let alert_communication = document.getElementById("alert_communication");
            alert_communication.style.display = "none";
        });
        $('input[name="teamwork[]"]').on('change', function() {
            let alert_teamwork = document.getElementById("alert_teamwork");
            alert_teamwork.style.display = "none";
        });
        $('input[name="potential[]"]').on('change', function() {
            let alert_potential = document.getElementById("alert_potential");
            alert_potential.style.display = "none";
        });
        $('input[name="effectiveness[]"]').on('change', function() {
            let alert_effectiveness = document.getElementById("alert_effectiveness");
            alert_effectiveness.style.display = "none";
        });
        $('input[name="planning[]"]').on('change', function() {
            let alert_planning = document.getElementById("alert_planning");
            alert_planning.style.display = "none";
        });
        $('input[name="preventive[]"]').on('change', function() {
            let alert_preventive = document.getElementById("alert_preventive");
            alert_preventive.style.display = "none";
        });
        $('input[name="creative[]"]').on('change', function() {
            let alert_creative = document.getElementById("alert_creative");
            alert_creative.style.display = "none";
        })
        $('input[name="management_mind[]"]').on('change', function() {
            let alert_management_mind = document.getElementById("alert_management_mind");
            alert_management_mind.style.display = "none";
        });
        $('input[name="problem_solving[]"]').on('change', function() {
            let alert_problem_solving = document.getElementById("alert_problem_solving");
            alert_problem_solving.style.display = "none";
        });
    });

    function Submit_bonus_evaluate_g2_g3() {
        let date_submit = document.getElementById("date_submit").value;
        let emp_name = document.getElementById("emp_name").value;
        let emp_id = document.getElementById("emp_id").value;
        let position = document.getElementById("position").value;
        let section = document.getElementById("section").value;
        let hired_date = document.getElementById("hired_date").value;
        let emp_year_of_service = document.getElementById("emp_year_of_service").value;
        let sup_name1 = $('#sup_name1').val();
        let sup_name2 = $('#sup_name2').val();
        let Factory_Manager_GM = $('#Factory_Manager_GM').val();

        $.ajax({
            url: "<?php echo base_url('index.php/bonus_controller/Submit_bonus_evaluate_g2_g3_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                date_submit: date_submit,
                emp_name: emp_name,
                emp_id: emp_id,
                position: position,
                section: section,
                hired_date: hired_date,
                emp_year_of_service: emp_year_of_service,
                sup_name1: sup_name1,
                sup_name2: sup_name2,
                Factory_Manager_GM: Factory_Manager_GM
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
                    window.location = '<?php echo base_url('index.php/bonus_controller/TableAssessmentRecord'); ?>';
                });
            }
        });
    }
</script>