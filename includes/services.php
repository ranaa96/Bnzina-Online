<?php
include_once "operation.php";
include_once "database.php";
class services extends Database implements Operation
{
    var $serviceId;
    var $serviceName;
    var $ssID;

 
    //interface functions
    public function add(){}
    public function update(){}
    public function delete(){}
    public function search(){

    }

    public function getAll(){
        $pp = parent::isExist('select * from services');
        // $row=mysqli_fetch_assoc($pp);
        return $pp;
    }

    public function getserviceById($id){
        $query="select * from services where serviceID=";
        $query.="$id";
        $pp= parent::isExist($query);
        return $pp;
    }

    public function getService($service){
        $query="select * from  services where serviceName=";
        $query.="$service";
        $pp= parent::isExist($query);
        return $pp;
    }
    public function getserviceByssId(){
        $query="select * from serviceNameView where ssId=";
        $query.="$this->ssID";
        $pp= parent::isExist($query);
        if($row = mysqli_fetch_assoc($pp)){
            return $row;
        }
    }

    /**
     * Get the value of serviceId
     */ 
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * Get the value of serviceName
     */ 
    public function getServiceName()
    {
        return $this->serviceName;
    }
    
    /**
     * Get the value of ssID
     */ 
    public function getSsID()
    {
        return $this->ssID;
    }

    /**
     * Set the value of ssID
     *
     * @return  self
     */ 
    public function setSsID($ssID)
    {
        $this->ssID = $ssID;

        return $this;
    }
}

?>