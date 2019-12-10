<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/14/19
 * Time: 1:30 AM
 */

namespace Xpeed;


class Exceptions extends \Exception
{
    public function errorMessage() {
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile();
        return $errorMsg;
    }

}