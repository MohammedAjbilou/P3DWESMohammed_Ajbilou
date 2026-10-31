<?php

require_once "Vivienda.php";

class Alquiler extends Vivienda {

private $rentaMensual;
private $subidaAnual;

	
	public function __construct($superficie, $plazo, $rentaMensual, $subidaAnual)
    {
     parent::__construct($superficie, $plazo);
        $this->rentaMensual = $rentaMensual ;
        $this->subidaAnual = $subidaAnual;

    }
    
    public function calcularCosteTotal()
    {
        $s = $this->subidaAnual / 100;
        $n = $this->plazo;

        if ($s == 0) {
            return 12 * $this->rentaMensual * $n;
        }

        return 12 * $this->rentaMensual * (pow(1 + $s, $n) - 1) / $s;
    }

    public function mostrarFila()
    {
        echo "<tr>";
        echo "<td> Alquiler </td>";
        echo "<td>". $this->rentaMensual ."$</td>";
        echo "<td>". $this->superficie ."m2</td>";
        echo "<td>". $this->plazo ."años</td>";
         echo "<td>-</td>";
        echo "<td>" . number_format($this->calcularCosteTotal(), 2, ',', '.') . " €</td>";
        echo "/tr";
        
    }
    
}

?>