$bank_account = Balanced\BankAccount::get("{{request.bank_account_href}}");
$bank_account->debits->create(array(
{% for k, v in request.payload %}
    "{{ k }}" => "{{ v }}",
{% endfor %}
));
