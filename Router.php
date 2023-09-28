<?php

require_once __DIR__ . '/RouteSwitch.php';

class Router extends RouterSwitch
{

    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);
        $route = str_replace("carreira/", "", $route);

        error_log("Rota Requisitada:$route",0);
        $parts = explode("/",$route); // quebrando requisição
        error_log("Partes de requisição: ".print_r($parts,true),0);

        // obtenho a página
        $page = $parts[0]; 

        // obtenho a operação se for solicitada
        $operation = count($parts)>1?$parts[1]:null;


        if ($route == '') {
            $this->home();
        } else {
            $this->$page($operation);
        }
    }
}