<?php

require_once "ListaViviendas.php";
require_once "Vivienda.php";

class ColeccionViviendas implements ListaViviendas {

    private $viviendas;

    public function __construct() {
        $this->viviendas = array();
    }

    public function insertar_vivienda($vivienda) {
        $this->viviendas[] = $vivienda;
    }

    public function eliminar_primera(): Vivienda {
        return array_shift($this->viviendas);
    }

    public function ordenar_por_coste_total(): array {

        $viviendasOrdenadas = $this->viviendas;

        for ($i = 0; $i < count($viviendasOrdenadas) - 1; $i++) {

            for ($j = 0; $j < count($viviendasOrdenadas) - 1 - $i; $j++) {

                if ($viviendasOrdenadas[$j]->calcularCosteTotal() > $viviendasOrdenadas[$j + 1]->calcularCosteTotal()) {

                    $auxiliar = $viviendasOrdenadas[$j];

                    $viviendasOrdenadas[$j] = $viviendasOrdenadas[$j + 1];

                    $viviendasOrdenadas[$j + 1] = $auxiliar;
                }
            }
        }

        return $viviendasOrdenadas;
    }
}

?>
