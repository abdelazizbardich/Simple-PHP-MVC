<?php


class comment extends Model{
    public $tableName;

    public function getCommentsCount(){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("SELECT COUNT(id) FROM $this->tableName");
        if($sql->execute()){
            return $sql->fetch();
        }else{
            return $this->con->errorInfo();
        }
    }
}