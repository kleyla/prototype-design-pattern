<?php
require_once("Business/Libro.php");

class Biblioteca extends Business
{
    public $publicaciones;

    public function index()
    {
        $data["title"] = "My books";
        $data["script"] = "home/script.js";
        $this->getView("home/index", $data);
    }
    public function operacion()
    {
        $this->publicaciones = [];
        $datos = $this->getDatosJohnGreen();

        $this->getLibros($datos);

        $datos = $this->getDatosLouisaAlcott();
        $this->getLibros($datos);

        $datos = $this->getDatosPabloNeruda();
        $this->getLibros($datos);

        $datos = $this->getDatosWilliamShakespeare();
        $this->getLibros($datos);

        $arrResponse = array('status' => true, 'data' => $this->publicaciones);
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    public function getLibros($datos)
    {
        $libro = new Libro($datos[0]["titulo"], $datos[0]["autor"], $datos[0]["editorial"]);
        array_push($this->publicaciones, $libro);

        for ($i = 1; $i < count($datos); $i++) {
            $libroClonado = $libro->clonar();
            $libroClonado->setTitulo($datos[$i]["titulo"]);
            array_push($this->publicaciones, $libroClonado);
        }
    }

    public function getDatosJohnGreen()
    {
        return [
            array("titulo" => "Bajo la misma estrella", "autor" => "John Green", "editorial" => "Dutton Books"),
            array("titulo" => "Buscando a Alaska", "autor" => "John Green", "editorial" => "Dutton Books"),
            array("titulo" => "El teorema Katherine", "autor" => "John Green", "editorial" => "Dutton Books"),
            array("titulo" => "Ciudades de papel", "autor" => "John Green", "editorial" => "Dutton Books"),
        ];
    }
    public function getDatosWilliamShakespeare()
    {
        return [
            array("titulo" => "Romeo y Julieta", "autor" => "William Shakespeare", "editorial" => "Espasa Calpe"),
            array("titulo" => "Otelo", "autor" => "William Shakespeare", "editorial" => "Espasa Calpe"),
            array("titulo" => "Hamlet", "autor" => "William Shakespeare", "editorial" => "Espasa Calpe"),
            array("titulo" => "Macbeth", "autor" => "William Shakespeare", "editorial" => "Espasa Calpe"),
        ];
    }
    public function getDatosPabloNeruda()
    {
        return [
            array("titulo" => "Confieso que he vivido", "autor" => "Pablo Neruda", "editorial" => "Nascimento"),
            array("titulo" => "Veinte poemas de amor y una canción desesperada", "autor" => "Pablo Neruda", "editorial" => "Nascimento"),
            array("titulo" => "Residencia en la Tierra", "autor" => "Pablo Neruda", "editorial" => "Nascimento"),
            array("titulo" => "Canto general", "autor" => "Pablo Neruda", "editorial" => "Nascimento"),
        ];
    }
    public function getDatosLouisaAlcott()
    {
        return [
            array("titulo" => "Mujercitas", "autor" => "Louisa May Alcott", "editorial" => "Roberts Brothers"),
            array("titulo" => "Aquellas mujercitas", "autor" => "Louisa May Alcott", "editorial" => "Roberts Brothers"),
            array("titulo" => "Hombrecitos", "autor" => "Louisa May Alcott", "editorial" => "Roberts Brothers"),
            array("titulo" => "Aquellos hombrecitos", "autor" => "Louisa May Alcott", "editorial" => "Roberts Brothers"),
        ];
    }
    public function getRevistas()
    {
        # code...
    }

    public function exa2()
    {
        $datos = $this->getDatosJohnGreen();
        // foreach ($datos as $libro) {
        //     echo $libro["titulo"];
        // }
        echo $datos[2]["titulo"];
    }
    public function exa()
    {
        $book = new Libro("El principito", "Antoine de Saint-Exupery", "ENI");
        echo json_encode($book->getPublicacion());
    }
}
