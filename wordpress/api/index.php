<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
  header('Access-Control-Allow-Origin: *');
  header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
  header("HTTP/1.1 200 OK");
  die();
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
  http_response_code(400);
  echo "Not allowed";
  die();
}

require 'Database.php';
$database = new Database("mysql", "127.0.0.1", "fcmeerdijk", "root", "");

if (!empty($_POST)){
  if (isset($_POST['name']) && isset($_POST['last_name']) && isset($_POST['birth'])){
    $name = base64_decode($_POST['name']);
    $last = base64_decode($_POST['last_name']);
    $dob = base64_decode($_POST['birth']);

    $query = $database->select( 'user', '*', array(
      'calling' => $name,
      'last' => $last,
      'birth' => $dob
    ));

    if (count($query->fetch()) > 0){
      http_response_code(200);
      echo json_encode(array("response"=>"200","message" => "User information matches!"));
      return;
    }else{
      http_response_code(404);
      echo json_encode(array("response"=>"404","error" => "User doesn't exists!"));
      return;
    }
  }
  http_response_code(400);
  echo json_encode(array("response"=>"400","error" => "Data provided but invalid format!"));
  return;
}
http_response_code(400);
echo json_encode(array("response"=>"400","error" => "No data specified. Check your request!"));
return;