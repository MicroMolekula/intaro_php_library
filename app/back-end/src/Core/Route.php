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

    // #TODO  Отрефакторить
    private function checkArg(string $url) : string
    {   
        $urlU = explode('/', explode('?', $this->url)[0]);
        $urlA = explode('/', $url);
        if(preg_match("/{\w+}/", $url, $matches) && count($urlA) === count($urlU)) {
            $indexArg = array_search($matches[0], $urlA);
            $flag = true;
            for ($i = 0; $i < count($urlA); $i++){
                for ($j = 0; $j < count($urlU); $j++){
                    if($i === $j && $urlA[$i] !== $urlU[$j] && $j != $indexArg){
                        $flag = false;
                    }
                }
            }
            if($flag) {
                $arg = $urlU[$indexArg];
                return $arg;
            }
        }
        return '';
    }

    public function get(string $url, string $controller) : void
    {   
        $arg = $this->checkArg($url);
        if((explode('?', $this->url)[0] === $url || $arg)  
            && $_SERVER['REQUEST_METHOD'] == 'GET') 
        {
            $request = $_GET;
            echo json_encode((new $controller)($request, $arg));
            $this->status = true;
        }
    }

    public function post(string $url, string $controller) : void
    {
        if($this->url === $url && $_SERVER['REQUEST_METHOD'] == 'POST') {
            header('Content-Type: application/json; charset=UTF-8');
            $json = file_get_contents('php://input');
            $request = json_decode($json, true);
            echo json_encode((new $controller)($request));
            $this->status = true;
        }
    }

    public function getStatus() : bool
    {
        return $this->status;
    }
}