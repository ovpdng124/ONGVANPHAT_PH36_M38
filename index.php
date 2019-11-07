<?php
include 'controller/Controller.php';
session_set_cookie_params(15*24*3600,'/');
session_start();
$controller = new Controller();
$controller->invoke();