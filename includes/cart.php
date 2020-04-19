<?php
include_once "database.php";
include_once "operation.php";
class cart extends database implements operation{
    var $serviceId;
    var $stationId;
    var $name;
    var $qty;
    var $price;
    var $customer;
    var $order;
    var $delivary;
    private $id;
    private $ssId;
    private $customerId;
    private $serviceName;
    private $quantity;
    private $totalAmount;
    private $deliveryFees;

    public function getStationId(){
        return $this->stationId ;
    }
    public function setStationId($x){
        $this->stationId =$x;

    }
    public function getServiceId(){
        return $this->serviceId ;
    }
    public function setServiceId($x){
        $this->serviceId =$x;

    }
    // public function getServiceName(){
    //     return $this->name ;
    // }
    // public function setServiceName($x){
    //     $this->name =$x;

    // }
    // public function getQuantity(){
    //     return $this->qty ;
    // }
    // public function setQuantity($x){
    //     $this->qty =$x;

    // }
    public function getPrice(){
        return $this->price ;
    }
    public function setPrice($x){
        $this->price =$x;

    }
    public function getCustomer(){
        return $this->customer ;
    }
    public function setCustomer($x){
        $this->customer =$x;

    }
    public function getOrderId(){
        return $this->order ;
    }
    public function setOrderId($x){
        $this->order =$x;

    }
    public function getDelivary(){
        return $this->delivary ;
    }
    public function setDelivary($x){
        $this->delivary =$x;

    }
 
    function setId($id) { $this->id = $id; }
    function getId() { return $this->id; }
    function setDeliveryFees($deliveryFees) { $this->deliveryFees = $deliveryFees; }
    function getDeliveryFees() { return $this->deliveryFees; }
    function setssid($ssId) { $this->ssId = $ssId; }
    function getssId() { return $this->ssId; }
    function setCustomerId($customerId) { $this->customerId = $customerId; }
    function getCustomerId() { return $this->customerId; }
    function setServiceName($serviceName) { $this->serviceName = $serviceName; }
    function getServiceName() { return $this->serviceName; }
    function setQuantity($quantity) { $this->quantity = $quantity; }
    function getQuantity() { return $this->quantity; }
    function setTotalAmount($totalAmount) { $this->totalAmount = $totalAmount; }
    function getTotalAmount() { return $this->totalAmount; }
// CartTemp
    public function add() {
        return parent::DML("insert into carttemp values('".$this->getServiceId()."','".$this->getServiceName()."','".$this->getQuantity()."','".$this->getPrice()."','".$this->getCustomer()."')");
    }
  
    // public function update() {
    //     return parent::DML("update carttemp set quantity=quantity+'".$this->getQuantity()."' where serviceId ='".$this->getServiceId()."' and customerId = '".$this->getCustomer()."'");
    // }
    public function update(){
        $pp=parent::DML("update cartTemp set quantity=$this->quantity, totalAmount=$this->totalAmount where customerId=$this->customerId and ssId=$this->ssId");
        return $pp;
    }
    public function delete() {
        return parent::DML("delete from carttemp where customerId ='".$this->getCustomer()."'");
    }
    public function deleteOne() {
        return parent::DML("delete from carttemp where serviceID ='".$this->getServiceId()."' and customerId = '".$this->getCustomer()."'");
    }
    public function search() {
    }
    public function customerAll() {
        return parent::isExist("select * from carttemp where customerId ='".$this->getCustomer()."'");
    }

    public function getAll(){
        $pp = parent::isExist('select * from cartTemp');
         return $pp;
    }

    public function getSS($ssId){
        return parent::isExist("select * from `servicenameview` where ssId='".$ssId."'ORDER BY stationId DESC");
        
    }


// OrderDetails
    public function addOrderDetails() {
        return parent::DML("insert into orderdetails values('".$this->getOrderId()."','".$this->getServiceId()."','".$this->getStationId()."','".$this->getQuantity()."','".$this->getPrice()."','".$this->getDelivary()."')");
    }
    public function getOrderDetails() {
        return parent::isExist("select * from orderdetails where orderId='".$this->getOrderId()."' ");
    }
   
   
    public function getCount(){
        $pp = parent::isExist("select count(*) as count from cartTemp where customerId=$this->customerId");
         return $pp;
    }
    public function getItemTotalAmount(){
        $pp = parent::isExist("select totalAmount from cartTemp where customerId=$this->customerId and ssId=$this->ssId");
        return $pp;
    }
    public function getItemQty(){
        $pp = parent::isExist("select quantity from cartTemp where customerId=$this->customerId and ssId=$this->ssId");
        return $pp;
    }
    public function inCart(){
        $pp = parent::isExist("select * from cartTemp where customerId=$this->customerId and ssId=$this->ssId");
        return $pp;
    }
    public function getAllCartItems(){
        $pp = parent::isExist("SELECT c.ssId , c.id , c.quantity , c.totalAmount , s.serviceStatus, s.stationName , s.serviceName , s.deliveryFees ,s.servicePrice , s.stationId
        from carttemp as c
        INNER JOIN servicenameview as s
        on
        c.ssId = s.ssId
        WHERE c.customerId=$this->customerId");
        return $pp;
    }
    public function getItemId(){
        $pp = parent::isExist("SELECT  s.stationId
        from carttemp as c
        INNER JOIN servicenameview as s
        on
        c.ssId = s.ssId
        WHERE c.customerId=$this->customerId");
        return $pp;
    }


    public function addItem() {
        $query = "INSERT INTO `cartTemp`(`ssid`,`customerId`, `quantity`, `totalAmount`) VALUES ($this->ssId,$this->customerId,'$this->quantity','$this->totalAmount')";
        return parent::DML($query);
        
    }

    public function updateItem(){
        $pp=parent::DML("update cartTemp set quantity=$this->quantity, totalAmount=$this->totalAmount where customerId=$this->customerId and ssId=$this->ssId");
        return $pp;
    }

    public function removeItem() {
        $query  = "DELETE FROM `cartTemp` WHERE id = $this->id";
        return parent::DML($query);
    }

    public function removeAllItems() {
        $query  = "DELETE from `cartTemp` WHERE customerId=$this->customerId";
        return parent::DML($query);
    }


}


?>