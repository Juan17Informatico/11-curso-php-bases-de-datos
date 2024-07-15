<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Agrega un nuevo ingreso</title>
</head>

<body>
    <main>
        <h1>Agrega un nuevo ingreso</h1>
        <a class="diferente" href="/incomes">Regresar</a>
        <form action="/incomes" method="post">
            <div>
                <div>
                    <label for="payment_method">Método de Pago</label>
                    <select name="payment_method" id="payment_method">
                        <option value="1" selected>Cuenta bancaria</option>
                        <option value="2">Tarjeta de crédito</option>
                    </select>
                </div>
                <div>
                    <label for="type">Tipo de ingreso</label>
                    <select name="type" id="type">
                        <option value="1" selected>Pago de nómina</option>
                        <option value="2">Reembolso</option>
                    </select>
                </div>
                <div>
                    <label for="date">Fecha</label>
                    <input type="text" name="date" id="date">
                </div>
                <div>
                    <label for="amount">Monto</label>
                    <input type="text" name="amount" id="amount">
                </div>
                <div>
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description"></textarea>
                </div>


                <input type="hidden" value="post" name="method">

                <button type="submit">Guardar</button>
            </div>


        </form>
    </main>
</body>

</html>