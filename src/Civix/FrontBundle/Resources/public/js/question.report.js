$(function(){
    $('.btn-primary').click('click', function(e) {
        $(this).parents('table').find('tr:gt(5)').show();
        $(this).parents('tr').hide();

        return false;
    });
});