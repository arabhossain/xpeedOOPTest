<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/14/19
 * Time: 2:07 AM
 */

namespace Helpers;


trait Validations
{
    private $err_messages = [];
    private $validations = [];


    public function validate_number($str){
        if(is_numeric($str)){
            $validation[] = true;
            return true;
        }
        $this->err_messages[] = $str.' is not number';
        $this->validations[] = false;
        return false;
    }

    public function validate_maxLength($str, $maxLength){
        if(strlen($str) <= $maxLength){
            $validation[] = true;
            return true;
        }
        $this->err_messages[] = $str.' maximum limit exceeded';
        $this->validations[] = false;
        return false;
    }

    public function validate_minLength($str, $minLength){
        if(strlen($str) >= $minLength) {
            $validation[] = true;
            return true;
        }
        $this->err_messages[] = $str.' minimum limit doesn\'t meet';
        return false;
    }

    public function validate_mobile($mobile){
        if(preg_match('/^(((\+|00)?880)|0)(\d){10}$/', $mobile)) {
            $validation[] = true;
            return true;
        }
        $this->err_messages[] = $mobile.' is a invalid mobile number';
        $this->validations[] = false;
        return false;
    }

    public function validate_email($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation[] = true;
            return true;
        }
        $this->err_messages[] = $email.' invalid email';
        $this->validations[] = false;
        return false;
    }

    public function validation_run(){
        if(in_array(false, $this->validations)){
            return false;
        }

        return true;
    }

    public function error_message(){

        return $this->err_messages;
    }
}