<?php 
namespace hosannahighertech\gateway;

include(__DIR__ . DIRECTORY_SEPARATOR . 'librequests/Requests.php');

use Requests as BaseRequests;

/**
 * Make the Requests class Namespaced to avoid collision
*/

class Requests extends BaseRequests
{

}
