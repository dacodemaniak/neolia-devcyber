<?php
/**
 * PostData Gather Request datas were passed to server by post-data
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple implementation
 */
namespace Aelion\Http\Request\Datas;


use Aelion\Http\Request\Request;

final class PostData implements ProcessData {
    private Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function process(): void {
        // Gather POST datas
        if (!is_null($_POST)) {
            foreach($_POST as $key => $value) {
                $this->request->set($key, $value);
            }
            $_POST = null;
        }

    }
}