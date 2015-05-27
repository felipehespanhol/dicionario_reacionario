<?php

function database_connection() {
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "dicionario_reacionario";

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  return $conn;
}

?>
