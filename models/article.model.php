<?php



class Article extends Model{
    public $tableName;


    public function getViewsCount(){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("SELECT SUM(views) FROM $this->tableName");
        if($sql->execute()){
            return $sql->fetch();
        }else{
            return $this->con->errorInfo();
        }
    }
    
    public function getArticleCount(){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("SELECT COUNT(id) FROM $this->tableName");
        if($sql->execute()){
            return $sql->fetch();
        }else{
            return $this->con->errorInfo();
        }
    }
}