<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "customer";
  $Conn = mysqli_connect($hostname, $username, $password, $database);

  if (!$Conn) {
    exit('ไม่สามารถเชื่อมต่อกับฐานข้อมูล');
  }
  
?>