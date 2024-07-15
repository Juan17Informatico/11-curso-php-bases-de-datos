<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Lista de ingresos</title>
</head>
<body>
    <main>
        <h1>Lista de ingresos</h1>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Metodo de Pago</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($results as $result) : ?>
                        <tr>
                            <td><?php echo $result["type"]; ?></td>
                            <td><?php echo $result["payment_method"]; ?></td>
                            <td><?php echo $result["amount"]; ?></td>
                            <td><?php echo $result["date"]; ?></td>
                            <td><?php echo $result["description"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a class="a-agregar" href="/incomes/create">Agregar Nuevo Ingreso</a>
        </div>
    </main>

</body>
</html>