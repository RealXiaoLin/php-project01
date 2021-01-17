$(function () {
  $answered_choice = $('input:radio[name="answer"]:checked').val();
  $question_id = $('.question-id').val();
  $('.answer-btn').on('click', function () {
    $.ajax({
      type: "PUT",
      url: "/workbook",
      data: { answered_choice : $answered_choice, question_id: $question_id },
    });
  });
});
