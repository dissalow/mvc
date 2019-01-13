<?php

class App {
    
    protected static $router;
    
    public static function getRouter(){
        return self::$router;
    }
    
    public static function run($uri){
        self::$router = new Router($uri);
        
        $controller_class = ucfirst(self::$router->getController()).'Controller';
        $controller_method = strtolower(self::$router->getMethotPrefix().self::$router->getAction());

        $controller_object = $controller_class;
        
        if (method_exists($controller_object, $controller_method)){
            $view_path = $controller_object->$controller_method();
            $viev_object = new View($controller_object->getData(), $view_path);
            $content = $viev_object->render();
        }else{
            throw new Exception('Method '.$controller_method.' of class '.$controller_object.' does not exist');
        }
        
        $layout = self::$router->getRoute();
        $layout_path = VIEW_PATH.DS.$layout.'html';
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render();
    }
}
