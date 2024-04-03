<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let check_error = 0;
            let main_topic = document.getElementById("main_topic").value;
            let sub_topic = document.getElementById("sub_topic").value;
            let sub_in_sub = document.getElementById("sub_in_sub").value;
            let sub_in_sub_details = document.getElementById("sub_in_sub_details").value;
            let status = document.getElementById("status").value;

            if (main_topic.length <= 0) {
                let alert_main_topic = document.getElementById("alert_main_topic");
                alert_main_topic.style.display = "block";
                document.getElementById("main_topic").focus();
                check_error = 1;
            }
            if (sub_topic.length <= 0) {
                let alert_sub_topic = document.getElementById("alert_sub_topic");
                alert_sub_topic.style.display = "block";
                document.getElementById("sub_topic").focus();
                check_error = 1;
            }
            if (sub_in_sub.length <= 0) {
                let alert_sub_topic_in_sub_topic = document.getElementById("alert_sub_topic_in_sub_topic");
                alert_sub_topic_in_sub_topic.style.display = "block";
                document.getElementById("sub_in_sub").focus();
                check_error = 1;
            }
            if (sub_in_sub_details.length <= 0) {
                let alert_sub_topic_in_sub_topic_details = document.getElementById("alert_sub_topic_in_sub_topic_details");
                alert_sub_topic_in_sub_topic_details.style.display = "block";
                document.getElementById("sub_in_sub_details").focus();
                check_error = 1;
            }
            if (status.length <= 0) {
                let alert_select_status = document.getElementById("alert_select_status");
                alert_select_status.style.display = "block";
                document.getElementById("status").focus();
                check_error = 1;
            }
            if (check_error == 0) {
                submit_sub_in_sub();
            }
        });

        $('#update').click(function() {
            let up_check_error = 0;
            let up_id = document.getElementById("up_id").value;
            let up_main_topic = document.getElementById("up_main_topic").value;
            let up_sub_topic = document.getElementById("up_sub_topic").value;
            let up_sub_in_sub = document.getElementById("up_sub_in_sub").value;
            let up_sub_in_sub_details = document.getElementById("up_sub_in_sub_details").value;
            let up_status = document.getElementById("up_status").value;
            if (up_main_topic.length <= 0) {
                let alert_main_topic = document.getElementById("alert_main_topic");
                alert_main_topic.style.display = "block";
                document.getElementById("up_main_topic").focus();
                up_check_error = 1;
            }
            if (up_sub_topic.length <= 0) {
                let alert_sub_topic = document.getElementById("alert_sub_topic");
                alert_sub_topic.style.display = "block";
                document.getElementById("up_sub_topic").focus();
                up_check_error = 1;
            }
            if (up_sub_in_sub.length <= 0) {
                let alert_sub_topic_in_sub_topic = document.getElementById("alert_sub_topic_in_sub_topic");
                alert_sub_topic_in_sub_topic.style.display = "block";
                document.getElementById("up_sub_in_sub").focus();
                up_check_error = 1;
            }
            if (up_sub_in_sub_details.length <= 0) {
                let alert_sub_topic_in_sub_topic_details = document.getElementById("alert_sub_topic_in_sub_topic_details");
                alert_sub_topic_in_sub_topic_details.style.display = "block";
                document.getElementById("up_sub_in_sub_details").focus();
                up_check_error = 1;
            }
            if (up_check_error == 0) {
                update_sub_in_sub();
            }
        });

        $('#main_topic').change(function() {
            let alert_main_topic = document.getElementById("alert_main_topic");
            alert_main_topic.style.display = "none";
        });
        $('#up_main_topic').change(function() {
            let alert_main_topic = document.getElementById("alert_main_topic");
            alert_main_topic.style.display = "none";
        });
        $('#sub_topic').change(function() {
            let alert_sub_topic = document.getElementById("alert_sub_topic");
            alert_sub_topic.style.display = "none";
        });
        $('#up_sub_topic').change(function() {
            let alert_sub_topic = document.getElementById("alert_sub_topic");
            alert_sub_topic.style.display = "none";
        });
        $('#sub_in_sub').on('input', function() {
            let alert_sub_topic_in_sub_topic = document.getElementById("alert_sub_topic_in_sub_topic");
            alert_sub_topic_in_sub_topic.style.display = "none";
        });
        $('#sub_in_sub').on('input', function() {
            if ($(this).val() === "") {
                let alert_due_sub_in_sub = document.getElementById("alert_due_sub_in_sub");
                alert_due_sub_in_sub.style.display = "none";
            }
        });
        $('#up_sub_in_sub').on('input', function() {
            let alert_sub_topic_in_sub_topic = document.getElementById("alert_sub_topic_in_sub_topic");
            alert_sub_topic_in_sub_topic.style.display = "none";
        });
        $('#up_sub_in_sub').on('input', function() {
            if ($(this).val() === "") {
                let alert_due_sub_in_sub = document.getElementById("alert_due_sub_in_sub");
                alert_due_sub_in_sub.style.display = "none";
            }
        });
        $('#sub_in_sub_details').on('input', function() {
            let alert_sub_topic_in_sub_topic_details = document.getElementById("alert_sub_topic_in_sub_topic_details");
            alert_sub_topic_in_sub_topic_details.style.display = "none";
        });
        $('#up_sub_in_sub_details').on('input', function() {
            let alert_sub_topic_in_sub_topic_details = document.getElementById("alert_sub_topic_in_sub_topic_details");
            alert_sub_topic_in_sub_topic_details.style.display = "none";
        });
        $('#status').change(function() {
            let alert_select_status = document.getElementById("alert_select_status");
            alert_select_status.style.display = "none";
        });
    });

    function submit_sub_in_sub() {
        let main_topic = document.getElementById("main_topic").value;
        let sub_topic = document.getElementById("sub_topic").value;
        let sub_in_sub = document.getElementById("sub_in_sub").value;
        let sub_in_sub_details = document.getElementById("sub_in_sub_details").value;
        let remark = document.getElementById("remark").value;
        let year = document.getElementById("year").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/submit_sub_in_sub_ajax'); ?>",
            dataType: "json",
            type: "POST",
            data: {
                main_topic: main_topic,
                sub_topic: sub_topic,
                sub_in_sub: sub_in_sub,
                sub_in_sub_details: sub_in_sub_details,
                remark: remark,
                year: year,
                status: status
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicTwoSelf'); ?>';
                });
            },
            error: function(data) {
                let alert_due_sub_in_sub = document.getElementById("alert_due_sub_in_sub");
                alert_due_sub_in_sub.style.display = "block";
                document.getElementById("up_sub_in_sub").focus();
            }
        });
    }

    function update_sub_in_sub() {
        let up_id = document.getElementById("up_id").value;
        let up_main_topic = document.getElementById("up_main_topic").value;
        let up_sub_topic = document.getElementById("up_sub_topic").value;
        let up_sub_in_sub = document.getElementById("up_sub_in_sub").value;
        let up_sub_in_sub_details = document.getElementById("up_sub_in_sub_details").value;
        let up_remark = document.getElementById("up_remark").value;
        let up_year = document.getElementById("up_year").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/update_sub_in_sub_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_main_topic: up_main_topic,
                up_sub_topic: up_sub_topic,
                up_sub_in_sub: up_sub_in_sub,
                up_sub_in_sub_details: up_sub_in_sub_details,
                up_remark: up_remark,
                up_year: up_year,
                up_status: up_status
            },
            success: function(data) {
                Swal.fire({
                    title: "Update successfully",
                    text: "",
                    icon: "success",
                    timer: 1500,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    customClass: {
                        title: 'custom-title-class'
                    }
                }).then(function() {
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicTwoSelf'); ?>';
                });
            },
            error: function(data) {
                let alert_due_sub_in_sub = document.getElementById("alert_due_sub_in_sub");
                alert_due_sub_in_sub.style.display = "block";
                document.getElementById("up_sub_in_sub").focus();
            }
        });
    }

    function search_Subtopics_of_subtopics() {
        let s_main_topic = document.getElementById("s_main_topic").value;
        let s_sub_topic = document.getElementById("s_sub_topic").value;
        let s_sub_in_sub = document.getElementById("s_sub_in_sub").value;
        let s_sub_in_sub_details = document.getElementById("s_sub_in_sub_details").value;
        let s_status = document.getElementById("s_status").value;
        let s_year = document.getElementById("s_year").value;

        window.location = "?s_main_topic=" + encodeURIComponent(s_main_topic) + "&s_sub_topic=" + encodeURIComponent(s_sub_topic) +
            "&s_sub_in_sub=" + encodeURIComponent(s_sub_in_sub) + "&s_sub_in_sub_details=" + encodeURIComponent(s_sub_in_sub_details) + "&s_status=" + encodeURIComponent(s_status) +
            "&s_year=" + encodeURIComponent(s_year)
    }
</script>