<?php
/**
 * Raised if no route match
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple \Exception extension
 */
namespace Aelion\Router\Exception;

class NoRouteMatchingException extends \Exception {
    public function __construct() {
        parent::__construct('No route matching for this URI');
    }
}