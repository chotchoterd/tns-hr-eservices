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

        $('#main_topic').change(function() {
            let alert_main_topic = document.getElementById("alert_main_topic");
            alert_main_topic.style.display = "none";
        });
        $('#sub_topic').change(function() {
            let alert_sub_topic = document.getElementById("alert_sub_topic");
            alert_sub_topic.style.display = "none";
        });
        $('#sub_in_sub').on('input', function() {
            let alert_sub_topic_in_sub_topic = document.getElementById("alert_sub_topic_in_sub_topic");
            alert_sub_topic_in_sub_topic.style.display = "none";
        });
        $('#sub_in_sub_details').on('input', function() {
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
            }
        });
    }
</script>