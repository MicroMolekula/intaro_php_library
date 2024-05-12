<?php

namespace Library\Core;


class Route 
{
    private string $url;
    private bool $status;

    function __construct()
    {
        $this->url = $_SERVER['REQUEST_URI'];
        $this->status = false;
    }

    public function get(string $url, Controller $controller)
    {   
        // #TODO Зарефакторить
        // -----
        $flagArg = false;
        $arg = '';
        if(preg_match("/{\w+}/", $url, $matches) && count(explode('/', $url)) === count(explode('/', $this->url))) {
            $indexArg = array_search($matches[0], explode('/', $url));
            $flag = true;
            for ($i = 0; $i < count(explode('/', $url)); $i++){
                for ($j = 0; $j < count(explode('/', $this->url)); $j++){
                    if($i === $j && explode('/', $url)[$i] !== explode('/', $this->url)[$j] && $j != $indexArg){
                        $flag = false;
                    }
                }
            }
            if(!$flag) {
                return;
            } else {
                $flagArg = true;
                $arg = explode('/', $this->url)[$indexArg];
            }
        }
        // ----- 
        if((explode('?', $this->url)[0] === $url && $_SERVER['REQUEST_METHOD'] == 'GET') || $flagArg) {
            $request = $_GET;
            echo $controller($request, $arg);
            $this->status = true;
        }
    }

    public function post(string $url, Controller $controller)
    {
        if($this->url === $url && $_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json; charset=UTF-8');
            $json = file_get_contents('php://input');
            $request = json_decode($json, true);
            echo json_encode($controller($request));
            $this->status = true;
        }
    }

    public function getStatus()
    {
        return $this->status;
    }
}