<?php

$host = "ec2-54-217-224-85.eu-west-1.compute.amazonaws.com";
$user = "qhvhbyhgpkjocr";
$password = "c3c32c11d1812c6448187e995cfa45f68f0d2615a285a0a7e8299cf3c0c0beeb";
$dbname = "dc3aphtoc84cco";
$port = "5432";

try{
  //Set DSN data source name
    $dsn = "pgsql:host=" . $host . ";port=" . $port .";dbname=" . $dbname . ";user=" . $user . ";password=" . $password . ";";


  //create a pdo instance
  $bdd = new PDO($dsn, $user, $password);
  $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
  $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
echo 'Connection failed: ' . $e->getMessage();
}
  ?>
