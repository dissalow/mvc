<?php  

spl_autoload_register('register');
function register($class_name){
        
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controllers_path = ROOT.DS.'controllers'.DS. str_replace('controller', '', strtolower($class_name)) . '.controller.php';
    $model_path = ROOT.DS.'model'.DS.strtolower($class_name).'.php';
    
        if (file_exists($lib_path)) {
            require_once($lib_path);
        }elseif (file_exists($controllers_path)) {
            require_once($controllers_path);
        }elseif (file_exists($model_path)) {
            require_once($model_path);
        }else{
            throw new Exception('Fail to load class ' . $class_name);
        }
        
}
require_once(ROOT.DS.'config'.DS.'config.php');





/*
function __autoload($class_name){
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controllers_path = ROOT.DS.'controllers'.DS. str_replace('controller', '', strtolower($class_name) . '.controllers.php');
    $model_path = ROOT.DS.'model'.DS.strtolower($class_name).'.php';

    if (file_exists($lib_path)) {
        require_once($lib_path);
        print_r($lib_path);
    }elseif (file_exists($controllers_path)) {
        require_once($controllers_path);
    }elseif (file_exists($model_path)) {
        require_once($model_path);
    }else{
        throw new Exception('Fail to load class ' . $class_name);
    }
}
*/