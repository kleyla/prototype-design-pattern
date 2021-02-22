<?php
class Business
{
    public function __construct()
    {
        // echo "Business php";
    }

    public function getView($view, $data = "")
    {
        $view = VIEWS . $view . ".php";
        if (file_exists($view)) {
            require_once($view);
        } else {
            echo "No existe la vista";
        }
    }
}
