<?php

class Connection {

    private static $instance;
    public $conn;

    public function __construct() {

        try{
            $this->conn = new PDO('mysql:host=mysql;port:3306;dbname=sakila','root','secret');
          
            $this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
           
        }catch( PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function get_instance(){
        if( ! self::$instance ){
            self::$instance = new Connection();
        }

        return self::$instance;
    }
}