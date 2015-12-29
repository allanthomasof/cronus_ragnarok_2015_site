<?php

include('../db_connect/pdo.php');

$consulta = $conexao_pdo->prepare("SELECT `userid` FROM `login` WHERE `account_id` = 2000001");
$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

echo $result['userid'];

/*
//Comando SQL de verificação de autenticação 
$consulta = $conexao_pdo->prepare("SELECT identifier FROM `users` WHERE `passkey` LIKE ?");
$consulta->bindParam(1, $_POST['password'], PDO::PARAM_STR, 12);

$consulta->execute();
$result = $consulta->fetch(PDO::FETCH_ASSOC);

//Caso consiga logar cria a sessão
if ($result['identifier'] == 1) {
    session_start();
     
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['identifier'] = 1;
    
    header('location:../user.html');
} 
else if ($result['identifier'] == 9) {
    session_start();
     
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['identifier'] = 9;
    
    header('location:../user.html');
}
else {
    header('location:../index.html');
}
*/
?>