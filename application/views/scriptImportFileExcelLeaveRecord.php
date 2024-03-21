<script type="text/javascript">
    $(document).ready(function() {
        let import_leave = document.getElementById("import_leave");
        import_leave.addEventListener("click", function() {
            let file_leave = document.getElementById("file_leave").value;
            if (file_leave.length <= 0) {
                let alert_file_excel = document.getElementById("alert_file_excel");
                alert_file_excel.style.display = "block";
            }
        });

        let file_leave = document.getElementById("file_leave");
        file_leave.addEventListener("input", function() {
            let alert_file_excel = document.getElementById("alert_file_excel");
            alert_file_excel.style.display = "none";
        });

        $('#import_form_leave_record').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('index.php/import_file_controller/import_leave_record') ?>",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: "Upload successfully",
                        text: "",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        customClass: {
                            title: 'custom-title-class'
                        }
                    }).then(function() {
                        window.location = '<?php echo base_url(); ?>index.php/hr_controller/ImportFileExcelLeaveRecord';
                    });
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + error);
                }
            });
        });
    });

    function Search_Leave_Record() {
        let s_emp_id = document.getElementById("s_emp_id").value;
        let s_year = document.getElementById("s_year").value;
        let s_business_leave = document.getElementById("s_business_leave").value;
        let s_sick_leave = document.getElementById("s_sick_leave").value;
        let s_absenteeism = document.getElementById("s_absenteeism").value;
        let s_late = document.getElementById("s_late").value;

        window.location = '?s_emp_id=' + encodeURIComponent(s_emp_id) + '&s_year=' + encodeURIComponent(s_year) + '&s_business_leave=' + encodeURIComponent(s_business_leave) +
            '&s_sick_leave=' + encodeURIComponent(s_sick_leave) + '&s_absenteeism=' + encodeURIComponent(s_absenteeism) + '&s_late=' + encodeURIComponent(s_late);
    }

    function Clear_Search_Leave_Record() {
        window.location = "<?php echo base_url('index.php/hr_controller/ImportFileExcelLeaveRecord'); ?>"
    }
</script>