<?php
// D for Delete

// 1. connection to the database
include("connect.php");

if(isset($_GET["delete"])){
    $deleteId = $_GET["delete"];
}

// 2. write the query
$query = "DELETE FROM users WHERE `users`.`id` = $deleteId";

// 3. execute the query
$result = mysqli_query($conn, $query);

// 4. display the result after execution
if($result){
    header("Location:display.php");
}else{
    header("Location:display.php");
}


?>