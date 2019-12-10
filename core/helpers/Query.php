<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/14/19
 * Time: 1:36 AM
 */

namespace Helpers;


class Query
{
    private $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function asObject(){
        $_result = [];
        foreach ($this->result as $item){
            $_result[] = (object) $item;
        }
        return (object) $_result;
    }

    public function asArray(){
        return (array) $this->result;
    }

}