$(function() {
    $('#cc-submit').click(function (e) {
        e.preventDefault();

        if ($('#cc-submit').hasClass('disabled')) {
            return false;
        }

        $('div.alert-error').hide();
        $('#cc-submit').addClass('disabled');

        var creditCardData = {
            name: $('#creditcard_name').val(),
            card_number: $('#creditcard_number').val(),
            expiration_month:  $('#creditcard_expirationMonth').val(),
            expiration_year:  $('#creditcard_expirationYear').val(),
            security_code:  $('#creditcard_cvv').val()
         };

         balanced.card.create(creditCardData, function(response) {
             if(response.status === 201 && response.data.uri) {

                 $('#creditcard_balancedUri').val(response.data.uri);
                 $('#cardForm').submit();
             } else if (response.error) {
                 var messages = '';
                 $.each(response.error, function (name, value) {
                    messages += '<p>'+String(value)+'</p>';
                 });
                 showError(messages);
             }
         });

         return false;
    });

    function showError(message)
    {
        $('div.alert-error').html(message);
        $('div.alert-error').show();
        $('#cc-submit').removeClass('disabled')
    }
});

(function ($, balanced) {
  function loading($element) {
    $element.html('<div>Loading...</div> ');
  }

  $.fn.bankAccountForm = function(config) {

    config = config || {};
    var $el = this;
    loading($el);
    var template = _.template('<% _(data).each(function (item, name) { %><div class="control-group"><label for="<%= name %>"' +
      ' class="control-label required"><%= item.label %></label><div class="controls">' +
      '<input type="text" name="<%= name %>" value="<%- item.value %>" required="required" class="not-removable"></div></div><% }); %>');

    var data = {
      name: {
        label: 'Account Holder',
        value: ''
      },
      address_line1: {
        label: 'Billing Address',
        value: ''
      },
      address_line2: {
        label: 'Address Line 2',
        value: ''
      },
      address_city: {
        label: 'City',
        value: ''
      },
      address_state: {
        label: 'State',
        value: ''
      },
      address_postal_code: {
        label: 'Postal Code',
        value: ''
      },
      account_number: {
        label: 'Account Number',
        value: ''
      },
      routing_number: {
        label: 'Routing Number',
        value: ''
      }
    };

    _(config.data).each(function (value, key) {
      data[key].value = value;
    });

    renderBankForm();

    $el.on('click', '.btn-primary', function () {
      updateData();
      createBankAccount();
      return false;
    });

    function renderBankForm() {
      $el.html('<legend>Add Bank Account</legend>');
      $el.append(template({data: data}));
      $el.append('<div class="form-actions"><button class="btn btn-primary">Submit</button></div>');
    }

    function updateData() {
      $el.find('input').each(function () {
        data[$(this).attr('name')].value = $(this).val();
      })
    }

    function createBankAccount() {
      loading($el);
      var payload = {
        name: data.name.value,
        account_number: data.account_number.value,
        routing_number: data.routing_number.value,
        address: {
          line1: data.address_line1.value,
          line2: data.address_line2.value,
          city: data.address_city.value,
          state: data.address_state.value,
          postal_code: data.address_postal_code.value,
          country_code: 'US'
        }
      };


      balanced.bankAccount.create(payload, function (response) {
        if (response.error) {
          var message = _(response.error.extras ? response.error.extras : response.error)
            .map(function (item, name) { return name + ': ' + item; }).join('. ');
          alert(message);
          renderBankForm();
        } else {
          $el.trigger('onBankAccountCreate', {
            balanced_uri: response.data.uri,
            name: data.name.value
          });
        }
      });
    }

    this.renderBankForm = renderBankForm;

    return this;
  };

  $.fn.cardForm = function(config) {

    config = config || {};
    var $el = this;
    loading($el);
    var template = _.template('<% _(data).each(function (item, name) { %><div class="control-group"><label for="<%= name %>"' +
      ' class="control-label required"><%= item.label %></label><div class="controls">' +
      '<input type="text" name="<%= name %>" value="<%- item.value %>" required="required" class="not-removable"></div></div><% }); %>');

    var data = {
      name: {
        label: 'Name',
        value: ''
      },
      address_line1: {
        label: 'Billing Address',
        value: ''
      },
      address_line2: {
        label: 'Address Line 2',
        value: ''
      },
      address_city: {
        label: 'City',
        value: ''
      },
      address_state: {
        label: 'State',
        value: ''
      },
      address_postal_code: {
        label: 'Postal Code',
        value: ''
      },
      card_number: {
        label: 'Card Number',
        value: ''
      },
      expiration_month: {
        label: 'Expiration Month',
        value: ''
      },
      expiration_year: {
        label: 'Expiration Year',
        value: ''
      },
      security_code: {
        label: 'Security Code',
        value: ''
      }
    };

    _(config.data).each(function (value, key) {
      data[key].value = value;
    });

    renderCardForm();

    $el.on('click', '.btn-primary', function () {
      updateData();
      createCard();
      return false;
    });

    function renderCardForm() {
      $el.html('<legend>Add Card</legend>');
      $el.append(template({data: data}));
      $el.append('<div class="form-actions"><button class="btn btn-primary">Submit</button></div>');
    }

    function updateData() {
      $el.find('input').each(function () {
        data[$(this).attr('name')].value = $(this).val();
      })
    }

    function createCard() {
      loading($el);
      var payload = {
        name: data.name.value,
        card_number: data.card_number.value,
        expiration_month: data.expiration_month.value,
        expiration_year: data.expiration_year.value,
        security_code: data.security_code.value,
        address: {
          line1: data.address_line1.value,
          line2: data.address_line2.value,
          city: data.address_city.value,
          state: data.address_state.value,
          postal_code: data.address_postal_code.value,
          country_code: 'US'
        }
      };

      balanced.card.create(payload, function (response) {
        if (response.error) {
          var message = _(response.error.extras ? response.error.extras : response.error)
            .map(function (item, name) { return name + ': ' + item; }).join('. ');
          alert(message);
          renderCardForm();
        } else {
          $el.trigger('onCardCreate', {
            balanced_uri: response.data.uri,
            name: data.name.value
          });
        }
      });
    }

    this.renderCardForm = renderCardForm;

    return this;
  };

})($, balanced);
