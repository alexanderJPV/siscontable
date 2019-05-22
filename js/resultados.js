function printResultados() {
    var winRepResultados = new Ext.Window({
        id: 'winRepResultados',
        layout: 'column',
        title: 'Hoja de Trabajo de 6 Columnas',
        width: 850,
        height: 500,
        modal: true,
        maximizable: true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/resultadosPDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepResultados.show();
}
function resultados() {

    var store = new Ext.data.JsonStore({
        url: 'controller/readResultados.php',
        root: 'data',
        method: 'POST',
        totalProperty: 'total',
        fields: ['id', 'nombre', 'deudor', 'acreedor', 'ingresos', 'gastos', 'activos', 'pasivos']
    });
    var pager = new Ext.PagingToolbar({
        store: store,
        displayInfo: true,
        displayMsg: '{0} - {1} de {2} Cuentas de Resultados',
        emptyMsg: 'No existe ninguna cuenta Resultados',
        pageSize: 20
    });
    var heightGrid = window.innerHeight || document.body.clientHeight;
    var grid = new Ext.grid.GridPanel({
        store: store,
        id: 'gridResultados',
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
            ,
            {
                header: 'Gastos',
                dataIndex: 'gastos',
                width: 100,
                sortable: true
            },
            {
                header: 'Ingresos',
                dataIndex: 'ingresos',
                width: 100,
                sortable: true
            },
            {
                header: 'Activos',
                dataIndex: 'activos',
                width: 100,
                sortable: true
            },
            {
                header: 'Pasivos',
                dataIndex: 'pasivos',
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
                    printResultados();
                }
            }
        ]
    });
    var resultados = new Ext.Panel({
        tbar: toolbar,
        iconCls: 'iconPanelNoticia',
        height: heightGrid - 80,
        html: '<iframe id="ifraRes" src="view/resultadoVIEW.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    return resultados;
}