<?php
/**
 * PostData Gather Request datas were passed to server as body payload
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple implementation
 */
namespace Aelion\Http\Request\Datas;


use Aelion\Http\Request\Request;

final class PayloadData implements ProcessData {
    private Request $request;

    public function __construct(Request $request) {
        $this->request = $request;
    }

    public function process(): void {
        $rawJson = file_get_contents('php://input');
        if (strlen($rawJson)) {
            $data = json_decode($rawJson, true);
            foreach($data as $key => $value) {
                $this->request->set($key, $value);
            }
        }
    }
}