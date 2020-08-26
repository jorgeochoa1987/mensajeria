$("#btnExport").click(function(e) {
    window.open('data:application/vnd.ms-excel,' + 
                '<table>' + $('#dvData > table').html() + '</table>');
    e.preventDefault();
});