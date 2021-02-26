<?php
require_once("Business/Libro.php");
require_once("Business/Revista.php");

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
    public function exa()
    {
        // echo "exaa";
        $book = new Libro("El principito", "Antoine de Saint-Exupery", "ENI");

        // $book2 = $book->clonarPHP();
        $book2 = $book->clonar();
        $book2->setTitulo("Tierra de hombres");
        $book2->setAutor("Leonardo");
        echo json_encode($book->getPublicacion());
        echo "<br> <br>";
        echo json_encode($book2->getPublicacion());

        $revista = new Revista("Ciencia", "EL universo", "Gomez", "Nie 20");

        $revista2 = $revista->clonar();
        $revista2->setAutores("jiji");

        echo "<br> <br>";
        echo json_encode($revista->getPublicacion());
        echo "<br> <br>";
        echo json_encode($revista2->getPublicacion());

        // dep($book->getPublicacion());
    }
}
