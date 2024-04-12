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
            let up_id = document.getElementById("up_id").value;
            let date_from = document.getElementById("date_from").value;
            let date_to = document.getElementById("date_to").value;
            let status = document.getElementById("status").value;
            let year = document.getElementById("year").value;

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
        });
    });
</script>