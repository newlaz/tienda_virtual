<?php
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
echo "<br>";
$params = trim($params, '|');
echo "<br>";
echo "<br>controlador: ".$controller. "<br>metodo: ". $method. "  <br><br>parametros:".$params;
echo "<br>";
print_r($arrUrl);

?>