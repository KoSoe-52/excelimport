<?php
$hostname="localhost";
$dbname="excelimport";
$user="root";
$pass="";
try{
	$conn=new PDO("mysql:host=$hostname;dbname=$dbname;",$user,$pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
	echo "Error::". $e->getMessage();
}


?>