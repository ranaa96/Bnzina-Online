<?php
include_once "database.php";
include_once "operation.php";
class rating extends database implements operation{
    var $order;
    var $value;
    var $comment;
    var $station;
    var $avg;


    public function getOrderId(){
        return $this->order ;
    }
    public function setOrderId($x){
        $this->order =$x;

    }
    public function getRateValue(){
        return $this->value ;
    }
    public function setRateValue($x){
        $this->value =$x;

    }
    public function getRateComment(){
        return $this->comment ;
    }
    public function setRateComment($x){
        $this->comment =$x;

    }

    public function getStationId(){
        return $this->station ;
    }
    public function setStationId($x){
        $this->station =$x;

    }
    public function getAverage(){
        return $this->avg ;
    }
    public function setAverage($x){
        $this->avg =$x;

    }

    public function add() {
        return parent::DML("insert into ratings values('".$this->getOrderId()."','".$this->getRateValue()."','".$this->getRateComment()."','Default')");
    }
  
  
    public function update() {
        return parent::DML("update stations set avgRate='".$this->getAverage()."' where stationId ='".$this->getStationId()."'");
    }

    public function getAll() {
        return parent::isExist("select * from ratingview where stationId ='".$this->getStationId()."'");
    }

    public function avgRate($id){
        return parent::isExist("select ROUND(AVG(rateValue)) as avgRate from ratingview where stationId ='".$id."'");
    }

    public function delete() {
    }

    public function search() {
    }








}




?>