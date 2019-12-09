<?php

class Request {

    public function get( $request, $request_method){
      
      $class  = self::get_class_name( $request_method );
      $method = self::get_method_name( $request_method );

      if( isset( $request ) ){
        if(  $request !== 'all' ){
          if( $method == 'show' ){
            if( class_exists( $class ) ) {
             self::call_class( $class, $method, $request );
            }
          }
        }elseif( $request == 'all' ) {
          if( $method == 'index' ){
            if( class_exists( $class ) ){
              self::call_class( $class, $method );
            }
          }
        }
      }
    }
    public function post( $request, $url, $request_method ){
      if(  $_SERVER['PATH_INFO'] == $url ) {
        if( ! empty( $request ) ){
          $class  = self::get_class_name( $request_method );
          $method = self::get_method_name( $request_method );

          if( class_exists( $class ) ) {
            self::call_class( $class, $method, $request);
          }
        }
      }
    }

    private static function get_class_name( $name ){
      return ucfirst( strstr( $name, '@', true ) );
    }

    private static function get_method_name( $name ) {
      return ltrim( strstr( $name, '@', false), '@' );
    }

    private static function call_class( $class, $method, $request=null ){
      $c = new $class;
      $c->$method( ( object ) $request );
    }
}