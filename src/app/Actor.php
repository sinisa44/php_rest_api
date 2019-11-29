<?php

class Actor extends Model {

    protected $database = 'sakila';
    protected $table = 'actor';

    

    public function index(){

      $actors = $this->select();
      print_r( $actors );
    }

    public function show( $id ){
      
     $actor = $this->where('first_name', null, 'PENELOPE',['id','first_name'] );

     print_r( $actor );
    }

    
}