<?php
require_once("Business/PublicacionPrototype.php");

class Libro extends PublicacionPrototype
{

    public function __construct($titulo, $autor, $editorial)
    {
        $this->tipo = "Libro";
        parent::__construct($titulo, $autor, $editorial);
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
