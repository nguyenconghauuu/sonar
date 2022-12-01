<?php 

    function checkUsername($value) {
        $pattern = '#^[a-z_][a-z0-9_\.\s]{4,31}$#';
        $flag = false;
        if(preg_match($pattern , $value) == true){
            $flag =true;
        }
        return $flag;
    }
    function checkPassword($value) {
        $pattern = '#^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$#';
        $flag = false;
        if(preg_match($pattern , $value) == true){
            $flag =true;
        }
        return $flag;
    }
?>