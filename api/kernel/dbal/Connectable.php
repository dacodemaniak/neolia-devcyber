<?php
/**
 * Connectable
 *  Interface that expose connect method
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 */
namespace Aelion\Dbal;

interface Connectable {
    public function connect(): ?\PDO;
}