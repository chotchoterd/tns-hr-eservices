<script type="text/javascript">
    $(document).ready(function() {
        let qualityOfWorkValue = 0;
        let jobResponsibilityValue = 0;
        let cooperation = 0;
        let communication = 0;
        let teamwork = 0;
        let technical_capability = 0;
        let potential = 0;
        let effectiveness = 0;
        let adaptability = 0;
        let creative = 0;

        $('input[name="quality_of_work[]"]').change(function() {
            qualityOfWorkValue = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="job_responsibility[]"]').change(function() {
            jobResponsibilityValue = parseFloat($(this).val()) || 0;
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

        $('input[name="technical_capability[]"]').change(function() {
            technical_capability = parseFloat($(this).val()) || 0;
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

        $('input[name="adaptability[]"]').change(function() {
            adaptability = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="creative[]"]').change(function() {
            creative = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        function updateAssessmentScore(e) {
            let total = qualityOfWorkValue + jobResponsibilityValue + cooperation + communication + teamwork + technical_capability + potential + effectiveness + adaptability + creative;
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
            let technical_capability = [];
            let technical_capability_list = [];
            $.each($('input[name="technical_capability[]"]:checked'), function() {
                technical_capability_list.push($(this).val());
            });
            technical_capability += technical_capability_list;
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
            let adaptability = [];
            let adaptability_list = [];
            $.each($('input[name="adaptability[]"]:checked'), function() {
                adaptability_list.push($(this).val());
            });
            adaptability += adaptability_list;
            let creative = [];
            let creative_list = [];
            $.each($('input[name="creative[]"]:checked'), function() {
                creative_list.push($(this).val());
            });
            creative += creative_list;

            if (quality_of_work.length <= 0) {
                let alert_Quality_of_work = document.getElementById("alert_Quality_of_work");
                alert_Quality_of_work.style.display = "block";
                check_error = 1;
                let qualityOfWorkElements = document.getElementsByName("quality_of_work[]");
                if (qualityOfWorkElements.length > 0) {
                    qualityOfWorkElements[0].focus();
                }
            }
            if (job_responsibility.length <= 0) {
                let alert_Job_Responsibility = document.getElementById("alert_Job_Responsibility");
                alert_Job_Responsibility.style.display = "block";
                check_error = 1;
                let JobResponsibilityElements = document.getElementsByName("job_responsibility[]");
                if (JobResponsibilityElements.length > 0) {
                    JobResponsibilityElements[0].focus();
                }
            }
            if (cooperation.length <= 0) {
                let alert_Cooperation = document.getElementById("alert_Cooperation");
                alert_Cooperation.style.display = "block";
                check_error = 1;
                let CooperationElements = document.getElementsByName("cooperation[]");
                if (CooperationElements.length > 0) {
                    CooperationElements[0].focus();
                }
            }
            if (communication.length <= 0) {
                let alert_Communication = document.getElementById("alert_Communication");
                alert_Communication.style.display = "block";
                check_error = 1;
                let communicationElements = document.getElementsByName("communication[]");
                if (communicationElements.length > 0) {
                    communicationElements[0].focus();
                }
            }
            if (teamwork.length <= 0) {
                let alert_Teamwork = document.getElementById("alert_Teamwork");
                alert_Teamwork.style.display = "block";
                check_error = 1;
                let TeamworkElements = document.getElementsByName("teamwork[]");
                if (TeamworkElements.length > 0) {
                    TeamworkElements[0].focus();
                }
            }
            if (technical_capability.length <= 0) {
                let alert_technical_capability = document.getElementById("alert_technical_capability");
                alert_technical_capability.style.display = "block";
                check_error = 1;
                let TechnicalCapabilityElements = document.getElementsByName("technical_capability[]");
                if (TechnicalCapabilityElements.length > 0) {
                    TechnicalCapabilityElements[0].focus();
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
                let EffectivenessElements = document.getElementsByName("effectiveness[]");
                if (EffectivenessElements.length > 0) {
                    EffectivenessElements[0].focus();
                }
            }
            if (adaptability.length <= 0) {
                let alert_adaptability = document.getElementById("alert_adaptability");
                alert_adaptability.style.display = "block";
                check_error = 1;
                let adaptabilityElements = document.getElementsByName("adaptability[]");
                if (adaptabilityElements.length > 0) {
                    adaptabilityElements[0].focus();
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
            if (check_error == 0) {
                Submit_bonus_evaluate_g4_g6();
            }
        });

        $('input[name="quality_of_work[]"]').on('change', function() {
            let alert_Quality_of_work = document.getElementById("alert_Quality_of_work");
            alert_Quality_of_work.style.display = "none";
        })
        $('input[name="job_responsibility[]"]').on('change', function() {
            let alert_Job_Responsibility = document.getElementById("alert_Job_Responsibility");
            alert_Job_Responsibility.style.display = "none";
        });
        $('input[name="cooperation[]"]').on('change', function() {
            let alert_Cooperation = document.getElementById("alert_Cooperation");
            alert_Cooperation.style.display = "none";
        });
        $('input[name="communication[]"]').on('change', function() {
            let alert_Communication = document.getElementById("alert_Communication");
            alert_Communication.style.display = "none";
        });
        $('input[name="teamwork[]"]').on('change', function() {
            let alert_Teamwork = document.getElementById("alert_Teamwork");
            alert_Teamwork.style.display = "none";
        });
        $('input[name="technical_capability[]"]').on('change', function() {
            let alert_technical_capability = document.getElementById("alert_technical_capability");
            alert_technical_capability.style.display = "none";
        });
        $('input[name="potential[]"]').on('change', function() {
            let alert_potential = document.getElementById("alert_potential");
            alert_potential.style.display = "none";
        });
        $('input[name="effectiveness[]"]').on('change', function() {
            let alert_effectiveness = document.getElementById("alert_effectiveness");
            alert_effectiveness.style.display = "none";
        });
        $('input[name="adaptability[]"]').on('change', function() {
            let alert_adaptability = document.getElementById("alert_adaptability");
            alert_adaptability.style.display = "none";
        });
        $('input[name="creative[]"]').on('change', function() {
            let alert_creative = document.getElementById("alert_creative");
            alert_creative.style.display = "none";
        });
    });

    function Submit_bonus_evaluate_g4_g6() {
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
            url: "<?php echo base_url('index.php/bonus_controller/Submit_bonus_evaluate_g4_g6_ajax') ?>",
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