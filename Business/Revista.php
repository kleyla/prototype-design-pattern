<?php
require_once("Business/PublicacionPrototype.php");

class Revista extends PublicacionPrototype
{
    public $autores;
    public $tema;

    public function __construct($titulo, $tema, $autores, $editorial)
    {
        $this->tipo = "Revista";
        $this->autores = $autores;
        $this->tema = $tema;
        parent::__construct($titulo, $editorial);
    }

    public function setAutores($autores)
    {
        $this->autores = $autores;
    }
    public function setTema($tema)
    {
        $this->tema = $tema;
    }
    public function getAutores()
    {
        return $this->autores;
    }
    public function getTema()
    {
        return $this->tema;
    }

    public function clonarPHP()
    {
        return clone $this;
    }
    public function clonar()
    {
        return new Revista($this->getTitulo(), $this->getTema(), $this->getAutores(), $this->getEditorial());
    }
}
