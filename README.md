# Hosanna e-Payment Gateway PHP library

## Requirements

PHP 5.4.0 and later.

## Composer

You can install the library via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require hosannahighertech/gateway-php
```

To use the library, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```


## Dependencies

The library depends on [`Requests Http Library`](http://requests.ryanmccue.info/). The Library is included so you dont have to install anything.

## Getting Started

### 1. Creating gateway Object.
To create the Gateway object you need to first define your configurations. Your configurations Object must implement `hosannahighertech\gateway\interfaces\ConfigurationInterface`. This gives you flexibility to use file, session or database to store your configurations. It also does not limit on how to get such a thing as access token though you can use the bundled library for that. See `src/samples` for an exmple. Assuming your configuration class is `SampleConfiguration` then you can create gateway object as simple as

```php
use hosannahighertech\gateway\Gateway;
use hosannahighertech\gateway\samples\SampleConfigurations; //Your configuration file

$gateway = new Gateway(new SampleConfigurations());
```

The Gateway object can then be used for creating Payment requests and Confirming for Receipts.

### 2. Sending Payment Request
To create Payment request, just create an object of `PaymentRequest` class and then use gateway `sendRequest` method to send that. The method returns object of `RequestReceipt` containing, upon success or a `null` upon failure. Use Gateway object's `getError` method to get the actual error message.


```php
use hosannahighertech\Gateway\PaymentRequest;

$request = new PaymentRequest();
$request = $request->setCard('1234565432789054')
				 ->setDescription('Buying some soda')
				 ->setAmount(1500)
				 ->setCurrency("TZS")
				 ->setCompany(1)
				 ->setTransferTo(1234567890987654);
				 
$reqReceipt = $gateway->sendRequest($request);
if($reqReceipt === null)
{
	echo $gateway->getError());
}
else
{
	//succesfully. Do something with Request Receipt
}
```
### 3. Confirming Payment
Confirming Payment will do the actual deducting/transfer of the money. 
To do that, just pass payment ID from `RequestReceipt` object you got from previous request, using `getReceipt()` method to `confirmPayment` method of the Gateway object. The result will be `null` in case of failure and an object of `PaymentReceipt` class in case of success. Use Gateway object's `getError` method to get the actual error message.

```php

$paymentReceipt = $gateway->confirmPayment($reqReceipt->getReceipt());
if($paymentReceipt === null)
{
	echo $gateway->getError());
}
else
{
	//succesfully. Do something with Payment Receipt
}
```
Please refer to documentation for more details.

## Documentation

Coming soon!


### 4. Loging
TBD

### 5. Testing
TBD
