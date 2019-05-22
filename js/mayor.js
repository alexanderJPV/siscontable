function printMayor() {
    var winRepMayor = new Ext.Window({
        id: 'winRepMayor',
        layout: 'column',
        title: 'Libro Mayor',
        width: 850,
        height: 500,
        modal: true,
        maximizable:true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/mayorPDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepMayor.show();
}


function mayor() {
    var heightGrid = window.innerHeight || document.body.clientHeight;
     var toolbar = new Ext.Toolbar({
        defaults: {
            iconAlign: 'top'
        },
        items: [
            {
                text: 'Imprimir',
                iconCls: 'print',
                handler: function() {
                    printMayor();
                }
            }
        ]
    });


    var mayor = new Ext.Panel({
        iconCls: 'iconPanelNoticia',
        tbar: toolbar,
        height: heightGrid - 80,
        html: '<iframe src="view/mayorVIEW.php" style="width:100%;height:100%" frameborder="0"></iframe>"'
    });
    return mayor;
}