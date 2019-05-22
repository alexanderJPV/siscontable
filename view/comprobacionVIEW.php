<?php
include_once '../controller/readComprobacion.php';
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
                <tr><th></th><th>Detalle</th><th>Debe</th><th>Haber</th><th>Deudor</th><th>Acreedor</th></tr>
                <?php
                for ($i = 0; $i < count($arrayComprobacion); $i++) {
                    echo "<tr><td class='number'>" . ($i + 1) . "</td><td><div>" . $arrayComprobacion[$i]['nombre'] . "</div></td><td><div class='decimal'>" . toDecimal($arrayComprobacion[$i]['sumdebe']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayComprobacion[$i]['sumhaber']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayComprobacion[$i]['deudor']) . "</div></td><td><div class='decimal'>" . toDecimal($arrayComprobacion[$i]['acreedor']) . "</div></td></tr>";
                }
                ?>
                <tr class="footer-table"><td></td><td>Totales</td><td><div class="decimal"><?php echo toDecimal($totalDebe) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalHaber) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalDeudor) ?></div></td><td><div class="decimal"><?php echo toDecimal($totalDeudor) ?></div></td></tr>
            </table>
        </div>
    </body>
</html>