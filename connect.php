<?php

$conn = mysqli_connect("localhost", "root", "", "mahadb");

if(!$conn){
    die("Error".mysqli_connect_error());
}

?>