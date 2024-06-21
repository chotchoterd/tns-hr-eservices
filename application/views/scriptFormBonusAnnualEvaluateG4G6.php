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

        $('#up_bt_Submit').click(function() {
            let up_check_error = 0;
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

            if (up_quality_of_work.length <= 0) {
                let alert_Quality_of_work = document.getElementById("alert_Quality_of_work");
                alert_Quality_of_work.style.display = "block";
                up_check_error = 1;
                let qualityOfWorkElements = document.getElementsByName("up_quality_of_work[]");
                if (qualityOfWorkElements.length > 0) {
                    qualityOfWorkElements[0].focus();
                }
            }
            if (up_job_responsibility.length <= 0) {
                let alert_Job_Responsibility = document.getElementById("alert_Job_Responsibility");
                alert_Job_Responsibility.style.display = "block";
                up_check_error = 1;
                let JobResponsibilityElements = document.getElementsByName("up_job_responsibility[]");
                if (JobResponsibilityElements.length > 0) {
                    JobResponsibilityElements[0].focus();
                }
            }
            if (up_cooperation.length <= 0) {
                let alert_Cooperation = document.getElementById("alert_Cooperation");
                alert_Cooperation.style.display = "block";
                up_check_error = 1;
                let CooperationElements = document.getElementsByName("up_cooperation[]");
                if (CooperationElements.length > 0) {
                    CooperationElements[0].focus();
                }
            }
            if (up_communication.length <= 0) {
                let alert_Communication = document.getElementById("alert_Communication");
                alert_Communication.style.display = "block";
                up_check_error = 1;
                let communicationElements = document.getElementsByName("up_communication[]");
                if (communicationElements.length > 0) {
                    communicationElements[0].focus();
                }
            }
            if (up_teamwork.length <= 0) {
                let alert_Teamwork = document.getElementById("alert_Teamwork");
                alert_Teamwork.style.display = "block";
                up_check_error = 1;
                let TeamworkElements = document.getElementsByName("up_teamwork[]");
                if (TeamworkElements.length > 0) {
                    TeamworkElements[0].focus();
                }
            }
            if (up_technical_capability.length <= 0) {
                let alert_technical_capability = document.getElementById("alert_technical_capability");
                alert_technical_capability.style.display = "block";
                up_check_error = 1;
                let TechnicalCapabilityElements = document.getElementsByName("up_technical_capability[]");
                if (TechnicalCapabilityElements.length > 0) {
                    TechnicalCapabilityElements[0].focus();
                }
            }
            if (up_potential.length <= 0) {
                let alert_potential = document.getElementById("alert_potential");
                alert_potential.style.display = "block";
                up_check_error = 1;
                let potentialElements = document.getElementsByName("up_potential[]");
                if (potentialElements.length > 0) {
                    potentialElements[0].focus();
                }
            }
            if (up_effectiveness.length <= 0) {
                let alert_effectiveness = document.getElementById("alert_effectiveness");
                alert_effectiveness.style.display = "block";
                up_check_error = 1;
                let EffectivenessElements = document.getElementsByName("up_effectiveness[]");
                if (EffectivenessElements.length > 0) {
                    EffectivenessElements[0].focus();
                }
            }
            if (up_adaptability.length <= 0) {
                let alert_adaptability = document.getElementById("alert_adaptability");
                alert_adaptability.style.display = "block";
                up_check_error = 1;
                let adaptabilityElements = document.getElementsByName("up_adaptability[]");
                if (adaptabilityElements.length > 0) {
                    adaptabilityElements[0].focus();
                }
            }
            if (up_creative.length <= 0) {
                let alert_creative = document.getElementById("alert_creative");
                alert_creative.style.display = "block";
                up_check_error = 1;
                let creativeElements = document.getElementsByName("up_creative[]");
                if (creativeElements.length > 0) {
                    creativeElements[0].focus();
                }
            }
            if (up_check_error == 0) {
                up_Submit_bonus_evaluate_g4_g6();
            }
        });

        $('input[name="quality_of_work[]"]').on('change', function() {
            let alert_Quality_of_work = document.getElementById("alert_Quality_of_work");
            alert_Quality_of_work.style.display = "none";
        })
        $('input[name="up_quality_of_work[]"]').on('change', function() {
            let alert_Quality_of_work = document.getElementById("alert_Quality_of_work");
            alert_Quality_of_work.style.display = "none";
        })
        $('input[name="job_responsibility[]"]').on('change', function() {
            let alert_Job_Responsibility = document.getElementById("alert_Job_Responsibility");
            alert_Job_Responsibility.style.display = "none";
        });
        $('input[name="up_job_responsibility[]"]').on('change', function() {
            let alert_Job_Responsibility = document.getElementById("alert_Job_Responsibility");
            alert_Job_Responsibility.style.display = "none";
        });
        $('input[name="cooperation[]"]').on('change', function() {
            let alert_Cooperation = document.getElementById("alert_Cooperation");
            alert_Cooperation.style.display = "none";
        });
        $('input[name="up_cooperation[]"]').on('change', function() {
            let alert_Cooperation = document.getElementById("alert_Cooperation");
            alert_Cooperation.style.display = "none";
        });
        $('input[name="communication[]"]').on('change', function() {
            let alert_Communication = document.getElementById("alert_Communication");
            alert_Communication.style.display = "none";
        });
        $('input[name="up_communication[]"]').on('change', function() {
            let alert_Communication = document.getElementById("alert_Communication");
            alert_Communication.style.display = "none";
        });
        $('input[name="teamwork[]"]').on('change', function() {
            let alert_Teamwork = document.getElementById("alert_Teamwork");
            alert_Teamwork.style.display = "none";
        });
        $('input[name="up_teamwork[]"]').on('change', function() {
            let alert_Teamwork = document.getElementById("alert_Teamwork");
            alert_Teamwork.style.display = "none";
        });
        $('input[name="technical_capability[]"]').on('change', function() {
            let alert_technical_capability = document.getElementById("alert_technical_capability");
            alert_technical_capability.style.display = "none";
        });
        $('input[name="up_technical_capability[]"]').on('change', function() {
            let alert_technical_capability = document.getElementById("alert_technical_capability");
            alert_technical_capability.style.display = "none";
        });
        $('input[name="potential[]"]').on('change', function() {
            let alert_potential = document.getElementById("alert_potential");
            alert_potential.style.display = "none";
        });
        $('input[name="up_potential[]"]').on('change', function() {
            let alert_potential = document.getElementById("alert_potential");
            alert_potential.style.display = "none";
        });
        $('input[name="effectiveness[]"]').on('change', function() {
            let alert_effectiveness = document.getElementById("alert_effectiveness");
            alert_effectiveness.style.display = "none";
        });
        $('input[name="up_effectiveness[]"]').on('change', function() {
            let alert_effectiveness = document.getElementById("alert_effectiveness");
            alert_effectiveness.style.display = "none";
        });
        $('input[name="adaptability[]"]').on('change', function() {
            let alert_adaptability = document.getElementById("alert_adaptability");
            alert_adaptability.style.display = "none";
        });
        $('input[name="up_adaptability[]"]').on('change', function() {
            let alert_adaptability = document.getElementById("alert_adaptability");
            alert_adaptability.style.display = "none";
        });
        $('input[name="creative[]"]').on('change', function() {
            let alert_creative = document.getElementById("alert_creative");
            alert_creative.style.display = "none";
        });
        $('input[name="up_creative[]"]').on('change', function() {
            let alert_creative = document.getElementById("alert_creative");
            alert_creative.style.display = "none";
        });

        $('#bt_Save_draft').click(function() {
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
            let year_submit = document.getElementById("year_submit").value;
            let assessment_score_h = document.getElementById("assessment_score_h").value;
            let leave_score_h = document.getElementById("leave_score_h").value;
            let total_score_h = document.getElementById("total_score_h").value;
            let assessment_status = "Draft";
            let business_leave1 = document.getElementById("business_leave1").value;
            let business_leave2 = document.getElementById("business_leave2").value;
            let sick_leave1 = document.getElementById("sick_leave1").value;
            let sick_leave2 = document.getElementById("sick_leave2").value;
            let absenteeism1 = document.getElementById("absenteeism1").value;
            let absenteeism2 = document.getElementById("absenteeism2").value;
            let total_leave1 = document.getElementById("total_leave1").value;
            let total_leave2 = document.getElementById("total_leave2").value;
            let grand_total = document.getElementById("grand_total").value;
            let late1 = document.getElementById("late1").value;
            let late2 = document.getElementById("late2").value;
            let verbal_warning = document.getElementById("verbal_warning").value;
            let letter_warning = document.getElementById("letter_warning").value;

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
                    Factory_Manager_GM: Factory_Manager_GM,
                    quality_of_work: quality_of_work,
                    job_responsibility: job_responsibility,
                    cooperation: cooperation,
                    communication: communication,
                    teamwork: teamwork,
                    technical_capability: technical_capability,
                    potential: potential,
                    effectiveness: effectiveness,
                    adaptability: adaptability,
                    creative: creative,
                    assessment_score_h: assessment_score_h,
                    // leave_score_h: leave_score_h,
                    total_score_h: total_score_h,
                    assessment_status: assessment_status,
                    year_submit: year_submit,
                    // business_leave1: business_leave1,
                    // business_leave2: business_leave2,
                    // sick_leave1: sick_leave1,
                    // sick_leave2: sick_leave2,
                    // absenteeism1: absenteeism1,
                    // absenteeism2: absenteeism2,
                    // total_leave1: total_leave1,
                    // total_leave2: total_leave2,
                    // grand_total: grand_total,
                    // late1: late1,
                    // late2: late2,
                    // verbal_warning: verbal_warning,
                    // letter_warning: letter_warning
                },
                success: function(data) {
                    Swal.fire({
                        title: "Save Draft successfully",
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
        });

        $('#up_bt_Save_draft').click(function() {
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
            let up_assessment_status = "Draft";
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
                    // up_leave_score_h: up_leave_score_h,
                    up_total_score_h: up_total_score_h,
                    up_assessment_status: up_assessment_status,
                    up_year_submit: up_year_submit,
                    // up_business_leave1: up_business_leave1,
                    // up_business_leave2: up_business_leave2,
                    // up_sick_leave1: up_sick_leave1,
                    // up_sick_leave2: up_sick_leave2,
                    // up_absenteeism1: up_absenteeism1,
                    // up_absenteeism2: up_absenteeism2,
                    // up_total_leave1: up_total_leave1,
                    // up_total_leave2: up_total_leave2,
                    // up_grand_total: up_grand_total,
                    // up_late1: up_late1,
                    // up_late2: up_late2,
                    // up_verbal_warning: up_verbal_warning,
                    // up_letter_warning: up_letter_warning
                },
                success: function(data) {
                    Swal.fire({
                        title: "Save Draft successfully",
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
        let year_submit = document.getElementById("year_submit").value;
        let assessment_score_h = document.getElementById("assessment_score_h").value;
        let leave_score_h = document.getElementById("leave_score_h").value;
        let total_score_h = document.getElementById("total_score_h").value;
        let assessment_status = "Submit";
        let business_leave1 = document.getElementById("business_leave1").value;
        let business_leave2 = document.getElementById("business_leave2").value;
        let sick_leave1 = document.getElementById("sick_leave1").value;
        let sick_leave2 = document.getElementById("sick_leave2").value;
        let absenteeism1 = document.getElementById("absenteeism1").value;
        let absenteeism2 = document.getElementById("absenteeism2").value;
        let total_leave1 = document.getElementById("total_leave1").value;
        let total_leave2 = document.getElementById("total_leave2").value;
        let grand_total = document.getElementById("grand_total").value;
        let late1 = document.getElementById("late1").value;
        let late2 = document.getElementById("late2").value;
        let verbal_warning = document.getElementById("verbal_warning").value;
        let letter_warning = document.getElementById("letter_warning").value;

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
                Factory_Manager_GM: Factory_Manager_GM, //////
                quality_of_work: quality_of_work,
                job_responsibility: job_responsibility,
                cooperation: cooperation,
                communication: communication,
                teamwork: teamwork,
                technical_capability: technical_capability,
                potential: potential,
                effectiveness: effectiveness,
                adaptability: adaptability,
                creative: creative,
                assessment_score_h: assessment_score_h,
                leave_score_h: leave_score_h,
                total_score_h: total_score_h,
                assessment_status: assessment_status,
                year_submit: year_submit,
                business_leave1: business_leave1,
                business_leave2: business_leave2,
                sick_leave1: sick_leave1,
                sick_leave2: sick_leave2,
                absenteeism1: absenteeism1,
                absenteeism2: absenteeism2,
                total_leave1: total_leave1,
                total_leave2: total_leave2,
                grand_total: grand_total,
                late1: late1,
                late2: late2,
                verbal_warning: verbal_warning,
                letter_warning: letter_warning
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

    function up_Submit_bonus_evaluate_g4_g6() {
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
                    window.location = '<?php echo base_url('index.php/bonus_controller/TableAssessmentRecord'); ?>';
                });
            }
        });
    }
</script>