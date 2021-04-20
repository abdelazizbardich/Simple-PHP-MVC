<?php
require "./_config/config.php";
class Database{

    private $host = 'localhost';
    private $dbName = 'ooptest';
    private $username = 'root';
    private $password = '';
    public $con;

    public function __construct(){
        $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName.';charset=utf8', $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return true;
    }
}