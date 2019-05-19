<?php

include_once '../dao/resultadoDAO.php';
include_once '../controller/functions.php';

function buscarAjuste($idCuenta, $arrayAjustes) {
    for ($k = 0; $k < count($arrayAjustes); $k++) {
        if ($idCuenta == $arrayAjustes[$k]['idCuenta']) {
            return $arrayAjustes[$k];
        }
    }
    return "NE";
}

$arrayResultado = ResultadoDao::recoverAllByTipoAsiento("NORMAL");
$arrayAjustes = ResultadoDao::recoverAllByTipoAsiento("AJUSTE");
for ($i = 0; $i < count($arrayResultado); $i++) {
    $ajuste = buscarAjuste($arrayResultado[$i]['idCuenta'], $arrayAjustes);
    if ($ajuste != "NE") {
        $arrayResultado[$i]['ajusteDebe'] = $arrayResultado[$i]['sumdebe'];
        $arrayResultado[$i]['ajusteHaber'] = $arrayResultado[$i]['sumhaber'];
    } else {
        $arrayResultado[$i]['ajusteDebe'] = 0.00;
        $arrayResultado[$i]['ajusteHaber'] = 0.00;
    }
}




for ($i = 0; $i < count($arrayResultado); $i++) {
    if ($arrayResultado[$i]['sumdebe'] != $arrayResultado[$i]['sumhaber']) {
        if ($arrayResultado[$i]['sumdebe'] > $arrayResultado[$i]['sumhaber']) {
            $arrayResultado[$i]['deudor'] = $arrayResultado[$i]['sumdebe'] - $arrayResultado[$i]['sumhaber'];
            $arrayResultado[$i]['acreedor'] = "0.00";
        } else {
            $arrayResultado[$i]['acreedor'] = $arrayResultado[$i]['sumhaber'] - $arrayResultado[$i]['sumdebe'];
            $arrayResultado[$i]['deudor'] = "0.00";
        }
    } else {
        $arrayResultado[$i]['deudor'] = "0.00";
        $arrayResultado[$i]['acreedor'] = "0.00";
    }
    $arrayResultado[$i]['sumdebeAJ'] = $arrayResultado[$i]['deudor'] + $arrayResultado[$i]['ajusteDebe'];
    $arrayResultado[$i]['sumhaberAJ'] = $arrayResultado[$i]['acreedor'] + $arrayResultado[$i]['ajusteHaber'];
    if ($arrayResultado[$i]['sumdebeAJ'] != $arrayResultado[$i]['sumhaberAJ']) {
        if ($arrayResultado[$i]['sumdebeAJ'] > $arrayResultado[$i]['sumhaberAJ']) {
            $arrayResultado[$i]['deudorAJ'] = $arrayResultado[$i]['sumdebeAJ'] - $arrayResultado[$i]['sumhaberAJ'];
            $arrayResultado[$i]['acreedorAJ'] = "0.00";
        } else {
            $arrayResultado[$i]['acreedorAJ'] = $arrayResultado[$i]['sumhaber'] - $arrayResultado[$i]['sumdebe'];
            $arrayResultado[$i]['deudorAJ'] = "0.00";
        }
    } else {
        $arrayResultado[$i]['deudorAJ'] = "0.00";
        $arrayResultado[$i]['acreedorAJ'] = "0.00";
    }
}

for ($i = 0; $i < count($arrayResultado); $i++) {
    if ($arrayResultado[$i]['tipo'] == "INGRESO") {
        $arrayResultado[$i]['ingresos'] = $arrayResultado[$i]['deudorAJ'] + $arrayResultado[$i]['acreedorAJ'];
        $arrayResultado[$i]['gastos'] = "0.00";
        $arrayResultado[$i]['activos'] = "0.00";
        $arrayResultado[$i]['pasivos'] = "0.00";
    }
    if ($arrayResultado[$i]['tipo'] == "EGRESO") {
        $arrayResultado[$i]['ingresos'] = "0.00";
        $arrayResultado[$i]['gastos'] = $arrayResultado[$i]['acreedorAJ'] + $arrayResultado[$i]['deudorAJ'];
        $arrayResultado[$i]['activos'] = "0.00";
        $arrayResultado[$i]['pasivos'] = "0.00";
    }
    if ($arrayResultado[$i]['tipo'] == "ACTIVO") {
        $arrayResultado[$i]['ingresos'] = "0.00";
        $arrayResultado[$i]['gastos'] = "0.00";
        $arrayResultado[$i]['activos'] = $arrayResultado[$i]['acreedorAJ'] + $arrayResultado[$i]['deudorAJ'];
        $arrayResultado[$i]['pasivos'] = "0.00";
    }
    if ($arrayResultado[$i]['tipo'] == "PASIVO" || $arrayResultado[$i]['tipo'] == "PATRIMONIO") {
        $arrayResultado[$i]['ingresos'] = "0.00";
        $arrayResultado[$i]['gastos'] = "0.00";
        $arrayResultado[$i]['activos'] = "0.00";
        $arrayResultado[$i]['pasivos'] = $arrayResultado[$i]['acreedorAJ'] + $arrayResultado[$i]['deudorAJ'];
    }
}

$totalDeudor = 0.00;
$totalAcreedor = 0.00;
$totalAjustesDebe = 0.00;
$totalAjustesHaber = 0.00;
$totalAjustesDebeSaldo = 0.00;
$totalAjustesHaberSaldo = 0.00;
$totalGastos = 0.00;
$totalIngresos = 0.00;
$totalActivos = 0.00;
$totalPasivos = 0.00;



for ($i = 0; $i < count($arrayResultado); $i++) {

    $totalDeudor+=$arrayResultado[$i]['deudor'];
    $totalAcreedor+=$arrayResultado[$i]['acreedor'];
    $totalAjustesDebe+=$arrayResultado[$i]['ajusteDebe'];
    $totalAjustesHaber+=$arrayResultado[$i]['ajusteHaber'];
    $totalAjustesDebeSaldo+=$arrayResultado[$i]['deudorAJ'];
    $totalAjustesHaberSaldo+=$arrayResultado[$i]['acreedorAJ'];
    $totalGastos +=$arrayResultado[$i]['gastos'];
    $totalIngresos +=$arrayResultado[$i]['ingresos'];
    $totalActivos +=$arrayResultado[$i]['activos'];
    $totalPasivos +=$arrayResultado[$i]['pasivos'];
}

$utilidadResultados = 0.00;
$utilidadBalance = 0.00;
$gastosAux = 0.00;
$ingresosAux = 0.00;
$activosAux = 0.00;
$pasivosAux = 0.00;
if (($totalIngresos - $totalGastos) >= 0.00) {
    $gastosAux = $totalIngresos - $totalGastos;
} else {
    $ingresosAux = $totalGastos - $totalIngresos;
}
if ($gastosAux > 0.00) {
    $pasivosAux = $gastosAux;
} else {
    $activosAux = $ingresosAux;
}


/* Ajustes */
$arrayAjustesMostrar = array();
for ($i = 0; $i < count($arrayAjustes); $i++) {
    $ajuste = buscarAjuste($arrayAjustes[$i]['idCuenta'], $arrayResultado);
    if ($ajuste == "NE") {
        $arrayAjustes[$i]['deudor'] = 0.00;
        $arrayAjustes[$i]['acreedor'] = 0.00;
        $arrayAjustes[$i]['ajusteDebe'] = $arrayAjustes[$i]['sumdebe'];
        $arrayAjustes[$i]['ajusteHaber'] = $arrayAjustes[$i]['sumhaber'];
        $arrayAjustes[$i]['deudorAJ'] = $arrayAjustes[$i]['sumdebe'];
        $arrayAjustes[$i]['acreedorAJ'] = $arrayAjustes[$i]['sumhaber'];
        if ($arrayAjustes[$i]['tipo'] == "INGRESO") {
            $arrayAjustes[$i]['ingresos'] = $arrayAjustes[$i]['deudorAJ'] + $arrayAjustes[$i]['acreedorAJ'];
            $arrayAjustes[$i]['gastos'] = "0.00";
            $arrayAjustes[$i]['activos'] = "0.00";
            $arrayAjustes[$i]['pasivos'] = "0.00";
        }
        if ($arrayAjustes[$i]['tipo'] == "EGRESO") {
            $arrayAjustes[$i]['ingresos'] = "0.00";
            $arrayAjustes[$i]['gastos'] = $arrayAjustes[$i]['acreedorAJ'] + $arrayAjustes[$i]['deudorAJ'];
            $arrayAjustes[$i]['activos'] = "0.00";
            $arrayAjustes[$i]['pasivos'] = "0.00";
        }
        if ($arrayAjustes[$i]['tipo'] == "ACTIVO") {
            $arrayAjustes[$i]['ingresos'] = "0.00";
            $arrayAjustes[$i]['gastos'] = "0.00";
            $arrayAjustes[$i]['activos'] = $arrayAjustes[$i]['acreedorAJ'] + $arrayAjustes[$i]['deudorAJ'];
            $arrayAjustes[$i]['pasivos'] = "0.00";
        }
        if ($arrayAjustes[$i]['tipo'] == "PASIVO" || $arrayAjustes[$i]['tipo'] == "PATRIMONIO") {
            $arrayAjustes[$i]['ingresos'] = "0.00";
            $arrayAjustes[$i]['gastos'] = "0.00";
            $arrayAjustes[$i]['activos'] = "0.00";
            $arrayAjustes[$i]['pasivos'] = $arrayAjustes[$i]['acreedorAJ'] + $arrayAjustes[$i]['deudorAJ'];
        }
        array_push($arrayAjustesMostrar, $arrayAjustes[$i]);
    }
}





$totalDeudorAJ = $totalDeudor;
$totalAcreedorAJ = $totalAcreedor;
$totalAjustesDebeAJ = 0.00;
$totalAjustesHaberAJ = 0.00;
$totalAjustesDebeSaldoAJ = 0.00;
$totalAjustesHaberSaldoAJ = 0.00;
$totalGastosAJ = 0.00;
$totalIngresosAJ = 0.00;
$totalActivosAJ = 0.00;
$totalPasivosAJ = 0.00;

for ($i = 0; $i < count($arrayAjustesMostrar); $i++) {
    $totalAjustesDebeAJ+=$arrayAjustesMostrar[$i]['ajusteDebe'];
    $totalAjustesHaberAJ+=$arrayAjustesMostrar[$i]['ajusteHaber'];
    $totalAjustesDebeSaldoAJ+=$arrayAjustesMostrar[$i]['deudorAJ'];
    $totalAjustesHaberSaldoAJ+=$arrayAjustesMostrar[$i]['acreedorAJ'];
    $totalGastosAJ +=$arrayAjustesMostrar[$i]['gastos'];
    $totalIngresosAJ +=$arrayAjustesMostrar[$i]['ingresos'];
    $totalActivosAJ +=$arrayAjustesMostrar[$i]['activos'];
    $totalPasivosAJ +=$arrayAjustesMostrar[$i]['pasivos'];
}

$totalAjustesDebeAJ+=$totalAjustesDebe;
$totalAjustesHaberAJ+=$totalAjustesHaber;
$totalAjustesDebeSaldoAJ+=$totalAjustesDebeSaldo;
$totalAjustesHaberSaldoAJ+=$totalAjustesHaberSaldo;
$totalGastosAJ +=$totalGastos;
$totalIngresosAJ +=$totalIngresos;
$totalActivosAJ +=$totalActivos;
$totalPasivosAJ +=$totalPasivos;

$utilidadResultadosAJ = 0.00;
$utilidadBalanceAJ = 0.00;
$gastosAuxAJ = 0.00;
$ingresosAuxAJ = 0.00;
$activosAuxAJ = 0.00;
$pasivosAuxAJ = 0.00;

if (($totalIngresosAJ - $totalGastosAJ) >= 0.00) {
    $gastosAuxAJ = $totalIngresosAJ - $totalGastosAJ;
} else {
    $ingresosAuxAJ = $totalGastosAJ - $totalIngresosAJ;
}
if ($gastosAuxAJ > 0.00) {
    $pasivosAuxAJ = $gastosAuxAJ;
} else {
    $activosAuxAJ = $ingresosAuxAJ;
}
?>
