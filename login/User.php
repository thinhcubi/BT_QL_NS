<?php
class User
{
    public string $name;
    public string $password;

    public function __construct(string $name,string $password){
        $this->name = $name;
        $this->password = $password;
    }
    public function getName() : string
    {
        return $this->name;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function setName($name) : void
    {
        $this->name = $name;
    }
    public function setPassword($password): void
    {
        $this->password = $password;
    }

}
