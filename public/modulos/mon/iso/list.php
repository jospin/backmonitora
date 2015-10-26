<?php
    require('../../Iso/Rest.php');
    use Iso\Rest;
    $accept = array('application/json', 'text/html');
    $iso = new Rest($_SERVER, $accept);
    $return[] = array(
            'sistem' => 'ap-natura-1',
            'method' => 'ping',
            'menssage' => 'AP loja 1 da Natura',
            'novo' => 0,
            'alert' => 'G'
        );
    $return[] = array(
            'sistem' => 'ap-natura-2',
            'method' => 'ping',
            'menssage' => 'AP loja 2 da Natura',
            'novo' => 0,
            'alert' => 'G'
        );
    $return[] = array(
            'sistem' => '192.168.10.131',
            'method' => 'ping',
            'menssage' => 'Servidor Ohm, monitoramento de resposta',
            'novo' => 0,
            'alert' => 'G'
        );
    $return[] = array(
            'sistem' => '192.168.10.131',
            'method' => 'disponibilidade',
            'menssage' => 'Servidor Ohm, monitoramento de espaço',
            'novo' => 1,
            'alert' => 'R'
        );
    $iso->setContent($return);
    $iso->response();

?>