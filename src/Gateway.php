<?php 

namespace hosannahighertech\gateway;

use hosannahighertech\gateway\interfaces\ConfigurationInterface;

class Gateway
{
    private $_headers = [
        'Content-Type' => 'application/json'
    ];

    private $_config;
    private $_error;

    public function __construct(ConfigurationInterface $config)
    {
        Requests::register_autoloader();
        $this->_config = $config;
    }

    public function getError()
    {
        return $this->_error;
    }

    /**
     * Creates Payment Request Receipt
     * Returns request object of `RequestReceipt` of data on success or null on failure
     * Check getLastError to get the error message
    */
    public function sendRequest(PaymentRequest $request)
    {
        $url = $this->_config->getBaseUrl().'/api/v1/payments/create-request';

        $this->_headers['Authorization'] = "Bearer ". $this->_config->getAccessToken();

        $response = Requests::post($url, $this->_headers, json_encode($request));
        $json = json_decode($response->body, true);

        if(isset($json['success']) && $json['success'])
            return new RequestReceipt($json['message']);

        else if(isset($json['message']) && is_string($json['message']))
            $this->_error = $json['message'];

        else
        {
            if(is_array($json['message']))
                $this->_error = $json['message']['message'];
            else
                $this->_error = 'Unknown Error have Occurred';

        }
        return null;
    }

    /**
     * Creates Payment Request
     * Returns request number on success or false on failure
     * Check getLastError to get the error message
    */
    public function confirmPayment($requestId)
    {
        $url = $this->_config->getBaseUrl().'/api/v1/payments/create-payment';

        $this->_headers['Authorization'] = "Bearer ". $this->_config->getAccessToken();

        $response = Requests::post($url, $this->_headers, json_encode(['payment_id'=>$requestId]));
        $json = json_decode($response->body, true);

        if(isset($json['success']) && $json['success'])
            return new PaymentReceipt($json['message']);

        else if(isset($json['message']) && is_string($json['message']))
            $this->_error = $json['message'];

        else
        {
            if(is_array($json['message']))
                $this->_error = $json['message']['message'];
            else
                $this->_error = 'Unknown Error have Occurred';

        }
        return null;
    }
}

