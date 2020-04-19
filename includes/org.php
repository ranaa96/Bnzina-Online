<?php
include_once "operation.php";
include_once "database.php";
class Organization extends Database implements Operation
{

    public function add(){
    }
    public function update(){}
    public function delete(){

    }
    public function search(){}
    public function getAll(){
        $pp= parent::isExist('select * from categories');
        return $pp;
    }

}

?>