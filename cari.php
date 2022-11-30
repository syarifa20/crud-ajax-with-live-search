<?php 
error_reporting(0);
include("dbcon.php");
$cari = $_GET['cari'];

$cari = mysqli_fetch_array(mysqli_query($con, "select * FROM students WHERE id = '$cari' "));

if ($cari == null) {
   echo 'data tidak ada';
}else{
    echo $cari['name'];
}





?>