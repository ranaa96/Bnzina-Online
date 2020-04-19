<?php
include_once "database.php";
include_once "operation.php";
class orders extends database implements operation{
    var $location ;
    var $payment ;
    var $brand;
    var $plate;
    var $long ;
    var $lat ;
    var $total;
    var $customer ;
    var $oId ;

    public function getLocation(){
        return $this->location ;
    }
    public function setLocation($x){
        $this->location =$x;

    }
    public function getPayment(){
        return $this->payment ;
    }
    public function setPayment($x){
        $this->payment =$x;

    }
    public function getBrand(){
        return $this->brand ;
    }
    public function setBrand($x){
        $this->brand =$x;

    }
    public function getPlate(){
        return $this->plate ;
    }
    public function setPlate($x){
        $this->plate =$x;

    }
    public function getLong(){
        return $this->long ;
    }
    public function setLong($x){
        $this->long =$x;

    }
    public function getLat(){
        return $this->lat ;
    }
    public function setLat($x){
        $this->lat =$x;

    }
    public function getTotal(){
        return $this->total ;
    }
    public function setTotal($x){
        $this->total =$x;

    }
    public function getCustomer(){
        return $this->customer ;
    }
    public function setCustomer($x){
        $this->customer =$x;

    }

    

    public function add() {
        
        return parent::DML("insert into orders values(Default,CONVERT_TZ(Now(),'-07:00','+02:00'),'pending','".$this->getLocation()."','".$this->getPayment()."','".$this->getBrand()."','".$this->getPlate()."','".$this->getLong()."','".$this->getLat()."','".$this->getCustomer()."',NULL,'".$this->getTotal()."')");
    }

    public function getAll() {
        return parent::isExist("select * from orders where customerId ='".$this->getCustomer()."' ORDER BY orderId DESC");
    }
    public function getOrdersCount() {
        return parent::isExist("select count(*) as countOrders from orders where customerId ='".$this->getCustomer()."'");
    }

  
    public function update() {
    }
    public function delete() {
    }
    public function search() {
    }

     //for orderDetails //
     public function getMaxOrder() {
        return parent::isExist("select max(orderId)  as maxOrder from orders where customerId ='".$this->getCustomer()."'");
    }

    public function getOneOrder($oId) {
        return parent::isExist("select * from orders where customerId ='".$this->getCustomer()."' and orderId='".$oId."' ");
    }

    public function getNames($srId,$stId){
        return parent::isExist("select * from `servicenameview` where stationId='".$stId."' and serviceId='".$srId."'");
        
    }


 //Delivary

 public function delivaryConfirm($oId) {

    return parent::DML("update orders set orderStatus='delivered' where customerId ='".$this->getCustomer()."' and orderId='".$oId."' ");

}

public function delivaryStatus($dId){
    return parent::DML("update delivery set status='1' where id ='".$dId."' ");

}
    
  





}




?>