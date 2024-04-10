<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let check_error = 0;
            let main_topic = document.getElementById("main_topic").value;
            let sub_topic = document.getElementById("sub_topic").value;
            let item_option = document.getElementById("item_option").value;
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
            if (item_option.length <= 0) {
                let alert_item_option = document.getElementById("alert_item_option");
                alert_item_option.style.display = "block";
                check_error = 1;
                document.getElementById("item_option").focus();
            }
            if (status.length <= 0) {
                let alert_status = document.getElementById("alert_status");
                alert_status.style.display = "block";
                check_error = 1;
                document.getElementById("status").focus();
            }
            if (check_error == 0) {
                Submit_item_option();
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
        $('#item_option').on('input', function() {
            let alert_item_option = document.getElementById("alert_item_option");
            alert_item_option.style.display = "none";
        });
        $('#up_item_option').on('input', function() {
            let alert_item_option = document.getElementById("alert_item_option");
            alert_item_option.style.display = "none";
        });
        $('#status').change(function() {
            let alert_status = document.getElementById("alert_status");
            alert_status.style.display = "none";
        });

        $('#update').click(function() {
            let up_check_error = 0;
            let up_main_topic = document.getElementById("up_main_topic").value;
            let up_sub_topic = document.getElementById("up_sub_topic").value;
            let up_item_option = document.getElementById("up_item_option").value;

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
            if (up_item_option.length <= 0) {
                let alert_item_option = document.getElementById("alert_item_option");
                alert_item_option.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_item_option").focus();
            }
            if (up_check_error == 0) {
                Update_item_option();
            }
        });

        $('#btn_copy').click(function() {
            let year_from = document.getElementById("year_from").value;
            let year_to = document.getElementById("year_to").value;

            if (year_from == year_to) {
                let alert_copy = document.getElementById("alert_copy");
                alert_copy.style.display = "block";
            } else {
                $.ajax({
                    url: "<?php echo base_url('index.php/manage_Self_Evaluation/copy_Item_Option_ajax') ?>",
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
                            window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOption'); ?>';
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

    function Submit_item_option() {
        let main_topic = document.getElementById("main_topic").value;
        let sub_topic = document.getElementById("sub_topic").value;
        let item_option = document.getElementById("item_option").value;
        let year = document.getElementById("year").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Submit_item_option_ajax'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                main_topic: main_topic,
                sub_topic: sub_topic,
                item_option: item_option,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOption'); ?>';
                });
            }
        });
    }

    function Update_item_option() {
        let up_id = document.getElementById("up_id").value;
        let up_main_topic = document.getElementById("up_main_topic").value;
        let up_sub_topic = document.getElementById("up_sub_topic").value;
        let up_item_option = document.getElementById("up_item_option").value;
        let up_year = document.getElementById("up_year").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Update_item_option_ajax'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_main_topic: up_main_topic,
                up_sub_topic: up_sub_topic,
                up_item_option: up_item_option,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOption'); ?>';
                });
            }
        });
    }

    function Search_Item_Option() {
        let s_main_topic = document.getElementById("s_main_topic").value;
        let s_sub_topic = document.getElementById("s_sub_topic").value;
        let s_item_option = document.getElementById("s_item_option").value;
        let s_year = document.getElementById("s_year").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_main_topic=" + encodeURIComponent(s_main_topic) + "&s_sub_topic=" + encodeURIComponent(s_sub_topic) + "&s_item_option=" + encodeURIComponent(s_item_option) + "&s_year=" + encodeURIComponent(s_year) + "&s_status=" + encodeURIComponent(s_status);
    }

    function Clear_Search_Item_Option() {
        window.location = "<?php echo base_url('index.php/manage_Self_Evaluation/ManageItemOption') ?>";
    }
</script>