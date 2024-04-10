<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let check_error = 0;
            let main_topic = document.getElementById("main_topic").value;
            let sub_topic = document.getElementById("sub_topic").value;
            let sub_item_details = document.getElementById("sub_item_details").value;
            let status = document.getElementById("status").value;

            if (main_topic.length <= 0) {
                let alert_main_topic = document.getElementById("alert_main_topic");
                alert_main_topic.style.display = "block";
                check_error = 1;
                document.getElementById("main_topic").focus();
            }
            if (sub_topic.length <= 0) {
                let alert_sub_topic = document.getElementById("alert_sub_topic");
                alert_sub_topic.style.display = "block";
                check_error = 1;
                document.getElementById("sub_topic").focus();
            }
            if (sub_item_details.length <= 0) {
                let alert_Sub_Topic_Details = document.getElementById("alert_Sub_Topic_Details");
                alert_Sub_Topic_Details.style.display = "block";
                check_error = 1;
                document.getElementById("sub_item_details").focus();
            }
            if (status.length <= 0) {
                let alert_status = document.getElementById("alert_status");
                alert_status.style.display = "block";
                check_error = 1;
                document.getElementById("status").focus();
            }
            if (check_error == 0) {
                Submit_ManageSub_topicOneSelf();
            }
        });

        $('#update').click(function() {
            let up_check_error = 0;
            let up_main_topic = document.getElementById("up_main_topic").value;
            let up_sub_topic = document.getElementById("up_sub_topic").value;
            let up_sub_item_details = document.getElementById("up_sub_item_details").value;
            if (up_main_topic.length <= 0) {
                let up_alert_main_topic = document.getElementById("up_alert_main_topic");
                up_alert_main_topic.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_main_topic").focus();
            }
            if (up_sub_topic.length <= 0) {
                let up_alert_sub_topic = document.getElementById("up_alert_sub_topic");
                up_alert_sub_topic.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_sub_topic").focus();
            }
            if (up_sub_item_details.length <= 0) {
                let up_alert_Sub_Topic_Details = document.getElementById("up_alert_Sub_Topic_Details");
                up_alert_Sub_Topic_Details.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_sub_item_details").focus();
            }
            if (up_check_error == 0) {
                Update_ManageSub_topicOneSelf();
            }
        });

        $('#up_main_topic').change(function() {
            let up_alert_main_topic = document.getElementById("up_alert_main_topic");
            up_alert_main_topic.style.display = "none";
        });
        $('#up_sub_topic').on('input', function() {
            let up_alert_sub_topic = document.getElementById("up_alert_sub_topic");
            up_alert_sub_topic.style.display = "none";
        });
        $('#up_sub_topic').on('input', function() {
            if ($(this).val() == "") {
                let up_alert_Due_Sub_Topic = document.getElementById("up_alert_Due_Sub_Topic");
                up_alert_Due_Sub_Topic.style.display = "none";
            }
        });
        $('#up_sub_item_details').on('input', function() {
            let up_alert_Sub_Topic_Details = document.getElementById("up_alert_Sub_Topic_Details");
            up_alert_Sub_Topic_Details.style.display = "none";
        });
        ///////////
        $('#main_topic').change(function() {
            let alert_main_topic = document.getElementById("alert_main_topic");
            alert_main_topic.style.display = "none";
        });
        $('#sub_topic').on('input', function() {
            let alert_sub_topic = document.getElementById("alert_sub_topic");
            alert_sub_topic.style.display = "none";
        });
        $('#sub_topic').on('input', function() {
            if ($(this).val() == "") {
                let alert_Due_Sub_Topic = document.getElementById("alert_Due_Sub_Topic");
                alert_Due_Sub_Topic.style.display = "none";
            }
        });
        $('#sub_item_details').on('input', function() {
            let alert_Sub_Topic_Details = document.getElementById("alert_Sub_Topic_Details");
            alert_Sub_Topic_Details.style.display = "none";
        });
        $('#status').change(function() {
            let alert_status = document.getElementById("alert_status");
            alert_status.style.display = "none";
        });

        $('#btn_copy').click(function() {
            let year_from = document.getElementById("year_from").value;
            let year_to = document.getElementById("year_to").value;

            if (year_from == year_to) {
                let alert_copy = document.getElementById("alert_copy");
                alert_copy.style.display = "block";
            } else {
                $.ajax({
                    url: "<?php echo base_url('index.php/manage_Self_Evaluation/Copy_Sub_topicOneSelf_ajax') ?>",
                    dataType: "json",
                    type: "POST",
                    data: {
                        year_from: year_from,
                        year_to: year_to
                    },
                    success: function(data) {
                        Swal.fire({
                            title: "Copied successfully",
                            text: "",
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            customClass: {
                                title: 'custom-title-class'
                            }
                        }).then(function() {
                            window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicOneSelf'); ?>';
                        });
                    }
                });
            }
        });

        $('#year_from').change(function() {
            let alert_copy = document.getElementById("alert_copy");
            alert_copy.style.display = "none";
        });
        $('#year_to').change(function() {
            let alert_copy = document.getElementById("alert_copy");
            alert_copy.style.display = "none";
        });
    });

    function Submit_ManageSub_topicOneSelf() {
        let main_topic = document.getElementById("main_topic").value;
        let sub_topic = document.getElementById("sub_topic").value;
        let sub_item_details = document.getElementById("sub_item_details").value;
        let year = document.getElementById("year").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Submit_ManageSub_topicOneSelf_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                main_topic: main_topic,
                sub_topic: sub_topic,
                sub_item_details: sub_item_details,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicOneSelf'); ?>';
                });
            },
            error: function(data) {
                let alert_Due_Sub_Topic = document.getElementById("alert_Due_Sub_Topic");
                alert_Due_Sub_Topic.style.display = "block";
                document.getElementById("sub_topic").focus();
            }
        });
    }

    function Update_ManageSub_topicOneSelf() {
        let up_id = document.getElementById("up_id").value;
        let up_main_topic = document.getElementById("up_main_topic").value;
        let up_sub_topic = document.getElementById("up_sub_topic").value;
        let up_sub_item_details = document.getElementById("up_sub_item_details").value;
        let up_year = document.getElementById("up_year").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Update_ManageSub_topicOneSelf_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_main_topic: up_main_topic,
                up_sub_topic: up_sub_topic,
                up_sub_item_details: up_sub_item_details,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicOneSelf'); ?>';
                });
            },
            error: function(data) {
                let up_alert_Due_Sub_Topic = document.getElementById("up_alert_Due_Sub_Topic");
                up_alert_Due_Sub_Topic.style.display = "block";
                document.getElementById("up_sub_topic").focus();
            }
        });
    }

    function Search_Subtopics_Main_Topic() {
        let s_main_topic = document.getElementById("s_main_topic").value;
        let s_sub_topic = document.getElementById("s_sub_topic").value;
        let s_sub_topic_details = document.getElementById("s_sub_topic_details").value;
        let s_year = document.getElementById("s_year").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_main_topic=" + encodeURIComponent(s_main_topic) + "&s_sub_topic=" + encodeURIComponent(s_sub_topic) +
            "&s_sub_topic_details=" + encodeURIComponent(s_sub_topic_details) + "&s_year=" + encodeURIComponent(s_year) + "&s_status=" + encodeURIComponent(s_status);
    }

    function Clear_Search_Subtopics_Main_Topic() {
        window.location = "<?php echo base_url('index.php/manage_Self_Evaluation/ManageSubtopicOneSelf'); ?>"
    }
</script>