<script type="text/javascript">
    $(document).ready(function() {
        $('#date_from').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#date_to').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#date_froms').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#date_tos').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
        $('#btn_copy').click(function() {
            let year_from = document.getElementById("year_from").value;
            let year_to = document.getElementById("year_to").value;

            if (year_from == year_to) {
                let alert_copy = document.getElementById("alert_copy");
                alert_copy.style.display = "block";
            } else {
                $.ajax({
                    url: "<?php echo base_url('index.php/manage_Self_Evaluation/Copy_All_Master_Data_ajax') ?>",
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
                            window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/Schedule'); ?>';
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

        $('#update_data').click(function() {
            let check_error = 0;
            let up_id = document.getElementById("up_id").value;
            let date_from = document.getElementById("date_from").value;
            let date_to = document.getElementById("date_to").value;
            let status = document.getElementById("status").value;
            let year = document.getElementById("year").value;

            if (date_from.length <= 0) {
                let alert_date_from = document.getElementById("alert_date_from");
                alert_date_from.style.display = "block";
                document.getElementById("date_from").focus();
                check_error = 1;
            }
            if (date_to.length <= 0) {
                let alert_date_to = document.getElementById("alert_date_to");
                alert_date_to.style.display = "block";
                document.getElementById("date_to").focus();
                check_error = 1;
            }
            if (check_error == 0) {
                $.ajax({
                    url: "<?php echo base_url('index.php/manage_Self_Evaluation/update_data_Period_Time_ajax') ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        up_id: up_id,
                        date_from: date_from,
                        date_to: date_to,
                        status: status,
                        year: year
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
                            window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/Schedule'); ?>';
                        });
                    }
                });
            }
        });

        $('#date_from').on('change', function() {
            let alert_date_from = document.getElementById("alert_date_from");
            alert_date_from.style.display = "none";
        });

        $('#date_to').on('change', function() {
            let alert_date_to = document.getElementById("alert_date_to");
            alert_date_to.style.display = "none";
        });

        $('#update_datas').click(function() {
            let check_errors = 0;
            let up_ids = document.getElementById("up_ids").value;
            let date_froms = document.getElementById("date_froms").value;
            let date_tos = document.getElementById("date_tos").value;
            let statuss = document.getElementById("statuss").value;
            let years = document.getElementById("years").value;

            if (date_froms.length <= 0) {
                let alert_date_from = document.getElementById("alert_date_from");
                alert_date_from.style.display = "block";
                document.getElementById("date_froms").focus();
                check_error = 1;
            }
            if (date_tos.length <= 0) {
                let alert_date_to = document.getElementById("alert_date_to");
                alert_date_to.style.display = "block";
                document.getElementById("date_tos").focus();
                check_error = 1;
            }
            if (check_errors == 0) {
                $.ajax({
                    url: "<?php echo base_url('index.php/manage_Self_Evaluation/update_data_Period_Time_bonus_ajax') ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        up_ids: up_ids,
                        date_froms: date_froms,
                        date_tos: date_tos,
                        statuss: statuss,
                        years: years
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
                            window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/Schedule'); ?>';
                        });
                    }
                });
            }
        });

        $('#date_froms').on('change', function() {
            let alert_date_from = document.getElementById("alert_date_from");
            alert_date_from.style.display = "none";
        });

        $('#date_tos').on('change', function() {
            let alert_date_to = document.getElementById("alert_date_to");
            alert_date_to.style.display = "none";
        });
    });
</script>