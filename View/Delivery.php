<?php
session_start();

if (isset($_SESSION['join'])) {
    $pedidos = $_SESSION['join'];
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rbg(245, 245, 221);
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .head-title{
            background-color: rgb(58, 153, 216);
            border-radius: 8px;
        }

        .Request-Delivery {
            display: flex;
            padding: 10px;
            margin-top: 20px;
            color: #333;
            text-decoration:none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            justify-content: center;
            align-items: center;
            
        }
        .Request-Delivery:hover{
            color:rgb(58, 153, 216);
            text-decoration: underline;
        }

        .title {
            justify-content: center;
            align-items: center;
            display: flex;
            text-align: center;
        }

        table {
        max-width: 900px;
        margin: 50px auto;
        background-color: #fff;
        padding: 50px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    </style>
</head>

<body>

    <h2 class="title">Visualizacion de pedidos</h2>

    <table>
        <thead>
            <tr class="head-title">
                <th>ID Pedido</th>
                <th>Cliente</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Fecha del pedido</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $pedido) : ?>
                <tr>
                    <td><?= $pedido['id'] ?></td>
                    <td><?= $pedido['nombre'] ?></td>
                    <td><?= $pedido['descripcion'] ?></td>
                    <td><?= $pedido['cantidad'] ?></td>
                    <td><?= $pedido['precio_unitario'] ?></td>
                    <td><?= $pedido['fecha_pedido'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="../index.php?action=create&controller=ImprimirController" class="Request-Delivery">Volver a la pagina principal</a>

</body>

</html>