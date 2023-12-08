<?php
session_start();
if (isset($_SESSION['selectAll'])) {
    $results = $_SESSION['selectAll'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleForm.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #F5F5DC;

    }

    .containerAllForm {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .subContainerForm {
        border: solid 2px #3498DB;
        border-radius: 4px;
        width: 90vh;
        background-color: white;
        box-shadow: 0 4px 8px #dadada;
    }


    h3 {
        padding-top: 5px;
        padding-bottom: 10px;
    }

    label {
        color: #3498DB;
    }

    input {
        margin-top: 10px;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        border: solid 1px gray;
    }

    input:focus {
        outline: none;

    }

    button {
        background-color: #3498DB;
        width: 100%;
        border: none;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    button:hover {
        background-color: #39b0ff;
        cursor: pointer;
        transition: 0.3s;
    }



    .select {
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
    }

    .formulario {
        margin: 20px;
        padding-bottom: 10px;
    }
</style>

<body>
    <section class="containerAllForm">
        <h3>Formulario de Pedidos</h3>
        <section class="subContainerForm">
            <form action="../index.php?action=store&controller=ImprimirController" method="POST" class="formulario">
                <label for="cliente">Cliente:</label><br>
                <select id="cliente" name="cliente" class="select">
                    <?php foreach ($results as $result) : ?>
                        <option value="<?= $result['id']; ?>"> <?= $result['nombre'] ?></option>
                    <?php endforeach; ?>
                </select><br><br>

                <label for="descripcion">Descripción:</label><br>
                <input type="text" id="descripcion" name="descripcion"><br><br>

                <label for="nombreProducto">Nombre del Producto:</label><br>
                <input type="text" id="nombreProducto" name="nombreProducto"><br><br>

                <label for="cantidad">Cantidad:</label><br>
                <input type="number" id="cantidad" name="cantidad"><br><br>

                <label for="precioUnitario">Precio Unitario:</label><br>
                <input type="number" name="precioUnitario" id="precioUnitario"><br><br>

                <label for="fechaPedido">Fecha del Pedido:</label><br>
                <input type="date" name="fechaPedido" id="fechaPedido"><br><br>

                <button type="submit">Registrar Pedido</button>
            </form>
        </section>
    </section>
</body>

</html>