<?php
require_once("Config/Config.php");
require_once("Helpers/Helpers.php");

$url = !empty($_GET["url"]) ? $_GET["url"] : "home/home";
$arrUrl = explode("/", $url);
$controller = $arrUrl[0];
// $controller = ucfirst($arrUrl[0]);
$method = $arrUrl[0];
// echo $controller;
$params = "";
if (!empty($arrUrl[1])) {
    if ($arrUrl[1] != "") {
        $method = $arrUrl[1];
    }
}

if (!empty($arrUrl[2])) {
    if ($arrUrl[2] != "") {
        for ($i = 2; $i < count($arrUrl); $i++) {
            $params .= $arrUrl[$i] . ',';
        }
        $params = trim($params, ",");
    }
}

// print_r($arrUrl);

require_once("Libraries/Core/Autoload.php");

// Load
require_once("Libraries/Core/Load.php");

    // echo "<br/>";
    // echo "controller: ".$controller." method: ".$method;
    // echo $params;
    // echo $url;
