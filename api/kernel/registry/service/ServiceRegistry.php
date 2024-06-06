<?php
/**
 * ServiceRegistry
 *  Container for services
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Service instanciation
 *  - Service storage
 *  - Service retreiving
 */
namespace Aelion\Registry\Service;

use Aelion\Http\Request\Request;
use Aelion\Registry\Registrable;

class ServiceRegistry {
    private static array $registry = [];

    public static function get(string $className, Request $request): Registrable {
        $instance = null;
        if (array_key_exists($className, self::$registry)) {
            $instance =self::$registry[$className];
        } else {
            $instance = $className::getInstance($request);
        }

        return $instance;
    }
}