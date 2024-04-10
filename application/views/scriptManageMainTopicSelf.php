<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let check_error = 0;
            let main_topic = document.getElementById("main_topic").value;
            let topic = document.getElementById("topic").value;
            let status = document.getElementById("status").value;
            if (main_topic.length <= 0) {
                let alert_main_topic = document.getElementById("alert_main_topic");
                alert_main_topic.style.display = "block";
                check_error = 1;
                document.getElementById("main_topic").focus();
            }
            if (topic.length <= 0) {
                let alert_topic = document.getElementById("alert_topic");
                alert_topic.style.display = "block";
                check_error = 1;
                document.getElementById("topic").focus();
            }
            if (status.length <= 0) {
                let alert_status = document.getElementById("alert_status");
                alert_status.style.display = "block";
                check_error = 1;
                document.getElementById("status").focus();
            }
            if (check_error == 0) {
                Submit_Main_Topic();
            }
        });

        $('#update').click(function() {
            let up_check_error = 0;
            let up_main_topic = document.getElementById("up_main_topic").value;
            let up_topic = document.getElementById("up_topic").value;
            if (up_main_topic.length <= 0) {
                let up_alert_main_topic = document.getElementById("up_alert_main_topic");
                up_alert_main_topic.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_main_topic").focus();
            }
            if (up_topic.length <= 0) {
                let up_alert_topic = document.getElementById("up_alert_topic");
                up_alert_topic.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_topic").focus();
            }
            if (up_check_error == 0) {
                Update_Main_Topic();
            }
        });

        $('#main_topic').on('input', function() {
            let alert_main_topic = document.getElementById("alert_main_topic");
            alert_main_topic.style.display = "none";
        });
        $('#main_topic').on('input', function() {
            if ($(this).val() === "") {
                let alert_due_main_topic = document.getElementById("alert_due_main_topic");
                alert_due_main_topic.style.display = "none";
            }
        });
        $('#topic').on('input', function() {
            let alert_topic = document.getElementById("alert_topic");
            alert_topic.style.display = "none";
        });
        $('#status').change(function() {
            let alert_status = document.getElementById("alert_status");
            alert_status.style.display = "none";
        });
        $('#up_main_topic').on('input', function() {
            let up_alert_main_topic = document.getElementById("up_alert_main_topic");
            up_alert_main_topic.style.display = "none";
        });
        $('#up_main_topic').on('input', function() {
            if ($(this).val() === "") {
                let up_alert_due_main_topic = document.getElementById("up_alert_due_main_topic");
                up_alert_due_main_topic.style.display = "none";
            }
        });
        $('#up_topic').on('input', function() {
            let up_alert_topic = document.getElementById("up_alert_topic");
            up_alert_topic.style.display = "none";
        });

        $('#btn_copy').click(function() {
            let year_from = document.getElementById("year_from").value;
            let year_to = document.getElementById("year_to").value;

            if (year_from == year_to) {
                let alert_copy = document.getElementById("alert_copy");
                alert_copy.style.display = "block";
            } else {
                $.ajax({
                    url: "<?php echo base_url('index.php/manage_Self_Evaluation/copy_Main_Topic_ajax') ?>",
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
                            window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageMainTopicSelf'); ?>';
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

    function Submit_Main_Topic() {
        let main_topic = document.getElementById("main_topic").value;
        let topic = document.getElementById("topic").value;
        let year = document.getElementById("year").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Submit_Main_Topic_ajax'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                main_topic: main_topic,
                topic: topic,
                year: year,
                status: status
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageMainTopicSelf'); ?>';
                });
            },
            error: function(data) {
                let alert_due_main_topic = document.getElementById("alert_due_main_topic");
                alert_due_main_topic.style.display = "block";
                document.getElementById("main_topic").focus();
            }
        });
    }

    function Update_Main_Topic() {
        let up_id = document.getElementById("up_id").value;
        let up_main_topic = document.getElementById("up_main_topic").value;
        let up_topic = document.getElementById("up_topic").value;
        let up_year = document.getElementById("up_year").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Update_Main_Topic_ajax'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_main_topic: up_main_topic,
                up_topic: up_topic,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageMainTopicSelf'); ?>';
                });
            },
            error: function(data) {
                let up_alert_due_main_topic = document.getElementById("up_alert_due_main_topic");
                up_alert_due_main_topic.style.display = "block";
                document.getElementById("up_main_topic").focus();
            }
        });
    }

    function Search_Main_Topic() {
        let s_main_topic = document.getElementById("s_main_topic").value;
        let s_topic = document.getElementById("s_topic").value;
        let s_year = document.getElementById("s_year").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_main_topic=" + encodeURIComponent(s_main_topic) + "&s_topic=" + encodeURIComponent(s_topic) + "&s_year=" + encodeURIComponent(s_year) + "&s_status=" + encodeURIComponent(s_status);
    }

    function Clear_Search_Main_Topic() {
        window.location = "<?php echo base_url('index.php/manage_Self_Evaluation/ManageMainTopicSelf'); ?>";
    }
</script>