<?php 
    class database{
        var $connection ;
        var $host="mysql5025.site4now.net";
        var $userName="a569ef_bnzina";
        var $pass="#bnzina123";
        var $dbName="db_a569ef_bnzina";
        // var $host="localhost";
        // var $userName="root";
        // var $pass="";
        // var $dbName="db_a569ef_bnzina";

        function __construct(){
            $this->connection = mysqli_connect($this->host, $this->userName, $this->pass, $this->dbName);
           
        }

        //to perform dml (insert/update/delete)
        function DML($queryStat){
            if(!(mysqli_query($this->connection,$queryStat))){
                return "query failed ".mysqli_error($this->connection);
            }else{
                return "success";
            }
          
        }

        //check if data exist(select)
        function isExist($queryStat){
            //boolean value
            $result =mysqli_query($this->connection,$queryStat);
            return $result;
        }
    }
?>