function resumirDescripcion(value) {
    return "<div class='resumirNoticia'>" + value.substr(0, 100) + "...</div>";
}
function noticias() {

    var store = new Ext.data.JsonStore({
        url: 'controller/readCuentas.php',
        root: 'data',
        method: 'POST',
        totalProperty: 'total',
        fields: ['id', 'codigo', 'nombre', 'descripcion', 'tipo']
    });

    var pager = new Ext.PagingToolbar({
        store: store,
        displayInfo: true,
        displayMsg: '{0} - {1} de {2} Cuenta',
        emptyMsg: 'No existe ninguna Cuenta',
        pageSize: 20
    });

    var heightGrid = window.innerHeight || document.body.clientHeight;

    var grid = new Ext.grid.GridPanel({
        store: store,
        id: 'gridCuentas',
        height: heightGrid - 125,
        columns: [
            new Ext.grid.RowNumberer(),
            {
                header: 'Codigo',
                dataIndex: 'codigo',
                width: 100,
                sortable: true
            },
            {
                header: 'Nombre',
                dataIndex: 'nombre',
                width: 200,
                sortable: true
            },
            {
                header: 'Descripcion',
                dataIndex: 'descripcion',
                width: 200,
                sortable: true
            },
            {
                header: 'Tipo',
                dataIndex: 'tipo',
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
                text: 'Nuevo',
                iconCls: 'nuevo',
                handler: function() {
                    var comboTipo = new Ext.form.ComboBox({
                        fieldLabel: 'Tipo',
                        name: 'tipo',
                        id: 'tipoAdd',
                        mode: 'local',
                        emptyText: 'Seleccione tipo',
                        triggerAction: 'all',
                        store: ['ACTIVO', 'PASIVO', 'PATRIMONIO', 'INGRESO', 'EGRESO'],
                        editable: false,
                        valueField: 'id'
                    });





                    var form = new Ext.form.FormPanel({
                        width: 700,
                        fileUpload: true,
                        bodyStyle: 'margin-left:10px;',
                        border: false,
                        labelWidth: 150,
                        defaults: {
                            xtype: 'textfield',
                            allowBlank: false,
                            width: 200
                        },
                        items: [
                            {
                                fieldLabel: 'Codigo',
                                id: 'codigo',
                                name: 'codigo',
                                width: 480,
                                maxLength: 100
                            },
                            {
                                fieldLabel: 'Nombre',
                                id: 'nombre',
                                name: 'nombre',
                                width: 480,
                                maxLength: 100
                            },
                            {
                                xtype: 'textarea',
                                fieldLabel: 'Descripci&oacute;n',
                                id: 'descripcion',
                                width: 480,
                                height: 150,
                                name: 'descripcion'
                            },
                            comboTipo

                        ],
                        Enviar: function() {
                            var mask = new Ext.LoadMask(Ext.get('winform'), {
                                msg: 'Grabando. Espere por favor...'
                            });
                            mask.show();

                            this.getForm().submit({
                                method: 'POST',
                                url: 'controller/addCuenta.php',
                                success: function(form, action) {
                                    mask.hide();
                                    store.reload();
                                    grid.getView().refresh();
                                    Ext.Msg.alert('Registro almacenado ', action.result.msg, function(btn, text) {
                                        if (btn === 'ok') {
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
                        }
                    });
                    var win = new Ext.Window({
                        id: 'winform',
                        layout: 'column',
                        title: 'Nueva Cuenta',
                        width: 700,
                        height: 340,
                        modal: true,
                        bodyStyle: 'padding:10px;background-color:#fff',
                        items: form,
                        buttons: [{
                                text: 'Guardar Nueva Cuenta',
                                handler: function() {
                                    form.Enviar();
                                },
                                scope: this
                            }, {
                                text: 'Cancelar',
                                handler: function() {
                                    win.close();
                                }
                            }]
                    });
                    win.show();
                }
            }
            , {
                text: 'Editar',
                iconCls: 'editar',
                handler: function() {
                    var sm = grid.getSelectionModel();
                    if (sm.hasSelection()) {
                        sel = sm.getSelected();

                        var comboTipo = new Ext.form.ComboBox({
                            fieldLabel: 'Tipo',
                            name: 'tipof',
                            id: 'tipoEdit',
                            mode: 'local',
                            emptyText: 'Seleccione tipo',
                            triggerAction: 'all',
                            store: ['ACTIVO', 'PASIVO', 'PATRIMONIO', 'INGRESO', 'EGRESO'],
                            editable: false,
                            valueField: 'id',
                            value: sel.data.tipo

                        });
                        var formaccion = new Ext.form.FormPanel({
                            url: 'controller/updateCuenta.php',
                            width: 700,
                            bodyStyle: 'padding:7px;',
                            fileUpload: true,
                            border: false,
                            labelWidth: 150,
                            clientValidation: true,
                            defaults: {
                                xtype: 'textfield',
                                allowBlank: false,
                                width: 200
                            },
                            items: [
                                {
                                    xtype: 'hidden',
                                    name: 'idf',
                                    value: sel.data.id
                                },
                                {
                                    fieldLabel: 'Codigo',
                                    id: 'codigof',
                                    name: 'codigof',
                                    width: 480,
                                    value: sel.data.codigo,
                                    maxLength: 300
                                },
                                {
                                    fieldLabel: 'Nombre',
                                    id: 'nombref',
                                    name: 'nombref',
                                    width: 480,
                                    value: sel.data.nombre,
                                    maxLength: 300
                                },
                                {
                                    xtype: 'textarea',
                                    fieldLabel: 'Descripci&oacute;n',
                                    id: 'descripcionf',
                                    width: 480,
                                    height: 150,
                                    name: 'descripcionf',
                                    value: sel.data.descripcion

                                },
                                comboTipo
                            ]
                        });
                        var winaccion = new Ext.Window({
                            title: 'Editar Noticia',
                            width: 700,
                            height: 350,
                            modal: true,
                            minimizable: false,
                            maximizable: false,
                            bodyStyle: 'padding:10px;background-color:#fff',
                            items: [formaccion],
                            buttonAlign: 'right',
                            buttons: [{
                                    text: 'Actualizar',
                                    handler: function() {

                                        winaccion.el.mask('Espere por favor...');
                                        formaccion.getForm().submit({
                                            clientValidation: true,
                                            scope: this,
                                            success: function(formaccion, action) {
                                                winaccion.el.unmask();
                                                store.reload();
                                                Ext.Msg.alert('Mensaje', action.result.msg, function(btn, text) {
                                                    if (btn === 'ok') {
                                                        winaccion.close();
                                                    }
                                                });
                                                grid.getView().refresh();
                                            },
                                            failure: function(form, action) {
                                                winaccion.el.unmask();
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
                                                        Ext.Msg.alert('Mensaje de Error', action.result.msg);
                                                }
                                            }
                                        });
                                    }
                                }, {
                                    text: 'Cancelar',
                                    handler: function() {
                                        winaccion.close();
                                    },
                                    scope: this
                                }]
                        });
                        winaccion.show();
                    }
                    else {
                        Ext.Msg.show({
                            title: 'Mensaje',
                            msg: 'Debe seleccionar previamente un registro para realizar la acci&oacute;n',
                            buttons: Ext.Msg.OK,
                            animEl: 'elId',
                            icon: Ext.MessageBox.INFO
                        });
                    }
                }
            }, {
                text: 'Eliminar',
                iconCls: 'eliminar',
                handler: function() {
                    var sm = grid.getSelectionModel();
                    if (sm.hasSelection())
                    {
                        sel = sm.getSelected();
                        Ext.Msg.show({
                            title: 'Eliminar Registro?',
                            msg: 'Esta seguro de Eliminar el Registro?',
                            buttons: Ext.Msg.OKCANCEL,
                            fn: function(btn, text) {
                                if (btn === 'ok') {
                                    Ext.Ajax.request({
                                        url: 'controller/deleteCuenta.php',
                                        method: 'POST',
                                        success: function(response, options) {
                                            grid.el.unmask();
                                            store.reload();
                                            Ext.Msg.alert('Mensaje', 'Registro eliminado');
                                        },
                                        failure: function(response, options) {
                                            grid.el.unmask();
                                            Ext.Msg.alert('Mensaje de Error', 'No funciona Ajax, intentelo de nuevo');
                                        },
                                        params: {
                                            id: sel.data.id
                                        }
                                    });
                                }
                            },
                            animEl: 'elId',
                            icon: Ext.MessageBox.QUESTION
                        });

                    }
                    else {
                        Ext.Msg.show({
                            title: 'Mensaje',
                            msg: 'Debe seleccionar previamente un Registro para realizar la Accion',
                            buttons: Ext.Msg.OK,
                            animEl: 'elId',
                            icon: Ext.MessageBox.INFO
                        });
                    }
                }
            }
        ]
    });
    var noticias = new Ext.Panel({
        iconCls: 'iconPanelNoticia',
        items: grid,
        tbar: toolbar
    });
    return noticias;
}