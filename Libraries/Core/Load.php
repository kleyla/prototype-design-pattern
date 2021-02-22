<?php

function reload($controller, $method, $params)
{
    // echo "Metodo" . $method;
    $folder = $controller;
    $controller = ucwords($controller);
    $controllerFile = "Business/" . $folder . "/" . $controller . ".php";
    // echo $controller;
    // echo $controllerFile;
    if (file_exists($controllerFile)) {
        require_once($controllerFile);
        $controller = new $controller();
        // echo $method;
        if (method_exists($controller, $method)) {
            $controller->{$method}($params);
        } else {
            echo "No existe el metodo";
            // require_once("Business/Errors.php");
        }
    } else {
        echo "No existe controllador";
        // require_once("Business/Errors.php");
    }
}

reload($controller, $method, $params);
