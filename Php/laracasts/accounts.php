<?php

class BankAccounts
{
    protected $accounts;

    public function __construct($accounts)
    {
        $this->accounts = $accounts;
    }

    public function filterBy($type)
    {
        $filtered = [];

        foreach ($this->accounts as $account) {
            if ($account->type() == $type) {
                if ($account->isActive()) {
                    $filtered[] = $account;
                }
            }
        }

        return $filtered;
    }
}

class Account
{
    protected $type;

    private function __construct($type)
    {
        $this->type = $type;
    }

    public static function open($type)
    {
        return new static($type);
    }

    public function type()
    {
        return $this->type;
    }

    public function isActive()
    {
        return true;
    }

}

$accounts = [
    Account::open('checking'),
    Account::open('saving'),
    Account::open('checking'),
    Account::open('saving'),
];

$savings = (new BankAccounts($accounts))->filterBy('saving');

var_dump($savings);
