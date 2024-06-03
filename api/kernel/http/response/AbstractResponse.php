<?php
/**
 * AbstractResponse
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - HttpResponseStatus to HttpStatus
 */
namespace Aelion\Http\Response;

abstract class AbstractResponse implements Response {
    /**
     * Http Response Status
     */
    protected array $statusResponseHeader = [200, 'Ok'];


    /**
     * Response payload
     */
    protected $payload;

    public function setPayload(array $payload): void {
        $this->payload = $payload;
    }


    public function addPayloadItem(string $item, $value): Response {}

    public function ok(): void {}

    public function setStatus(HttpResponseStatus $status): string {
        $this-> statusResponseHeader = match($status) {
            HttpResponseStatus::Ok => [200, 'Ok'],
            HttpResponseStatus::NotFound => [403, 'Not Found']
        };
    }

    public function send(): void {
        header($_SERVER['SERVER_PROTOCOL'] . ' ' . $this->statusResponseHeader[0] . ' ' . $this->statusResponseHeader[1]);
    }
}