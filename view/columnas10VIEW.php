<?php
include_once '../controller/readColumnas10.php';
//exit();
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
                <tr><th></th><th></th><th colspan="2">Saldos</th><th colspan="2">Ajustes</th><th colspan="2">Saldos Ajustados</th><th colspan="2">Estado de Resultados</th><th colspan="2">Balance General</th></tr>
                <tr><th></th><th>Detalle</th><th>Deudor</th><th>Acreedor</th><th>Debe</th><th>Haber</th><th>Deudor</th><th>Acreedor</th><th>Gastos</th><th>Ingresos</th><th>Activos</th><th>Pasivos y Pr</th></tr>
                <?php
                for ($i = 0; $i < count($arrayResultado); $i++) {
                    echo "<tr><td class='number'>" . ($i + 1) . "</td><td>" . $arrayResultado[$i]['nombre'] . "</td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['deudor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['acreedor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['ajusteDebe']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['ajusteHaber']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['deudorAJ']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['acreedorAJ']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['gastos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['ingresos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['activos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayResultado[$i]['pasivos']) . "</div></td></tr>";
                }
                $count=$i;
                ?>
                <tr class="footer-table"><td></td><td>Totales</td><td><div class="decimal"><?php echo toDecimal($totalDeudor) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAcreedor) ?></div></td></tr>
                <?php
                for ($i = 0; $i < count($arrayAjustes); $i++) {
                    echo "<tr><td class='number'>" . ($count+($i+1)) . "</td><td><b>" . $arrayAjustesMostrar[$i]['nombre'] . "</b></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['deudor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['acreedor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['ajusteDebe']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['ajusteHaber']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['deudorAJ']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['acreedorAJ']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['gastos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['ingresos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['activos']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayAjustesMostrar[$i]['pasivos']) . "</div></td></tr>";
                }
                ?>                
<!--<tr class="footer-table"><td></td><td>Totales</td><td><div class="decimal"><?php echo toDecimal($totalDeudor) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAcreedor) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesDebe) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesHaber) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesDebeSaldo) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesHaberSaldo) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalGastos) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalIngresos) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalActivos) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalPasivos) ?></div></td></tr>-->

               <!-- <tr class="footer-table"><td></td><td>Utilidad del Periodo</td><td></td><td></td><td><div class="decimal"><?php echo toDecimal($gastosAux) ?></div></td><td><div class="decimal"><?php echo toDecimal($ingresosAux) ?></div></td><td><div class="decimal"><?php echo toDecimal($activosAux) ?></div></td><td><div class="decimal"><?php echo toDecimal($pasivosAux) ?></div></td></tr>
                <tr class="footer-table"><td></td><td></td><td></td><td></td><td><div class="decimal"><?php echo toDecimal($gastosAux + $totalGastos) ?></div></td><td><div class="decimal"><?php echo toDecimal($ingresosAux + $totalIngresos) ?></div></td><td><div class="decimal"><?php echo toDecimal($activosAux + $totalActivos) ?></div></td><td><div class="decimal"><?php echo toDecimal($pasivosAux + $totalPasivos) ?></div></td></tr>
                -->

                <tr class="footer-table"><td></td><td>Totales</td><td><div class="decimal"><?php echo toDecimal($totalDeudorAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAcreedorAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesDebeAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesHaberAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesDebeSaldoAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalAjustesHaberSaldoAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalGastosAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalIngresosAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalActivosAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalPasivosAJ) ?></div></td></tr>

                <tr class="footer-table"><td></td><td>Utilidad del Periodo</td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class="decimal"><?php echo toDecimal($gastosAuxAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($ingresosAuxAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($activosAuxAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($pasivosAuxAJ) ?></div></td></tr>
                <tr class="footer-table"><td></td><td>Total Final</td><td></td><td></td><td></td><td></td><td></td><td></td><td><div class="decimal"><?php echo toDecimal($gastosAuxAJ + $totalGastosAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($ingresosAuxAJ + $totalIngresosAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($activosAuxAJ + $totalActivosAJ) ?></div></td><td><div class="decimal"><?php echo toDecimal($pasivosAuxAJ + $totalPasivosAJ) ?></div></td></tr>

            </table>
        </div>
    </body>
</html>


