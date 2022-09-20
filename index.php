<?php
require_once("Config/Config.php");
$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
$arrayURL = explode("/", $url);
$controller = $arrayURL[0];
$method = $arrayURL[0];
$params = "";

if (!empty($arrayURL[1])) {
    if ($arrayURL[1] !== "") {
        $method = $arrayURL[1];
    }
}

if (!empty($arrayURL[2])) {
    if ($arrayURL[2] !== "") {
        for ($i = 2; $i < count($arrayURL); $i++) {
            $params .= $arrayURL[$i] . ',';
        }
        $params = trim($params, ',');
    }
}

spl_autoload_register(function ($class) {
    if (file_exists(LIBS . 'Core/' . $class . ".php")) {
        require_once(LIBS . 'Core/' . $class . ".php");
    }
});

//Load
$controllerFile = "Controllers/" . $controller . ".php";
if (file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();
    if (method_exists($controller, $method)) {
        $controller->{$method}($params);
    }else {
        echo "No existe controlador";
    }
} else {
    echo "No existe controlador";
}
