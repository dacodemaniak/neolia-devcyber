<?php
/**
 * Raised if no row were returned
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  Simple Exception extension
 */
namespace Aelion\Dbal\Exception;

class IncorrectSqlExpressionException extends \Exception {
    public function __construct(string $message) {
        parent::__construct($message);
    }
}