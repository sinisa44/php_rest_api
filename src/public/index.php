<?php 

require('../config/app.php');


// print_r($_SERVER['REQUEST_METHOD']);

 $request = new Request;
$request->get( $_GET['actor'], 'actor@show' );
$request->get( $_GET['actor'], 'actor@index' );


// $model = new Model( 'sakila', 'actor');
// $model->find('21');