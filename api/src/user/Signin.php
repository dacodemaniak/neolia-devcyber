<?php
/**
 * Signin
 * Controller managing user signin
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Service injection
 *  - Simple signin endpoint
 */
namespace Api\User;

use Aelion\Http\Request\Request;
use Aelion\Http\Response\JsonResponse;
use Aelion\Http\Response\Response;
use Aelion\Mvc\Controller\AbstractController;
use Aelion\Registry\Service\ServiceRegistry;

class Signin extends AbstractController {
    private SigninService $service;


    public function __construct(Request $request) {
        $this->service = ServiceRegistry::get(SigninService::class, $request);
    }

    public function signin(): Response {
        return $this->service->signin();
    }
}