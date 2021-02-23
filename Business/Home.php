<?php
require_once("Business/Libro.php");

class Home extends Business
{

    public function __construct()
    {
        // echo "Home";
    }
    public function home()
    {
        $data["pattern"] = "My books";
        $data["script"] = "home/script1.js";
        $this->getView("home/index1", $data);
    }
    public function getBooks()
    {
        # code...
    }
    public function exaa()
    {
        // echo "exaa";
        $book = new Libro("El principito", "Antoine de Saint-Exupery", "ENI");
        
        // $book2 = $book->clonarPHP();
        $book2 = $book->clonar();
        $book2->setTitulo("Tierra de hombres");
        echo $book->getPublicacion();
        echo "<br> <br>";
        echo $book2->getPublicacion();
    }
    public function exa()
    {
        $data["pattern"] = "My books";
        $data["script"] = "home/script1.js";
        $this->getView("home/index1", $data);
    }
}
