<?php
/**
 * Home controller
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - home endpoint
 */
namespace Api\Home;

use Aelion\Http\Response\Response;
use Aelion\Http\Response\JsonResponse;
use Aelion\Mvc\Controller\AbstractController;
use Aelion\Http\Request\Request;

final class Home extends AbstractController {
    private Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function hello(): Response {
        $response = new JsonResponse();
        $response->setPayload(['message' => 'Hello PHP']);
        return $response;
    }
}