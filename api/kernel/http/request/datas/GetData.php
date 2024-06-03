<?php
/**
 * PostData Gather Request datas were passed to server by querystring (GET)
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple implementation
 */
namespace Aelion\Http\Request\Datas;


use Aelion\Http\Request\Request;

final class GetData implements ProcessData {
    private Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function process(): void {
        // Gather GET datas
        if (!is_null($_GET)) {
            foreach($_GET as $key => $value) {
                $this->request->set($key, $value);
            }
            $_GET = null;
        }

    }
}