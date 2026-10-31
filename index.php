<?php

session_start();

require_once "clases/Vivienda.php";
require_once "clases/Alquiler.php";
require_once "clases/Compra.php";
require_once "clases/ConstruccionPropia.php";
require_once "clases/ColeccionViviendas.php";

if (!isset($_SESSION["viviendas"])) {
    $_SESSION["viviendas"] = new ColeccionViviendas();
}

$tipo = "";

if (isset($_POST["seleccionar"])) {
    $tipo = $_POST["tipo"];
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comparador de viviendas</title>
</head>
<body>

    <h1>Comparador de viviendas</h1>

    <h2>Selecciona el tipo de vivienda</h2>

    <form action="index.php" method="post">

        <select name="tipo">
            <option value="alquiler">Alquiler</option>
            <option value="compra">Compra</option>
            <option value="construccion">Construcción propia</option>
        </select>

        <br><br>

        <input type="submit" name="seleccionar" value="Seleccionar">

    </form>

    <?php

if ($tipo == "alquiler") {
?>

    <h2>Datos del alquiler</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="tipo" value="alquiler">

        <label>Superficie (m2):</label>
        <input type="number" name="superficie">
        <br><br>

        <label>Plazo (años):</label>
        <input type="number" name="plazo">
        <br><br>

        <label>Renta mensual:</label>
        <input type="number" name="rentaMensual">
        <br><br>

        <label>Subida anual (%):</label>
        <input type="number" name="subidaAnual">
        <br><br>

        <input type="submit" name="anadir" value="Añadir">

    </form>

<?php
}

if ($tipo == "compra") {
?>

    <h2>Datos de la compra</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="tipo" value="compra">

        <label>Superficie (m2):</label>
        <input type="number" name="superficie">
        <br><br>

        <label>Plazo (años):</label>
        <input type="number" name="plazo">
        <br><br>

        <label>Precio de compra:</label>
        <input type="number" name="precio">
        <br><br>

        <label>Porcentaje de entrada (%):</label>
        <input type="number" name="porcentajeEntrada">
        <br><br>

        <label>Tasa anual (%):</label>
        <input type="number" name="tasaAnual">
        <br><br>

        <input type="submit" name="anadir" value="Añadir">

    </form>

<?php
}

if ($tipo == "construccion") {
?>

    <h2>Datos de construcción propia</h2>

    <form action="index.php" method="post">

        <input type="hidden" name="tipo" value="construccion">

        <label>Superficie (m2):</label>
        <input type="number" name="superficie">
        <br><br>

        <label>Plazo (años):</label>
        <input type="number" name="plazo">
        <br><br>

        <label>Precio del suelo:</label>
        <input type="number" name="precioSuelo">
        <br><br>

        <label>Coste por m2:</label>
        <input type="number" name="costeM2">
        <br><br>

        <label>Honorarios (%):</label>
        <input type="number" name="honorarios">
        <br><br>

        <label>Porcentaje de entrada (%):</label>
        <input type="number" name="porcentajeEntrada">
        <br><br>

        <label>Tasa anual (%):</label>
        <input type="number" name="tasaAnual">
        <br><br>

        <input type="submit" name="anadir" value="Añadir">

    </form>

<?php
}
?>

</body>
</html>