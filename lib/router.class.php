<?php

class Router{

    protected $uri;

    protected $controller;

    protected $action;

    protected $params;
    
    protected $language;
    
    protected $routes;
    
    protected $methot_prefix;

    public function getUri() {
        return $this->uri;
    }

    public function getController() {
        return $this->controller;
    }

    public function getAction() {
        return $this->action;
    }
    
    public function getParams() {
        return $this->params;
    }
    
    public function getLanguage() {
        return $this->language;
    }
    
    public function getRoutes() {
        return $this->routes;
    }
    
    public function getMethotPrefix() {
        return $this->methot_prefix;
    }

    /**
     * Router constructor.
     * @param $uri
     */
    public function __construct($uri) {
        
        $this->uri = urldecode(trim($uri, '/'));
        
        $routes = Config::get('routes');
        $this->routes = Config::get('default_route');
        $this->methot_prefix = isset($routes[$this->routes]) ? $routes[$this->routes] : '';
        $this->language = Config::get('default_leanguage');
        $this->controller = Config::get('default_controller');
        $this->action = Config::get('default_action');
        
        $uri_parts = explode('?', $this->uri);
        
        // Разбор строки
        
        $path = $uri_parts[0];
        $path_parts = explode('/', $path);
        
        // Получение пути или префикса языка
        if (count($path_parts)){  
            if (in_array(strtolower(current($path_parts)), array_keys($routes)) ){
                $this->routes = strtolower(current($path_parts));
                $this->methot_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
                array_shift($path_parts);
            } elseif (in_array(strtolower(current($path_parts)), Config::get('language'))){
                $this->language = strtolower(current($path_parts));
                array_shift($path_parts);
            }
        }
        
        //Получение имени контроллера
        
        if (current($path_parts)){
            $this->controller = strtolower(current($path_parts));
            array_shift($path_parts);
        }
        
        //Получение метода (action)
        if (current($path_parts)){
            $this->action = strtolower(current($path_parts));
            array_shift($path_parts);
        }
        
        //Получение параметров
        $this->params = $path_parts;
        
    }
}