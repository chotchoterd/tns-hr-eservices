<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            let check_error = 0;
            let division = document.getElementById("division").value;
            let status = document.getElementById("status").value;

            if (division.length <= 0) {
                let alert_division = document.getElementById("alert_division");
                alert_division.style.display = "block";
                check_error = 1;
                document.getElementById("division").focus();
            }
            if (status.length <= 0) {
                let alert_status = document.getElementById("alert_status");
                alert_status.style.display = "block";
                check_error = 1;
                document.getElementById("status").focus();
            }
            if (check_error == 0) {
                Submit_division();
            }
        });

        $('#division').on('input', function() {
            let alert_division = document.getElementById("alert_division");
            alert_division.style.display = "none";
        });
        $('#up_division').on('input', function() {
            let alert_division = document.getElementById("alert_division");
            alert_division.style.display = "none";
        });
        $('#status').change(function() {
            let alert_status = document.getElementById("alert_status");
            alert_status.style.display = "none";
        });

        $('#update').click(function() {
            let up_check_error = 0;
            let up_division = document.getElementById("up_division").value;

            if (up_division.length <= 0) {
                let alert_division = document.getElementById("alert_division");
                alert_division.style.display = "block";
                up_check_error = 1;
                document.getElementById("up_division").focus();
            }
            if (up_check_error == 0) {
                Update_division();
            }
        });
    });

    function Submit_division() {
        let division = document.getElementById("division").value;
        let year = document.getElementById("year").value;
        let status = document.getElementById("status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Submit_division_ajax') ?>",
            dataType: "json",
            type: "POST",
            data: {
                division: division,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageDivision'); ?>';
                });
            }
        });
    }

    function Update_division() {
        let up_id = document.getElementById("up_id").value;
        let up_division = document.getElementById("up_division").value;
        let up_year = document.getElementById("up_year").value;
        let up_status = document.getElementById("up_status").value;

        $.ajax({
            url: "<?php echo base_url('index.php/manage_Self_Evaluation/Update_division_ajax') ?>",
            dataType: "json",
            type: "POST",
            data: {
                up_id: up_id,
                up_division: up_division,
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
                    window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageDivision'); ?>';
                });
            }
        });
    }

    function Search_division() {
        let s_division = document.getElementById("s_division").value;
        let s_year = document.getElementById("s_year").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_division=" + encodeURIComponent(s_division) + "&s_year=" + encodeURIComponent(s_year) + "&s_status=" + encodeURIComponent(s_status);
    }

    function Clear_Search_division() {
        window.location = "<?php echo base_url('index.php/manage_Self_Evaluation/ManageDivision') ?>";
    }
</script>