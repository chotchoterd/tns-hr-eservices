<script type="text/javascript">
    $(document).ready(function() {
        $('#s_date').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true
        });
    });

    function Search_AssessmentRecord() {
        let s_date = document.getElementById("s_date").value;
        let s_year = document.getElementById("s_year").value;
        let s_emp_id = document.getElementById("s_emp_id").value;
        let s_emp_name = document.getElementById("s_emp_name").value;
        let s_status = document.getElementById("s_status").value;

        window.location = "?s_date=" + encodeURIComponent(s_date) + "&s_year=" + encodeURIComponent(s_year) + "&s_emp_id=" + encodeURIComponent(s_emp_id) +
            "&s_emp_name=" + encodeURIComponent(s_emp_name) + "&s_status=" + encodeURIComponent(s_status)
    }

    function Clear_Search_AssessmentRecord() {
        window.location = "<?php echo base_url('index.php/bonus_controller/TableAssessmentRecord') ?>"
    }
</script>