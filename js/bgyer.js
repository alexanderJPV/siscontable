function printBGyER() {
    var winRepBGyER = new Ext.Window({
        id: 'winRepBGyER',
        layout: 'column',
        title: 'Estados Financieros',
        width: 850,
        height: 500,
        modal: true,
        maximizable:true,
        bodyStyle: 'background-color:#fff',
        html: '<iframe src="view/bgyerPDF.php" style="width:100%;height:100%" frameborder="0"></iframe>"'

    });
    winRepBGyER.show();
}

