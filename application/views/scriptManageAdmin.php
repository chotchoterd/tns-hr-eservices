<script type="text/javascript">
    $(document).ready(function() {
        $('#add_hr').click(function() {
            let check_error = 0;
            let emp_id = document.getElementById("emp_id").value;
            let status = document.getElementById("status").value;
            if (emp_id.length <= 0) {
                let alert_emp_id = document.getElementById("alert_emp_id");
                alert_emp_id.style.display = "block";
                check_error = 1;
                document.getElementById("emp_id").focus();
            }
            if (status.length <= 0) {
                let alert_status = document.getElementById("alert_status");
                alert_status.style.display = "block";
                check_error = 1;
                document.getElementById("alert_status").focus();
            }
            if (check_error == 0) {
                Add_hr();
            }
        });

        $('#update_hr').click(function() {
            let up_check_error = 0;
            let up_emp_id = document.getElementById("up_emp_id").value;
            if (up_emp_id.length <= 0) {
                let up_alert_emp_id = document.getElementById("up_alert_emp_id");
                up_alert_emp_id.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_emp_id").focus();
            }
            if (up_check_error == 0) {
                Update_hr();
            }
        });

        $("#emp_id").on("input", function() {
            let alert_emp_id = document.getElementById("alert_emp_id");
            alert_emp_id.style.display = "none";
        });
        $("#emp_id").on("input", function() {
            if ($(this).val() === "") {
                let alert_update_unsuccessfully = document.getElementById("alert_update_unsuccessfully");
                alert_update_unsuccessfully.style.display = "none";
            }
        });
        $("#status").change(function() {
            let alert_status = document.getElementById("alert_status");
            alert_status.style.display = "none";
        });
        $("#up_emp_id").on("input", function() {
            let up_alert_emp_id = document.getElementById("up_alert_emp_id");
            up_alert_emp_id.style.display = "none";
        });
        $("#up_emp_id").on("input", function() {
            if ($(this).val() === "") {
                let up_alert_update_unsuccessfully = document.getElementById("up_alert_update_unsuccessfully");
                up_alert_update_unsuccessfully.style.display = "none";
            }
        });
    });

    function Add_hr() {
        let emp_id = document.getElementById("emp_id").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/hr_controller/Add_hr_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                emp_id: emp_id,
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
                    window.location = '<?php echo base_url('index.php/hr_controller/ManageAdmin'); ?>';
                });
            },
            error: function(data) {
                let alert_update_unsuccessfully = document.getElementById("alert_update_unsuccessfully");
                alert_update_unsuccessfully.style.display = "block";
            }
        });
    }

    function Update_hr() {
        let up_id = document.getElementById("up_id").value;
        let up_emp_id = document.getElementById("up_emp_id").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/hr_controller/Update_hr_ajax') ?>",
            type: "POST",
            dataType: "json",
            data: {
                up_id: up_id,
                up_emp_id: up_emp_id,
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
                    window.location = '<?php echo base_url('index.php/hr_controller/ManageAdmin'); ?>';
                });
            },
            error: function(data) {
                let up_alert_update_unsuccessfully = document.getElementById("up_alert_update_unsuccessfully");
                up_alert_update_unsuccessfully.style.display = "block";
            }
        });
    }

    function Search_Admin() {
        let s_emp_id = document.getElementById("s_emp_id").value;
        let s_emp_name = document.getElementById("s_emp_name").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_emp_id=" + encodeURIComponent(s_emp_id) + "&s_emp_name=" + encodeURIComponent(s_emp_name) + "&s_status=" + encodeURIComponent(s_status)
    }

    function Clear_Search_Admin() {
        window.location = "<?php echo base_url('index.php/hr_controller/ManageAdmin') ?>"
    }
</script>