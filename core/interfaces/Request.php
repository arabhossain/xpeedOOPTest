<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/12/19
 * Time: 3:02 AM
 */

namespace Interfaces;


interface Request
{
    public function getBody();
    public function getMethod();
}
