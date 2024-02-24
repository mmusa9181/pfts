<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "personel_db";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(!$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name)){
    die("connection failed");
}