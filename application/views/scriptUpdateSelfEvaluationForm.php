<script type="text/javascript">
    $(document).ready(function() {
        $('#up_bt_Submit').click(function() {
            var up_$check_error = 0;
            var up_year_submit = document.getElementById("up_year_submit").value;
            //ส่วนที่เก็บ id name class เพื่อนำไปใช้ Alert
            var up_date_submit = document.getElementById("up_date_submit").value;
            var up_emp_name = document.getElementById("up_emp_name").value;
            var up_emp_id = document.getElementById("up_emp_id").value;
            var up_emp_grade = document.getElementById("up_emp_grade").value;
            var up_section = document.getElementById("up_section").value;
            var up_division = document.getElementById("up_division").value;
            var up_hired_date = document.getElementById("up_hired_date").value;
            var up_sup_name = document.getElementById("up_sup_name").value;
            var up_sup_grade = document.getElementById("up_sup_grade").value;
            // var emp_year_of_service = document.getElementById("emp_year_of_service").value;
            var up_job_target_1 = [];
            var up_job_target_1_list = [];
            $.each($("textarea[name='up_job_target_1[]']"), function() {
                up_job_target_1_list.push($(this).val());
            });
            up_job_target_1 += up_job_target_1_list;
            var up_count_job_target_1 = 0;
            if (up_job_target_1.length > 0) {
                var up_array_of_job_target_1 = up_job_target_1.split(',');
                for (var i = 0; i < up_array_of_job_target_1.length; i++) {
                    var up_name_job_target_1 = up_array_of_job_target_1[i];
                    if (up_name_job_target_1 === "") {
                        count_job_target_1 += 1;
                    }
                }
            } else {
                up_count_job_target_1 = 1;
            }
            var up_actual_achievement = [];
            var up_actual_achievement_list = [];
            $.each($("textarea[name='up_actual_achievement[]']"), function() {
                up_actual_achievement_list.push($(this).val());
            });
            up_actual_achievement += up_actual_achievement_list;
            var up_count_actual_achievement = 0;
            if (up_actual_achievement.length > 0) {
                var up_array_of_actual_achievement = up_actual_achievement.split(',');
                for (var i = 0; i < up_array_of_actual_achievement.length; i++) {
                    var up_name_actual_achievement = up_array_of_actual_achievement[i];
                    if (up_name_actual_achievement === "") {
                        up_count_actual_achievement += 1;
                    }
                }
            } else {
                up_count_actual_achievement = 1;
            }
            var up_job_target_2 = [];
            var up_job_target_2_list = [];
            $.each($("textarea[name='up_job_target_2[]']"), function() {
                up_job_target_2_list.push($(this).val());
            });
            up_job_target_2 += up_job_target_2_list;
            var up_count_job_target_2 = 0;
            if (up_job_target_2.length > 0) {
                var up_array_of_job_target_2 = up_job_target_2.split(',');
                for (var r = 0; r < up_array_of_job_target_2.length; r++) {
                    var up_name_job_target_2 = up_array_of_job_target_2[r];
                    if (up_name_job_target_2 === "") {
                        up_count_job_target_2 += 1;
                    }
                }
            } else {
                up_count_job_target_2 = 1;
            }
            var up_item_option_selfevaluations3_1 = [];
            var up_item_option_selfevaluations3_1_list = [];
            $.each($("input[name='up_3_1item_option_selfevaluations[]']:checked"), function() {
                up_item_option_selfevaluations3_1_list.push($(this).val());
            });
            up_item_option_selfevaluations3_1 += up_item_option_selfevaluations3_1_list;
            var up_item_option_selfevaluation3_2 = [];
            var up_item_option_selfevaluation3_2_list = [];
            $.each($("input[name='up_3_2item_option_selfevaluation[]']:checked"), function() {
                up_item_option_selfevaluation3_2_list.push($(this).val());
            });
            up_item_option_selfevaluation3_2 += up_item_option_selfevaluation3_2_list;
            var up_item_option_selfevaluation3_2_26 = document.getElementsByName("up_3_2item_option_selfevaluation[]");
            var up_alert_3_2others = document.getElementById("alert_3_2others");
            var up_others_capability = document.getElementById("up_others_capability").value;
            for (var i = 0; i < up_item_option_selfevaluation3_2_26.length; i++) {
                up_item_option_selfevaluation3_2_26[i].addEventListener("change", function() {
                    if (up_item_option_selfevaluation3_2_26[26].checked == "") {
                        up_alert_3_2others.style.display = "none";
                    }
                });
            }
            var up_improve_yourself = [];
            var up_improve_yourself_list = [];
            $.each($("textarea[name='up_improve_yourself[]']"), function() {
                up_improve_yourself_list.push($(this).val());
            });
            up_improve_yourself += up_improve_yourself_list;
            var up_count_improve_yourself = 0;
            if (up_improve_yourself.length > 0) {
                var up_array_improve_yourself = up_improve_yourself.split(',');
                for (var j = 0; j < up_array_improve_yourself.length; j++) {
                    var up_name_improve_yourself = up_array_improve_yourself[j];
                    if (up_name_improve_yourself === "") {
                        up_count_improve_yourself += 1;
                    }
                }
            } else {
                up_count_improve_yourself = 1;
            }
            var up_weaknesses = document.getElementById("up_weaknesses").value;
            var up_strengths = document.getElementById("up_strengths").value;
            var up_target_in_next_year = document.getElementById("up_target_in_next_year").value;
            var up_item_option_selfevaluation3_6 = [];
            var up_item_option_selfevaluation3_6_list = [];
            $.each($('input[name="up_3_6item_option_selfevaluation[]"]:checked'), function() {
                up_item_option_selfevaluation3_6_list.push($(this).val());
            });
            up_item_option_selfevaluation3_6 += up_item_option_selfevaluation3_6_list;
            var up_item_option_is_subtopic_in_subtopics3_6_1 = [];
            var up_item_option_is_subtopic_in_subtopics3_6_1_list = [];
            $.each($('input[name="up_3_6_1item_option_is_subtopic_in_subtopics[]"]:checked'), function() {
                up_item_option_is_subtopic_in_subtopics3_6_1_list.push($(this).val());
            });
            up_item_option_is_subtopic_in_subtopics3_6_1 += up_item_option_is_subtopic_in_subtopics3_6_1_list;
            var up_item_option_is_subtopic_in_subtopics3_6_2 = [];
            var up_item_option_is_subtopic_in_subtopics3_6_2_list = [];
            $.each($('input[name="up_3_6_2item_option_is_subtopic_in_subtopic[]"]:checked'), function() {
                up_item_option_is_subtopic_in_subtopics3_6_2_list.push($(this).val());
            });
            up_item_option_is_subtopic_in_subtopics3_6_2 += up_item_option_is_subtopic_in_subtopics3_6_2_list;
            var up_item_option_selfevaluation3_6_alert = document.getElementsByName("up_3_6item_option_selfevaluation[]");
            for (var i = 0; i < up_item_option_selfevaluation3_6_alert.length; i++) {
                up_item_option_selfevaluation3_6_alert[i].addEventListener("change", function() {
                    if (up_item_option_selfevaluation3_6_alert[1].checked || up_item_option_selfevaluation3_6_alert[3].checked) {

                    } else {
                        var up_alert_most_suitable = document.getElementById("alert_most_suitable");
                        up_alert_most_suitable.style.display = "none";
                        var up_alert_assignment_as_stated = document.getElementById("alert_assignment_as_stated");
                        up_alert_assignment_as_stated.style.display = "none";
                    }
                });
            }
            var up_item_option_is_subtopic_in_subtopics_3_6_1_check = document.getElementsByName("up_3_6_1item_option_is_subtopic_in_subtopics[]");
            var up_others_3_6_1 = document.getElementById("up_others_3_6_1").value;
            for (var a = 0; a < up_item_option_is_subtopic_in_subtopics_3_6_1_check.length; a++) {
                up_item_option_is_subtopic_in_subtopics_3_6_1_check[a].addEventListener("change", function() {
                    if (up_item_option_is_subtopic_in_subtopics_3_6_1_check[61].checked == "") {
                        var up_alert_others_3_6_1 = document.getElementById("alert_others_3_6_1");
                        up_alert_others_3_6_1.style.display = "none";
                    }
                });
            }
            var up_item_option_is_subtopic_in_subtopic_3_6_2_check = document.getElementsByName("up_3_6_2item_option_is_subtopic_in_subtopic[]");
            var up_others_3_6_2 = document.getElementById("up_others_3_6_2").value;
            for (var b = 0; b < up_item_option_is_subtopic_in_subtopic_3_6_2_check.length; b++) {
                up_item_option_is_subtopic_in_subtopic_3_6_2_check[b].addEventListener("change", function() {
                    if (up_item_option_is_subtopic_in_subtopic_3_6_2_check[5].checked == "") {
                        var up_alert_others_3_6_2 = document.getElementById("alert_others_3_6_2");
                        up_alert_others_3_6_2.style.display = "none";
                    }
                });
            }
            var up_your_feedback = document.getElementById("up_your_feedback").value;
            //ส่วนที่ทำงาน Alert
            if (up_date_submit.length <= 0) {
                var up_alert_Date_submit = document.getElementById("alert_Date_submit");
                up_alert_Date_submit.style.display = "table";
                document.getElementById("up_date_submit").focus();
                up_$check_error = 1;
            }
            if (up_emp_name.length <= 0) {
                var up_alert_Employee_name = document.getElementById("alert_Employee_name");
                up_alert_Employee_name.style.display = "table";
                document.getElementById("up_emp_name").focus();
                up_$check_error = 1;
            }
            if (up_emp_id.length <= 0) {
                var up_alert_Employee_ID = document.getElementById("alert_Employee_ID");
                up_alert_Employee_ID.style.display = "table";
                document.getElementById("up_emp_id").focus();
                up_$check_error = 1;
            }
            if (up_emp_grade.length <= 0) {
                var up_alert_Employee_Grade = document.getElementById("alert_Employee_Grade");
                up_alert_Employee_Grade.style.display = "table";
                document.getElementById("up_emp_grade").focus();
                up_$check_error = 1;
            }
            if (up_section.length <= 0) {
                var up_alert_Section = document.getElementById("alert_Section");
                up_alert_Section.style.display = "table";
                document.getElementById("up_section").focus();
                up_$check_error = 1;
            }
            if (up_division.length <= 0) {
                var up_alert_Division = document.getElementById("alert_Division");
                up_alert_Division.style.display = "table";
                document.getElementById("up_division").focus();
                up_$check_error = 1;
            }
            if (up_hired_date.length <= 0) {
                var up_alert_Hired_date = document.getElementById("alert_Hired_date");
                up_alert_Hired_date.style.display = "table";
                document.getElementById("up_hired_date").focus();
                up_$check_error = 1;
            }
            if (up_sup_name.length <= 0) {
                var up_alert_Superior_name = document.getElementById("alert_Superior_name");
                up_alert_Superior_name.style.display = "table";
                document.getElementById("up_sup_name").focus();
                up_$check_error = 1;
            }
            if (up_sup_grade.length <= 0) {
                var up_alert_Superior_Grade = document.getElementById("alert_Superior_Grade");
                up_alert_Superior_Grade.style.display = "table";
                document.getElementById("up_sup_grade").focus();
                up_$check_error = 1;
            }
            // if (emp_year_of_service.length <= 0) {
            //     var alert_Employee_Years_of_service = document.getElementById("alert_Employee_Years_of_service");
            //     alert_Employee_Years_of_service.style.display = "table";
            //     document.getElementById("emp_year_of_service").focus();
            //     up_$check_error = 1;
            // }
            if (up_count_job_target_1 !== 0) {
                var up_alert_Job_Target_1 = document.getElementById("alert_Job_Target_1");
                up_alert_Job_Target_1.style.display = "block";
                var up_jobTargetInputs = document.getElementsByName("up_job_target_1[]");
                for (var p = 0; p < up_jobTargetInputs.length; p++) {
                    if (up_jobTargetInputs[p].value === "") {
                        up_jobTargetInputs[p].focus();
                        break;
                    }
                }
                up_$check_error = 1;
            }
            if (up_count_actual_achievement !== 0) {
                var up_alert_Actual_achievement = document.getElementById("alert_Actual_achievement");
                up_alert_Actual_achievement.style.display = "block";
                var up_Actual_achievementInputs = document.getElementsByName("up_actual_achievement[]");
                for (var p = 0; p < up_Actual_achievementInputs.length; p++) {
                    if (up_Actual_achievementInputs[p].value === "") {
                        up_Actual_achievementInputs[p].focus();
                        break;
                    }
                }
                up_$check_error = 1;
            }
            if (up_count_job_target_2 !== 0) {
                var up_alert_Job_Target_2 = document.getElementById("alert_Job_Target_2");
                up_alert_Job_Target_2.style.display = "block";
                var up_jobTargetInputs2 = document.getElementsByName("up_job_target_2[]");
                for (var z = 0; z < up_jobTargetInputs2.length; z++) {
                    if (up_jobTargetInputs2[z].value === "") {
                        up_jobTargetInputs2[z].focus();
                        break;
                    }
                }
                up_$check_error = 1;
            }
            if (up_item_option_selfevaluations3_1.length <= 0) {
                var up_alert_3_1item_option = document.getElementById("alert_3_1item_option");
                up_alert_3_1item_option.style.display = "block";
                var up_item_option_3_1 = document.getElementsByName("up_3_1item_option_selfevaluations[]");
                if (up_item_option_3_1.length > 0) {
                    for (var i = 0; i < up_item_option_3_1.length; i++) {
                        if (!up_item_option_3_1[i].checked) {
                            up_item_option_3_1[i].focus();
                            break;
                        }
                    }
                }
                up_$check_error = 1;
            }
            if (up_item_option_selfevaluation3_2.length <= 0 && up_item_option_selfevaluations3_1 != 'Fully achieved.') {
                var up_alert_3_2item_option = document.getElementById("alert_3_2item_option");
                up_alert_3_2item_option.style.display = "block";
                var up_item_option_3_2 = document.getElementsByName("up_3_2item_option_selfevaluation[]");
                if (up_item_option_3_2.length > 0) {
                    for (var i = 0; i < up_item_option_3_2.length; i++) {
                        if (!up_item_option_3_2[i].checked) {
                            up_item_option_3_2[i].focus();
                            break;
                        }
                    }
                }
                up_$check_error = 1;
            }
            if (up_item_option_selfevaluation3_2_26[26].checked && up_others_capability.length <= 0) {
                up_alert_3_2others.style.display = "block";
                document.getElementById("up_others_capability").focus();
                up_$check_error = 1;
            } else {
                up_alert_3_2others.style.display = "none";
            }
            if (up_count_improve_yourself !== 0) {
                var up_alert_improve_yourself = document.getElementById("alert_improve_yourself");
                up_alert_improve_yourself.style.display = "block";
                var up_improve_yourselfInput = document.getElementsByName("up_improve_yourself[]");
                for (var b = 0; b < up_improve_yourselfInput.length; b++) {
                    if (up_improve_yourselfInput[b].value === "") {
                        up_improve_yourselfInput[b].focus();
                        break;
                    }
                }
                up_$check_error = 1;
            }
            if (up_weaknesses.length <= 0) {
                var up_alert_weaknesses = document.getElementById("alert_weaknesses");
                up_alert_weaknesses.style.display = "block";
                document.getElementById("up_weaknesses").focus();
                up_$check_error = 1;
            }
            if (up_strengths.length <= 0) {
                var up_alert_strengths = document.getElementById("alert_strengths");
                up_alert_strengths.style.display = "block";
                document.getElementById("up_strengths").focus();
                up_$check_error = 1;
            }
            if (up_target_in_next_year.length <= 0) {
                var up_alert_State_how_your = document.getElementById("alert_State_how_your");
                up_alert_State_how_your.style.display = "block";
                document.getElementById("up_target_in_next_year").focus();
                up_$check_error = 1;
            }
            if (up_item_option_selfevaluation3_6.length <= 0) {
                var up_alert_current_job_assignment = document.getElementById("alert_current_job_assignment");
                up_alert_current_job_assignment.style.display = "block";
                var up_item_option_3_6 = document.getElementsByName("up_3_6item_option_selfevaluation[]");
                if (up_item_option_3_6.length > 0) {
                    for (var i = 0; i < up_item_option_3_6.length; i++) {
                        if (!up_item_option_3_6[i].checked) {
                            up_item_option_3_6[i].focus();
                            break;
                        }
                    }
                }
                up_$check_error = 1;
            }
            if ((up_item_option_selfevaluation3_6_alert[1].checked || up_item_option_selfevaluation3_6_alert[3].checked) && up_item_option_is_subtopic_in_subtopics3_6_1.length <= 0) {
                var up_alert_most_suitable = document.getElementById("alert_most_suitable");
                up_alert_most_suitable.style.display = "block";
                var up_item_option_is_subtopic_in_subtopics3_6_1 = document.getElementsByName("up_3_6_1item_option_is_subtopic_in_subtopics[]");
                if (up_item_option_is_subtopic_in_subtopics3_6_1.length > 0) {
                    for (var i = 0; i < up_item_option_is_subtopic_in_subtopics3_6_1.length; i++) {
                        if (!up_item_option_is_subtopic_in_subtopics3_6_1[i].checked) {
                            up_item_option_is_subtopic_in_subtopics3_6_1[i].focus();
                            break;
                        }
                    }
                }
                up_$check_error = 1;
            }
            if ((up_item_option_selfevaluation3_6_alert[1].checked || up_item_option_selfevaluation3_6_alert[3].checked) && up_item_option_is_subtopic_in_subtopics3_6_2.length <= 0) {
                var up_alert_assignment_as_stated = document.getElementById("alert_assignment_as_stated");
                up_alert_assignment_as_stated.style.display = "block";
                var up_item_option_is_subtopic_in_subtopic3_6_2 = document.getElementsByName("up_3_6_2item_option_is_subtopic_in_subtopic[]");
                if (up_item_option_is_subtopic_in_subtopic3_6_2.length > 0) {
                    for (var i = 0; i < up_item_option_is_subtopic_in_subtopic3_6_2.length; i++) {
                        if (!up_item_option_is_subtopic_in_subtopic3_6_2[i].checked) {
                            up_item_option_is_subtopic_in_subtopic3_6_2[i].focus();
                            break;
                        }
                    }
                }
                up_$check_error = 1;
            }
            if (up_item_option_is_subtopic_in_subtopics_3_6_1_check[61].checked && up_others_3_6_1.length <= 0) {
                var up_alert_others_3_6_1 = document.getElementById("alert_others_3_6_1");
                up_alert_others_3_6_1.style.display = "block";
                document.getElementById("up_others_3_6_1").focus();
                up_$check_error = 1;
            }
            if (up_item_option_is_subtopic_in_subtopic_3_6_2_check[5].checked && up_others_3_6_2.length <= 0) {
                var up_alert_others_3_6_2 = document.getElementById("alert_others_3_6_2");
                up_alert_others_3_6_2.style.display = "block";
                document.getElementById("up_others_3_6_2").focus();
                up_$check_error = 1;
            }
            if (up_your_feedback.length <= 0) {
                var up_alert_your_feedback = document.getElementById("alert_your_feedback");
                up_alert_your_feedback.style.display = "block";
                document.getElementById("up_your_feedback").focus();
                up_$check_error = 1;
            }
            if (up_$check_error == 0) {
                up_send_submit_SelfEvaluationForm();
            }
        });

        $('#up_bt_Save_Draft').click(function() {
            send_up_Save_Draft_SelfEvaluationForm();
        });
        //ส่วนที่ลบ Alert จากการกรอกหรือเปลี่ยน
        $('#up_date_submit').on('change', function() {
            var date_submit = $('#up_date_submit').val();
            if (date_submit != "") {
                var alert_Date_submit = document.getElementById("alert_Date_submit");
                alert_Date_submit.style.display = "none";
            }
        });
        $('#up_emp_name').on('input', function() {
            var emp_name = $('#up_emp_name').val();
            if (emp_name != "") {
                var alert_Employee_name = document.getElementById("alert_Employee_name");
                alert_Employee_name.style.display = "none";
            }
        });
        $('#up_emp_id').on('input', function() {
            var emp_id = $('#up_emp_id').val();
            if (emp_id != "") {
                var alert_Employee_ID = document.getElementById("alert_Employee_ID");
                alert_Employee_ID.style.display = "none";
            }
        });
        $('#up_emp_grade').on('input', function() {
            var emp_grade = $('#up_emp_grade').val();
            if (emp_grade != "") {
                var alert_Employee_Grade = document.getElementById("alert_Employee_Grade");
                alert_Employee_Grade.style.display = "none";
            }
        });
        $('#up_section').on('input', function() {
            var section = $('#up_section').val();
            if (section != "") {
                var alert_Section = document.getElementById("alert_Section");
                alert_Section.style.display = "none";
            }
        });
        $('#up_division').change(function() {
            var alert_Division = document.getElementById("alert_Division");
            alert_Division.style.display = "none";
        });
        $('#up_hired_date').on('change', function() {
            var hired_date = $('#up_hired_date').val();
            if (hired_date != "") {
                var alert_Hired_date = document.getElementById("alert_Hired_date");
                alert_Hired_date.style.display = "none";
            }
        });
        $('#up_sup_name').on('input', function() {
            var sup_name = $('#up_sup_name').val();
            if (sup_name != "") {
                var alert_Superior_name = document.getElementById("alert_Superior_name");
                alert_Superior_name.style.display = "none";
            }
        });
        $('#up_sup_grade').on('input', function() {
            var sup_grade = $('#up_sup_grade').val();
            if (sup_grade != "") {
                var alert_Superior_Grade = document.getElementById("alert_Superior_Grade");
                alert_Superior_Grade.style.display = "none";
            }
        });
        // $('#emp_year_of_service').on('input', function() {
        //     var emp_year_of_service = $('#emp_year_of_service').val();
        //     if (emp_year_of_service != "") {
        //         var alert_Employee_Years_of_service = document.getElementById("alert_Employee_Years_of_service");
        //         alert_Employee_Years_of_service.style.display = "none";
        //     }
        // });
        $(document).on('input', "textarea[name='up_job_target_1[]']", function() {
            if ($(this).val() !== "") {
                var alert_Job_Target_1 = document.getElementById("alert_Job_Target_1");
                alert_Job_Target_1.style.display = "none";
            }
        });
        $(document).on('input', "textarea[name='up_actual_achievement[]']", function() {
            if ($(this).val() !== "") {
                var alert_Actual_achievement = document.getElementById("alert_Actual_achievement");
                alert_Actual_achievement.style.display = "none";
            }
        });
        $(document).on('input', "textarea[name='up_job_target_2[]']", function() {
            if ($(this).val() !== "") {
                var alert_Job_Target_1 = document.getElementById("alert_Job_Target_2");
                alert_Job_Target_1.style.display = "none";
            }
        });
        $(document).on('change', "input[name='up_3_1item_option_selfevaluations[]']:checked", function() {
            if ($(this).val()) {
                var alert_3_1item_option = document.getElementById("alert_3_1item_option");
                alert_3_1item_option.style.display = "none";
            }
        });
        $(document).on('change', "input[name='up_3_2item_option_selfevaluation[]']:checked", function() {
            if ($(this).val()) {
                var alert_3_2item_option = document.getElementById("alert_3_2item_option");
                alert_3_2item_option.style.display = "none";
            }
        });
        $('#up_others_capability').on('input', function() {
            var others_capability = $('#up_others_capability').val();
            if (others_capability != "") {
                var alert_3_2others = document.getElementById("alert_3_2others");
                alert_3_2others.style.display = "none";
            }
        });
        $(document).on('input', "textarea[name='up_improve_yourself[]']", function() {
            if ($(this).val() !== "") {
                var alert_improve_yourself = document.getElementById("alert_improve_yourself");
                alert_improve_yourself.style.display = "none";
            }
        });
        $('#up_weaknesses').on('input', function() {
            var alert_weaknesses = document.getElementById("alert_weaknesses");
            alert_weaknesses.style.display = "none";
        });
        $('#up_strengths').on('input', function() {
            var alert_strengths = document.getElementById("alert_strengths");
            alert_strengths.style.display = "none";
        });
        $('#up_target_in_next_year').on('input', function() {
            var alert_State_how_your = document.getElementById("alert_State_how_your");
            alert_State_how_your.style.display = "none";
        });
        $(document).on('change', "input[name='up_3_6item_option_selfevaluation[]']:checked", function() {
            if ($(this).val()) {
                var alert_current_job_assignment = document.getElementById("alert_current_job_assignment");
                alert_current_job_assignment.style.display = "none";
            }
        });
        $(document).on('change', "input[name='up_3_6_1item_option_is_subtopic_in_subtopics[]']:checked", function() {
            if ($(this).val()) {
                var alert_most_suitable = document.getElementById("alert_most_suitable");
                alert_most_suitable.style.display = "none";
            }
        });
        $(document).on('change', "input[name='up_3_6_2item_option_is_subtopic_in_subtopic[]']:checked", function() {
            if ($(this).val()) {
                var alert_assignment_as_stated = document.getElementById("alert_assignment_as_stated");
                alert_assignment_as_stated.style.display = "none";
            }
        });
        $('#up_others_3_6_1').on('input', function() {
            var alert_others_3_6_1 = document.getElementById("alert_others_3_6_1");
            alert_others_3_6_1.style.display = "none";
        });
        $('#up_others_3_6_2').on('input', function() {
            var alert_others_3_6_2 = document.getElementById("alert_others_3_6_2");
            alert_others_3_6_2.style.display = "none";
        });
        $('#up_your_feedback').on('input', function() {
            var alert_your_feedback = document.getElementById("alert_your_feedback");
            alert_your_feedback.style.display = "none";
        });
        ///////////
        let up_item_option_selfevaluations3_1_show = document.getElementsByName("up_3_1item_option_selfevaluations[]");
        let up_tr_3_2 = document.querySelectorAll(".tr_3_2");
        let up_item_option_selfevaluation_3_2 = document.getElementsByName("up_3_2item_option_selfevaluation[]");
        for (let c = 0; c < up_item_option_selfevaluations3_1_show.length; c++) {
            up_item_option_selfevaluations3_1_show[c].addEventListener("change", function() {
                if (!up_item_option_selfevaluations3_1_show[0].checked) {
                    up_tr_3_2.forEach(function(up_trs) {
                        up_trs.style.display = "table-row";
                    });
                } else {
                    up_tr_3_2.forEach(function(up_trs) {
                        up_trs.style.display = "none";
                        for (let m = 0; m < up_item_option_selfevaluation_3_2.length; m++) {
                            up_item_option_selfevaluation_3_2[m].checked = false;
                        }
                    });
                }
            });
        }

        var item_option_selfevaluation3_2 = document.getElementsByName("up_3_2item_option_selfevaluation[]");
        var div_capability = document.getElementById("div_capability");
        var others_capability = document.getElementById("up_others_capability");
        for (var i = 0; i < item_option_selfevaluation3_2.length; i++) {
            item_option_selfevaluation3_2[i].addEventListener("change", function() {
                if (item_option_selfevaluation3_2[26].checked) {
                    div_capability.style.display = "block";
                } else {
                    div_capability.style.display = "none";
                    others_capability.value = "";
                }
            });
        }

        var item_option_selfevaluation3_6 = document.getElementsByName("up_3_6item_option_selfevaluation[]");
        var tr_3_6_All = document.querySelectorAll(".tr_3_6_All");
        var item_option_is_subtopic_in_subtopics_3_6_1 = document.getElementsByName("up_3_6_1item_option_is_subtopic_in_subtopics[]");
        var item_option_is_subtopic_in_subtopic_3_6_2 = document.getElementsByName("up_3_6_2item_option_is_subtopic_in_subtopic[]");
        for (var i = 0; i < item_option_selfevaluation3_6.length; i++) {
            item_option_selfevaluation3_6[i].addEventListener("change", function() {
                if (item_option_selfevaluation3_6[1].checked || item_option_selfevaluation3_6[3].checked) {
                    tr_3_6_All.forEach(function(tr) {
                        tr.style.display = "table-row";
                    });
                } else {
                    tr_3_6_All.forEach(function(tr) {
                        tr.style.display = "none";
                        for (var j = 0; j < item_option_is_subtopic_in_subtopics_3_6_1.length; j++) {
                            item_option_is_subtopic_in_subtopics_3_6_1[j].checked = false;
                        }
                        for (var q = 0; q < item_option_is_subtopic_in_subtopic_3_6_2.length; q++) {
                            item_option_is_subtopic_in_subtopic_3_6_2[q].checked = false;
                        }
                    });
                }
            });
        }

        var item_option_is_subtopic_in_subtopics_3_6_1_check = document.getElementsByName("up_3_6_1item_option_is_subtopic_in_subtopics[]");
        var div_others_3_6_1 = document.getElementById("div_others_3_6_1");
        var others_3_6_1 = document.getElementById("up_others_3_6_1");
        for (var a = 0; a < item_option_is_subtopic_in_subtopics_3_6_1_check.length; a++) {
            item_option_is_subtopic_in_subtopics_3_6_1_check[a].addEventListener("change", function() {
                if (item_option_is_subtopic_in_subtopics_3_6_1_check[61].checked) {
                    div_others_3_6_1.style.display = "block";
                } else {
                    div_others_3_6_1.style.display = "none";
                    others_3_6_1.value = "";
                }
            });
        }

        var item_option_is_subtopic_in_subtopic_3_6_2_check = document.getElementsByName("up_3_6_2item_option_is_subtopic_in_subtopic[]");
        var div_others_3_6_2 = document.getElementById("div_others_3_6_2");
        var others_3_6_2 = document.getElementById("up_others_3_6_2");
        for (var b = 0; b < item_option_is_subtopic_in_subtopic_3_6_2_check.length; b++) {
            item_option_is_subtopic_in_subtopic_3_6_2_check[b].addEventListener("change", function() {
                if (item_option_is_subtopic_in_subtopic_3_6_2_check[5].checked) {
                    div_others_3_6_2.style.display = "block";
                } else {
                    div_others_3_6_2.style.display = "none";
                    others_3_6_2.value = "";
                }
            });
        }
    });

    var items1 = 0;
    var items2 = 0;
    var items3 = 0;

    function up_addInputJob_Target() {
        var html = "<tr>";
        html += "<td colspan=\"3\" class=\"border td_border\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"up_job_target_1[]\" id=\"up_job_target_1\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"up_job_target_1\" class=\"font-twelve\">Please fill in Job Target<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td colspan=\"2\" class=\"border td_border\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"up_actual_achievement[]\" id=\"up_actual_achievement\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"up_actual_achievement\" class=\"font-twelve\">Please fill in Actual achievement<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td class=\"border td_border mit\">";
        html += "<button onclick='deleteRowJob_Target(this);' class=\"btn btn-primary btn_color_df\" type=\"button\" style=\"width: 100px;\">Delete</button>";
        html += "</td>";
        html += "</tr>";
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }

    function up_deleteRowJob_Target(button) {
        items1--
        button.parentElement.parentElement.remove();
    }

    function up_addInputJob_Target_next_year() {
        var html = "<tr>";
        html += "<td class=\"border td_border\" colspan=\"5\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"up_job_target_2[]\" id=\"up_job_target_2\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"up_job_target_2\" class=\"font-twelve\">Please fill in Job Target<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td class=\"border td_border mit\">";
        html += "<button onclick=\"deleteRowJob_Target_next_year(this);\" class=\"btn btn-primary btn_color_df\" type=\"button\" style=\"width: 100px;\">Delete</button>";
        html += "</td>";
        html += "</tr>";
        var row = document.getElementById("tbody2").insertRow();
        row.innerHTML = html;
    }

    function up_deleteRowJob_Target_next_year(button) {
        items2--
        button.parentElement.parentElement.remove();
    }

    function up_addInput_improve_yourself() {
        var html = "<tr>";
        html += "<td class=\"border\" colspan=\"5\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"up_improve_yourself[]\" id=\"up_improve_yourself\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"up_improve_yourself\" class=\"font-twelve\">Please enter things to improve yourself.<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td class=\"border mit\">";
        html += "<button onclick=\"deleteRowimprove_yourself(this);\" class=\"btn btn-primary btn_color_df\" type=\"button\" style=\"width: 100px;\">Delete</button>";
        html += "</td>";
        html += "</tr>";
        var row = document.getElementById("tbody3").insertRow();
        row.innerHTML = html;
    }

    function up_deleteRowimprove_yourself(button) {
        items3--
        button.parentElement.parentElement.remove();
    }

    function up_send_submit_SelfEvaluationForm() {
        var up_id = $("#up_id").val();
        var up_year_submit = $("#up_year_submit").val();
        var up_date_submit = $("#up_date_submit").val();
        var up_emp_name = $("#up_emp_name").val();
        var up_emp_id = $("#up_emp_id").val();
        var up_emp_grade = $("#up_emp_grade").val();
        var up_position = $("#up_position").val();
        var up_section = $("#up_section").val();
        var up_division = $("#up_division").val();
        var up_hired_date = $("#up_hired_date").val();
        var up_sup_name = $("#up_sup_name").val();
        var up_sup_grade = $("#up_sup_grade").val();
        var up_sup_name2 = $('#up_sup_name2').val();
        var up_sup_grade2 = $('#up_sup_grade2').val();
        var up_foreman = $('#up_foreman').val();
        var up_factory_Manager_GM = $('#up_factory_Manager_GM').val();
        var up_emp_year_of_service = $('#up_emp_year_of_service').val();
        var up_job_target_1 = [];
        var up_job_target_1_list = [];
        $.each($("textarea[name='up_job_target_1[]']"), function() {
            up_job_target_1_list.push($(this).val());
        });
        up_job_target_1 += up_job_target_1_list;

        var up_actual_achievement = [];
        var up_actual_achievement_list = [];
        $.each($("textarea[name='up_actual_achievement[]']"), function() {
            up_actual_achievement_list.push($(this).val());
        });
        up_actual_achievement += up_actual_achievement_list;

        var up_job_target_2 = [];
        var up_job_target_2_list = [];
        $.each($("textarea[name='up_job_target_2[]']"), function() {
            up_job_target_2_list.push($(this).val());
        });
        up_job_target_2 += up_job_target_2_list;

        var up_item_option_selfevaluations3_1 = [];
        var up_item_option_selfevaluations3_1_list = [];
        $.each($("input[name='up_3_1item_option_selfevaluations[]']:checked"), function() {
            up_item_option_selfevaluations3_1_list.push($(this).val());
        });
        up_item_option_selfevaluations3_1 += up_item_option_selfevaluations3_1_list;

        var up_item_option_selfevaluation3_2 = [];
        var up_item_option_selfevaluation3_2_list = [];
        $.each($("input[name='up_3_2item_option_selfevaluation[]']:checked"), function() {
            up_item_option_selfevaluation3_2_list.push($(this).val());
        });
        up_item_option_selfevaluation3_2 += up_item_option_selfevaluation3_2_list;

        var up_others_capability = $('#up_others_capability').val();

        var up_improve_yourself = [];
        var up_improve_yourself_list = [];
        $.each($("textarea[name='up_improve_yourself[]']"), function() {
            up_improve_yourself_list.push($(this).val());
        });
        up_improve_yourself += up_improve_yourself_list;

        var up_weaknesses = $('#up_weaknesses').val();
        var up_strengths = $('#up_strengths').val();
        var up_target_in_next_year = $('#up_target_in_next_year').val();

        var up_item_option_selfevaluation3_6 = [];
        var up_item_option_selfevaluation3_6_list = [];
        $.each($('input[name="up_3_6item_option_selfevaluation[]"]:checked'), function() {
            up_item_option_selfevaluation3_6_list.push($(this).val());
        });
        up_item_option_selfevaluation3_6 += up_item_option_selfevaluation3_6_list;

        var up_item_option_is_subtopic_in_subtopics3_6_1 = [];
        var up_item_option_is_subtopic_in_subtopics3_6_1_list = [];
        $.each($('input[name="up_3_6_1item_option_is_subtopic_in_subtopics[]"]:checked'), function() {
            up_item_option_is_subtopic_in_subtopics3_6_1_list.push($(this).val());
        });
        up_item_option_is_subtopic_in_subtopics3_6_1 += up_item_option_is_subtopic_in_subtopics3_6_1_list;

        var up_others_3_6_1 = $('#up_others_3_6_1').val();

        var up_item_option_is_subtopic_in_subtopics3_6_2 = [];
        var up_item_option_is_subtopic_in_subtopics3_6_2_list = [];
        $.each($('input[name="up_3_6_2item_option_is_subtopic_in_subtopic[]"]:checked'), function() {
            up_item_option_is_subtopic_in_subtopics3_6_2_list.push($(this).val());
        });
        up_item_option_is_subtopic_in_subtopics3_6_2 += up_item_option_is_subtopic_in_subtopics3_6_2_list;

        var up_others_3_6_2 = $('#up_others_3_6_2').val();
        var up_your_feedback = $('#up_your_feedback').val();
        var up_emp_email = $('#up_emp_email').val();
        var up_self_evaluation_status = "Submit";

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/hr_controller/up_submit_self_evaluation_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_year_submit: up_year_submit,
                up_date_submit: up_date_submit,
                up_emp_name: up_emp_name,
                up_emp_id: up_emp_id,
                up_emp_grade: up_emp_grade,
                up_position: up_position,
                up_section: up_section,
                up_division: up_division,
                up_hired_date: up_hired_date,
                up_emp_email: up_emp_email,
                up_sup_name: up_sup_name,
                up_sup_grade: up_sup_grade,
                up_sup_name2: up_sup_name2,
                up_sup_grade2: up_sup_grade2,
                up_foreman: up_foreman,
                up_factory_Manager_GM: up_factory_Manager_GM,
                up_emp_year_of_service: up_emp_year_of_service,
                up_job_target_1: up_job_target_1,
                up_actual_achievement: up_actual_achievement,
                up_job_target_2: up_job_target_2,
                up_item_option_selfevaluations3_1: up_item_option_selfevaluations3_1,
                up_item_option_selfevaluation3_2: up_item_option_selfevaluation3_2,
                up_others_capability: up_others_capability,
                up_improve_yourself: up_improve_yourself,
                up_weaknesses: up_weaknesses,
                up_strengths: up_strengths,
                up_target_in_next_year: up_target_in_next_year,
                up_item_option_selfevaluation3_6: up_item_option_selfevaluation3_6,
                up_item_option_is_subtopic_in_subtopics3_6_1: up_item_option_is_subtopic_in_subtopics3_6_1,
                up_others_3_6_1: up_others_3_6_1,
                up_item_option_is_subtopic_in_subtopics3_6_2: up_item_option_is_subtopic_in_subtopics3_6_2,
                up_others_3_6_2: up_others_3_6_2,
                up_your_feedback: up_your_feedback,
                up_self_evaluation_status: up_self_evaluation_status
            },
            success: function(data) {
                Swal.fire({
                    title: "Save successfully",
                    text: "",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/hr_controller/FormStaticSelfEvaluation/'); ?>' + up_id;
                });
            }
        });
    }

    function send_up_Save_Draft_SelfEvaluationForm() {
        var up_id = $("#up_id").val();
        var up_year_submit = $("#up_year_submit").val();
        var up_date_submit = $("#up_date_submit").val();
        var up_emp_name = $("#up_emp_name").val();
        var up_emp_id = $("#up_emp_id").val();
        var up_emp_grade = $("#up_emp_grade").val();
        var up_position = $('#up_position').val();
        var up_section = $("#up_section").val();
        var up_division = $("#up_division").val();
        var up_hired_date = $("#up_hired_date").val();
        var up_sup_name = $("#up_sup_name").val();
        var up_sup_grade = $("#up_sup_grade").val();
        var up_sup_name2 = $('#up_sup_name2').val();
        var up_sup_grade2 = $('#up_sup_grade2').val();
        var up_foreman = $('#up_foreman').val();
        var up_factory_Manager_GM = $('#up_factory_Manager_GM').val();
        var up_emp_year_of_service = $('#up_emp_year_of_service').val();
        var up_job_target_1 = [];
        var up_job_target_1_list = [];
        $.each($("textarea[name='up_job_target_1[]']"), function() {
            up_job_target_1_list.push($(this).val());
        });
        up_job_target_1 += up_job_target_1_list;

        var up_actual_achievement = [];
        var up_actual_achievement_list = [];
        $.each($("textarea[name='up_actual_achievement[]']"), function() {
            up_actual_achievement_list.push($(this).val());
        });
        up_actual_achievement += up_actual_achievement_list;

        var up_job_target_2 = [];
        var up_job_target_2_list = [];
        $.each($("textarea[name='up_job_target_2[]']"), function() {
            up_job_target_2_list.push($(this).val());
        });
        up_job_target_2 += up_job_target_2_list;

        var up_item_option_selfevaluations3_1 = [];
        var up_item_option_selfevaluations3_1_list = [];
        $.each($("input[name='up_3_1item_option_selfevaluations[]']:checked"), function() {
            up_item_option_selfevaluations3_1_list.push($(this).val());
        });
        up_item_option_selfevaluations3_1 += up_item_option_selfevaluations3_1_list;

        var up_item_option_selfevaluation3_2 = [];
        var up_item_option_selfevaluation3_2_list = [];
        $.each($("input[name='up_3_2item_option_selfevaluation[]']:checked"), function() {
            up_item_option_selfevaluation3_2_list.push($(this).val());
        });
        up_item_option_selfevaluation3_2 += up_item_option_selfevaluation3_2_list;

        var up_others_capability = $('#up_others_capability').val();

        var up_improve_yourself = [];
        var up_improve_yourself_list = [];
        $.each($("textarea[name='up_improve_yourself[]']"), function() {
            up_improve_yourself_list.push($(this).val());
        });
        up_improve_yourself += up_improve_yourself_list;

        var up_weaknesses = $('#up_weaknesses').val();
        var up_strengths = $('#up_strengths').val();
        var up_target_in_next_year = $('#up_target_in_next_year').val();

        var up_item_option_selfevaluation3_6 = [];
        var up_item_option_selfevaluation3_6_list = [];
        $.each($('input[name="up_3_6item_option_selfevaluation[]"]:checked'), function() {
            up_item_option_selfevaluation3_6_list.push($(this).val());
        });
        up_item_option_selfevaluation3_6 += up_item_option_selfevaluation3_6_list;

        var up_item_option_is_subtopic_in_subtopics3_6_1 = [];
        var up_item_option_is_subtopic_in_subtopics3_6_1_list = [];
        $.each($('input[name="up_3_6_1item_option_is_subtopic_in_subtopics[]"]:checked'), function() {
            up_item_option_is_subtopic_in_subtopics3_6_1_list.push($(this).val());
        });
        up_item_option_is_subtopic_in_subtopics3_6_1 += up_item_option_is_subtopic_in_subtopics3_6_1_list;

        var up_others_3_6_1 = $('#up_others_3_6_1').val();

        var up_item_option_is_subtopic_in_subtopics3_6_2 = [];
        var up_item_option_is_subtopic_in_subtopics3_6_2_list = [];
        $.each($('input[name="up_3_6_2item_option_is_subtopic_in_subtopic[]"]:checked'), function() {
            up_item_option_is_subtopic_in_subtopics3_6_2_list.push($(this).val());
        });
        up_item_option_is_subtopic_in_subtopics3_6_2 += up_item_option_is_subtopic_in_subtopics3_6_2_list;

        var up_others_3_6_2 = $('#up_others_3_6_2').val();
        var up_your_feedback = $('#up_your_feedback').val();
        var up_emp_email = $('#up_emp_email').val();
        var up_self_evaluation_status = "Draft";

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/hr_controller/up_submit_self_evaluation_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                up_year_submit: up_year_submit,
                up_date_submit: up_date_submit,
                up_emp_name: up_emp_name,
                up_emp_id: up_emp_id,
                up_emp_grade: up_emp_grade,
                up_position: up_position,
                up_section: up_section,
                up_division: up_division,
                up_hired_date: up_hired_date,
                up_emp_email: up_emp_email,
                up_sup_name: up_sup_name,
                up_sup_grade: up_sup_grade,
                up_sup_name2: up_sup_name2,
                up_sup_grade2: up_sup_grade2,
                up_foreman: up_foreman,
                up_factory_Manager_GM: up_factory_Manager_GM,
                up_emp_year_of_service: up_emp_year_of_service,
                up_job_target_1: up_job_target_1,
                up_actual_achievement: up_actual_achievement,
                up_job_target_2: up_job_target_2,
                up_item_option_selfevaluations3_1: up_item_option_selfevaluations3_1,
                up_item_option_selfevaluation3_2: up_item_option_selfevaluation3_2,
                up_others_capability: up_others_capability,
                up_improve_yourself: up_improve_yourself,
                up_weaknesses: up_weaknesses,
                up_strengths: up_strengths,
                up_target_in_next_year: up_target_in_next_year,
                up_item_option_selfevaluation3_6: up_item_option_selfevaluation3_6,
                up_item_option_is_subtopic_in_subtopics3_6_1: up_item_option_is_subtopic_in_subtopics3_6_1,
                up_others_3_6_1: up_others_3_6_1,
                up_item_option_is_subtopic_in_subtopics3_6_2: up_item_option_is_subtopic_in_subtopics3_6_2,
                up_others_3_6_2: up_others_3_6_2,
                up_your_feedback: up_your_feedback,
                up_self_evaluation_status: up_self_evaluation_status
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
                    window.location = '<?php echo base_url('index.php/hr_controller/SelfEvaluationForm/?id='); ?>' + up_id;
                });
            }
        });
    }
</script>