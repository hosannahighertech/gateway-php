<?php

/**
 * Hosanna e-Payment Gateway Library
 * Copyright (c) 2018, Hosanna Higher Technologies Co. Ltd
 * support@hosannahighertech.co.tz
 *
 * This interface defines configuration that works with the library
 * Feel free to implement the way you wish.
*/
namespace hosannahighertech\gateway\interfaces;

interface ConfigurationInterface
{
    public function getClientId();
    public function getClientSecret();

    public function getAccessToken();
    public function setAccessToken($token);

    public function getBaseUrl();
}
