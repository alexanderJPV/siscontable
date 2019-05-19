Ext.ns('a66.admin.login');
Ext.BLANK_IMAGE_URL = 'ext-3.0.0/resources/images/default/s.gif';
a66.admin.login = {
    init: function() {
        Ext.QuickTips.init();
        var panelLogo = new Ext.Panel({
           html: '<img src="images/login.png" width="0" height="0" border="0" text-align=center/>'
        });

        var formBP = new Ext.form.FormPanel({
            url: 'controller/login.php',
            width: 350,

            bodyStyle: 'padding:27px;',
            border: false,

            labelWidth: 80,
            clientValidation: true,
            defaults: {
                xtype: 'textfield',
                allowBlank: false,
                width: 150
            },
            items: [
                {
                    fieldLabel: 'Usuario',
                    id: 'user',
                    name: 'user'
                },
                {
                    fieldLabel: 'Password',
                    inputType: 'password',
                    id: 'password',
                    name: 'password'
                }
            ]
        });
        var winBuscarPersona = new Ext.Window({
            closable: false,
            items: [panelLogo, formBP],
            buttonAlign: 'right',
            buttons: [{
                    text: 'Ingresar',
                    handler: function() {
                        winBuscarPersona.el.mask('Por favor, espere un momento ...');
                        formBP.getForm().submit({
                            clientValidation: true,
                            scope: this,
                            success: function(formBP, action) {
                                winBuscarPersona.el.unmask();
                                location.href = "./";
                            },
                            failure: function(formBP, action) {
                                winBuscarPersona.el.unmask();
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
                }]
        });
        winBuscarPersona.show();
    }
};
Ext.onReady(a66.admin.login.init, a66.admin.login);