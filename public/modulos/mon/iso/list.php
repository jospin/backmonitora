<?php
    require('../../Iso/Rest.php');
    use Iso\Rest;

    $iso = new Rest($_SERVER);
    $return[] = array(
            'sistem' => 'ap-natura-1',
            'method' => 'ping',
            'menssage' => 'AP loja 1 da Natura',
            'alert' => 'G'
        );
    $return[] = array(
            'sistem' => 'ap-natura-2',
            'method' => 'ping',
            'menssage' => 'AP loja 2 da Natura',
            'alert' => 'G'
        );
    $return[] = array(
            'sistem' => '192.168.10.131',
            'method' => 'ping',
            'menssage' => 'Servidor Ohm, monitoramento de resposta',
            'alert' => 'G'
        );
    $return[] = array(
            'sistem' => '192.168.10.131',
            'method' => 'disponibilidade',
            'menssage' => 'Servidor Ohm, monitoramento de espaço',
            'alert' => 'R'
        );
    $iso->setContent($return);
    $iso->response();

?>