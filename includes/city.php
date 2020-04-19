<?php
include_once "includes/operation.php";
include_once "includes/database.php";
class city extends database implements operation
{

    public function add()
    {

    }
    public function update()
    {

    }
    public  function delete()
    {

    }

    public function search()
    {

    }
    public function getALL()
    {
         $cit= parent::isExist('select * from cities');
        return $cit;
    }
}

?>