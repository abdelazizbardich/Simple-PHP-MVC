<?php


require "./_classes/Database.php";

class Model extends Database{
    public $tableName;

    // get data
    public function get(){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("SELECT * FROM $this->tableName");
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }
    // delete from table
    public function delete($id){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("DELETE FROM $this->tableName WHERE id=:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    // update table
    public function update($id,array $datas){
        $this->tableName = get_called_class()."s";
        $updateSets = "";
        foreach($datas as $key=>$data){
            if( !next( $datas ) ) {
                $updateSets = $updateSets." `$key`='$data' ";
            }else{
                $updateSets = $updateSets." `$key`='$data', ";
            }
        }
        $sql = $this->con->prepare("UPDATE $this->tableName SET ".$updateSets." WHERE id=:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        if($sql->execute()){
            return true;
        }else{
            return false;
        }
    }
    // Select
    public function find($id){
        $this->tableName = get_called_class()."s";
        $sql = $this->con->prepare("SELECT * FROM $this->tableName WHERE id=:id");
        $sql->bindParam(":id",$id,PDO::PARAM_INT);
        if($sql->execute()){
            return $sql->fetchAll(PDO::FETCH_OBJ);
        }else{
            return false;
        }
    }
    // insert
    public function insert(array $datas){
        $this->tableName = get_called_class()."s";
        $keys = "";
        $binds = "";
        foreach($datas as $key=>$data){
            if( !next( $datas ) ) {
                $keys .= $key."";
                $binds .= ":".$key;
            }else{
                $keys .= $key.",";
                $binds .= ":".$key.",";
            }
        }
        $query = "INSERT INTO $this->tableName ($keys) VALUES ($binds)";
        $sql = $this->con->prepare($query);

        foreach($datas as $Name => &$Value){
            $sql->bindParam(':'.$Name, $Value, PDO::PARAM_STR);
        }
        if($sql->execute()){
            return intval($this->con->lastInsertId());
        }else{
            return false;
        }
    }
}