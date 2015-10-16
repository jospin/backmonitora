<?php
    ini_set('display_errors', 1);
    //header('Content-Type: text/html; charset=iso-8859-1');
    header('Content-Type: text/html; charset=utf-8');
    $json = '{"id":"796723913748378","email":"jlbc07@gmail.com","first_name":"Jou00e3o_Luu00eds","gender":"male","last_name":"Barros_Carrilho","link":"https://www.facebook.com/app_scoped_user_id/796723913748378/","locale":"pt_BR","name":"Jou00e3o_Luu00eds_Barros_Carrilho","timezone":-3,"updated_time":"2015-06-06T21:35:25 0000","verified":true,"nome":"João Luís","cpf":"401.000.708-76","ip":"192.168.216.219","mac":"30:a8:db:fb:1c:51"}';

    $return = json_decode($json, true);
    $name = str_replace('_', ' ', $return['name']);
    echo ReformatCSVString($name); die();
    //echo hex2bin($name);
    //echo mb_convert_encoding($name, 'ISO-8859-1', 'UTF-8');

//echo utf8_encode('Jou00e3o Luu00eds Barros Carrilho');
