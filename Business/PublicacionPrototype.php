<?php

abstract class PublicacionPrototype
{
    public $titulo;
    public $tipo; // Libro o revista
    public $editorial;

    public function __construct($titulo, $editorial)
    {
        $this->titulo = $titulo;
        // $this->autor = $autor;
        $this->editorial = $editorial;
    }

    abstract  public function clonar();
    abstract  public function clonarPHP();

    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }
    public function setEditorial($editorial)
    {
        $this->editorial = $editorial;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getEditorial()
    {
        return $this->editorial;
    }
    public function getTipo()
    {
        return $this->tipo;
    }
    public function getPublicacion()
    {
        // return "Publicacion: <br>Tipo: " . $this->getTipo() . "<br> Titulo: " . $this->getTitulo() . "<br> Autor: " . $this->getAutor() . "<br> Editorial: " . $this->getEditorial();
        return $this;
    }
}
