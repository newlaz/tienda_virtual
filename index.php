<?php
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

