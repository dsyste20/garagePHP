<?php
  $servername = "localhost";
  $dbname = "garage";
  $username = "root";
  $password = "";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//      echo "Connectie gelukt <br/>";
  }catch(PDOException $e) {
      die("Error!: ".$e->getMessage());
  }