<?php
//below line allows websites to access this script even if the script is running outside of the website's domain (security reasons)
header('Access-Control-Allow-Origin: *');
//mysql settings
$user = 'root';
$pass = '';
$db = 'bookeh';

//connection to the db
$db = new mysqli('localhost', $user, $pass, $db) or die("unable to connect");
//remember the "?q"+value from the index.js? value is saved as $q here
$q = $_REQUEST["q"];
//query you wish to perform on db
$sql = "SELECT * FROM post LIMIT 10 OFFSET $q";
//run the query
$result = $db->query($sql);
//save all results from query to $row
$row = $result -> fetch_all(MYSQLI_NUM);
//send the $row back to javascript as a json file. Remember "this.responseText". That's this. Sending data back to javascript as json is not necessary 100% of time. 
//I did it in this case because the information I am sending back is an array. 
echo json_encode($row);
//close db
$db->close();
?>