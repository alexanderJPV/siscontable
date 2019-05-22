<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
if(!isset($_SESSION['user']))
{
    header("Location:../index.php");
}
   
?>
