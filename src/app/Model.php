<?php

class Model {

    public $conn;

    public function __construct(){
        $this->conn = Connection::get_instance()->conn;
    }
    
    public function select( $search=[] ){
      
        try{
           $stmt = $this->conn->prepare( 'SELECT '.self::search( $search ).' FROM '.$this->database.'.'.$this->table );
           $stmt->execute();
           
           $res = array();
           while( $row= $stmt->fetch( PDO::FETCH_OBJ ) ) { 
            $res[] = $row;
         }

         return json_encode( $res );

        }catch( PDOException $e ){    
            echo $e->getMessage();
        }
    }

    public function save($data=[]){    

        $columns  = implode( ',', array_keys( $data ) );
        $values   = implode( '", "', array_values($data ) );
        $prep_val = implode( ',:', array_keys( $data ) );

        $stmt = $this->conn->prepare( 'INSERT INTO '.$this->database.'.'.$this->table.' ('.$columns.') VALUES ("'.$values.'")');

        $stmt->execute();

    }

    public function delete( $id ){
        $stmt = ( 'DELETE FROM '. $this->database.'.'.$this->table.' WHERE id='.$id );
    }



    public function find( $id, $search=[] ) {
        if( ! empty( $id ) ) {
            try{
                $stmt = $this->conn->prepare( 'SELECT '.self::search( $search ).' FROM '. $this->database.'.'.$this->table.' WHERE id='.$id );
                $stmt->execute();

                $res = $stmt->fetch( PDO::FETCH_OBJ );

                if( $res ) {
                    return json_encode( $res );
                }else{
                    return json_encode( 'no data' );
                }
            }catch( PDOException $e ) {
                echo $e->getMessage();
            }
        }
    }

    public function where( $first, $operator=null, $second, $search=[] ){
        if( $operator == null ){
            $operator = "=";
        }
        try{
            $stmt = $this->conn->prepare( 'SELECT '.self::search( $search ).' FROM ' . $this->database.'.'.$this->table.' WHERE '.$first.$operator.'"'.$second.'"' );
            $stmt->execute();

            $res = $stmt->fetch( PDO::FETCH_ASSOC );

            return json_encode( $res );
        }catch( PDOException $e ){
            return json_encode( $e->getMessage() );
        }
    }

    public static function search( $search ) {
        if( empty( $search ) ){
            $column_search = '*';
        }else{ 
            $column_search = implode( ",", $search );
        }

        return $column_search;
    }
}