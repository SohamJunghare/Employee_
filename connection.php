<?php


$servername = "127.0.0.1:3307" ;
$username = "root";
$password = "";
$dbname = "employee";


$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn)
{
  //  echo "Connection OKAY";
}
else{
   echo "connection failed".mysqli_connect_error();
}
?>
