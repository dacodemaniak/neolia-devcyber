<?php
/**
 * NoSuchArgumentException
 *  Raised when a key data was not found
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 */
namespace Aelion\Http\Request\Exception;

class NoSuchArgumentException extends \RuntimeException {
    public function __construct(string $message) {
        parent::__construct($message);
    }
}