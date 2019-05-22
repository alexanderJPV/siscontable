<link  rel="stylesheet" href="css/styles2.css" type="text/css"/>
 <script type="text/javascript" src="js/admin222.js"></script>
 <body>
    <div class="header" id="header">
        <div class="icono" style="float:right;" id="salir">
            <img src="images/exit1.png" width="30"  height="30" title="Salir..."/>
        </div>
        <!-- <div id="cabecera" style="float:left; margin-left:10px; margin-top:5px;">
            <img id="logcab" src="images/contabanner.jpg" width="90">
        </div> -->
        <div style="float:right; margin-top:10px; color: #fff">
            <?php
                echo "<strong style='color:#B89757'>Session usuario: </strong>" . $_SESSION['user'];
            ?>
        </div>
    </div>
</body>
