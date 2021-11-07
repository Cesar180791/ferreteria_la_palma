<?php
$medidaTicket = 180;

?>
<!DOCTYPE html>
<html>

<head>

    <style>
        * {
            font-size: 12px;
            font-family: 'DejaVu Sans', serif;
        }

        h1 {
            font-size: 18px;
        }

        .ticket {
            margin: 2px;
        }

        td,
        th,
        tr,
        table {
            border-top: 1px solid black;
            border-collapse: collapse;
            margin: 1 auto;
        }

        td.precio {
            text-align: right;
            font-size: 10px;
        }

        td.cantidad {
            font-size: 10px;
        }

        td.producto {
            text-align: center;
        }

        th {
            text-align: center;
        }


        .centrado {
            text-align: center;
            align-content: center;
        }

        .ticket {
            width: <?php echo $medidaTicket ?>px;
            max-width: <?php echo $medidaTicket ?>px;
        }

        img {
            max-width: inherit;
            width: inherit;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .ticket {
            margin: 0;
            padding: 0;
        }

        body {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="ticket centrado">
        <h1>Ferreteria la Palma</h1>
        <h2>Ticket de venta</h2>
        <h2>{{ \Carbon\Carbon::now('America/El_Salvador')->format('d-M-Y')}}</h2>

        <table>
            <thead>
                <tr class="centrado">
                    <th class="cantidad">Cant</th>
                    <th class="producto">Producto</th>
                    <th class="precio">P.U</th>
                    <th class="precio">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="cantidad">{{$item->quantity}}</td>
                        <td class="producto">{{$item->name}}</td>
                        <td class="precio">${{number_format($item->price,2)}}</td>
                        <td class="precio">${{number_format($item->price * $item->quantity,2)}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tr>
                <td class="cantidad"></td>
                <td class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td class="precio">
                    ${{number_format($sale->total,2)}}
                </td>
            </tr>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
            <br>Ferreteria la Palma</p>
    </div>
</body>

</html>