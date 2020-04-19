<?php
include_once "operation.php";
include_once "database.php";
class contact extends Database implements Operation
{
    var $name;
    var $phone;
    var $message;
    var $email;
    var $subject;

    //setters and getters
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setPhone($phone){
        $this->phone = $phone;
    }
    public function getPhone(){
        return $this->phone;
    }
    public function setMessage($message){
        $this->message = $message;
    }
    public function getMessage(){
        return $this->message;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setSubject($subject){
        $this->subject = $subject;
    }
    public function getSubject(){
        return $this->subject;
    }
    //interface functions
    public function add(){
        $query="insert into contacts values ('Default','$this->name','$this->phone','$this->email','$this->subject','$this->message','Default')";
        return parent::DML($query);
    }
    public function update(){}
    public function delete(){}
    public function search(){}
    public function getAll(){
        $pp = parent::isExist('select * from contacts');
        return $pp;
    }
    

}
