<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Security extends CI_Security {

    public function __construct()
    {
        parent::__construct();
    }

    public function csrf_show_error()
    {
        header('Location: ' . htmlspecialchars($_SERVER['HTTP_REFERER']), TRUE, 200);
    }
}