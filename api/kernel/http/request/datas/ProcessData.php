<?php
/**
 * ProcessData interface that expose Request Data gathering
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - expose process method
 */
namespace Aelion\Http\Request\Datas;

interface ProcessData {
    public function process(): void;
}