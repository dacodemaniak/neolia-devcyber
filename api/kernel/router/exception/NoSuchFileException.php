<?php
/**
 * Raised if no file correspond to controller
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple \Exception extension
 */
namespace Aelion\Router\Exception;

class NoSuchFileException extends \Exception {
    public function __construct() {
        parent::__construct('Can\'t find any controller matching this route');
    }
}