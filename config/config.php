<?php

// Имя сайта
Config::set('site name', 'You site name');

// Языки сайта
Config::set('language', array('en','fr'));

//Пути имя => префикс метода

Config::set('routes', array(
    'default' => '',
    'admin' => 'admin'  
));

// Стандартные настройки

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');