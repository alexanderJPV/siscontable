Ext.ns('a66.admin.interfaz');
Ext.BLANK_IMAGE_URL = '../ext-3.0.0/resources/images/default/s.gif';

a66.admin.interfaz.viewport = {
    init: function() {
        function contenidoAjax(pageURL) {
            Ext.Ajax.request({
                url: 'pages/' + pageURL,
                method: 'POST',
                success: function(response, options) {
                    var el = document.getElementById('contenido');
                    alert(el.innerHTML);
                    el.innerHTML = response.responseText;                    		
                },
                failure: function(response, options) {
                    Ext.Msg.alert('Mensaje de ERROR', 'Erro de Ajax');
                },
                scope: this
            });
        }
       
        var content = new Ext.Panel({
            margins: '20 0 0 0'
        });

        new Ext.Viewport({
            layout: 'border',
            items: [{
                    region: 'north',
                    height: 20,
                    minWidth: 400,
                    border: false,
                    margins: '0 0 0 0',
                    split: true
                }, {
                    region: 'center',
                    minWidth: 400,
                    minHeight: 400,
                    bodyStyle: 'margin: 5px; padding: 5px;',
                    collapsible: true,
                    layout: 'fit',
                    items: [content]
                }]
        });

        content.load({
            url: "pages/bienvenida.php",
            method: 'GET'
        });
    }
};
Ext.onReady(a66.admin.interfaz.viewport.init, a66.admin.interfaz.viewport);