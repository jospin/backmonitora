$(function() {
    //$('title').html('Painel de Monitoramento web');
    $('title').html('Navdor');

    //Table list
    $.ajax({
        url: 'http://monitora.local/modulos/mon/iso/list.php',
        dataType: 'json',
        method: 'POST',
        crossDomain: true,
        complete: function(data, status) {
            if (status == 'success') {
                jQuery.each(data, function(i, val){
                    console.log(val);
                })
            }
        },
        error: function(erro, status, errorThrow) {

        }

    });
});