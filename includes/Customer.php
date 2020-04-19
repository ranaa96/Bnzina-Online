<?php
    include_once "includes/operation.php";
    include_once "includes/database.php";
    class Customer extends database implements operation
    {

         var $Custname;var $Custphone; var $Custemail;var $Custpassword; var $Custaddress; var $cityName; var$ID;
           
        public function GetcustomerName()
        {
            return $this->Custname;
        }
        public function GetcustomerPhone()
        {
            return $this->Custphone;
        }  
        public function GetcustomerEmail()
        {
            return $this->Custemail;
        }  
        public function GetcustomerAddress()
        {
            return $this->Custaddress;
        }
        public function GetcityName()
        {
            return $this->cityName;
        }
        
        
      
        public function GetcustomerPassword()
        {
            return $this->Custpassword;
        }
        public function setcustomerName($n)       
        {
            $this->Custname=$n;
        }
        public function setcustomerPhone($p)       
        {
            $this->Custphone=$p;
        }
        public function setcustomerEmail($e)       
        {
            $this->Custemail=$e;
        }
        public function setcustomerPassword($pas)       
        {
            $this->Custpassword=$pas;
        }
       
        public function setcustomerAddress($ad)       
        {
            $this->Custaddress=$ad;
        }
        

        public function setcityName($cn)       
        {
            $this->cityName=$cn;
        }
        


        public function GetID()
        {
            return $this->ID;
        } 
       
        public function setID($n)       
        {
            $this->ID=$n;
        }
       public function add()

       {
    
        return parent::DML("insert into customers values(Default,'".$this->GetcustomerName()."','".$this->GetcustomerEmail()."','".$this->GetcustomerPassword()."','".$this->GetcustomerPhone()."','".$this->GetcustomerAddress()."','".$this->GetcityName()."')");
           
       }

       public function update()
       {
   
        return parent::DML("update customers set customerPassword='".$this->GetcustomerPassword()."' where customerId='".$this->GetID()."'");
       }
       public  function delete()
       {
        return parent::DML("delete from customers where customerId='".$this->GetID()."'");
       
       }

       public function search()
       {


       }
     

       public function login()
       {
    
           $log=parent::isExist("select * from customers where (customerEmail='".$this->GetcustomerEmail()."') and customerPassword='".$this->GetcustomerPassword()."'");
             
            return $log;
       }
       public function checkEmail()
       {
           
            $log=parent::isExist("select * from customers where customerEmail='".$this->GetcustomerEmail()."'");
             
            return $log;
       }
       public function checkByID()
       {
        $log=parent::isExist("select * from customers where customerId='".$this->GetID()."'");
             
        return $log;
           
       }
       public function updateAll()
       {

        return parent::DML("update customers set customerName='".$this->GetcustomerName()."',customerEmail='".$this->GetcustomerEmail()."',customerPhone='".$this->GetcustomerPhone()."',customerAddress='".$this->GetcustomerAddress()."',cityName='".$this->GetcityName()."' where customerId='".$this->GetID()."'");   
       }


       public function getAll()
       {

       }
 


        
    
    }

?>