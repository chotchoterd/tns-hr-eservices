<script type="text/javascript">
    $(document).ready(function() {
        let quality_of_work = 0;
        let job_responsibility = 0;
        let cooperation = 0;
        let teamwork = 0;
        let job_knowledge = 0;
        let technical_skill = 0;

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
        $('input[name="teamwork[]"]').change(function() {
            teamwork = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="job_knowledge[]"]').change(function() {
            job_knowledge = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="technical_skill[]"]').change(function() {
            technical_skill = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        function updateAssessmentScore() {
            let total = quality_of_work + job_responsibility + cooperation + teamwork + job_knowledge + technical_skill;
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
            let teamwork = [];
            let teamwork_list = [];
            $.each($('input[name="teamwork[]"]:checked'), function() {
                teamwork_list.push($(this).val());
            });
            teamwork += teamwork_list;
            let job_knowledge = [];
            let job_knowledge_list = [];
            $.each($('input[name="job_knowledge[]"]:checked'), function() {
                job_knowledge_list.push($(this).val());
            });
            job_knowledge += job_knowledge_list;
            let technical_skill = [];
            let technical_skill_list = [];
            $.each($('input[name="technical_skill[]"]:checked'), function() {
                technical_skill_list.push($(this).val());
            });
            technical_skill += technical_skill_list;

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
            if (teamwork.length <= 0) {
                let alert_teamwork = document.getElementById("alert_teamwork");
                alert_teamwork.style.display = "block";
                check_error = 1;
                let teamworkElements = document.getElementsByName("teamwork[]");
                if (teamworkElements.length > 0) {
                    teamworkElements[0].focus();
                }
            }
            if (job_knowledge.length <= 0) {
                let alert_job_knowledge = document.getElementById("alert_job_knowledge");
                alert_job_knowledge.style.display = "block";
                check_error = 1;
                let jobKnowledgeElements = document.getElementsByName("job_knowledge[]");
                if (jobKnowledgeElements.length > 0) {
                    jobKnowledgeElements[0].focus();
                }
            }
            if (technical_skill.length <= 0) {
                let alert_technical_skill = document.getElementById("alert_technical_skill");
                alert_technical_skill.style.display = "block";
                check_error = 1;
                let technicalSkillElements = document.getElementsByName("technical_skill[]");
                if (technicalSkillElements.length > 0) {
                    technicalSkillElements[0].focus();
                }
            }
            if (check_error == 0) {
                Submit_bonus_evaluate_foreman_and_below();
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
        $('input[name="teamwork[]"]').on('change', function() {
            let alert_teamwork = document.getElementById("alert_teamwork");
            alert_teamwork.style.display = "none";
        });
        $('input[name="job_knowledge[]"]').on('change', function() {
            let alert_job_knowledge = document.getElementById("alert_job_knowledge");
            alert_job_knowledge.style.display = "none";
        });
        $('input[name="technical_skill[]"]').on('change', function() {
            let alert_technical_skill = document.getElementById("alert_technical_skill");
            alert_technical_skill.style.display = "none";
        });
    });

    function Submit_bonus_evaluate_foreman_and_below() {
        let date_submit = document.getElementById("date_submit").value;
        let emp_name = document.getElementById("emp_name").value;
        let emp_id = document.getElementById("emp_id").value;
        let position = document.getElementById("position").value;
        let section = document.getElementById("section").value;
        let hired_date = document.getElementById("hired_date").value;
        let emp_year_of_service = document.getElementById("emp_year_of_service").value;
        let foreman = $('#foreman').val();
        let sup_name1 = $('#sup_name1').val();
        let sup_name2 = $('#sup_name2').val();
        let Factory_Manager_GM = $('#Factory_Manager_GM').val();

        $.ajax({
            url: "<?php echo base_url('index.php/bonus_controller/Submit_bonus_evaluate_foreman_ajax') ?>",
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
                foreman: foreman,
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