<?php

require_once( '../vendor/autoload.php' );
header( 'Content-Type: application/json' );

header("Access-Control-Allow-Methods: POST");
$data = json_decode(file_get_contents('php://input'), true);
$request = new Request;
