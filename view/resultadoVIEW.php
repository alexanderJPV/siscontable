<?php
include_once '../controller/readResultados.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/view.css"/>
    </head>
    <body>
        <div class="table-ext">
            <table>
                <tr><th></th><th>Detalle</th><th>Deudor</th><th>Acreedor</th><th>Gastos</th><th>Ingresos</th><th>Activos</th><th>Pasivos y Pr</th></tr>
                <?php
                for ($i = 0; $i < count($arrayResultado); $i++) {
                    echo "<tr><td class='number'>" . ($i + 1) . "</td><td>" . $arrayResultado[$i]['nombre'] . "</td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['deudor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['acreedor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['gastos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['ingresos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['activos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['pasivos']) . "</div></td></tr>";
                }
                ?>
                <tr class="footer-table"><td></td><td>Totales</td><td><div class="decimal"><?php echo toDecimal($totalDeudor) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAcreedor) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalGastos) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalIngresos) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalActivos) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalPasivos) ?></div></td></tr>
                <tr class="footer-table"><td></td><td>Utilidad del Periodo</td><td></td><td></td><td><div class="decimal"><?php echo toDecimal($gastosAux) ?></div></td><td><div class="decimal"><?php echo toDecimal($ingresosAux) ?></div></td><td><div class="decimal"><?php echo toDecimal($activosAux) ?></div></td><td><div class="decimal"><?php echo toDecimal($pasivosAux) ?></div></td></tr>
                <tr class="footer-table"><td></td><td></td><td></td><td></td><td><div class="decimal"><?php echo toDecimal($gastosAux+$totalGastos) ?></div></td><td><div class="decimal"><?php echo toDecimal($ingresosAux+$totalIngresos) ?></div></td><td><div class="decimal"><?php echo toDecimal($activosAux+$totalActivos) ?></div></td><td><div class="decimal"><?php echo toDecimal($pasivosAux+$totalPasivos) ?></div></td></tr>
            </table>
        </div>
    </body>
</html>


