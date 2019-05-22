function printColumnas10() {
    var winRepCol10 = new Ext.Window({
        id: 'winRepResultados',
        layout: 'column',
        title: 'Hoja de Trabajo 10 Columnas',
        width: 850,
        height: 500,
        modal: true,
        maximizable: true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/columnas10PDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepCol10.show();
}
function columnas10() {

    var heightGrid = window.innerHeight || document.body.clientHeight;
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    var toolbar = new Ext.Toolbar({
        defaults: {
            iconAlign: 'top'
        },
        items: [
            {
                text: 'Imprimir',
                iconCls: 'print',
                handler: function() {
                    printColumnas10();
                }
            }
        ]
    });
    var columnas10 = new Ext.Panel({
        tbar: toolbar,
        iconCls: 'iconPanelNoticia',
        height: heightGrid - 80,
        html: '<iframe id="ifraCol10" src="view/columnas10VIEW.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    return columnas10;
}