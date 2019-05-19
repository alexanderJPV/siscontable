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
            title: 'Bienvenido',
            collapsible: true,
            html: '<div style="background: url(images/1.jpg) no-repeat center;widht:200px;height:100%;margin:1px auto;text-align:center;color:#277AD0;"><img id="loguito" src="images/logo_conta3161.png" /></div>'
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
        var menuHTML = '<p id="cuentaM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Catalogo de Cuentas</span></p>';
        menuHTML += '<p id="diarioM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Libro Diario</span></p>';
        menuHTML += '<p id="mayorM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Libro Mayor</span></p>';
        menuHTML += '<p id="comprobacionM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Balance de Comprobacion</span></p>';
        menuHTML += '<p id="resultadosM" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">H. T. 6 Columnas</span></p>';
        menuHTML += '<p id="columnas10M" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">H. T. 10 Columnas</span></p>';

        var panelMenu = new Ext.Panel({
            title: 'PRINCIPAL',
            collapsible: true,
            html: menuHTML,
        });
        var reportesHTML = '<p id="balanceInicialPDF" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Balance de Apertura</span></p>';
        reportesHTML += '<p id="comprobacionPDF" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Balance de Comprobacion</span></p>';
        reportesHTML += '<p id="bgyerPDF" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Estados Financieros</span></p>';

        var panelReportes = new Ext.Panel({
            title: 'REPORTES',
            collapsible: true,
            html: reportesHTML,
        });
        var acercaHTML = '<p id="manual" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Manual de Usuario</span></p>';
        acercaHTML += '<p id="acerca" class="linkMenu" style="margin-top:5px;"><span><img src="icons/ico316.png" /></span><span class="textmenu">Informacion del grupo</span></p>';

        var panelAcerca = new Ext.Panel({
            title: '...',
            collapsible: true,
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
                    title: 'Sistema Contable',
                    region: 'west',
                    collapsible: true,
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
        var btnCols10 = Ext.get('columnas10M');
        btnCols10.on('click', function() {
            addTab(5, "H. T. 10 Columnas");
        });
        ///////
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
