<?php
header("Access-Control-Allow-Origin:*");
header("Content-Type:application/json; charset=UTF-8");

require './db.php';
require './response.php';

$json = file_get_contents('php://input');
$data = json_decode($json);

if(isset($data)){

//store object data in variable
$name = $data ->name;
$email = $data ->email;
$message = $data ->comments;

/*insert data*/
$query = "INSERT INTO form (`name`,`email`, `message`) VALUES ('$name','$email','$message')";
$inserted = mySqli_query($con , $query);

$res = new Response;
if($inserted){
    $res -> success = true;
    $res -> message = "we will contact you soon";
   }else{
    $res -> success = false;
    $res -> message = "failed to submit";
}
/*insert data*/
echo json_encode($res);
}

?>