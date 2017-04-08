<?php
/**
 * Created by PhpStorm.
 * User: ianot
 * Date: 4/7/2017
 * Time: 11:06 PM
 */

namespace Me\Controller;


use Klein\Request;
use Klein\Response;

class ApiController extends Controller
{
    protected $prefix = "/api/";
    protected $routes = ["GET:version" => "show_version"];
    public function add_routes($klein)
    {
        foreach($this->routes as $uri => $function) {
            $method = null;
            if(stristr($uri, ":")) {
                $parts = preg_split("/:/", $uri, 2);
                $method = $parts[0];
                $uri = $parts[1];
            }
            $complete = $this->prefix . $uri;
            if($method != null) {
                $klein->respond($method, $complete, [$this, $function]);
            } else {
                $klein->respond($complete, [$this, $function]);
            }
        }
    }

    public function show_version() {
        return json_encode(['version'=>'0.0.1']);
    }

    /**
     * @param $request Request
     * @param $response Response
     */
    public function get_status($request, $response) {
        if(isset($request->sid)) {
            return json_encode(['error'=>'not implemented']);
        } else {
            $response->code(400);
        }
    }
}