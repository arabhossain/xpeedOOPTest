<?php


namespace App\controllers;


use Xpeed\Controller;
use Xpeed\Request;

class Kashem extends Controller
{
    public function __construct()
    {

    }
    function index(Request $request){
      echo 'hi';
      print_r($request->getMethod());
    }


}
