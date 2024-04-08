<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let check_error = 0;
            let main_topic = document.getElementById("main_topic").value;
            let sub_topic = document.getElementById("sub_topic").value;
            let sub_in_sub = document.getElementById("sub_in_sub").value;
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
            if (sub_in_sub.length <= 0) {
                let alert_sub_in_sub = document.getElementById("alert_sub_in_sub");
                alert_sub_in_sub.style.display = "block";
                check_error = 1;
                document.getElementById("sub_in_sub").focus();
            }
            if (status.length <= 0) {
                let alert_status = document.getElementById("alert_status");
                alert_status.style.display = "block";
                check_error = 1;
                document.getElementById("status").focus();
            }
            if (check_error == 0) {
                Submit_Item_Option_is_Subtopic();
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
        $('#sub_in_sub').change(function() {
            let alert_sub_in_sub = document.getElementById("alert_sub_in_sub");
            alert_sub_in_sub.style.display = "none";
        });
        $('#up_sub_in_sub').change(function() {
            let alert_sub_in_sub = document.getElementById("alert_sub_in_sub");
            alert_sub_in_sub.style.display = "none";
        });
        $('#status').change(function() {
            let alert_status = document.getElementById("alert_status");
            alert_status.style.display = "none";
        });

        $('#update').click(function() {
            let up_check_error = 0;
            let up_main_topic = document.getElementById("up_main_topic").value;
            let up_sub_topic = document.getElementById("up_sub_topic").value;
            let up_sub_in_sub = document.getElementById("up_sub_in_sub").value;

            if (up_main_topic.length <= 0) {
                let alert_main_topic = document.getElementById("alert_main_topic");
                alert_main_topic.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_main_topic").focus();
            }
            if (up_sub_topic.length <= 0) {
                let alert_sub_topic = document.getElementById("alert_sub_topic");
                alert_sub_topic.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_sub_topic").focus();
            }
            if (up_sub_in_sub.length <= 0) {
                let alert_sub_in_sub = document.getElementById("alert_sub_in_sub");
                alert_sub_in_sub.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_sub_in_sub").focus();
            }
            if (up_check_error == 0) {
                Update_Item_Option_is_Subtopic();
            }
        });
    });

    function Submit_Item_Option_is_Subtopic() {
        let main_topic = document.getElementById("main_topic").value;
        let sub_topic = document.getElementById("sub_topic").value;
        let sub_in_sub = document.getElementById("sub_in_sub").value;
        let sub_in_sub_details = document.getElementById("sub_in_sub_details").value;
        let division = document.getElementById("division").value;
        let sub_division = document.getElementById("sub_division").value;
        let year = document.getElementById("year").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Submit_Item_Option_is_Subtopic_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                main_topic: main_topic,
                sub_topic: sub_topic,
                sub_in_sub: sub_in_sub,
                sub_in_sub_details: sub_in_sub_details,
                division: division,
                sub_division: sub_division,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOptionIsSubtopic'); ?>';
                });
            }
        });
    }

    function Update_Item_Option_is_Subtopic() {
        let up_id = document.getElementById("up_id").value;
        let up_main_topic = document.getElementById("up_main_topic").value;
        let up_sub_topic = document.getElementById("up_sub_topic").value;
        let up_sub_in_sub = document.getElementById("up_sub_in_sub").value;
        let up_sub_in_sub_details = document.getElementById("up_sub_in_sub_details").value;
        let up_division = document.getElementById("up_division").value;
        let up_sub_division = document.getElementById("up_sub_division").value;
        let up_year = document.getElementById("up_year").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Update_Item_Option_is_Subtopic_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_main_topic: up_main_topic,
                up_sub_topic: up_sub_topic,
                up_sub_in_sub: up_sub_in_sub,
                up_sub_in_sub_details: up_sub_in_sub_details,
                up_division: up_division,
                up_sub_division: up_sub_division,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOptionIsSubtopic'); ?>';
                });
            }
        });
    }

    function Search_Item_Option_Subtopic() {
        let s_main_topic = document.getElementById("s_main_topic").value;
        let s_sub_topic = document.getElementById("s_sub_topic").value;
        let s_sub_in_sub = document.getElementById("s_sub_in_sub").value;
        let s_sub_in_sub_details = document.getElementById("s_sub_in_sub_details").value;
        let s_division = document.getElementById("s_division").value;
        let s_sub_division = document.getElementById("s_sub_division").value;
        let s_year = document.getElementById("s_year").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_main_topic=" + encodeURIComponent(s_main_topic) + "&s_sub_topic=" + encodeURIComponent(s_sub_topic) + "&s_sub_in_sub=" + encodeURIComponent(s_sub_in_sub) +
        "&s_sub_in_sub_details=" + encodeURIComponent(s_sub_in_sub_details) + "&s_division=" + encodeURIComponent(s_division) + "&s_sub_division=" + encodeURIComponent(s_sub_division) +
        "&s_year=" + encodeURIComponent(s_year) + "&s_status=" + encodeURIComponent(s_status)
    }

    function Clear_Search_Item_Option_Subtopic() {
        window.location = "<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOptionIsSubtopic') ?>";
    }
</script>