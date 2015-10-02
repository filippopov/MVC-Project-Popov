<?php
namespace MVC;

class Application
{

    private $controllerName;
    private $actionName;
    private $requestParams = [];
    private $isAreas = false;
    private $controller;

    const CONTROLLERS_NAMESPACE = 'MVC\\Controllers\\';
    const AREAS_NAMESPACE_CONTROLLERS = 'MVC\\Areas\\Controllers\\';
    const CONTROLLERS_SUFFIX = 'Controller';

    public function __construct($controllerName, $actionName, $requestParams = [], $isAreas)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->requestParams = $requestParams;
        $this->isAreas = $isAreas;
    }

    public function start()
    {
        if($this->isAreas){
            $this->initSecondController();
        }else{
            $this->initController();
        }

        View::$controllerName = $this->controllerName;
        View::$actionName = $this->actionName;

        call_user_func_array(
            [
                $this->controller,
                $this->actionName
            ],
            $this->requestParams
        );
    }

    private function initSecondController()
    {
        $controllerName =
            self::AREAS_NAMESPACE_CONTROLLERS
            . $this->controllerName
            . self::CONTROLLERS_SUFFIX;
        $this->controller = new $controllerName();

    }

    private function initController()
    {
        $controllerName =
            self::CONTROLLERS_NAMESPACE
            . $this->controllerName
            . self::CONTROLLERS_SUFFIX;
        $this->controller = new $controllerName();
    }
}