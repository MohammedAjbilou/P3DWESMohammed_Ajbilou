<?php

require_once "Compra.php";

class ConstruccionPropia extends Compra {

    private $precioSuelo;
    private $costeM2;
    private $honorarios;

    public function __construct($superficie, $plazo, $precioSuelo, $costeM2, $honorarios, $porcentajeEntrada, $tasaAnual) {

        $precioTotal = $precioSuelo + $superficie * $costeM2 * (1 + $honorarios / 100);

        parent::__construct($superficie, $plazo, $precioTotal, $porcentajeEntrada, $tasaAnual);

        $this->precioSuelo = $precioSuelo;
        $this->costeM2 = $costeM2;
        $this->honorarios = $honorarios;
    }

    public function mostrarFila() {
        echo "<tr>";
        echo "<td>Construcción propia</td>";
        echo "<td>" . number_format($this->precio, 2, ',', '.') . " €</td>";
        echo "<td>" . $this->superficie . " m2</td>";
        echo "<td>" . $this->plazo . " años</td>";
        echo "<td>" . number_format($this->calcularCuotaMensual(), 2, ',', '.') . " €</td>";
        echo "<td>" . number_format($this->calcularCosteTotal(), 2, ',', '.') . " €</td>";
        echo "</tr>";
    }
}

?>
