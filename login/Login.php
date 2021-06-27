<?php
include_once 'User.php';


class Login
{
    public static string $path = 'Data1.json';

    public static function loadData(): array
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
      return self::convert($data);
    }
    public static function savaData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path,$dataJson);
    }
    public static function convert($data): array
    {
        $users = [];
        foreach ($data as $item){
            $user = new User($item->name,$item->password);
            array_push($users,$user);
        }

        return $users;
    }
    public static function addUser($user){
        $users = self::loadData();
        array_push($users,$user);
        self::savaData($users);
    }
    public static function checkLogin($user) : bool
    {
        $users = self::loadData();
        foreach ($users as $item)
        {
            if($user->name == $item->name && $user->password == $item->password){
                return true;
            }
        }return false;
    }

    public static function signUp($use,$password)
    {
        $user = new User($use,$password);
        if(self::checkLogin($user)){
            session_start();
            $_SESSION['user'] = $user;
            header('Location: ../index.php');
        }
    }
}