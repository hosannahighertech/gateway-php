
<?php

namespace hosannahighertech\gateway;

/*
 * Payment Request Receipt Results
 * Always read Only properties set at Ctor
*/

class RequestReceipt
{
    private $receiptId;
    private $ownerName;
    private $ownerMobile;

    public function __construct(array $data)
    {
		$this->receiptId = $data['id'];
		$this->ownerName = $data['owner_name'];
		$this->ownerMobile = $data['owner_mobile'];
    }

    public function getReceipt()
    {
        return $this->receiptId;
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
