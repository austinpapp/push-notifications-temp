$(function(){
    $('#poll_question_question_reportRecipientGroup').change(function(){
        $('#poll_question_question_reportRecipient').prop('selectedIndex', 0);
    });
    
    $('#poll_question_question_reportRecipient').change(function(){
        $('#poll_question_question_reportRecipientGroup').prop('selectedIndex', 0);
    });
});