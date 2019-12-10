<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/12/19
 * Time: 1:53 AM
 */

namespace Xpeed;


class Routes
{
    private $request;
    private $supportedHttpMethods = array(
        "GET",
        "POST"
    );
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    function __call($name, $args)
    {
        list($route, $method) = $args;
        if(!in_array(strtoupper($name), $this->supportedHttpMethods))
        {
            $this->invalidMethodHandler();
        }
        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '')
        {
            return '/';
        }
        return $result;
    }
    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }
    private function defaultRequestHandler()
    {
        header("{$this->request->serverProtocol} 404 Not Found");
        throw new Exceptions('$e');
    }


    function resolve()
    {
        if(!isset($this->request->requestMethod)) return;

        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        if(!isset($methodDictionary[$formatedRoute])){
            $this->defaultRequestHandler();
            return;
        }
        $method = $methodDictionary[$formatedRoute];
        if(is_null($method))
        {
            $this->defaultRequestHandler();
            return;
        }

        if(is_callable($method)){
            echo call_user_func_array($method, $this->request);
        } else {
            $controler = explode('@', $method);
            $class_method = strtolower($controler[1]);
            $class = '\\App\\controllers\\'.ucfirst($controler[0]);
            if (class_exists($class)) {
                $myclass = new $class();
                $myclass->$class_method($this->request);
                return;
            }else{
                $this->defaultRequestHandler();
                return;
            }
        }
    }
    function __destruct()
    {
        $this->resolve();
    }
}
