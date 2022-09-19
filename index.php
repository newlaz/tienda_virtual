<?php
require_once('Config/config.php');

$url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
$arrUrl = explode('/', $url);
$controller = $arrUrl[0];
$method = $arrUrl[0];
$params = "";

if (!empty($arrUrl[1])) {
    if ($arrUrl[1] != "") {
        $method = $arrUrl[1];   
    }
}

if(!empty($arrUrl[1]) && $arrUrl[1] != ""){
    for($i=2; $i< count($arrUrl); $i++){
        $params .= $arrUrl[$i]."|";

    }
}

spl_autoload_register(function($class){

    if(file_exists(LIBS.'Core/'.$class.".php")){
        require_once(LIBS.'Core/'.$class.".php");   
    }    
});

//load xd

$controller_file = "Controllers/".$controller.".php";

if(file_exists($controller_file)){
    require_once($controller_file);
    $controller = new $controller();
    if(method_exists($controller, $method)){
        $controller->{$method}($params);

    }else{
        echo "no encontre ningun METODO, solo pude armar un taladro con una piedra, una ardilla, un palo y un taladro";
    }

}else{
    echo "no encontre ningun CONTROLADOR, solo pude armar un taladro con una piedra, una ardilla, un palo y un taladro";
}


/*
$params = trim($params, '|');
echo "<br>";
echo "<br>controlador: ".$controller. "<br>metodo: ". $method. "  <br><br>parametros:".$params;
echo "<br>";
*/

?>