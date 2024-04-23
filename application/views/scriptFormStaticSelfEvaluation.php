<script type="text/javascript">
    $(document).ready(function() {
        $('#bt_Submit').click(function() {
            let $check_error = 0;
            let year_submit = document.getElementById("year_submit").value;
            //ส่วนที่เก็บ id name class เพื่อนำไปใช้ Alert
            let date_submit = document.getElementById("date_submit").value;
            let emp_name = document.getElementById("emp_name").value;
            let emp_id = document.getElementById("emp_id").value;
            let emp_grade = document.getElementById("emp_grade").value;
            let section = document.getElementById("section").value;
            let division = document.getElementById("division").value;
            let hired_date = document.getElementById("hired_date").value;
            let sup_name = document.getElementById("sup_name").value;
            let sup_grade = document.getElementById("sup_grade").value;
            // let emp_year_of_service = document.getElementById("emp_year_of_service").value;
            let job_target_1 = [];
            let job_target_1_list = [];
            $.each($("textarea[name='job_target_1[]']"), function() {
                job_target_1_list.push($(this).val());
            });
            job_target_1 += job_target_1_list;
            let count_job_target_1 = 0;
            if (job_target_1.length > 0) {
                let array_of_job_target_1 = job_target_1.split(',');
                for (let i = 0; i < array_of_job_target_1.length; i++) {
                    let name_job_target_1 = array_of_job_target_1[i];
                    if (name_job_target_1 === "") {
                        count_job_target_1 += 1;
                    }
                }
            } else {
                count_job_target_1 = 1;
            }
            let actual_achievement = [];
            let actual_achievement_list = [];
            $.each($("textarea[name='actual_achievement[]']"), function() {
                actual_achievement_list.push($(this).val());
            });
            actual_achievement += actual_achievement_list;
            let count_actual_achievement = 0;
            if (actual_achievement.length > 0) {
                let array_of_actual_achievement = actual_achievement.split(',');
                for (let i = 0; i < array_of_actual_achievement.length; i++) {
                    let name_actual_achievement = array_of_actual_achievement[i];
                    if (name_actual_achievement === "") {
                        count_actual_achievement += 1;
                    }
                }
            } else {
                count_actual_achievement = 1;
            }
            let job_target_2 = [];
            let job_target_2_list = [];
            $.each($("textarea[name='job_target_2[]']"), function() {
                job_target_2_list.push($(this).val());
            });
            job_target_2 += job_target_2_list;
            let count_job_target_2 = 0;
            if (job_target_2.length > 0) {
                let array_of_job_target_2 = job_target_2.split(',');
                for (let r = 0; r < array_of_job_target_2.length; r++) {
                    let name_job_target_2 = array_of_job_target_2[r];
                    if (name_job_target_2 === "") {
                        count_job_target_2 += 1;
                    }
                }
            } else {
                count_job_target_2 = 1;
            }
            let item_option_selfevaluations3_1 = [];
            let item_option_selfevaluations3_1_list = [];
            $.each($("input[name='3_1item_option_selfevaluations[]']:checked"), function() {
                item_option_selfevaluations3_1_list.push($(this).val());
            });
            item_option_selfevaluations3_1 += item_option_selfevaluations3_1_list;
            let item_option_selfevaluation3_2 = [];
            let item_option_selfevaluation3_2_list = [];
            $.each($("input[name='3_2item_option_selfevaluation[]']:checked"), function() {
                item_option_selfevaluation3_2_list.push($(this).val());
            });
            item_option_selfevaluation3_2 += item_option_selfevaluation3_2_list;
            let item_option_selfevaluation3_2_26 = document.getElementsByName("3_2item_option_selfevaluation[]");
            let alert_3_2others = document.getElementById("alert_3_2others");
            let others_capability = document.getElementById("others_capability").value;
            for (let i = 0; i < item_option_selfevaluation3_2_26.length; i++) {
                item_option_selfevaluation3_2_26[i].addEventListener("change", function() {
                    if (item_option_selfevaluation3_2_26[26].checked == "") {
                        alert_3_2others.style.display = "none";
                    }
                });
            }
            let improve_yourself = [];
            let improve_yourself_list = [];
            $.each($("textarea[name='improve_yourself[]']"), function() {
                improve_yourself_list.push($(this).val());
            });
            improve_yourself += improve_yourself_list;
            let count_improve_yourself = 0;
            if (improve_yourself.length > 0) {
                let array_improve_yourself = improve_yourself.split(',');
                for (let j = 0; j < array_improve_yourself.length; j++) {
                    let name_improve_yourself = array_improve_yourself[j];
                    if (name_improve_yourself === "") {
                        count_improve_yourself += 1;
                    }
                }
            } else {
                count_improve_yourself = 1;
            }
            let weaknesses = document.getElementById("weaknesses").value;
            let strengths = document.getElementById("strengths").value;
            let target_in_next_year = document.getElementById("target_in_next_year").value;
            let item_option_selfevaluation3_6 = [];
            let item_option_selfevaluation3_6_list = [];
            $.each($('input[name="3_6item_option_selfevaluation[]"]:checked'), function() {
                item_option_selfevaluation3_6_list.push($(this).val());
            });
            item_option_selfevaluation3_6 += item_option_selfevaluation3_6_list;
            let item_option_is_subtopic_in_subtopics3_6_1 = [];
            let item_option_is_subtopic_in_subtopics3_6_1_list = [];
            $.each($('input[name="3_6_1item_option_is_subtopic_in_subtopics[]"]:checked'), function() {
                item_option_is_subtopic_in_subtopics3_6_1_list.push($(this).val());
            });
            item_option_is_subtopic_in_subtopics3_6_1 += item_option_is_subtopic_in_subtopics3_6_1_list;
            let item_option_is_subtopic_in_subtopics3_6_2 = [];
            let item_option_is_subtopic_in_subtopics3_6_2_list = [];
            $.each($('input[name="3_6_2item_option_is_subtopic_in_subtopic[]"]:checked'), function() {
                item_option_is_subtopic_in_subtopics3_6_2_list.push($(this).val());
            });
            item_option_is_subtopic_in_subtopics3_6_2 += item_option_is_subtopic_in_subtopics3_6_2_list;
            let item_option_selfevaluation3_6_alert = document.getElementsByName("3_6item_option_selfevaluation[]");
            for (let i = 0; i < item_option_selfevaluation3_6_alert.length; i++) {
                item_option_selfevaluation3_6_alert[i].addEventListener("change", function() {
                    if (item_option_selfevaluation3_6_alert[1].checked || item_option_selfevaluation3_6_alert[3].checked) {

                    } else {
                        let alert_most_suitable = document.getElementById("alert_most_suitable");
                        alert_most_suitable.style.display = "none";
                        let alert_assignment_as_stated = document.getElementById("alert_assignment_as_stated");
                        alert_assignment_as_stated.style.display = "none";
                    }
                });
            }
            let item_option_is_subtopic_in_subtopics_3_6_1_check = document.getElementsByName("3_6_1item_option_is_subtopic_in_subtopics[]");
            let others_3_6_1 = document.getElementById("others_3_6_1").value;
            for (let a = 0; a < item_option_is_subtopic_in_subtopics_3_6_1_check.length; a++) {
                item_option_is_subtopic_in_subtopics_3_6_1_check[a].addEventListener("change", function() {
                    if (item_option_is_subtopic_in_subtopics_3_6_1_check[61].checked == "") {
                        let alert_others_3_6_1 = document.getElementById("alert_others_3_6_1");
                        alert_others_3_6_1.style.display = "none";
                    }
                });
            }
            let item_option_is_subtopic_in_subtopic_3_6_2_check = document.getElementsByName("3_6_2item_option_is_subtopic_in_subtopic[]");
            let others_3_6_2 = document.getElementById("others_3_6_2").value;
            for (let b = 0; b < item_option_is_subtopic_in_subtopic_3_6_2_check.length; b++) {
                item_option_is_subtopic_in_subtopic_3_6_2_check[b].addEventListener("change", function() {
                    if (item_option_is_subtopic_in_subtopic_3_6_2_check[5].checked == "") {
                        let alert_others_3_6_2 = document.getElementById("alert_others_3_6_2");
                        alert_others_3_6_2.style.display = "none";
                    }
                });
            }
            let your_feedback = document.getElementById("your_feedback").value;
            //ส่วนที่ทำงาน Alert
            if (date_submit.length <= 0) {
                let alert_Date_submit = document.getElementById("alert_Date_submit");
                alert_Date_submit.style.display = "table";
                document.getElementById("date_submit").focus();
                $check_error = 1;
            }
            if (emp_name.length <= 0) {
                let alert_Employee_name = document.getElementById("alert_Employee_name");
                alert_Employee_name.style.display = "table";
                document.getElementById("emp_name").focus();
                $check_error = 1;
            }
            if (emp_id.length <= 0) {
                let alert_Employee_ID = document.getElementById("alert_Employee_ID");
                alert_Employee_ID.style.display = "table";
                document.getElementById("emp_id").focus();
                $check_error = 1;
            }
            if (emp_grade.length <= 0) {
                let alert_Employee_Grade = document.getElementById("alert_Employee_Grade");
                alert_Employee_Grade.style.display = "table";
                document.getElementById("emp_grade").focus();
                $check_error = 1;
            }
            if (section.length <= 0) {
                let alert_Section = document.getElementById("alert_Section");
                alert_Section.style.display = "table";
                document.getElementById("section").focus();
                $check_error = 1;
            }
            if (division.length <= 0) {
                let alert_Division = document.getElementById("alert_Division");
                alert_Division.style.display = "table";
                document.getElementById("division").focus();
                $check_error = 1;
            }
            if (hired_date.length <= 0) {
                let alert_Hired_date = document.getElementById("alert_Hired_date");
                alert_Hired_date.style.display = "table";
                document.getElementById("hired_date").focus();
                $check_error = 1;
            }
            if (sup_name.length <= 0) {
                let alert_Superior_name = document.getElementById("alert_Superior_name");
                alert_Superior_name.style.display = "table";
                document.getElementById("sup_name").focus();
                $check_error = 1;
            }
            if (sup_grade.length <= 0) {
                let alert_Superior_Grade = document.getElementById("alert_Superior_Grade");
                alert_Superior_Grade.style.display = "table";
                document.getElementById("sup_grade").focus();
                $check_error = 1;
            }
            // if (emp_year_of_service.length <= 0) {
            //     let alert_Employee_Years_of_service = document.getElementById("alert_Employee_Years_of_service");
            //     alert_Employee_Years_of_service.style.display = "table";
            //     document.getElementById("emp_year_of_service").focus();
            //     $check_error = 1;
            // }
            if (count_job_target_1 !== 0) {
                let alert_Job_Target_1 = document.getElementById("alert_Job_Target_1");
                alert_Job_Target_1.style.display = "block";
                let jobTargetInputs = document.getElementsByName("job_target_1[]");
                for (let p = 0; p < jobTargetInputs.length; p++) {
                    if (jobTargetInputs[p].value === "") {
                        jobTargetInputs[p].focus();
                        break;
                    }
                }
                $check_error = 1;
            }
            if (count_actual_achievement !== 0) {
                let alert_Actual_achievement = document.getElementById("alert_Actual_achievement");
                alert_Actual_achievement.style.display = "block";
                let Actual_achievementInputs = document.getElementsByName("actual_achievement[]");
                for (let p = 0; p < Actual_achievementInputs.length; p++) {
                    if (Actual_achievementInputs[p].value === "") {
                        Actual_achievementInputs[p].focus();
                        break;
                    }
                }
                $check_error = 1;
            }
            if (count_job_target_2 !== 0) {
                let alert_Job_Target_2 = document.getElementById("alert_Job_Target_2");
                alert_Job_Target_2.style.display = "block";
                let jobTargetInputs2 = document.getElementsByName("job_target_2[]");
                for (let z = 0; z < jobTargetInputs2.length; z++) {
                    if (jobTargetInputs2[z].value === "") {
                        jobTargetInputs2[z].focus();
                        break;
                    }
                }
                $check_error = 1;
            }
            if (item_option_selfevaluations3_1.length <= 0) {
                let alert_3_1item_option = document.getElementById("alert_3_1item_option");
                alert_3_1item_option.style.display = "block";
                let item_option_3_1 = document.getElementsByName("3_1item_option_selfevaluations[]");
                if (item_option_3_1.length > 0) {
                    for (let i = 0; i < item_option_3_1.length; i++) {
                        if (!item_option_3_1[i].checked) {
                            item_option_3_1[i].focus();
                            break;
                        }
                    }
                }
                $check_error = 1;
            }
            if (item_option_selfevaluation3_2.length <= 0 && item_option_selfevaluations3_1 != 'Fully achieved.') {
                let alert_3_2item_option = document.getElementById("alert_3_2item_option");
                alert_3_2item_option.style.display = "block";
                let item_option_3_2 = document.getElementsByName("3_2item_option_selfevaluation[]");
                if (item_option_3_2.length > 0) {
                    for (let i = 0; i < item_option_3_2.length; i++) {
                        if (!item_option_3_2[i].checked) {
                            item_option_3_2[i].focus();
                            break;
                        }
                    }
                }
                $check_error = 1;
            }
            if (item_option_selfevaluation3_2_26[26].checked && others_capability.length <= 0) {
                alert_3_2others.style.display = "block";
                document.getElementById("others_capability").focus();
                $check_error = 1;
            } else {
                alert_3_2others.style.display = "none";
            }
            if (count_improve_yourself !== 0) {
                let alert_improve_yourself = document.getElementById("alert_improve_yourself");
                alert_improve_yourself.style.display = "block";
                let improve_yourselfInput = document.getElementsByName("improve_yourself[]");
                for (let b = 0; b < improve_yourselfInput.length; b++) {
                    if (improve_yourselfInput[b].value === "") {
                        improve_yourselfInput[b].focus();
                        break;
                    }
                }
                $check_error = 1;
            }
            if (weaknesses.length <= 0) {
                let alert_weaknesses = document.getElementById("alert_weaknesses");
                alert_weaknesses.style.display = "block";
                document.getElementById("weaknesses").focus();
                $check_error = 1;
            }
            if (strengths.length <= 0) {
                let alert_strengths = document.getElementById("alert_strengths");
                alert_strengths.style.display = "block";
                document.getElementById("strengths").focus();
                $check_error = 1;
            }
            if (target_in_next_year.length <= 0) {
                let alert_State_how_your = document.getElementById("alert_State_how_your");
                alert_State_how_your.style.display = "block";
                document.getElementById("target_in_next_year").focus();
                $check_error = 1;
            }
            if (item_option_selfevaluation3_6.length <= 0) {
                let alert_current_job_assignment = document.getElementById("alert_current_job_assignment");
                alert_current_job_assignment.style.display = "block";
                let item_option_3_6 = document.getElementsByName("3_6item_option_selfevaluation[]");
                if (item_option_3_6.length > 0) {
                    for (let i = 0; i < item_option_3_6.length; i++) {
                        if (!item_option_3_6[i].checked) {
                            item_option_3_6[i].focus();
                            break;
                        }
                    }
                }
                $check_error = 1;
            }
            if ((item_option_selfevaluation3_6_alert[1].checked || item_option_selfevaluation3_6_alert[3].checked) && item_option_is_subtopic_in_subtopics3_6_1.length <= 0) {
                let alert_most_suitable = document.getElementById("alert_most_suitable");
                alert_most_suitable.style.display = "block";
                let item_option_is_subtopic_in_subtopics3_6_1 = document.getElementsByName("3_6_1item_option_is_subtopic_in_subtopics[]");
                if (item_option_is_subtopic_in_subtopics3_6_1.length > 0) {
                    for (let i = 0; i < item_option_is_subtopic_in_subtopics3_6_1.length; i++) {
                        if (!item_option_is_subtopic_in_subtopics3_6_1[i].checked) {
                            item_option_is_subtopic_in_subtopics3_6_1[i].focus();
                            break;
                        }
                    }
                }
                $check_error = 1;
            }
            if ((item_option_selfevaluation3_6_alert[1].checked || item_option_selfevaluation3_6_alert[3].checked) && item_option_is_subtopic_in_subtopics3_6_2.length <= 0) {
                let alert_assignment_as_stated = document.getElementById("alert_assignment_as_stated");
                alert_assignment_as_stated.style.display = "block";
                let item_option_is_subtopic_in_subtopic3_6_2 = document.getElementsByName("3_6_2item_option_is_subtopic_in_subtopic[]");
                if (item_option_is_subtopic_in_subtopic3_6_2.length > 0) {
                    for (let i = 0; i < item_option_is_subtopic_in_subtopic3_6_2.length; i++) {
                        if (!item_option_is_subtopic_in_subtopic3_6_2[i].checked) {
                            item_option_is_subtopic_in_subtopic3_6_2[i].focus();
                            break;
                        }
                    }
                }
                $check_error = 1;
            }
            if (item_option_is_subtopic_in_subtopics_3_6_1_check[61].checked && others_3_6_1.length <= 0) {
                let alert_others_3_6_1 = document.getElementById("alert_others_3_6_1");
                alert_others_3_6_1.style.display = "block";
                document.getElementById("others_3_6_1").focus();
                $check_error = 1;
            }
            if (item_option_is_subtopic_in_subtopic_3_6_2_check[5].checked && others_3_6_2.length <= 0) {
                let alert_others_3_6_2 = document.getElementById("alert_others_3_6_2");
                alert_others_3_6_2.style.display = "block";
                document.getElementById("others_3_6_2").focus();
                $check_error = 1;
            }
            if (your_feedback.length <= 0) {
                let alert_your_feedback = document.getElementById("alert_your_feedback");
                alert_your_feedback.style.display = "block";
                document.getElementById("your_feedback").focus();
                $check_error = 1;
            }
            if ($check_error == 0) {
                send_submit_SelfEvaluationForm();
            }
        });
        //ส่วนที่ลบ Alert จากการกรอกหรือเปลี่ยน
        $('#date_submit').on('change', function() {
            let date_submit = $('#date_submit').val();
            if (date_submit != "") {
                let alert_Date_submit = document.getElementById("alert_Date_submit");
                alert_Date_submit.style.display = "none";
            }
        });
        $('#emp_name').on('input', function() {
            let emp_name = $('#emp_name').val();
            if (emp_name != "") {
                let alert_Employee_name = document.getElementById("alert_Employee_name");
                alert_Employee_name.style.display = "none";
            }
        });
        $('#emp_id').on('input', function() {
            let emp_id = $('#emp_id').val();
            if (emp_id != "") {
                let alert_Employee_ID = document.getElementById("alert_Employee_ID");
                alert_Employee_ID.style.display = "none";
            }
        });
        $('#emp_grade').on('input', function() {
            let emp_grade = $('#emp_grade').val();
            if (emp_grade != "") {
                let alert_Employee_Grade = document.getElementById("alert_Employee_Grade");
                alert_Employee_Grade.style.display = "none";
            }
        });
        $('#section').on('input', function() {
            let section = $('#section').val();
            if (section != "") {
                let alert_Section = document.getElementById("alert_Section");
                alert_Section.style.display = "none";
            }
        });
        $('#division').change(function() {
            let alert_Division = document.getElementById("alert_Division");
            alert_Division.style.display = "none";
        });
        $('#hired_date').on('change', function() {
            let hired_date = $('#hired_date').val();
            if (hired_date != "") {
                let alert_Hired_date = document.getElementById("alert_Hired_date");
                alert_Hired_date.style.display = "none";
            }
        });
        $('#sup_name').on('input', function() {
            let sup_name = $('#sup_name').val();
            if (sup_name != "") {
                let alert_Superior_name = document.getElementById("alert_Superior_name");
                alert_Superior_name.style.display = "none";
            }
        });
        $('#sup_grade').on('input', function() {
            let sup_grade = $('#sup_grade').val();
            if (sup_grade != "") {
                let alert_Superior_Grade = document.getElementById("alert_Superior_Grade");
                alert_Superior_Grade.style.display = "none";
            }
        });
        // $('#emp_year_of_service').on('input', function() {
        //     let emp_year_of_service = $('#emp_year_of_service').val();
        //     if (emp_year_of_service != "") {
        //         let alert_Employee_Years_of_service = document.getElementById("alert_Employee_Years_of_service");
        //         alert_Employee_Years_of_service.style.display = "none";
        //     }
        // });
        $(document).on('input', "textarea[name='job_target_1[]']", function() {
            if ($(this).val() !== "") {
                let alert_Job_Target_1 = document.getElementById("alert_Job_Target_1");
                alert_Job_Target_1.style.display = "none";
            }
        });
        $(document).on('input', "textarea[name='actual_achievement[]']", function() {
            if ($(this).val() !== "") {
                let alert_Actual_achievement = document.getElementById("alert_Actual_achievement");
                alert_Actual_achievement.style.display = "none";
            }
        });
        $(document).on('input', "textarea[name='job_target_2[]']", function() {
            if ($(this).val() !== "") {
                let alert_Job_Target_1 = document.getElementById("alert_Job_Target_2");
                alert_Job_Target_1.style.display = "none";
            }
        });
        $(document).on('change', "input[name='3_1item_option_selfevaluations[]']:checked", function() {
            if ($(this).val()) {
                let alert_3_1item_option = document.getElementById("alert_3_1item_option");
                alert_3_1item_option.style.display = "none";
            }
        });
        $(document).on('change', "input[name='3_2item_option_selfevaluation[]']:checked", function() {
            if ($(this).val()) {
                let alert_3_2item_option = document.getElementById("alert_3_2item_option");
                alert_3_2item_option.style.display = "none";
            }
        });
        $('#others_capability').on('input', function() {
            let others_capability = $('#others_capability').val();
            if (others_capability != "") {
                let alert_3_2others = document.getElementById("alert_3_2others");
                alert_3_2others.style.display = "none";
            }
        });
        $(document).on('input', "textarea[name='improve_yourself[]']", function() {
            if ($(this).val() !== "") {
                let alert_improve_yourself = document.getElementById("alert_improve_yourself");
                alert_improve_yourself.style.display = "none";
            }
        });
        $('#weaknesses').on('input', function() {
            let alert_weaknesses = document.getElementById("alert_weaknesses");
            alert_weaknesses.style.display = "none";
        });
        $('#strengths').on('input', function() {
            let alert_strengths = document.getElementById("alert_strengths");
            alert_strengths.style.display = "none";
        });
        $('#target_in_next_year').on('input', function() {
            let alert_State_how_your = document.getElementById("alert_State_how_your");
            alert_State_how_your.style.display = "none";
        });
        $(document).on('change', "input[name='3_6item_option_selfevaluation[]']:checked", function() {
            if ($(this).val()) {
                let alert_current_job_assignment = document.getElementById("alert_current_job_assignment");
                alert_current_job_assignment.style.display = "none";
            }
        });
        $(document).on('change', "input[name='3_6_1item_option_is_subtopic_in_subtopics[]']:checked", function() {
            if ($(this).val()) {
                let alert_most_suitable = document.getElementById("alert_most_suitable");
                alert_most_suitable.style.display = "none";
            }
        });
        $(document).on('change', "input[name='3_6_2item_option_is_subtopic_in_subtopic[]']:checked", function() {
            if ($(this).val()) {
                let alert_assignment_as_stated = document.getElementById("alert_assignment_as_stated");
                alert_assignment_as_stated.style.display = "none";
            }
        });
        $('#others_3_6_1').on('input', function() {
            let alert_others_3_6_1 = document.getElementById("alert_others_3_6_1");
            alert_others_3_6_1.style.display = "none";
        });
        $('#others_3_6_2').on('input', function() {
            let alert_others_3_6_2 = document.getElementById("alert_others_3_6_2");
            alert_others_3_6_2.style.display = "none";
        });
        $('#your_feedback').on('input', function() {
            let alert_your_feedback = document.getElementById("alert_your_feedback");
            alert_your_feedback.style.display = "none";
        });
        ///////////
        let item_option_selfevaluations3_1_show = document.getElementsByName("3_1item_option_selfevaluations[]");
        let tr_3_2 = document.querySelectorAll(".tr_3_2");
        let item_option_selfevaluation_3_2 = document.getElementsByName("3_2item_option_selfevaluation[]");
        for (let c = 0; c < item_option_selfevaluations3_1_show.length; c++) {
            item_option_selfevaluations3_1_show[c].addEventListener("change", function() {
                if (!item_option_selfevaluations3_1_show[0].checked) {
                    tr_3_2.forEach(function(trs) {
                        trs.style.display = "table-row";
                    });
                } else {
                    tr_3_2.forEach(function(trs) {
                        trs.style.display = "none";
                        for (let m = 0; m < item_option_selfevaluation_3_2.length; m++) {
                            item_option_selfevaluation_3_2[m].checked = false;
                        }
                    });
                }
            });
        }

        let item_option_selfevaluation3_2 = document.getElementsByName("3_2item_option_selfevaluation[]");
        let div_capability = document.getElementById("div_capability");
        let others_capability = document.getElementById("others_capability");
        for (let i = 0; i < item_option_selfevaluation3_2.length; i++) {
            item_option_selfevaluation3_2[i].addEventListener("change", function() {
                if (item_option_selfevaluation3_2[26].checked) {
                    div_capability.style.display = "block";
                } else {
                    div_capability.style.display = "none";
                    others_capability.value = "";
                }
            });
        }

        let item_option_selfevaluation3_6 = document.getElementsByName("3_6item_option_selfevaluation[]");
        let tr_3_6_All = document.querySelectorAll(".tr_3_6_All");
        let item_option_is_subtopic_in_subtopics_3_6_1 = document.getElementsByName("3_6_1item_option_is_subtopic_in_subtopics[]");
        let item_option_is_subtopic_in_subtopic_3_6_2 = document.getElementsByName("3_6_2item_option_is_subtopic_in_subtopic[]");
        for (let i = 0; i < item_option_selfevaluation3_6.length; i++) {
            item_option_selfevaluation3_6[i].addEventListener("change", function() {
                if (item_option_selfevaluation3_6[1].checked || item_option_selfevaluation3_6[3].checked) {
                    tr_3_6_All.forEach(function(tr) {
                        tr.style.display = "table-row";
                    });
                } else {
                    tr_3_6_All.forEach(function(tr) {
                        tr.style.display = "none";
                        for (let j = 0; j < item_option_is_subtopic_in_subtopics_3_6_1.length; j++) {
                            item_option_is_subtopic_in_subtopics_3_6_1[j].checked = false;
                        }
                        for (let q = 0; q < item_option_is_subtopic_in_subtopic_3_6_2.length; q++) {
                            item_option_is_subtopic_in_subtopic_3_6_2[q].checked = false;
                        }
                    });
                }
            });
        }

        let item_option_is_subtopic_in_subtopics_3_6_1_check = document.getElementsByName("3_6_1item_option_is_subtopic_in_subtopics[]");
        let div_others_3_6_1 = document.getElementById("div_others_3_6_1");
        let others_3_6_1 = document.getElementById("others_3_6_1");
        for (let a = 0; a < item_option_is_subtopic_in_subtopics_3_6_1_check.length; a++) {
            item_option_is_subtopic_in_subtopics_3_6_1_check[a].addEventListener("change", function() {
                if (item_option_is_subtopic_in_subtopics_3_6_1_check[61].checked) {
                    div_others_3_6_1.style.display = "block";
                } else {
                    div_others_3_6_1.style.display = "none";
                    others_3_6_1.value = "";
                }
            });
        }

        let item_option_is_subtopic_in_subtopic_3_6_2_check = document.getElementsByName("3_6_2item_option_is_subtopic_in_subtopic[]");
        let div_others_3_6_2 = document.getElementById("div_others_3_6_2");
        let others_3_6_2 = document.getElementById("others_3_6_2");
        for (let b = 0; b < item_option_is_subtopic_in_subtopic_3_6_2_check.length; b++) {
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

    function addInputJob_Target() {
        var html = "<tr>";
        html += "<td colspan=\"3\" class=\"border td_border\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"job_target_1[]\" id=\"job_target_1\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"job_target_1\" class=\"font-twelve\">Please fill in Job Target<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td colspan=\"2\" class=\"border td_border\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"actual_achievement[]\" id=\"actual_achievement\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"actual_achievement\" class=\"font-twelve\">Please fill in Actual achievement<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td class=\"border td_border mit\">";
        html += "<button onclick='deleteRowJob_Target(this);' class=\"btn btn-primary btn_color_df\" type=\"button\" style=\"width: 100px;\">Delete</button>";
        html += "</td>";
        html += "</tr>";
        var row = document.getElementById("tbody").insertRow();
        row.innerHTML = html;
    }

    function deleteRowJob_Target(button) {
        items1--
        button.parentElement.parentElement.remove();
    }

    function addInputJob_Target_next_year() {
        var html = "<tr>";
        html += "<td class=\"border td_border\" colspan=\"5\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"job_target_2[]\" id=\"job_target_2\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"job_target_2\" class=\"font-twelve\">Please fill in Job Target<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td class=\"border td_border mit\">";
        html += "<button onclick=\"deleteRowJob_Target_next_year(this);\" class=\"btn btn-primary btn_color_df\" type=\"button\" style=\"width: 100px;\">Delete</button>";
        html += "</td>";
        html += "</tr>";
        var row = document.getElementById("tbody2").insertRow();
        row.innerHTML = html;
    }

    function deleteRowJob_Target_next_year(button) {
        items2--
        button.parentElement.parentElement.remove();
    }

    function addInput_improve_yourself() {
        var html = "<tr>";
        html += "<td class=\"border\" colspan=\"5\">";
        html += "<div class=\"form-floating\">";
        html += "<textarea name=\"improve_yourself[]\" id=\"improve_yourself\" class=\"form-control h-textarea\"></textarea>";
        html += "<label for=\"improve_yourself\" class=\"font-twelve\">Please enter things to improve yourself.<span class=\"red font-twelve\">*</span></label>";
        html += "</div>";
        html += "</td>";
        html += "<td class=\"border mit\">";
        html += "<button onclick=\"deleteRowimprove_yourself(this);\" class=\"btn btn-primary btn_color_df\" type=\"button\" style=\"width: 100px;\">Delete</button>";
        html += "</td>";
        html += "</tr>";
        var row = document.getElementById("tbody3").insertRow();
        row.innerHTML = html;
    }

    function deleteRowimprove_yourself(button) {
        items3--
        button.parentElement.parentElement.remove();
    }

    function send_submit_SelfEvaluationForm() {
        let up_id = $('#up_id').val();
        let year_submit = $('#year_submit').val();
        let date_submit = $('#date_submit').val();
        let emp_name = $('#emp_name').val();
        let emp_id = $('#emp_id').val();
        let emp_grade = $('#emp_grade').val();
        let section = $('#section').val();
        let division = $('#division').val();
        let hired_date = $('#hired_date').val();
        let sup_name = $('#sup_name').val();
        let sup_grade = $('#sup_grade').val();
        let emp_year_of_service = $('#emp_year_of_service').val();

        let job_target_1 = [];
        let job_target_1_list = [];
        $.each($("textarea[name='job_target_1[]']"), function() {
            job_target_1_list.push($(this).val());
        });
        job_target_1 += job_target_1_list;

        let actual_achievement = [];
        let actual_achievement_list = [];
        $.each($("textarea[name='actual_achievement[]']"), function() {
            actual_achievement_list.push($(this).val());
        });
        actual_achievement += actual_achievement_list;

        let job_target_2 = [];
        let job_target_2_list = [];
        $.each($("textarea[name='job_target_2[]']"), function() {
            job_target_2_list.push($(this).val());
        });
        job_target_2 += job_target_2_list;

        let item_option_selfevaluations3_1 = [];
        let item_option_selfevaluations3_1_list = [];
        $.each($("input[name='3_1item_option_selfevaluations[]']:checked"), function() {
            item_option_selfevaluations3_1_list.push($(this).val());
        });
        item_option_selfevaluations3_1 += item_option_selfevaluations3_1_list;

        let item_option_selfevaluation3_2 = [];
        let item_option_selfevaluation3_2_list = [];
        $.each($("input[name='3_2item_option_selfevaluation[]']:checked"), function() {
            item_option_selfevaluation3_2_list.push($(this).val());
        });
        item_option_selfevaluation3_2 += item_option_selfevaluation3_2_list;

        let others_capability = $('#others_capability').val();

        let improve_yourself = [];
        let improve_yourself_list = [];
        $.each($("textarea[name='improve_yourself[]']"), function() {
            improve_yourself_list.push($(this).val());
        });
        improve_yourself += improve_yourself_list;

        let weaknesses = $('#weaknesses').val();
        let strengths = $('#strengths').val();
        let target_in_next_year = $('#target_in_next_year').val();

        let item_option_selfevaluation3_6 = [];
        let item_option_selfevaluation3_6_list = [];
        $.each($('input[name="3_6item_option_selfevaluation[]"]:checked'), function() {
            item_option_selfevaluation3_6_list.push($(this).val());
        });
        item_option_selfevaluation3_6 += item_option_selfevaluation3_6_list;

        let item_option_is_subtopic_in_subtopics3_6_1 = [];
        let item_option_is_subtopic_in_subtopics3_6_1_list = [];
        $.each($('input[name="3_6_1item_option_is_subtopic_in_subtopics[]"]:checked'), function() {
            item_option_is_subtopic_in_subtopics3_6_1_list.push($(this).val());
        });
        item_option_is_subtopic_in_subtopics3_6_1 += item_option_is_subtopic_in_subtopics3_6_1_list;

        let others_3_6_1 = $('#others_3_6_1').val();

        let item_option_is_subtopic_in_subtopics3_6_2 = [];
        let item_option_is_subtopic_in_subtopics3_6_2_list = [];
        $.each($('input[name="3_6_2item_option_is_subtopic_in_subtopic[]"]:checked'), function() {
            item_option_is_subtopic_in_subtopics3_6_2_list.push($(this).val());
        });
        item_option_is_subtopic_in_subtopics3_6_2 += item_option_is_subtopic_in_subtopics3_6_2_list;

        let others_3_6_2 = $('#others_3_6_2').val();
        let your_feedback = $('#your_feedback').val();
        let emp_email = $('#emp_email').val();
        var self_evaluation_status = "Submit";

        $.ajax({
            url: '<?php echo base_url(); ?>index.php/hr_controller/submit_formStatic_self_evaluation_ajax',
            type: 'POST',
            dataType: 'json',
            data: {
                up_id: up_id,
                year_submit: year_submit,
                date_submit: date_submit,
                emp_name: emp_name,
                emp_id: emp_id,
                emp_grade: emp_grade,
                section: section,
                division: division,
                hired_date: hired_date,
                sup_name: sup_name,
                sup_grade: sup_grade,
                emp_year_of_service: emp_year_of_service,
                job_target_1: job_target_1,
                actual_achievement: actual_achievement,
                job_target_2: job_target_2,
                item_option_selfevaluations3_1: item_option_selfevaluations3_1,
                item_option_selfevaluation3_2: item_option_selfevaluation3_2,
                others_capability: others_capability,
                improve_yourself: improve_yourself,
                weaknesses: weaknesses,
                strengths: strengths,
                target_in_next_year: target_in_next_year,
                item_option_selfevaluation3_6: item_option_selfevaluation3_6,
                item_option_is_subtopic_in_subtopics3_6_1: item_option_is_subtopic_in_subtopics3_6_1,
                others_3_6_1: others_3_6_1,
                item_option_is_subtopic_in_subtopics3_6_2: item_option_is_subtopic_in_subtopics3_6_2,
                others_3_6_2: others_3_6_2,
                your_feedback: your_feedback,
                emp_email: emp_email,
                self_evaluation_status: self_evaluation_status
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
</script>