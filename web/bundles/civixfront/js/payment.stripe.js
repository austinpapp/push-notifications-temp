(function($, location, Stripe) {

  var deferred;

  $(function() {
    $('[data-open-card-from]').click(function() {
      openCardForm().then(function() {
        location.reload();
      });
    });
    $('[data-remove-card]').click(function() {
      var $el = $(this);
      $el.prop('disabled', true);
      apiAuth().then(function() {
        $.ajax({
          url: '/api-leader/cards/' + $el.data('remove-card'),
          type: 'DELETE',
          complete: function() {
            location.reload();
          }
        });
      });
    });
    $('[data-open-account-from]').click(function() {
      openAccountForm().then(function() {
        location.reload();
      });
    });
  });

  function openCardForm() {
    deferred = $.Deferred();
    $('#stripeCardForm').modal('show');

    return $.when(deferred);
  }

  function openAccountForm() {
    deferred = $.Deferred();
    $('#stripeAccountForm').modal('show');

    return $.when(deferred);
  }

  $('#stripeCardForm form').submit(function(e) {
    e.preventDefault();

    var $form = $(this);
    $form.find('.btn-primary').prop('disabled', true);

    Stripe.card.createToken({
      name: $form.find('[name=name]').val(),
      number: $form.find('[name=card-number]').val(),
      cvc: $form.find('[name=card-cvc]').val(),
      exp_month: $form.find('[name=card-expiry-month]').val(),
      exp_year: $form.find('[name=card-expiry-year]').val()
    }, function(status, response) {
      if (response.error) {
        $form.find('.text-error').text(response.error.message).show();
        $form.find('.btn-primary').prop('disabled', false);
      } else {
        apiAuth().then(function() {
          $.post('/api-leader/cards/', JSON.stringify({source: response.id}), function() {
            deferred.resolve();
          });
        });
      }
    });
  });

  $('#stripeAccountForm form').submit(function(e) {
    e.preventDefault();

    var $form = $(this);
    $form.find('.btn-primary').prop('disabled', true);

    Stripe.bankAccount.createToken({
      country: $form.find('[name=country]').val(),
      currency: $form.find('[name=currency]').val(),
      routing_number: $form.find('[name=routing_number]').val(),
      account_number: $form.find('[name=account_number]').val()
    }, function(status, response) {
      if (response.error) {
        $form.find('.text-error').text(response.error.message).show();
        $form.find('.btn-primary').prop('disabled', false);
      } else {
        apiAuth().then(function() {
          $.post('/api-leader/bank-accounts/', JSON.stringify({
            source:        response.id,
            type:          $form.find('[name=type]').val(),
            first_name:    $form.find('[name=first_name]').val(),
            last_name:     $form.find('[name=last_name]').val(),
            address_line1: $form.find('[name=address_line1]').val(),
            address_line2: $form.find('[name=address_line2]').val(),
            city:          $form.find('[name=city]').val(),
            state:         $form.find('[name=state]').val(),
            postal_code:   $form.find('[name=postal_code]').val(),
            country:       $form.find('[name=country]').val(),
            ssn_last_4:    $form.find('[name=ssn_last_4]').val(),
            currency:      $form.find('[name=currency]').val(),
            business_name: $form.find('[name=business_name]').val()
          }), function() {
            deferred.resolve();
          });
        });
      }
    });
  });
})($, window.location, Stripe);
