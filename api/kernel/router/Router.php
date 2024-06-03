<?php
/**
 * Router
 *  Map routes and load controller according to method and path
 * @author Aelion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Extends AltoRouter
 *  - Maps Hello route
 */
namespace Aelion\Router;

class Router extends \AltoRouter {
    public function __construct() {
        parent::__construct();
        $this->setMapping();
    }

    private function setMapping(): void {
        $this->map(
            'GET',
            '/',
            'Api\Home\Home#hello'
        );
    }
}