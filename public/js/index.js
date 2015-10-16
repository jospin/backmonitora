$(function() {
    $('title').html('Painel de Monitoramento web');

    //Table list
    $.ajax({
        url: 'http://monitora.local/modulos/mon/iso/list.php',
        dataType: 'json',
        accept: 'application/json',
        method: 'POST',
        crossDomain: true,
        complete: function(data, status) {

        },
        error: function(erro, status, errorThrow) {

        }

    });
});