<?php

/*
 * @autor A66 
 */

function convertDateToMySQL($date) {
    $arrayDate = explode("/", $date);
    $newDate = $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];
    return $newDate;
}

function convertDateMySQLToExt($date) {
    $arrayDate = explode("-", $date);
    $newDate = $arrayDate[2] . "/" . $arrayDate[1] . "/" . $arrayDate[0];
    return $newDate;
}

function getTimeMySQLDateTime($dateTime) {
    $arrayDate = explode(" ", $dateTime);
    return $arrayDate[1];
}

function getDateMySQLDateTime($dateTime) {
    $arrayDate = explode(" ", $dateTime);
    return $arrayDate[0];
}

function convertDateTimeMySQLToDate($date) {
    $arrayDate = explode("/", $date);
    $newDate = $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];
    return $newDate;
}

function getMonth($mes) {
    $arrayMonth = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    return $arrayMonth[$mes - 1];
}

function toDecimal($number) {
    $arrayNumber = explode(".", $number);
    if (count($arrayNumber) == 1) {
        return $number . ".00";
    } else {
        if (strlen($arrayNumber[1]) == 1) {
            return $number . "0";
        }
    }
    return $number;
}

function getDateStringPDF() {
    $day = date("d");
    $month = getMonth(date("m"));
    $year = date("Y");
    return ($day . " de " . $month . " de " . $year);
}

?>
