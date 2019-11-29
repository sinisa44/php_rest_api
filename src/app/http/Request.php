<?php

class Request {

    public function get( $request, $request_method){
      
      
      if( isset( $request ) ){

        $method =  ltrim( strstr( $request_method, '@', false ), '@');
        $class = ucfirst( strstr( $request_method, '@', true ) );

        if(  $request !== 'all'){
          if( $method == 'show' ){
            if( class_exists($class)){
              $c = new $class;
              $c->show( $request );
            }
          }

        }elseif( $request == 'all') {
          if( $method == 'index' ){
            if( class_exists( $class ) ){
              $c = new $class;
              $c->index();
            }
          }
        }
      }

   
    
    

    }
    public function post( $url, $method ){}
}