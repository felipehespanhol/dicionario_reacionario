<?php

require_once('database.php');

$postdata = file_get_contents("php://input");
$request  = json_decode($postdata);

$email = $request->email;
$senha = $request->senha;

try {
  $conn = database_connection();
  $sql = "SELECT * FROM usuarios WHERE email='".$email."'";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

if($result['senha'] == $senha) {
  echo $result['senha'];
  echo "\n";
  echo $senha;
  echo "\n";

  $_SESSION['USER_ID'] = $result['id'];
  echo '{"id":"'.$result['id'].'", "email": "'.$email.'", "nome": "'.$result['nome'].'"}';
}

?>
