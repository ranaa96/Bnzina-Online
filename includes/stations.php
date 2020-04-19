<?php
include_once "operation.php";
include_once "database.php";
class stations extends Database implements Operation
{
    var $stationId;
    var $stationName;
    var $stationLat;
    var $stationLng;
    var $stationOpenTime;
    var $stationCloseTime;
    var $staionAddress;
    var $this_page_first_result;
    var $results_per_page;

   
    //interface functions
    public function add(){}
    public function update(){}
    public function delete(){}
    public function search(){

    }

    public function getAll(){
        $pp = parent::isExist('select * from stations');
        return $pp;
    }

    public function getPaginate(){
        $pp = parent::isExist('select * from stations LIMIT ' . $this->this_page_first_result . ',' . $this->results_per_page);
        return $pp;
    }


//  View cities for search
    public function getCityView(){
        $pp = parent::isExist('select DISTINCT `cityNameEnglish` from `stationsview`');
        return $pp;
    }
//  View governments for search
    public function getGovView(){
        $pp = parent::isExist('select DISTINCT `governorateNameEnglish` from `stationsview`');
        return $pp;
    }

    public function getNearest($lat,$lng){
        $pp = parent::isExist("
        SELECT * FROM (
            SELECT *, 
                (
                    (
                        (
                            acos(
                                sin(( $lat * pi() / 180))
                                *
                                sin(( `latitude` * pi() / 180)) + cos(( $lat * pi() /180 ))
                                *
                                cos(( `latitude` * pi() / 180)) * cos((( $lng - `longitude`) * pi()/180)))
                        ) * 180/pi()
                    ) * 60 * 1.1515 * 1.609344
                )
            as distance FROM `stationsview`
        ) stationsview
        WHERE distance <= 5
        LIMIT 15;
        ");
        return $pp;

    }
//there are edits in functions <><>
    public function getStationById($id){
        $query='select * from `stationsview` where stationId=';
        $query.="$id";
        $pp= parent::isExist($query);
        return $pp;
    }

 

    public function getStationService($id){
        $query='select * from `servicenameview` where stationId=';
        $query.="$id";
        $pp= parent::isExist($query);
        // $row=mysqli_fetch_assoc($pp);
        return $pp;
    }

    public function getServiceStation($id){
        $query='select * from `stationServiceView` where serviceID=';
        $query.="$id";
        $pp= parent::isExist($query);
        // $row=mysqli_fetch_assoc($pp);
        return $pp;
    }

    public function getCity($city){
        $query="select * from  `stationsview` where cityNameEnglish='";
        $query.="$city'";
        $pp= parent::isExist($query);
        return $pp;
    }
    public function getGov($gov){
        $query="select * from  `stationsview` where governorateNameEnglish='";
        $query.="$gov'";
        $pp= parent::isExist($query);
        return $pp;
    }
    public function getOpen(){

        $pp = parent::isExist("SELECT * FROM `stations` WHERE CONVERT_TZ(CURRENT_TIME(),'-07:00','+02:00') > `openTime` UNION SELECT * FROM `stations` WHERE CONVERT_TZ(CURRENT_TIME(),'-07:00','+02:00') < `closeTime`");
        return $pp;

    }

    // public function getOpenId(){

    //     $pp = parent::isExist("SELECT `stationId` FROM `stations` WHERE CONVERT_TZ(CURRENT_TIME(),'-07:00','+02:00') > `openTime` UNION SELECT `stationId`FROM `stations` WHERE CONVERT_TZ(CURRENT_TIME(),'-07:00','+02:00') < `closeTime`");
    //     return $pp;

    // }

    public function getCloseID(){
      $pp = parent::isExist("SELECT `stationId` FROM `stations` WHERE CONVERT_TZ(CURRENT_TIME(),'-07:00','+02:00') < `openTime` and CONVERT_TZ(CURRENT_TIME(),'-07:00','+02:00') > `closeTime`");
        return $pp;
    }
  
 
    /**
     * Get the value of stationId
     */ 
    public function getStationId()
    {
        return $this->stationId;
    }

    /**
     * Get the value of stationName
     */ 
    public function getStationName()
    {
        return $this->stationName;
    }

    /**
     * Get the value of stationLat
     */ 
    public function getStationLat()
    {
        return $this->stationLat;
    }

    

    /**
     * Get the value of stationOpenTime
     */ 
    public function getStationOpenTime()
    {
        return $this->stationOpenTime;
    }

    /**
     * Get the value of stationLng
     */ 
    public function getStationLng()
    {
        return $this->stationLng;
    }

    /**
     * Get the value of stationCloseTime
     */ 
    public function getStationCloseTime()
    {
        return $this->stationCloseTime;
    }

    /**
     * Get the value of staionAddress
     */ 
    public function getStaionAddress()
    {
        return $this->staionAddress;
    }

    
    /**
     * Get the value of this_page_first_result
     */ 
    public function getThis_page_first_result()
    {
        return $this->this_page_first_result;
    }

    /**
     * Set the value of this_page_first_result
     *
     * @return  self
     */ 
    public function setThis_page_first_result($this_page_first_result)
    {
        $this->this_page_first_result = $this_page_first_result;

        return $this;
    }

    /**
     * Get the value of results_per_page
     */ 
    public function getResults_per_page()
    {
        return $this->results_per_page;
    }

    /**
     * Set the value of results_per_page
     *
     * @return  self
     */ 
    public function setResults_per_page($results_per_page)
    {
        $this->results_per_page = $results_per_page;

        return $this;
    }
}

?>