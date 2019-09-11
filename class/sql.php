<?php

class Sql extends PDO {

    private $conn; 

    public function __construct(){

        $this->conn = new PDO("mysql:dbname=dbphp7;host=localhost","root","");
    }
    
    private function setParams($statment, $parameters = array()){
        foreach ($parameters as $key => $value) {
            $this->setParam($statment,$key, $value);       
        }
    }

    private function setParam($statment, $key, $value){

        $statment->bindParam($key,$value);
    }

    public function query($rawQuery, $params = array()){

        $stms = $this->conn->prepare($rawQuery);
        $this->setParams($stms, $params);

        $stms->execute();

        return $stms; 
    }

    public function select($rawQuery, $params = array()):array{
        
        $stms = $this->query($rawQuery, $params);

        return $stms->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>