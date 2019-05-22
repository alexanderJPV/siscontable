<?php
include_once '../controller/readMayor.php';
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
            <?php
            for ($i = 0; $i < count($arrayLibroMayor); $i++) {
                $asientos = $arrayLibroMayor[$i]['asientos'];
                if (count($asientos) > 0) {
                    ?>

                    <table>
                        <caption><h3><?php echo $arrayLibroMayor[$i]['cuenta'] ?></h3></caption>
                        <tr><th></th><th>Fecha</th><th>Nro. Asiento</th><th>Debe</th><th>Haber</th></tr>
                        <?php
                        $sumDebe = 0.00;
                        $sumHaber = 0.00;

                        for ($k = 0; $k < count($asientos); $k++) {
                            echo "<tr><td class='number'>" . ($k + 1) . "</td><td><div>" . convertDateMySQLToExt($asientos[$k]['fecha']) . "</div></td><td><div class='decimal'>" . $asientos[$k]['iddiario'] . "</div></td><td><div class='decimal'>" . toDecimal($asientos[$k]['debe']) . "</div></td><td><div class='decimal'>" . toDecimal($asientos[$k]['haber']) . "</div></td></tr>";
                            $sumDebe+=$asientos[$k]['debe'];
                            $sumHaber+=$asientos[$k]['haber'];
                        }
                        $totalSaldoDebe = "";
                        $totalSaldoHaber = "";
                        if ($sumDebe > $sumHaber)
                            $totalSaldoDebe = toDecimal($sumDebe - $sumHaber);
                        if ($sumDebe < $sumHaber)
                            $totalSaldoHaber = toDecimal($sumHaber - $sumDebe);
                        ?>
                        <tr class="footer-table"><td></td><td></td><td>Totales</td><td><div class="decimal"><?php echo toDecimal($sumDebe) ?></div></td><td><div class="decimal"><?php echo toDecimal($sumHaber) ?></div></td></tr>
                        <tr class="footer-table"><td></td><td></td><td>Saldo</td><td><div class="decimal"><?php echo $totalSaldoDebe ?></div></td><td><div class="decimal"><?php echo $totalSaldoHaber ?></div></td></tr>

                    </table>
                    <?php
                }
            }
            ?>
        </div>
    </body>
</html>