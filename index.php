<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conta316</title>|
        <link href="ext-3.0.0/resources/css/ext-all.css" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="ext-3.0.0/resources/css/ext-all.css" />
        <link rel="stylesheet" type="text/css" href="ext-3.0.0/resources/css/DarkGrayTheme/css/xtheme-darkgray.css"/>
        <link rel="stylesheet" type="text/css" href="css/file-upload.css"/>
        <link  rel="stylesheet" href="css/styles.css" type="text/css"/>
        <script src="ext-3.0.0/adapter/ext/ext-base.js" type="text/javascript"></script>                
        <script src="ext-3.0.0/ext-all.js" type="text/javascript"></script>
        
        <script src="ext-3.0.0/locale/ext-lang-es.js" type="text/javascript"></script>
        
        <script src="js/plugin.js" type="text/javascript"></script>
        <script src="js/tabclosemenu.js" type="text/javascript"></script>
        <script src="js/cuentas.js" type="text/javascript"></script>
        <script src="js/diarios.js" type="text/javascript"></script>
        <script src="js/mayor.js" type="text/javascript"></script>
        <script src="js/comprobacion.js" type="text/javascript"></script>
        <script src="js/resultados.js" type="text/javascript"></script>
        <script src="js/columnas10.js" type="text/javascript"></script>
        <script src="js/apertura.js" type="text/javascript"></script>
        <script src="js/bgyer.js" type="text/javascript"></script>


        <?php
        session_start();
        if (!isset($_SESSION['user'])) {
            ?>
            <script type="text/javascript" src="js/login.js" ></script>
            <?php
        } else {
            switch ($_SESSION['cod_rol']) {
                case 'ADM':
                    include("controller/admin.php");
                    break;

                case 'EDT':
                    include("controlador/admin_edt.php");
                    break;
            }
        }
        ?>
    </head>
    <body>

    </body>
</html>
