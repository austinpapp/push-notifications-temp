$(function(){
    var optionIndex = $('tr:not(.empty-table-message)', '#editable-options-list tbody').length;

    $('#editable-options-list').on('click', 'a.remove-option', function(e) {
        e.preventDefault();
        $(this).parents('tr').remove();
        checkIsListEmpty();
        recalculateIndexNumbers();
    });

    $('a.add-option', '#editable-options-list').on('click', function(e) {
        e.preventDefault();
        
        if (optionIndex >= 5) {
            alert('You can add max 5 fields.');
            return;
        }

        $('#editable-options-list tbody').append($('#option-row-tpl').html().replace(/__name__/g, optionIndex++));
        checkIsListEmpty();
        recalculateIndexNumbers();
    });

    function checkIsListEmpty() {
        if ($('tr:not(.empty-table-message)', '#editable-options-list tbody').length > 0) {
            $('.empty-table-message', '#editable-options-list tbody').hide();
        } else {
            $('.empty-table-message', '#editable-options-list tbody').show();
        }
    }

    function recalculateIndexNumbers() {
        $('tr:not(.empty-table-message) b', '#editable-options-list tbody').each(function(i) {
            $(this).text(i+1);
            optionIndex = $('tr:not(.empty-table-message)', '#editable-options-list tbody').length;
        });
    }
    
});