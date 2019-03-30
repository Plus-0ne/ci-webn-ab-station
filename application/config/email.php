<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'tls://smtp.gmail.com'; //change this
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'webndrops@gmail.com'; //change this
    $config['smtp_pass'] = 'webndrops2019'; //change this
    $config['mailtype'] = 'html';
    $config['charset'] = 'iso-8859-1';
    //$config['charset'] = 'utf-8';
    $config['wordwrap'] = TRUE;
    $config['newline'] = "\r\n"; //use double quotes to comply with RFC 822 standard
?>