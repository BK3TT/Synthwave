<?php

class App 
{
    protected $controller = '';
    protected $method = '';
    protected $type = '';
    protected $parameters = [];

    public function __construct() 
    {
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        $this->parameters = explode('/', rtrim($_REQUEST['request'], '/'));
        $this->controller = array_shift($this->parameters) . 'Controller';

        if (array_key_exists(0, $this->parameters) && !is_numeric($this->parameters[0])) {
            $this->method = array_shift($this->parameters);
        }

        $this->type = $_SERVER['REQUEST_METHOD'];
    }

    public function executeAPI() 
    {
        switch ($this->type) {
            case 'POST':
                $data = json_decode(file_get_contents("php://input"), true);
                $this->parameters = $this->cleanRequestData($data);
                break;
            case 'GET':
                $this->parameters = $this->cleanRequestData($_GET);
                break;
            default:
                return $this->response('Invalid Method', 405);
                break;
        }

        if (!file_exists(CONTROLLERS . $this->controller . '.php')) {
            return $this->response($this->controller . ' controller does not exist', 405);
        }

        require_once CONTROLLERS . $this->controller . '.php';

        $this->controller = new $this->controller;

        if ((int)method_exists($this->controller, $this->method) > 0) {
            $this->controller->data = $this->parameters;
            
            return $this->response(call_user_func([$this->controller, $this->method]));
        }

        return $this->response("No method: $this->method", 404);
    }

    private function response($data, $status = 200) 
    {
        header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
        return json_encode($data, JSON_PRETTY_PRINT);
    }

    private function cleanRequestData($data) 
    {
        $cleanData = Array();
        
        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $cleanData[$k] = $this->cleanRequestData($v);
            }
        } else {
            $cleanData = trim(strip_tags($data));
        }

        return $cleanData;
    }

    private function requestStatus($code) 
    {
        $status = array(  
            200 => 'OK',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );

        return ($status[$code]) ? $status[$code] : $status[500]; 
    }
}