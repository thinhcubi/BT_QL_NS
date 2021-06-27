<?php
class Employee
{
    public string $name;
    public int $date;
    public string $address;
    public string $position;


    public function __construct($data)
    {
        $this->name= $data['name'];
        $this->date = $data['date'];
        $this->address = $data['address'];
        $this->position = $data['position'];
    }
   public function setName($data){
        $this->name = $data['name'];
   }
   public function setDate($data){
        $this->date = $data['date'];
   }public function setAddress($data){
        $this->address = $data['address'];
   }public function setPosition($data){
        $this->position = $data['position]'];
   }
   public function getName(){
        return $this->name;
   }
   public function getAddress(){
        return $this->address;
   }
   public function getDate(){
        return $this->date;
   }
   public function getPosition(){
        return $this->position;
   }


}