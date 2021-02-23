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
        $data["script"] = "exa/script.js";
        $this->getView("exa/index", $data);
    }

    public function mal()
    {
        $book = new Libro("El principito", "Antoine de Saint-Exupery", "ENI");

        $book2 = $book;

        $book2->setTitulo("Tierra de hombres");

        echo json_encode($book->getPublicacion());
        echo "<br> <br>";
        echo json_encode($book2->getPublicacion());
    }
    public function bien()
    {
        // echo "exaa";
        $book = new Libro("El principito", "Antoine de Saint-Exupery", "ENI");

        // $book2 = $book->clonarPHP();
        $book2 = $book->clonar();
        $book2->setTitulo("Tierra de hombres");
        echo json_encode($book->getPublicacion());
        echo "<br> <br>";
        echo json_encode($book2->getPublicacion());
    }
}
