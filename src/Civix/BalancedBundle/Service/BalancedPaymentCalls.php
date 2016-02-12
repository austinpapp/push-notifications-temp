<?php

namespace Civix\BalancedBundle\Service;

class BalancedPaymentCalls
{
    public function __construct($apiKey)
    {
        \Httpful\Bootstrap::init();
        \RESTful\Bootstrap::init();
        \Balanced\Bootstrap::init();

        \Balanced\Settings::$api_key = $apiKey;
    }

    public function createCustomer($options)
    {
        $customer = new \Balanced\Customer($options);
        $customer->save();

        return $customer;
    }

    /**
     * @param $url
     * @return \Balanced\Customer
     */
    public function getCustomer($url)
    {
        return \Balanced\Customer::get($url);
    }

    public function getMarketPlace()
    {
        return \Balanced\Marketplace::mine();
    }

    public function getMarketPlaceBankAccount()
    {
        return \Balanced\Marketplace::mine()->owner_customer->bank_accounts->query()->first();
    }

    public function createBankAccount($options)
    {
        return new \Balanced\BankAccount($options);
    }

    /**
     * @param $uri
     * @return \Balanced\BankAccount
     */
    public function getBankAccount($uri)
    {
        return \Balanced\BankAccount::get($uri);
    }

    public function createCard($options)
    {
        return $this->getMarketPlace()
            ->createCard(
                null,
                null,
                null,
                null,
                $options['name'],
                $options['number'],
                $options['cvv'],
                $options['month'],
                $options['year']
            );
    }

    /**
     * @param $uri
     * @return \Balanced\Card
     */
    public function getCard($uri)
    {
        return \Balanced\Card::get($uri);
    }

    public function debit(
        $customerUri,
        $cardUri,
        $amount,
        $appearsOnStatement = null,
        $description = null,
        $meta = null
    ) {
        $card = $this->getCard($cardUri);

        return $card->debit($amount, $appearsOnStatement, $description, $meta);
    }
    
    public function getDebit($uri)
    {
        return \Balanced\Debit::get($uri);
    }

    public function getCredit($uri)
    {
        return \Balanced\Credit::get($uri);
    }

    /**
     * @param $uri
     * @return \Balanced\Order
     */
    public function getOrder($uri)
    {
        return \Balanced\Order::get($uri);
    }
}
