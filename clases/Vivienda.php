<?php
abstract class Vivienda{
    protected $superficie;
    protected $plazo;

    public function __construct($superficie,$plazo)
    {
        $this->superficie = $superficie;
        $this->plazo = $plazo;
    }

    public function getSuperficie(){
        return $this->superficie;
    }

    public function getPlazo(){
        return $this->plazo;
    }

    abstract public function calcularCosteTotal();

    abstract public function mostrarFila();

}
?>