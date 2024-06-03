<?php
/**
 * Dispatcher
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Instanciate Kernel
 *  - Generate Response object
 *  - Send Http Response to web server
*/
require_once('./../vendor/autoload.php');

use Aelion\Kernel;

$kernel = Kernel::create();
$response = $kernel->processRequest();
echo $response->send();


