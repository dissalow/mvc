<?php

define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__)));
define('VIEW_PATH', ROOT.DS.'views');


require_once(ROOT.DS.'lib'.DS.'init.php');

App::run($_SERVER['REQUEST_URI']);