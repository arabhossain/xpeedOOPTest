<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/14/19
 * Time: 9:33 AM
 */

namespace Xpeed;


class App
{
    public static $app_instance;

    private $config = [];

    public function __construct()
    {
        $this->config = include ROOT_PATH.'/configs/configs.php' ;

    }

    public static function instance()
    {
        if ( !self::$app_instance ){
            self::$app_instance = new App();
        }
        return self::$app_instance;
    }

    public function getConfig($option){

        if(isset($this->config[$option])){
            return $this->config[$option];
        }

        throw new Exceptions($option.' not found in configuration options');
    }

    public function base_url($path = ''){
        $_url = $this->config['base_url'];
        if(strlen($path) > 1){
            $_url .= '/'.$path;
        }

        return $_url;
    }
}