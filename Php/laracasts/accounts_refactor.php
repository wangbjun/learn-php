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
        return array_filter($this->accounts, function ($account) use ($type) {
            return $account->isOfType($type);
        });
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

    private function type()
    {
        return $this->type;
    }

    private function isActive()
    {
        return true;
    }

    public function isOfType($type): bool
    {
        return $this->type() == $type && $this->isActive();
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
