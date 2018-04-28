<?php

namespace hosannahighertech\gateway;

/**
 * Payment Confirmation Response
 * Valid attributes are:
 * account
 * balance
 * base_payment
 * bill_id
 * card
 * currency
 * fee
 * receipt_id
 * tax
 * total_amount_paid
 *
*/

class PaymentReceipt
{
    private $_data;

    public function __construct(array $data)
    {
        $this->_data = $data;
    }

    public function __get($name)
    {
        if(isset($this->_data[$name]))
            return $this->_data[$name];
        else
            return false;
    }
}
