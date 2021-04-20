<?php


require "./_classes/Database.php";

class Model extends Database{
    public $tableName;
    public function get(){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("SELECT * FROM $this->tableName");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }
}