<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/14/19
 * Time: 10:03 AM
 */

$router = new \Xpeed\Routes(new \Xpeed\Request());

$router->get('/', 'AppForm@index');
$router->post('/', 'AppForm@store');
$router->get('/view', 'AppForm@viewSales');

$router->get('/kashem', 'Kashem@index');
