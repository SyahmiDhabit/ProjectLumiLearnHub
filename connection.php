<?php
$servername= "localhost:3301";
$user = 'lumiLearn';
$pass = '1234';
$db = 'student_lumilearn';

$conn = new mysqli( $user, $pass, $db);
 if($conn->connect_error){
  die("Unable to connect" .$conn->connect_error);

 } echo "Connected successfully";


?>