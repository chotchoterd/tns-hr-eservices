    <script type="text/javascript">
        $(document).ready(function() {
            $('#submit').click(function() {
                let check_error = 0;
                let evaluation_Item_en = document.getElementById("evaluation_Item_en").value;
                let evaluation_Item_th = document.getElementById("evaluation_Item_th").value;
                let status = document.getElementById("status").value;

                if (evaluation_Item_en.length <= 0) {
                    let alert_evaluation_Item_en = document.getElementById("alert_evaluation_Item_en");
                    alert_evaluation_Item_en.style.display = "block";
                    document.getElementById("evaluation_Item_en").focus();
                    check_error = 1;
                }
                if (evaluation_Item_th.length <= 0) {
                    let alert_evaluation_Item_th = document.getElementById("alert_evaluation_Item_th");
                    alert_evaluation_Item_th.style.display = "block";
                    document.getElementById("evaluation_Item_th").focus();
                    check_error = 1;
                }
                if (status.length <= 0) {
                    let alert_status = document.getElementById("alert_status");
                    alert_status.style.display = "block";
                    document.getElementById("status").focus();
                    check_error = 1;
                }
                if (check_error == 0) {
                    submit_evaluation_ItemG4G6();
                }
            });

            $('#update').click(function() {
                let up_check_error = 0;
                let up_evaluation_Item_en = document.getElementById("up_evaluation_Item_en").value;
                let up_evaluation_Item_th = document.getElementById("up_evaluation_Item_th").value;

                if (up_evaluation_Item_en.length <= 0) {
                    let alert_evaluation_Item_en = document.getElementById("alert_evaluation_Item_en");
                    alert_evaluation_Item_en.style.display = "block";
                    document.getElementById("up_evaluation_Item_en").focus();
                    up_check_error = 1;
                }
                if (up_evaluation_Item_th.length <= 0) {
                    let alert_evaluation_Item_th = document.getElementById("alert_evaluation_Item_th");
                    alert_evaluation_Item_th.style.display = "block";
                    document.getElementById("up_evaluation_Item_th").focus();
                    up_check_error = 1;
                }
                if (up_check_error == 0) {
                    update_evaluation_ItemG4G6();
                }
            });

            $('#evaluation_Item_en').on('input', function() {
                let alert_evaluation_Item_en = document.getElementById("alert_evaluation_Item_en");
                alert_evaluation_Item_en.style.display = "none";
            });
            $('#up_evaluation_Item_en').on('input', function() {
                let alert_evaluation_Item_en = document.getElementById("alert_evaluation_Item_en");
                alert_evaluation_Item_en.style.display = "none";
            });
            $('#evaluation_Item_th').on('input', function() {
                let alert_evaluation_Item_th = document.getElementById("alert_evaluation_Item_th");
                alert_evaluation_Item_th.style.display = "none";
            });
            $('#up_evaluation_Item_th').on('input', function() {
                let alert_evaluation_Item_th = document.getElementById("alert_evaluation_Item_th");
                alert_evaluation_Item_th.style.display = "none";
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
                        url: "<?php echo base_url('index.php/manage_Self_Evaluation/Copy_evaluation_ItemG4G6') ?>",
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
                                window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageEvaluateG4G6'); ?>';
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

        function submit_evaluation_ItemG4G6() {
            let year = document.getElementById("year").value;
            let evaluation_Item_en = document.getElementById("evaluation_Item_en").value;
            let evaluation_Item_th = document.getElementById("evaluation_Item_th").value;
            let status = document.getElementById("status").value;

            $.ajax({
                url: "<?php echo base_url('index.php/manage_Self_Evaluation/submit_evaluation_ItemG4G6_ajax') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    year: year,
                    evaluation_Item_en: evaluation_Item_en,
                    evaluation_Item_th: evaluation_Item_th,
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
                        window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageEvaluateG4G6'); ?>';
                    });
                }
            });
        }

        function update_evaluation_ItemG4G6() {
            let up_id = document.getElementById("up_id").value;
            let up_year = document.getElementById("up_year").value;
            let up_evaluation_Item_en = document.getElementById("up_evaluation_Item_en").value;
            let up_evaluation_Item_th = document.getElementById("up_evaluation_Item_th").value;
            let up_status = document.getElementById("up_status").value;

            $.ajax({
                url: "<?php echo base_url('index.php/manage_Self_Evaluation/update_evaluation_ItemG4G6_ajax') ?>",
                type: "POST",
                dataType: "json",
                data: {
                    up_id: up_id,
                    up_year: up_year,
                    up_evaluation_Item_en: up_evaluation_Item_en,
                    up_evaluation_Item_th: up_evaluation_Item_th,
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
                        window.location = '<?php echo base_url('index.php/manage_Self_Evaluation/ManageEvaluateG4G6'); ?>';
                    });
                }
            });
        }

        function search_Evaluation_Item() {
            let s_Evaluation_Item_EN = document.getElementById("s_Evaluation_Item_EN").value;
            let s_Evaluation_Item_TH = document.getElementById("s_Evaluation_Item_TH").value;
            let s_year = document.getElementById("s_year").value;
            let s_status = document.getElementById("s_status").value;

            window.location = "?s_Evaluation_Item_EN=" + encodeURIComponent(s_Evaluation_Item_EN) + "&s_Evaluation_Item_TH=" + encodeURIComponent(s_Evaluation_Item_TH) +
                "&s_year=" + encodeURIComponent(s_year) + "&s_status=" + encodeURIComponent(s_status)
        }

        function clear_search_Evaluation_Item() {
            window.location = "<?php echo base_url('index.php/manage_Self_Evaluation/ManageEvaluateG4G6') ?>";
        }
    </script>