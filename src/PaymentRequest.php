<?php

namespace hosannahighertech\gateway;

use hosannahighertech\gateway\interfaces\ConfigurationInterface;

class PaymentRequest implements \JsonSerializable
{
    private $card;
    private $description;
    private $amount;
    private $company;
    private $tax;
    private $currency;
    private $transfer_to;

     public function __construct()
    {
        $this->amount = 0;
        $this->tax = 0;
        $this->currency = 'TZS';
    }

    public function setCard($card)
    {
        $this->card = $card;
        return $this;
    }

    public function setDescription($desc)
    {
        $this->description = $desc;
        return $this;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    public function setCompany($company)
    {
        $this->company = $company;
        return $this;
    }

    public function setTax($tax)
    {
        $this->tax = $tax;
        return $this;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    public function setTransferTo($to)
    {
        $this->transfer_to = $to;
        return $this;
    }

    //serialize
    public function jsonSerialize() {
        return [
            "card" => $this->card,
            "description" => $this->description,
            "amount" => $this->amount,
            "tax" => $this->tax,
            "currency" => $this->currency,
            "company" => $this->company,
            "transfer_to" => $this->transfer_to
        ];
    }

}

