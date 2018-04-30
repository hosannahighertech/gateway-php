<?php

namespace hosannahighertech\gateway;

/*
 * Receipt Results
 * Always read Only properties set at Ctor
*/

class PaymentReceipt
{
    private $account;
    private $balance;
    private $basePayment;
    private $billId;
    private $card;
    private $currency;
    private $fee;
    private $receiptId;
    private $tax;
    private $totalAmountPaid;
    private $ownerName;
    private $ownerMobile;

    public function __construct(array $data)
    {
        $this->account = $data['account'];
		$this->balance = $data['balance'];
		$this->basePayment = $data['base_payment'];
		$this->billId = $data['bill_id'];
		$this->card = $data['card'];
		$this->currency = $data['currency'];
		$this->fee = $data['fee'];
		$this->receiptId = $data['receipt_id'];
		$this->tax = $data['tax'];
		$this->totalAmountPaid = $data['total_amount_paid'];
		$this->ownerName = $data['owner_name'];
		$this->ownerMobile = $data['owner_mobile'];
    }

    public function getAccount()
    {
        return $this->account;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getBasePayment()
    {
        return $this->basePayment;
    }

    public function getBill()
    {
        return $this->billId;
    }

    public function getCard()
    {
        return $this->card;
    }

    public function getCurrency()
    {
        return $this->currency;
    }

    public function getFee()
    {
        return $this->fee;
    }

    public function getReceipt()
    {
        return $this->receiptId;
    }

    public function getTax()
    {
        return $this->tax;
    }

    public function getTotalPaid()
    {
        return $this->totalAmountPaid;
    }

    public function getOwnerName()
    {
        return $this->ownerName;
    }

    public function getOwnerMobile()
    {
        return $this->ownerMobile;
    }
}
