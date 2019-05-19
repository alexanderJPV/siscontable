<link  rel="stylesheet" href="css/styles.css" type="text/css"/>
<script type="text/javascript" src="js/admin.js"></script>

<body>
    <div class="header" id="header">
        <div class="icono" style="float:right;" id="salir">
            <img src="images/exit.png" width="30"  height="30" title="Salir del sistema"/>
        </div>
        <div id="cabecera" style="float:left; margin-left:10px; margin-top:5px;">
            <img id="logcab" src="images/contabanner.jpg" width="90">
        </div>
        <div style="float:right; margin-top:10px; color: #fff">
            <?php
            echo "Usuario: " . $_SESSION['user'];
            ?>
        </div>
    </div>
</body>
