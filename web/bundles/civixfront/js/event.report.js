$(function(){
    $('.btn-primary').click('click', function(e) {
      console.log($(this).parent('tr'));
        $(this).parents('table').find('tr:gt(5)').show();
        $(this).parent('td').parent('tr').hide();

        return false;
    });
});