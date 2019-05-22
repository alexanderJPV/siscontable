function printComprobacion() {
    var winRepComprobacion = new Ext.Window({
        id: 'winRepComprobacion',
        layout: 'column',
        title: 'Balance de Comprobacion',
        width: 850,
        height: 500,
        modal: true,
        maximizable:true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/comprobacionPDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepComprobacion.show();
}


function comprobacion() {

    var store = new Ext.data.JsonStore({
        url: 'controller/readComprobacion.php',
        root: 'data',
        method: 'POST',
        totalProperty: 'total',
        fields: ['id', 'nombre', 'sumdebe', 'sumhaber', 'deudor', 'acreedor']
    });
    var pager = new Ext.PagingToolbar({
        store: store,
        displayInfo: true,
        displayMsg: '{0} - {1} de {2} Cuentas de Balance de comprobacion',
        emptyMsg: 'No existe ninguna cuenta de balance de comprobacion',
        pageSize: 20
    });
    var heightGrid = window.innerHeight || document.body.clientHeight;
    var grid = new Ext.grid.GridPanel({
        store: store,
        id: 'gridComprobacion',
        height: heightGrid - 125,
        columns: [
            new Ext.grid.RowNumberer(),
            {
                header: 'Cuentas',
                dataIndex: 'nombre',
                width: 300,
                sortable: true
            },
            {
                header: 'Debe',
                dataIndex: 'sumdebe',
                width: 100,
                sortable: true
            },
            {
                header: 'Haber',
                dataIndex: 'sumhaber',
                width: 100,
                sortable: true
            },
            {
                header: 'Deudor',
                dataIndex: 'deudor',
                width: 100,
                sortable: true
            },
            {
                header: 'Acreedor',
                dataIndex: 'acreedor',
                width: 100,
                sortable: true
            }

        ],
        border: false,
        stripeRows: true
    });
    store.load();
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
                    printComprobacion();
                }
            }
        ]
    });


    var comprobacion = new Ext.Panel({
        iconCls: 'iconPanelNoticia',
        tbar: toolbar,
        height: heightGrid - 80,
        html: '<iframe src="view/comprobacionVIEW.php" style="width:100%;height:100%" frameborder="0"></iframe>"'
    });
    return comprobacion;
}