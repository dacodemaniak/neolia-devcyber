<?php
/**
 * Build JSON response implementing Response interface
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple array to JSON conversion
 */
namespace Aelion\Http\Response;

final class JsonResponse extends AbstractResponse {
    public function __construct() {}



    public function send(): void {
        header('Content-Type: application/json');
        parent::send();
        echo json_encode($this->payload);
    }
}