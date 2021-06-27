<?php
class Validate
{
    public static function checkUser($username){
        $pattern = "/^[A-Za-z]{6,}$/";
        if(!preg_match($pattern,$username)){
            session_start();
            $_SESSION['user'] = "Tài khoản không hợp lệ";
        }
    }
    public static function checkEmail($email){
        $pattern = "/^[A-Za-z0-9]+[A-Za-z0-9]*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)$/";
        if (!preg_match($pattern,$email)){
            session_start();
            $_SESSION['email'] = 'Email không hợp lệ';
        }
    }
    public static function checkPassword($password){
        $pattern = "/^[A-Za-z]{3,}[0-9]+$/";
        if(!preg_match($pattern,$password)){
            session_start();
            $_SESSION['password'] = "Mật khẩu phải bao gồm cả chữ và số";
        }
    }
}