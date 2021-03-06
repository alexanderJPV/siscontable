Ext.ns('a66.admin.interfaz');
Ext.BLANK_IMAGE_URL = 'ext-3.0.0/resources/images/default/s.gif';
a66.admin.interfaz = {
    init: function() {
        Ext.QuickTips.init();
        var countTabs = 0;
        var arrayTabs = new Array();
        var arrayTabsItem = new Array();
        for (i = 0; i < 9; i++)
            arrayTabs[i] = false;
        var header = new Ext.Panel({
            minWidth: 400,
            height: 40,
            contentEl: 'header'
        });
        function showIntegrantes() {
            var winIntegrantes = new Ext.Window({
                id: 'winIntegrantes',
                layout: 'column',
                title: 'Acerca de los realizadores de Sistema Contable',
                width: 700,
                height: 300,
                modal: true,
                resizable: false,
                bodyStyle: 'background-color:#fff',
                html: '<iframe src="view/integrantesVIEW.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

            });
            winIntegrantes.show();
        }
        function showManual() {
            var winManual = new Ext.Window({
                id: 'winManual',
                layout: 'column',
                title: 'Manual de Usuario - Conta316',
                maximizable: true,
                width: 800,
                height: 500,
                modal: true,
                resizable: false,
                bodyStyle: 'background-color:#fff',
                html: '<iframe src="view/MANUAL DE USUARIO.pdf" style="width:100%;height:100%" frameborder="0"></iframe>"'

            });
            winManual.show();
        }
        var buttonSalir = Ext.get('salir');
        buttonSalir.on('click', function() {
            Ext.Ajax.request({
                url: 'controller/logout.php',
                method: 'POST',
                success: function(response, options) {
                    location.href = "./";
                },
                failure: function(response, options) {
                    var text = response.responseText;
                },
                scope: this
            });
        });

        var panelBienvenida = new Ext.Panel({
            title: 'PANEL PRINCIPAL',
            collapsible: true,
            bodyStyle:{"background-color":"#2E453E"},
            html: '<div style="background: url(images/fon.jpg) no-repeat center; widht:250px; height:100%; margin:1px auto;text-align:center;color:#277AD0;"></div>'
         });
        var tabs = new Ext.TabPanel({
            border: false,
            activeTab: 0,
            enableTabScroll: true,
            items: [panelBienvenida],
            plugins: new Ext.ux.TabCloseMenu()
        });
        function addTab(numTab, title) {
            if (!arrayTabs[numTab])
            {
                switch (numTab) {
                    case 0:
                        var itemPanel = noticias();
                        break;
                    case 1:
                        var itemPanel = diarios();
                        break;
                    case 2:
                        var itemPanel = comprobacion();
                        break;
                    case 3:
                        var itemPanel = resultados();
                        break;
                    case 4:
                        var itemPanel = mayor();
                        break;
                    case 5:
                        var itemPanel = columnas10();
                        break;



                }
                countTabs++;
                arrayTabs[numTab] = true;
                arrayTabsItem[numTab] = countTabs;

                tabs.add({
                    title: title,
                    iconCls: 'tabs',
                    closable: true,
                    itemId: 'id' + numTab,
                    items: [itemPanel],
                    listeners: {
                        close: function() {
                            arrayTabs[numTab] = false;
                        }
                    }
                }).show();
            }
            else
            {
                tabs.setActiveTab('id' + numTab);
            }
        }
            var menuHTML = '<p id="cuentaM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico2.png" width="25" height="30" /></span><span style="color:#2E453E"  class="textmenu">Catalogo de Cuentas</span></p>';
            menuHTML += '<p id="diarioM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico6.png" width="25" height="30" /></span><span style="color:#2E453E" class="textmenu">Libro Diario</span></p>';
            menuHTML += '<p id="mayorM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico5.png" width="25" height="30"/></span><span style="color:#2E453E" class="textmenu">Mayores en T</span></p>';
            menuHTML += '<p id="comprobacionM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico4.png" width="25" height="30"/></span><span style="color:#2E453E" class="textmenu">Balance de Comprobacion</span></p>';
            menuHTML += '<p id="resultadosM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico4.png" width="25" height="30"/></span><span style="color:#2E453E" class="textmenu">Hoja Trabajo 6 Columnas</span></p>';
/*             menuHTML += '<p id="columnas10M" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">H. T. 10 Columnas</span></p>';
 */    
        var panelMenu = new Ext.Panel({
            title: 'MENU',
            collapsible: true,
            bodyStyle:{"background-color":"#369EAB"},            
            html: menuHTML,
        });

        
        var reportesHTML = '<p id="balanceInicialPDF" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico7.png" width="25" height="30" /></span><span  class="textmenu">Balance de Apertura</span></p>';
        reportesHTML += '<p id="comprobacionPDF" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico8.png" width="25" height="30"/></span><span class="textmenu">Balance de Comprobacion</span></p>';
        reportesHTML += '<p id="bgyerPDF" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico9.png" width="25" height="30"/></span><span class="textmenu">Estados Financieros</span></p>';

        var panelReportes = new Ext.Panel({
            title: 'REPORTES',
            collapsible: true,
            bodyStyle:{"background-color":"#369EAB"},            
            html: reportesHTML,
        });

        var acercaHTML = '<p id="manual" class="linkMenu" style="margin-top:5px;"><span><img src="icons/icon10.png" width="25" height="30"/></span><span class="textmenu">Manual de Usuario</span></p>';
        acercaHTML += '<p id="acerca" class="linkMenu" style="margin-top:5px;"><span><img src="icons/icon11.png" width="25" height="30"/></span><span class="textmenu">Informacion del grupo</span></p>';

        var panelAcerca = new Ext.Panel({
            title: 'OTROS',
            collapsible: true,
            bodyStyle:{"background-color":"#369EAB"},
            html: acercaHTML,
        });

        new Ext.Viewport({
            layout: 'border',            
            items: [{                    
                    region: 'north',
                    height: 40,
                    minWidth: 400,
                    border: false,
                    margins: '0 0 0 0',
                    split: true,
                    items: [header]
                }, {
                    title: 'CONTABILIDAD',
                    region: 'west',
                    collapsible: true,
                    bodyStyle:{"background-color":"#369EAB"},
                    split: true,
                    width: 200,
                    autoScroll: true,
                    items: [panelMenu, panelReportes, panelAcerca]
                }, {
                    region: 'center',
                    layout: 'fit',
                    margins: '0 0 0 0',
                    items: [tabs]
                }]
        });
        var btnCuentas = Ext.get('cuentaM');
        btnCuentas.on('click', function() {
            addTab(0, "Catalogo de Cuentas");   
        });
        var btnDiario = Ext.get('diarioM');
        btnDiario.on('click', function() {
            addTab(1, "Libro Diario");
        });
        var btnComprobacion = Ext.get('comprobacionM');
        btnComprobacion.on('click', function() {
            addTab(2, "Balance de Comprobacion");
        });
        var btnResultados = Ext.get('resultadosM');
        btnResultados.on('click', function() {
            addTab(3, "H. T. 6 Columnas");
        });
        var btnMayor = Ext.get('mayorM');
        btnMayor.on('click', function() {
            addTab(4, "Libro Mayor");
        });
        /* var btnCols10 = Ext.get('columnas10M');
        btnCols10.on('click', function() {
            addTab(5, "H. T. 10 Columnas");
        }); */
        ///////--------------------------------------------------------------------------
        var btnRepBalanceInicial = Ext.get('balanceInicialPDF');
        btnRepBalanceInicial.on('click', function() {
            printApertura();
        });
        var btnRepComprobacion = Ext.get('comprobacionPDF');
        btnRepComprobacion.on('click', function() {
            printComprobacion();
        });
        var btnRepBGyER = Ext.get('bgyerPDF');
        btnRepBGyER.on('click', function() {
            printBGyER();
        });
        /////
        var btnRepAcerca = Ext.get('acerca');
        btnRepAcerca.on('click', function() {
            showIntegrantes();
        });
        var btnManual = Ext.get('manual');
        btnManual.on('click', function() {
            showManual();
        });
    }
};
Ext.onReady(a66.admin.interfaz.init, a66.admin.interfaz);
