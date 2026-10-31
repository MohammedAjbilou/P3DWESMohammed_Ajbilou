<?php
require_once "Vivienda.php";
require_once "Hipoteca.php";

class Compra extends Vivienda {

    protected $precio;
    private $porcentajeEntrada;
    private $tasaAnual;


    public function __construct($superficie, $plazo, $precio, $porcentajeEntrada, $tasaAnual)
    {
      parent::__construct($superficie, $plazo);

      $this->precio = $precio;
      $this->porcentajeEntrada = $porcentajeEntrada;
      $this->tasaAnual = $tasaAnual;
    
    }

    public function calcularEntrada() {
        return $this->precio * $this->porcentajeEntrada / 100;
    }

    public function calcularCapital() {
        return $this->precio - $this->calcularEntrada();
    }

     public function calcularCuotaMensual() {
        return Hipoteca::calcularCuotaMensualHipoteca(
            $this->calcularCapital(),
            $this->tasaAnual,
            $this->plazo
        );
    }

    public function calcularCosteTotal() {
        return $this->calcularEntrada() +
            12 * $this->plazo * $this->calcularCuotaMensual();
    }

    public function mostrarFila() {
        echo "<tr>";
        echo "<td>Compra</td>";
        echo "<td>" . number_format($this->precio, 2, ',', '.') . " €</td>";
        echo "<td>" . $this->superficie . " m2</td>";
        echo "<td>" . $this->plazo . " años</td>";
        echo "<td>" . number_format($this->calcularCuotaMensual(), 2, ',', '.') . " €</td>";
        echo "<td>" . number_format($this->calcularCosteTotal(), 2, ',', '.') . " €</td>";
        echo "</tr>";
    }
}

?>