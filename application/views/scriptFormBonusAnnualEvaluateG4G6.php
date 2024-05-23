<script type="text/javascript">
    $(document).ready(function() {
        let qualityOfWorkValue = 0;
        let jobResponsibilityValue = 0;
        let cooperation = 0;
        let communication = 0;
        let teamwork = 0;
        let technical_capability = 0;
        let potential = 0;
        let effectiveness = 0;
        let adaptability = 0;
        let creative = 0;

        $('input[name="quality_of_work[]"]').change(function() {
            qualityOfWorkValue = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="job_responsibility[]"]').change(function() {
            jobResponsibilityValue = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="cooperation[]"]').change(function() {
            cooperation = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="communication[]"]').change(function() {
            communication = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="teamwork[]"]').change(function() {
            teamwork = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="technical_capability[]"]').change(function() {
            technical_capability = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="potential[]"]').change(function() {
            potential = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="effectiveness[]"]').change(function() {
            effectiveness = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="adaptability[]"]').change(function() {
            adaptability = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        $('input[name="creative[]"]').change(function() {
            creative = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        function updateAssessmentScore(e) {
            let total = qualityOfWorkValue + jobResponsibilityValue + cooperation + communication + teamwork + technical_capability + potential + effectiveness + adaptability + creative;
            let leave_score_h = parseFloat($('#leave_score_h').val());
            let sum_score = leave_score_h + total;

            $('#assessment_score').html(total);
            $('#assessment_score_h').val(total);
            $('#leave_record_score').html(leave_score_h);
            $('#total_score').html(sum_score);
            $('#total_score_h').val(sum_score);

            $('#grade_a').prop('checked', false);
            $('#grade_b').prop('checked', false);
            $('#grade_c').prop('checked', false);
            $('#grade_d').prop('checked', false);

            if (sum_score >= 91) {
                $('#grade_a').prop('checked', true);
            } else if (sum_score >= 73) {
                $('#grade_b').prop('checked', true);
            } else if (sum_score >= 56) {
                $('#grade_c').prop('checked', true);
            } else {
                $('#grade_d').prop('checked', true);
            }

            if (sum_score > 91) {
                $('#final_rating').html('<b style="font-size: 40px">A</b>');
            } else if (sum_score >= 73) {
                $('#final_rating').html('<b style="font-size: 40px">B</b>');
            } else if (sum_score >= 56) {
                $('#final_rating').html('<b style="font-size: 40px">C</b>');
            } else {
                $('#final_rating').html('<b style="font-size: 40px">D</b>');
            }
        }
    });
</script>