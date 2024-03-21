<script type="text/javascript">
    $(document).ready(function() {
        // $('#s_emp_hired_date').datepicker({
        //     format: 'dd/mm/yyyy',
        //     autoclose: true
        // });

        $('#import').click(function() {
            let check_error = 0;
            let file = document.getElementById('file').value;
            if (file.length <= 0) {
                let alert_file_excel = document.getElementById("alert_file_excel");
                alert_file_excel.style.display = "block";
                document.getElementById("alert_file_excel").focus();
                check_error = 1;
            }
        });

        $('#file').on('input', function() {
            let alert_file_excel = document.getElementById("alert_file_excel");
            let alert_file_excel_fields = document.getElementById("alert_file_excel_fields");
            alert_file_excel.style.display = "none";
            alert_file_excel_fields.style.display = "none";
        });

        $('#import_form').on('submit', function(event) {
            event.preventDefault();
            $.ajax({
                url: "<?php echo base_url('index.php/import_file_controller/import_emp') ?>",
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
                        window.location = '<?php echo base_url(); ?>index.php/hr_controller/ImportFileExcelEMP';
                    });
                },
                error: function(data) {
                    let alert_file_excel_fields = document.getElementById("alert_file_excel_fields");
                    alert_file_excel_fields.style.display = "block";
                }
            });
        });
    });

    function Search_Employee() {
        let s_emp_id = document.getElementById("s_emp_id").value;
        let s_emp_name = document.getElementById("s_emp_name").value;
        let s_emp_grade = document.getElementById("s_emp_grade").value;
        let s_status = document.getElementById("s_status").value;
        let s_emp_section = document.getElementById("s_emp_section").value;
        let s_emp_division = document.getElementById("s_emp_division").value;
        let s_superior_name = document.getElementById("s_superior_name").value;
        let s_superior_grade = document.getElementById("s_superior_grade").value;

        window.location = '?s_emp_id=' + encodeURIComponent(s_emp_id) + '&s_emp_name=' + encodeURIComponent(s_emp_name) + '&s_emp_grade=' + encodeURIComponent(s_emp_grade) +
            '&s_status=' + encodeURIComponent(s_status) + '&s_emp_section=' + encodeURIComponent(s_emp_section) + '&s_emp_division=' + encodeURIComponent(s_emp_division) +
            '&s_superior_name=' + encodeURIComponent(s_superior_name) + '&s_superior_grade=' + encodeURIComponent(s_superior_grade);
    }

    function Clear_Search_Employee() {
        window.location = "<?php echo base_url('index.php/hr_controller/ImportFileExcelEMP') ?>";
    }
</script>