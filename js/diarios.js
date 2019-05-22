var numberCombo = 0;
var arrayComboCuenta;
function resumirDescripcion(value) {
    return "<div class='resumirNoticia'>" + value.substr(0, 100) + "...</div>";
}

function printDiario() {
    var winRepDiario = new Ext.Window({
        id: 'winRepApertura',
        layout: 'column',
        title: 'Reporte de Libro Diario',
        width: 850,
        height: 500,
        modal: true,
        maximizable: true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/diarioPDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepDiario.show();
}


function diarios() {

    var store = new Ext.data.JsonStore({
        url: 'controller/readDiarios.php',
        root: 'data',
        method: 'POST',
        totalProperty: 'total',
        fields: ['id', 'fecha', 'detalle']
    });
    var pager = new Ext.PagingToolbar({
        store: store,
        displayInfo: true,
        displayMsg: '{0} - {1} de {2} Asiento',
        emptyMsg: 'No existe ningun Asiento',
        pageSize: 20
    });
    var heightGrid = window.innerHeight || document.body.clientHeight;
    var grid = new Ext.grid.GridPanel({
        store: store,
        id: 'gridDiarios',
        height: heightGrid - 125,
        columns: [
            new Ext.grid.RowNumberer(),
            {
                header: 'Fecha',
                dataIndex: 'fecha',
                width: 100,
                sortable: true
            },
            {
                header: 'Codigo',
                dataIndex: 'detalle',
                width: 60,
                sortable: true,
                renderer: function(value, metadata, record) {

                    var table = "<table>";
                    for (var i = 0; i < value.asiento.length; i++)
                    {
                        table += "<tr><td>" + value.asiento[i].codigo + "</td></tr>";
                    }

                    table += "</table>";
                    return "<div class='asiento'>" + table + "</div>";
                }
            },
            {
                header: 'Detalle',
                dataIndex: 'detalle',
                width: 300,
                sortable: true,
                renderer: function(value, metadata, record) {
                    metadata.attr = 'style="white-space:normal"';
                    var table = "<table>";
                    for (var i = 0; i < value.asiento.length; i++)
                    {
                        if (value.asiento[i].debe == 0)
                        {
                            table += "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" + value.asiento[i].nombre + "</td></tr>";
                        } else {
                            table += "<tr><td>" + value.asiento[i].nombre + "</td></tr>";
                        }
                    }

                    table += "</table>";
                    table += "<div style='font-style:italic;padding-top:10px;'>Glosa: " + value.glosa + "</div>";
                    return "<div class='asiento'>" + table + "</div>";
                }
            },
            {
                header: 'Debe',
                dataIndex: 'detalle',
                width: 100,
                sortable: true,
                renderer: function createAsiento(value) {
                    var table = "<table>";
                    for (var i = 0; i < value.asiento.length; i++)
                    {
                        table += "<tr><td><div style='text-align:right;width:80px;'>" + value.asiento[i].debe + "</div></td></tr>";
                    }
                    table += "</table>";
                    return "<div class='asiento'>" + table + "</div>";
                }
            },
            {
                header: 'Haber',
                dataIndex: 'detalle',
                width: 100,
                sortable: true,
                renderer: function createAsiento(value) {
                    var table = "<table>";
                    for (var i = 0; i < value.asiento.length; i++)
                    {
                        table += "<tr><td><div style='text-align:right;width:80px;'>" + value.asiento[i].haber + "</div></td></tr>";
                    }
                    table += "</table>";
                    return "<div class='asiento'>" + table + "</div>";
                }
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
                text: 'Nuevo',
                iconCls: 'nuevo',
                handler: function() {
                    numberCombo = 0;
                    arrayComboCuenta = new Array();
                    var storeCuenta = new Ext.data.JsonStore({
                        url: 'controller/comboCuenta.php',
                        root: 'data',
                        totalProperty: 'num',
                        fields: ['valueS', 'nameS']
                    });
                    storeCuenta.load();
                    var comboCuenta = new Ext.form.ComboBox({
                        fieldLabel: 'Cuenta',
                        name: 'cuenta',
                        id: 'cuentaAdd',
                        mode: 'remote',
                        emptyText: 'Seleccione cuenta',
                        //triggerAction: 'all',
                        store: storeCuenta,
                        editable: true,
                        width: 250,
                        valueField: 'valueS',
                        displayField: 'nameS',
                        enableKeyEvents: true
                    });
                    comboCuenta.on("keyup", function() {
                        storeCuenta.reload({
                            params: {
                                palabra: comboCuenta.getRawValue()

                            }
                        });
                    });
                    var comboTipoAsiento = new Ext.form.ComboBox({
                        fieldLabel: 'Asiento',
                        name: 'tipoAsiento',
                        id: 'tipoAsientoId',
                        mode: 'local',
                        width: 100,
                        emptyText: 'Seleccione tipo',
                        triggerAction: 'all',
                        store: ['NORMAL', 'AJUSTE'],
                        editable: false,
                        valueField: 'id'
                    });
                    comboTipoAsiento.setValue("NORMAL");
                    var asiento = new Ext.form.FieldSet({
                        title: '',
                        collapsible: false,
                        autoHeight: true,
                        width: 580,
                        height: 200,
                        cls: 'blue',
                        labelWidth: 130,
                        layout: 'hbox',
                        defaults: {
                            allowBlank: false,
                            xtype: 'textfield'
                        }
                    });
                    var form = new Ext.form.FormPanel({
                        width: 600,
                        fileUpload: true,
                        bodyStyle: 'margin-left:10px;',
                        border: false,
                        labelWidth: 50,
                        items: [{
                                xtype: 'datefield',
                                fieldLabel: 'Fecha',
                                id: 'fecha',
                                name: 'fecha',
                                format: 'd/m/Y',
                                allowBlank: false
                            }, comboTipoAsiento

                        ],
                        Enviar: function() {

                            comboCuentaValues = "";
                            for (k = 0; k < arrayComboCuenta.length; k++) {
                                comboCuentaValues += arrayComboCuenta[k].getValue();
                                if ((k + 1) != arrayComboCuenta.length)
                                {
                                    comboCuentaValues += "---";
                                }
                            }

                            var mask = new Ext.LoadMask(Ext.get('winform'), {
                                msg: 'Grabando. Espere por favor...'
                            });
                            mask.show();
                            this.getForm().submit({
                                method: 'POST',
                                url: 'controller/addDiario.php',
                                params: {
                                    numreg: numberCombo,
                                    comboCuentaParams: comboCuentaValues,
                                    glosa: document.getElementById("glosa").value,
                                    tipoAsiento: document.getElementById("tipoAsientoId").value
                                },
                                success: function(form, action) {
                                    mask.hide();
                                    store.reload();
                                    grid.getView().refresh();
                                    Ext.Msg.alert('Registro almacenado ', action.result.msg, function(btn, text) {
                                        if (btn === 'ok') {
                                            if (document.getElementById("ifraRes") != null) {
                                                document.getElementById("ifraRes").src = "view/resultadoVIEW.php";
                                            }
                                            win.close();
                                        }
                                    });
                                },
                                failure: function(form, action) {
                                    mask.hide();
                                    switch (action.failureType) {
                                        case Ext.form.Action.CLIENT_INVALID:
                                            Ext.Msg.alert('Mensaje de ERROR', 'Los datos no deben contener valores invalidos');
                                            break;
                                        case Ext.form.Action.CONNECT_FAILURE:
                                            Ext.Msg.alert('Failure', 'Ajax communication failed');
                                            break;
                                        case Ext.form.Action.SERVER_INVALID:
                                            Ext.Msg.alert('Failure', action.result.msg);
                                            break;
                                        default:
                                            Ext.Msg.alert('Failure', action.result.msg);
                                    }
                                }
                            });
                        },
                        html: "<button id='btn-create-combo' class='btn'>Añadir otro campo</button>"

                    });
                    function createCombo(form) {
                        numberCombo++;
                        var storeCuentaDin = new Ext.data.JsonStore({
                            url: 'controller/comboCuenta.php',
                            root: 'data',
                            totalProperty: 'num',
                            fields: ['valueS', 'nameS']
                        });
                        var combo = new Ext.form.ComboBox({
                            fieldLabel: 'Tipo',
                            name: 'cuenta' + numberCombo,
                            id: 'cuentaAdd' + numberCombo,
                            width: 250,
                            mode: 'remote',
                            emptyText: 'Seleccione Cuenta',
                            //triggerAction: 'all',
                            enableKeyEvents: true,
                            store: storeCuentaDin,
                            editable: true,
                            valueField: 'valueS',
                            displayField: 'nameS'
                        });
                        var asiento = new Ext.form.FieldSet({
                            title: '',
                            collapsible: false,
                            autoHeight: true,
                            width: 580,
                            height: 200,
                            cls: 'blue',
                            labelWidth: 130,
                            layout: 'hbox',
                            defaults: {
                                allowBlank: false,
                                xtype: 'textfield'
                            },
                            items: [combo, {
                                    fieldLabel: 'Debe',
                                    id: 'debe' + numberCombo,
                                    name: 'debe' + numberCombo,
                                    style: 'text-align:right',
                                    maxLength: 100,
                                    value: 0
                                },
                                {
                                    fieldLabel: 'Haber',
                                    id: 'haber' + numberCombo,
                                    name: 'haber' + numberCombo,
                                    style: 'text-align:right',
                                    maxLength: 100,
                                    value: 0
                                }
                            ]
                        });
                        storeCuentaDin.load();
                        combo.on("keyup", function(f) {
                            storeCuentaDin.reload({
                                params: {
                                    palabra: combo.getRawValue()
                                }
                            });
                        });
                        form.add(asiento);
                        arrayComboCuenta.push(combo);
                    }

                    var myBottomToolbar = [
                        {
                            text: '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'
                        },
                        {
                            text: '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspDEBE'
                        },
                        {
                            text: '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspHABER'
                        }
                    ];
                    var formGlosa = new Ext.form.FormPanel({
                        width: 600,
                        fileUpload: true,
                        bodyStyle: 'margin-left:10px;margin-top:20px;',
                        border: false,
                        labelWidth: 50,
                        items: [{
                                xtype: 'textarea',
                                fieldLabel: 'Glosa',
                                id: 'glosa',
                                name: 'glosa',
                                allowBlank: false,
                                width: 535
                            }
                        ]
                    });
                    var win = new Ext.Window({
                        id: 'winform',
                        layout: 'column',
                        title: 'Nuevo Asiento',
                        width: 650,
                        height: 400,
                        modal: true,
                        bodyStyle: 'padding:10px;background-color:#fff',
                        items: [form, formGlosa],
                        buttons: [{
                                text: 'Guardar Nuevo Asiento',
                                handler: function() {
                                    form.Enviar();
                                },
                                scope: this
                            }, {
                                text: 'Cancelar',
                                handler: function() {
                                    win.close();
                                }
                            }],
                        tbar: myBottomToolbar
                    });
                    createCombo(form);
                    createCombo(form);

                    win.show();
                    win.setHeight(400);
                    var btnCreateCombo = Ext.get('btn-create-combo');
                    btnCreateCombo.on('click', function() {
                        createCombo(form);
                        win.render(form, 1);
                        win.setHeight(win.getHeight() + 50);
                        win.center();
                    });
                }
            }
            ,
            {
                text: 'Imprimir',
                iconCls: 'print',
                handler: function() {
                    printDiario();
                }
            }
        ]
    });
    var diarios = new Ext.Panel({
        iconCls: 'iconPanelNoticia',
        items: grid,
        tbar: toolbar
    });
    return diarios;
}