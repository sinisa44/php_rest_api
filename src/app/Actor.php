<?php

class Actor extends Model {

    protected $database = 'sakila';
    protected $table = 'actor';

    

    public function index(){

      $actors = $this->select();
      print_r( $actors );
    }

    public function show( $id ){
      
     $actor = $this->where( 'first_name', null, 'PENELOPE',['id','first_name'] );

     print_r( $actor );
    }


    public function update( $request ) {
      print_r($request);
    }

    public function store( $request ) {
      
      $this->save(
        [
          'first_name' => $request->first_name,
          'last_name'  => $request->last_name
        ]
    );
    }

    
}