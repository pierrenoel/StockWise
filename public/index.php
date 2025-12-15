<?php 

define('BASE_PATH', dirname(__DIR__));
require_once __DIR__."/../core/Choco.php";

function getPath()
{
    $url = $_SERVER["REQUEST_URI"];
    $urlParsed = parse_url($url);
    return $urlParsed["path"];
}

function getParams() : array 
{
    $url = $_SERVER["REQUEST_URI"];

    $params = [];

    $urlParsed = parse_url($url);

    parse_str($urlParsed["query"],$params);

    return $params;
}

function keyExists($key)
{
    $url = $_SERVER["REQUEST_URI"];
    return array_key_exists($key,getParams($url));
}

function notFound()
{
    require_once BASE_PATH . "/controllers/ErrorController.php";
    Not_found(); 
}


switch(getPath()){
    case "/" :
        require_once BASE_PATH . "/controllers/HomeController.php";
        index();
        break;

    case "/item":
        if(keyExists("id"))
        {
            require_once BASE_PATH . "/controllers/ItemController.php";
            search(getParams()["id"]);
        }
        else {
            notFound();
        }
        break;

    default:
        notFound();
        break;
}

