<?php
require_once("Business/Libro.php");
require_once("Business/Revista.php");
require_once("Business/PublicacionPrototype.php");

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

        $datos = $this->getDatosRevistas();
        $this->getRevistas($datos);

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
    public function getRevistas($datos)
    {
        $revista = new Revista($datos[0]["titulo"], $datos[0]["tema"], $datos[0]["autores"], $datos[0]["editorial"]);
        array_push($this->publicaciones, $revista);

        for ($i = 1; $i < count($datos); $i++) {
            $revistaClonada = $revista->clonar();
            $revistaClonada->setTema($datos[$i]["tema"]);
            $revistaClonada->setAutores($datos[$i]["autores"]);
            array_push($this->publicaciones, $revistaClonada);
        }
    }
    public function getDatosRevistas()
    {
        return [
            array("titulo" => "Investigacion y Ciencia", "tema" => "El universo", "autores" => "Mendoza, Garcia, Bruner", "editorial" => "ENI 01-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "La Inteligencia artificial", "autores" => "Hidalgo, Bruner, D'Andrea", "editorial" => "ENI 03-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "LA celula", "autores" => "D'Andrea, Mendoza, Soliveres", "editorial" => "ENI 05-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "El coranavirus", "autores" => "Soliveres, Bruner, Garcia", "editorial" => "ENI 06-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "La vacuna", "autores" => "Mendoza, Garcia, Bruner", "editorial" => "ENI 08-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "Los nuevos soldados", "autores" => "Hidalgo, Bruner, D'Andrea", "editorial" => "ENI 09-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "Marte", "autores" => "D'Andrea, Mendoza, Soliveres", "editorial" => "ENI 10-20"),
            array("titulo" => "Investigacion y Ciencia", "tema" => "Descubriendo vida", "autores" => "Soliveres, Bruner, Garcia", "editorial" => "ENI 12-20"),
        ];
    }
}
