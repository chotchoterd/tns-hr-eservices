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

        let up_quality_of_work = 0;
        let up_job_responsibility = 0;
        let up_cooperation = 0;
        let up_communication = 0;
        let up_teamwork = 0;
        let up_potential = 0;
        let up_effectiveness = 0;
        let up_planning = 0;
        let up_preventive = 0;
        let up_creative = 0;
        let up_management_mind = 0;
        let up_problem_solving = 0;

        $('input[name="up_quality_of_work[]"]').change(function() {
            up_quality_of_work = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_job_responsibility[]"]').change(function() {
            up_job_responsibility = parseFloat($(this).val()) || 0;
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
        $('input[name="up_potential[]"]').change(function() {
            up_potential = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_effectiveness[]"]').change(function() {
            up_effectiveness = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_planning[]"]').change(function() {
            up_planning = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_preventive[]"]').change(function() {
            up_preventive = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_creative[]"]').change(function() {
            up_creative = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_management_mind[]"]').change(function() {
            up_management_mind = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });
        $('input[name="up_problem_solving[]"]').change(function() {
            up_problem_solving = parseFloat($(this).val()) || 0;
            up_updateAssessmentScore();
        });

        function initializeScores() {
            up_quality_of_work = parseFloat($('input[name="up_quality_of_work[]"]:checked').val()) || 0;
            up_job_responsibility = parseFloat($('input[name="up_job_responsibility[]"]:checked').val()) || 0;
            up_cooperation = parseFloat($('input[name="up_cooperation[]"]:checked').val()) || 0;
            up_communication = parseFloat($('input[name="up_communication[]"]:checked').val()) || 0;
            up_teamwork = parseFloat($('input[name="up_teamwork[]"]:checked').val()) || 0;
            up_potential = parseFloat($('input[name="up_potential[]"]:checked').val()) || 0;
            up_effectiveness = parseFloat($('input[name="up_effectiveness[]"]:checked').val()) || 0;
            up_planning = parseFloat($('input[name="up_planning[]"]:checked').val()) || 0;
            up_preventive = parseFloat($('input[name="up_preventive[]"]:checked').val()) || 0;
            up_creative = parseFloat($('input[name="up_creative[]"]:checked').val()) || 0;
            up_management_mind = parseFloat($('input[name="up_management_mind[]"]:checked').val()) || 0;
            up_problem_solving = parseFloat($('input[name="up_problem_solving[]"]:checked').val()) || 0;
            up_updateAssessmentScore();
        }

        initializeScores();

        function up_updateAssessmentScore() {
            let up_total = up_quality_of_work + up_job_responsibility + up_cooperation + up_communication + up_teamwork + up_potential + up_effectiveness + up_planning + up_preventive + up_creative + up_management_mind + up_problem_solving;
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
            let up_planning = [];
            let up_planning_list = [];
            $.each($('input[name="up_planning[]"]:checked'), function() {
                up_planning_list.push($(this).val());
            });
            up_planning += up_planning_list;
            let up_preventive = [];
            let up_preventive_list = [];
            $.each($('input[name="up_preventive[]"]:checked'), function() {
                up_preventive_list.push($(this).val());
            });
            up_preventive += up_preventive_list;
            let up_creative = [];
            let up_creative_list = [];
            $.each($('input[name="up_creative[]"]:checked'), function() {
                up_creative_list.push($(this).val());
            });
            up_creative += up_creative_list;
            let up_management_mind = [];
            let up_management_mind_list = [];
            $.each($('input[name="up_management_mind[]"]:checked'), function() {
                up_management_mind_list.push($(this).val());
            });
            up_management_mind += up_management_mind_list;
            let up_problem_solving = [];
            let up_problem_solving_list = [];
            $.each($('input[name="up_problem_solving[]"]:checked'), function() {
                up_problem_solving_list.push($(this).val());
            });
            up_problem_solving += up_problem_solving_list;

            if (up_quality_of_work.length <= 0) {
                let alert_quality_of_work = document.getElementById("alert_quality_of_work");
                alert_quality_of_work.style.display = "block";
                up_check_error = 1;
                let qualityOfWorkElements = document.getElementsByName("up_quality_of_work[]");
                if (qualityOfWorkElements.length > 0) {
                    qualityOfWorkElements[0].focus();
                }
            }
            if (up_job_responsibility.length <= 0) {
                let alert_job_responsibility = document.getElementById("alert_job_responsibility");
                alert_job_responsibility.style.display = "block";
                up_check_error = 1;
                let jobResponsibilityElements = document.getElementsByName("up_job_responsibility[]");
                if (jobResponsibilityElements.length > 0) {
                    jobResponsibilityElements[0].focus();
                }
            }
            if (up_cooperation.length <= 0) {
                let alert_cooperation = document.getElementById("alert_cooperation");
                alert_cooperation.style.display = "block";
                up_check_error = 1;
                let cooperationElements = document.getElementsByName("up_cooperation[]");
                if (cooperationElements.length > 0) {
                    cooperationElements[0].focus();
                }
            }
            if (up_communication.length <= 0) {
                let alert_communication = document.getElementById("alert_communication");
                alert_communication.style.display = "block";
                up_check_error = 1;
                let communicationElements = document.getElementsByName("up_communication[]");
                if (communicationElements.length > 0) {
                    communicationElements[0].focus();
                }
            }
            if (up_teamwork.length <= 0) {
                let alert_teamwork = document.getElementById("alert_teamwork");
                alert_teamwork.style.display = "block";
                up_check_error = 1;
                let teamworkElements = document.getElementsByName('up_teamwork[]');
                if (teamworkElements.length > 0) {
                    teamworkElements[0].focus()
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
                let effectivenessElements = document.getElementsByName("up_effectiveness[]");
                if (effectivenessElements.length > 0) {
                    effectivenessElements[0].focus();
                }
            }
            if (up_planning.length <= 0) {
                let alert_planning = document.getElementById("alert_planning");
                alert_planning.style.display = "block";
                up_check_error = 1;
                let planningElements = document.getElementsByName("up_planning[]");
                if (planningElements.length > 0) {
                    planningElements[0].focus();
                }
            }
            if (up_preventive.length <= 0) {
                let alert_preventive = document.getElementById("alert_preventive");
                alert_preventive.style.display = "block";
                up_check_error = 1;
                let preventiveElements = document.getElementsByName("up_preventive[]");
                if (preventiveElements.length > 0) {
                    preventiveElements[0].focus();
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
            if (up_management_mind.length <= 0) {
                let alert_management_mind = document.getElementById("alert_management_mind");
                alert_management_mind.style.display = "block";
                up_check_error = 1;
                let managementMindElements = document.getElementsByName("up_management_mind[]");
                if (managementMindElements.length > 0) {
                    managementMindElements[0].focus();
                }
            }
            if (up_problem_solving.length <= 0) {
                let alert_problem_solving = document.getElementById("alert_problem_solving");
                alert_problem_solving.style.display = "block";
                up_check_error = 1;
                let problemSolvingElements = document.getElementsByName("up_problem_solving[]");
                if (problemSolvingElements.length > 0) {
                    problemSolvingElements[0].focus();
                }
            }
            if (up_check_error == 0) {
                up_Submit_bonus_evaluate_g2_g3();
            }
        });

        $('input[name="quality_of_work[]"]').on('change', function() {
            let alert_quality_of_work = document.getElementById("alert_quality_of_work");
            alert_quality_of_work.style.display = "none";
        });
        $('input[name="up_quality_of_work[]"]').on('change', function() {
            let alert_quality_of_work = document.getElementById("alert_quality_of_work");
            alert_quality_of_work.style.display = "none";
        });
        $('input[name="job_responsibility[]"]').on('change', function() {
            let alert_job_responsibility = document.getElementById("alert_job_responsibility");
            alert_job_responsibility.style.display = "none";
        });
        $('input[name="up_job_responsibility[]"]').on('change', function() {
            let alert_job_responsibility = document.getElementById("alert_job_responsibility");
            alert_job_responsibility.style.display = "none";
        });
        $('input[name="cooperation[]"]').on('change', function() {
            let alert_cooperation = document.getElementById("alert_cooperation");
            alert_cooperation.style.display = "none";
        });
        $('input[name="up_cooperation[]"]').on('change', function() {
            let alert_cooperation = document.getElementById("alert_cooperation");
            alert_cooperation.style.display = "none";
        });
        $('input[name="communication[]"]').on('change', function() {
            let alert_communication = document.getElementById("alert_communication");
            alert_communication.style.display = "none";
        });
        $('input[name="up_communication[]"]').on('change', function() {
            let alert_communication = document.getElementById("alert_communication");
            alert_communication.style.display = "none";
        });
        $('input[name="teamwork[]"]').on('change', function() {
            let alert_teamwork = document.getElementById("alert_teamwork");
            alert_teamwork.style.display = "none";
        });
        $('input[name="up_teamwork[]"]').on('change', function() {
            let alert_teamwork = document.getElementById("alert_teamwork");
            alert_teamwork.style.display = "none";
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
        $('input[name="planning[]"]').on('change', function() {
            let alert_planning = document.getElementById("alert_planning");
            alert_planning.style.display = "none";
        });
        $('input[name="up_planning[]"]').on('change', function() {
            let alert_planning = document.getElementById("alert_planning");
            alert_planning.style.display = "none";
        });
        $('input[name="preventive[]"]').on('change', function() {
            let alert_preventive = document.getElementById("alert_preventive");
            alert_preventive.style.display = "none";
        });
        $('input[name="up_preventive[]"]').on('change', function() {
            let alert_preventive = document.getElementById("alert_preventive");
            alert_preventive.style.display = "none";
        });
        $('input[name="creative[]"]').on('change', function() {
            let alert_creative = document.getElementById("alert_creative");
            alert_creative.style.display = "none";
        });
        $('input[name="up_creative[]"]').on('change', function() {
            let alert_creative = document.getElementById("alert_creative");
            alert_creative.style.display = "none";
        });
        $('input[name="management_mind[]"]').on('change', function() {
            let alert_management_mind = document.getElementById("alert_management_mind");
            alert_management_mind.style.display = "none";
        });
        $('input[name="up_management_mind[]"]').on('change', function() {
            let alert_management_mind = document.getElementById("alert_management_mind");
            alert_management_mind.style.display = "none";
        });
        $('input[name="problem_solving[]"]').on('change', function() {
            let alert_problem_solving = document.getElementById("alert_problem_solving");
            alert_problem_solving.style.display = "none";
        });
        $('input[name="up_problem_solving[]"]').on('change', function() {
            let alert_problem_solving = document.getElementById("alert_problem_solving");
            alert_problem_solving.style.display = "none";
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
                    Factory_Manager_GM: Factory_Manager_GM,
                    quality_of_work: quality_of_work,
                    job_responsibility: job_responsibility,
                    cooperation: cooperation,
                    communication: communication,
                    teamwork: teamwork,
                    potential: potential,
                    effectiveness: effectiveness,
                    planning: planning,
                    preventive: preventive,
                    creative: creative,
                    management_mind: management_mind,
                    problem_solving: problem_solving,
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
            let up_planning = [];
            let up_planning_list = [];
            $.each($('input[name="up_planning[]"]:checked'), function() {
                up_planning_list.push($(this).val());
            });
            up_planning += up_planning_list;
            let up_preventive = [];
            let up_preventive_list = [];
            $.each($('input[name="up_preventive[]"]:checked'), function() {
                up_preventive_list.push($(this).val());
            });
            up_preventive += up_preventive_list;
            let up_creative = [];
            let up_creative_list = [];
            $.each($('input[name="up_creative[]"]:checked'), function() {
                up_creative_list.push($(this).val());
            });
            up_creative += up_creative_list;
            let up_management_mind = [];
            let up_management_mind_list = [];
            $.each($('input[name="up_management_mind[]"]:checked'), function() {
                up_management_mind_list.push($(this).val());
            });
            up_management_mind += up_management_mind_list;
            let up_problem_solving = [];
            let up_problem_solving_list = [];
            $.each($('input[name="up_problem_solving[]"]:checked'), function() {
                up_problem_solving_list.push($(this).val());
            });
            up_problem_solving += up_problem_solving_list;
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
                url: "<?php echo base_url('index.php/bonus_controller/up_Submit_bonus_evaluate_g2_g3_ajax') ?>",
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
                    up_Factory_Manager_GM: up_Factory_Manager_GM,
                    up_quality_of_work: up_quality_of_work,
                    up_job_responsibility: up_job_responsibility,
                    up_cooperation: up_cooperation,
                    up_communication: up_communication,
                    up_teamwork: up_teamwork,
                    up_potential: up_potential,
                    up_effectiveness: up_effectiveness,
                    up_planning: up_planning,
                    up_preventive: up_preventive,
                    up_creative: up_creative,
                    up_management_mind: up_management_mind,
                    up_problem_solving: up_problem_solving,
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
                Factory_Manager_GM: Factory_Manager_GM,
                quality_of_work: quality_of_work,
                job_responsibility: job_responsibility,
                cooperation: cooperation,
                communication: communication,
                teamwork: teamwork,
                potential: potential,
                effectiveness: effectiveness,
                planning: planning,
                preventive: preventive,
                creative: creative,
                management_mind: management_mind,
                problem_solving: problem_solving,
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

    function up_Submit_bonus_evaluate_g2_g3() {
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
        let up_planning = [];
        let up_planning_list = [];
        $.each($('input[name="up_planning[]"]:checked'), function() {
            up_planning_list.push($(this).val());
        });
        up_planning += up_planning_list;
        let up_preventive = [];
        let up_preventive_list = [];
        $.each($('input[name="up_preventive[]"]:checked'), function() {
            up_preventive_list.push($(this).val());
        });
        up_preventive += up_preventive_list;
        let up_creative = [];
        let up_creative_list = [];
        $.each($('input[name="up_creative[]"]:checked'), function() {
            up_creative_list.push($(this).val());
        });
        up_creative += up_creative_list;
        let up_management_mind = [];
        let up_management_mind_list = [];
        $.each($('input[name="up_management_mind[]"]:checked'), function() {
            up_management_mind_list.push($(this).val());
        });
        up_management_mind += up_management_mind_list;
        let up_problem_solving = [];
        let up_problem_solving_list = [];
        $.each($('input[name="up_problem_solving[]"]:checked'), function() {
            up_problem_solving_list.push($(this).val());
        });
        up_problem_solving += up_problem_solving_list;
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
            url: "<?php echo base_url('index.php/bonus_controller/up_Submit_bonus_evaluate_g2_g3_ajax') ?>",
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
                up_Factory_Manager_GM: up_Factory_Manager_GM,
                up_quality_of_work: up_quality_of_work,
                up_job_responsibility: up_job_responsibility,
                up_cooperation: up_cooperation,
                up_communication: up_communication,
                up_teamwork: up_teamwork,
                up_potential: up_potential,
                up_effectiveness: up_effectiveness,
                up_planning: up_planning,
                up_preventive: up_preventive,
                up_creative: up_creative,
                up_management_mind: up_management_mind,
                up_problem_solving: up_problem_solving,
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