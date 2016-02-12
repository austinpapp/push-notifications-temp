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
        $('#editable-options-list tbody').append($('#option-row-tpl').html().replace(/__name__/g, optionIndex++));
        checkIsListEmpty();
        recalculateIndexNumbers();
    });

    $('.is-user-amount').each(function () {
      var $el = $(this).parents('tr').find('.payment-amount').parents('.control-group');
      $(this).is(':checked') ? $el.hide() : $el.show();
    });

    $('#editable-options-list').on('change', '.is-user-amount', function () {
      var $el = $(this).parents('tr').find('.payment-amount').parents('.control-group');
      $(this).is(':checked') ? $el.hide() : $el.show();
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
        });
    }
    
});

$(function () {
  var el = $('#payment_request_paymentRequest_isCrowdfunding');
  var optionsEl = $('#crowdfunding-options');
  optionsEl[el.is(':checked') ? 'show' : 'hide']();
  el.change(function () {
    optionsEl[el.is(':checked') ? 'show' : 'hide']();
  })
});

$(document).ready(function() {
    
    var template = $('#educational-item-row-tpl').text();
    var $itemsEl = $('#educational-context-items');
    var $btnEl = $('#educational-add-btn');


    var checkCount = function () {
        $itemsEl.find('tr').length >= 3 ? $btnEl.hide(): $btnEl.show();
    }

    checkCount();

    $('#add-educational-text, #add-educational-image, #add-educational-video').click(function() {
        var listId = $itemsEl.find('tr').length;
        var $child = $('<tr></tr>').html(template.replace(/__name__/g, listId));
        $child.find('label').remove();
        $child.find('.controls .control-group').hide();
        $child.find($(this).data('control')).closest('.control-group').show();
        $itemsEl.append($child);
        checkCount();
        return false;
    });

    $itemsEl.delegate('.remove-educational-item', 'click', function() {
        $(this).parent().parent().remove();
        checkCount();
        return false;
    });
    

});