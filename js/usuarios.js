function usuarios() {

    /*var storeComboRol= new Ext.data.JsonStore({							
     url:'controlador/comboRol.php',
     root: 'data',
     totalProperty: 'num',
     fields: ['id','descripcion']
     });
     storeComboRol.load();
     
     var comboRol=new Ext.form.ComboBox({
     fieldLabel:'Rol',
     name:'cmbRol',
     id:'rol',
     mode:'local',
     emptyText: 'Seleccione Rol',
     store: storeComboRol,
     triggerAction: 'all',
     editable:false,
     valueField: 'id',
     displayField:'descripcion'
     });*/

    var store = new Ext.data.JsonStore({
        url: 'controlador/usuarios.php',
        root: 'data',
        method: 'POST',
        totalProperty: 'total',
        fields: ['id', 'nombre', 'paterno', 'materno', 'login', 'email', 'idRol', 'descRol']
    })

    var pager = new Ext.PagingToolbar({
        store: store,
        displayInfo: true,
        displayMsg: '{0} - {1} de {2} Usuarios',
        emptyMsg: 'No existe ningun Usuario',
        pageSize: 20
    });

    var grid = new Ext.grid.GridPanel({
        store: store,
        id: 'gridUsuarios',
        height: 400,
        columns: [
            new Ext.grid.RowNumberer(),
            {header: 'Nombre', dataIndex: 'nombre', width: 150, sortable: true},
            {header: 'Ap. Paterno', dataIndex: 'paterno', width: 100, sortable: true},
            {header: 'Ap. Materno', dataIndex: 'materno', width: 100, sortable: true},
            {header: 'Login', dataIndex: 'login', width: 100, sortable: true},
            {header: 'Email', dataIndex: 'email', width: 150, sortable: true},
            {header: 'Descripcion', dataIndex: 'descRol', width: 150, sortable: true}
        ],
        bbar: pager,
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

                    var form = new Ext.form.FormPanel({
                        width: 850,
                        fileUpload: true,
                        bodyStyle: 'margin-left:10px;',
                        border: false,
                        labelWidth: 100,
                        defaults: {
                            xtype: 'textfield',
                            allowBlank: false,
                            width: 160
                        },
                        items: [
                            {fieldLabel: 'Nombre', id: 'nombre', name: 'nombre'},
                            {fieldLabel: 'Ap. Paterno', id: 'paterno', name: 'paterno'},
                            {fieldLabel: 'Ap. Materno', id: 'materno', name: 'materno'},
                            {fieldLabel: 'Ap. Paterno', id: 'paterno', name: 'paterno'},
                            {fieldLabel: 'Email', id: 'email', name: 'email', vtype: 'email'},
                            {fieldLabel: 'Login', id: 'login', name: 'login'},
                            {fieldLabel: 'Password', inputType: 'password', id: 'password', name: 'password', minLength: 6},
                            {fieldLabel: 'Rol', id: 'rol', name: 'rol', disabled: true, value: 'Editor'}
                        ],
                        Enviar: function() {

                            var mask = new Ext.LoadMask(Ext.get('winuser'), {
                                msg: 'Grabando. Espere por favor...'
                            });
                            mask.show();

                            this.getForm().submit({
                                method: 'POST',
                                url: 'controlador/nuevoUsuario.php',
                                success: function(form, action) {
                                    mask.hide();
                                    /* var Fila = grid.getStore().recordType;
                                     var newreg = new Fila({
                                     id:action.result.ultIdProducto,
                                     titulo:Ext.get('titulo').dom.value,
                                     contenido:Ext.get('contenido').dom.value
                                     });*/
                                    //store.insert(0, newreg);
                                    store.reload();
                                    grid.getView().refresh();
                                    Ext.Msg.alert('Registro almacenado ', action.result.msg, function(btn, text) {
                                        if (btn == 'ok') {
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
                                            Ext.Msg.alert('Mensaje de ERROR', action.result.msg);
                                    }
                                }
                            });
                        }
                    });

                    var win = new Ext.Window({
                        id: 'winuser',
                        layout: 'column',
                        title: 'Nuevo Usuario',
                        width: 330,
                        height: 280,
                        modal: true,
                        bodyStyle: 'padding:10px;background-color:#fff',
                        items: form,
                        buttons: [{
                                text: 'Guardar Nuevo Usuario',
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
            , {text: 'Editar',
                iconCls: 'editar',
                handler: function() {
                    var sm = grid.getSelectionModel();
                    if (sm.hasSelection()) {
                        sel = sm.getSelected();

                        /*var storeComboRolEdit= new Ext.data.JsonStore({							
                         url:'controlador/comboRol.php',
                         root: 'data',
                         totalProperty: 'num',
                         fields: ['id','descripcion']
                         });
                         storeComboRolEdit.load();
                         
                         var comboRolEdit=new Ext.form.ComboBox({
                         fieldLabel:'Rol',
                         name:'cmbRol',
                         id:'rolEdit',
                         mode:'local',
                         emptyText: 'Seleccione Rol',
                         store: storeComboRolEdit,
                         triggerAction: 'all',
                         editable:false,
                         valueField: 'id',
                         displayField:'descripcion',
                         value:sel.data.descRol
                         
                         });*/
                        var formaccion = new Ext.form.FormPanel({
                            url: 'controlador/editarUsuario.php',
                            width: 250,
                            bodyStyle: 'padding:7px;',
                            border: false,
                            labelWidth: 80,
                            clientValidation: true,
                            defaults: {
                                xtype: 'textfield',
                                allowBlank: false,
                                width: 150
                            },
                            items: [
                                {xtype: 'hidden', name: 'accion', value: 'AEE'},
                                {xtype: 'hidden', name: 'idUsuario', value: sel.data.id},
                                {fieldLabel: 'Nombre', id: 'nombre', name: 'nombre', allowBlank: false, value: sel.data.nombre},
                                {fieldLabel: 'Ap. Paterno', id: 'paterno', name: 'paterno', allowBlank: false, value: sel.data.paterno},
                                {fieldLabel: 'Ap. Materno', id: 'materno', name: 'materno', allowBlank: false, value: sel.data.materno},
                                {fieldLabel: 'Email', id: 'email', name: 'email', allowBlank: false, value: sel.data.email, vtype: 'email'},
                                {fieldLabel: 'Login', id: 'login', name: 'login', disabled: true, value: sel.data.login, minLength: 6},
                                {fieldLabel: 'Rol', id: 'rol', name: 'rol', disabled: true, value: 'Editor'},
                            ],
                        });
                        var winaccion = new Ext.Window({
                            title: 'Editar Usuario',
                            width: 280,
                            height: 260,
                            modal: true,
                            minimizable: false,
                            maximizable: false,
                            bodyStyle: 'padding:10px;background-color:#fff',
                            items: [formaccion],
                            buttonAlign: 'right',
                            buttons: [{text: 'Actualizar', handler: function() {
                                        winaccion.el.mask('Espere por favor...');
                                        formaccion.getForm().submit({
                                            clientValidation: true,
                                            scope: this,
                                            success: function(formaccion, action) {
                                                winaccion.el.unmask();
                                                store.reload();
                                                Ext.Msg.alert('Mensaje', action.result.msg, function(btn, text) {
                                                    if (btn == 'ok') {
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
                                }, {text: 'Cancelar', handler: function() {
                                        winaccion.close();
                                    }, scope: this}]
                        });
                        winaccion.show();


                    }
                    else {
                        Ext.Msg.alert('Mensaje de ERROR', 'Debe seleccionar previamente un Registro para realizar la Accion');
                    }
                }
            }
        ]
    });
    var usuarios = new Ext.Panel({
        iconCls: 'iconPanelNoticia',
        items: grid,
        tbar: toolbar
    });
    return usuarios;
}