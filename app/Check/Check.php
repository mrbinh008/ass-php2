<?php

namespace App\Check;
class Check
{
    public function checkEmptyValues($data)
    {
        $error = [];
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $error[] = $key;
            }
        }
        return $error;
    }

//    public function checkEmail($email)
//    {
//        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
//        return preg_match($pattern, $email) === 1;
//    }
//    public function checkName($name)
//    {
//        if (preg_match("/^[a-zA-Z ]*$/", $name)==1) {
//            return true;
//        }
//        return false;
//    }


    public function checkNumber($number)
    {
        if (is_numeric($number) && $number > 0) {
            return true;
        }
        return false;
    }
}
