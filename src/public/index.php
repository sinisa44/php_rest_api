<?php 
// die();
require('../config/app.php');

// print_r($_SERVER);
// die();

 $request = new Request;
$request->get( $_GET['actor'], 'actor@show' );
$request->get( $_GET['actor'], 'actor@index' );

$request->post( $data, '/actor/update', 'actor@update' );
$request->post( $data, '/actor/store', 'actor@store' );
//$request->put(  , 'actor@update' );
// // // $model = new Model( 'sakila', 'actor');
// // // $model->find('21');