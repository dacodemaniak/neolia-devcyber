<?php
/**
 * Interface Registrable
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple define getInstance() method
 */
namespace Aelion\Registry;

use Aelion\Http\Request\Request;

interface Registrable {
    public static function getInstance(Request $request): Registrable;
}