<?php 


namespace hosannahighertech\gateway\samples;

use hosannahighertech\gateway\interfaces\ConfigurationInterface;

/**
 * Sample Configuration file
*/
class SampleConfig implements ConfigurationInterface
{
    private $_configFile = __DIR__.'/sample.json';
    private $_config;

    function __construct()
    {
        //load config file
        $contents = file_get_contents($this->_configFile);
        $this->_config = json_decode($contents, TRUE);
    }
    
    public function getClientId()
    {
        return isset($this->_config['client_id']) ? $this->_config['client_id'] : null;
    }

    public function getClientSecret()
    {
        return isset($this->_config['client_secret']) ? $this->_config['client_secret'] : null;
    }

    public function getAccessToken()
    {
        return isset($this->_config['access_token']) ? $this->_config['access_token'] : null;
    }

    public function setAccessToken($token)
    {
        $this->_config['access_token'] = $token;
        file_put_contents($this->_configFile, json_encode($this->_config));
    }

    public function getBaseUrl()
    {
        return isset($this->_config['base_url']) ? $this->_config['base_url'] : null;
    }
}
