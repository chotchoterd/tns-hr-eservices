<script type="text/javascript">
    $(document).ready(function() {
        let quality_of_work = 0;
        let job_responsibility = 0;
        let cooperation = 0;
        let teamwork = 0;
        let job_knowledge = 0;
        let technical_skill = 0;

        $('input[name="quality_of_work[]"]').change(function() {
            quality_of_work = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="job_responsibility[]"]').change(function() {
            job_responsibility = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="cooperation[]"]').change(function() {
            cooperation = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="teamwork[]"]').change(function() {
            teamwork = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="job_knowledge[]"]').change(function() {
            job_knowledge = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });
        $('input[name="technical_skill[]"]').change(function() {
            technical_skill = parseFloat($(this).val()) || 0;
            updateAssessmentScore();
        });

        function updateAssessmentScore() {
            let total = quality_of_work + job_responsibility + cooperation + teamwork + job_knowledge + technical_skill;
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