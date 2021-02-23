<?php
require_once("Business/PublicacionPrototype.php");

class Libro extends PublicacionPrototype
{
    public $autor;

    public function __construct($titulo, $autor, $editorial)
    {
        $this->tipo = "Libro";
        $this->autor = $autor;

        parent::__construct($titulo, $editorial);
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    
    public function clonarPHP()
    {
        return clone $this;
    }
    public function clonar()
    {
        return new Libro($this->getTitulo(), $this->getAutor(), $this->getEditorial());
    }
}
