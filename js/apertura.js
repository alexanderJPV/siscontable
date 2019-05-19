function printApertura() {
    var winRepApertura = new Ext.Window({
        id: 'winRepApertura',
        layout: 'column',
        title: 'Balance de Apertura',
        width: 850,
        height: 500,
        modal: true,
        maximizable:true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/aperturaPDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepApertura.show();
}

