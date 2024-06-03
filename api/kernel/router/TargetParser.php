<?php
/**
 * TargetParser parse Alto Router target
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simply parse target string
 */
namespace Aelion\Router;

class TargetParser {
    private string $target;

    public function __construct(string $target) {
        $this->target = $target;
    }

    public function parse(): ParsedRoute {
        $parsedRoute = new ParsedRoute();

        $parseOnSharp = explode('#', $this->target);
        $parsedRoute->setEndpoint(array_pop($parseOnSharp));
        $parsedRoute->setNamespace($parseOnSharp[0]);

        $parseOnBackSlash = explode('\\', $parseOnSharp[0]);
        array_shift($parseOnBackSlash);
        $parsedRoute->setController(array_pop($parseOnBackSlash));

        $parsedRoute->setPath(implode('/', $parseOnBackSlash));

        return $parsedRoute;
    }
}