<?php
include('../db_connect/pdo.php');

if (verificaEmail($_POST['email'], $conexao_pdo)){
    echo "E-Mail já utilizado";
}
    else if (verificaLogin($_POST['login'], $conexao_pdo)){
        echo "Login já utilizado";
    } 
         else{
            echo efetuaCadastro($_POST['login'], $_POST['senha'], $_POST['email'], $_POST['sexo'], $conexao_pdo);
         }
         
function verificaEmail($email, $conexao_pdo){
    $consulta = $conexao_pdo->prepare("SELECT `userid` FROM `login` WHERE `email` = '".$email."'");
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($result['userid']){
        return $result['userid'];   
    } else {
        return null;   
    }
}

function verificaLogin($login, $conexao_pdo){
    $consulta = $conexao_pdo->prepare("SELECT `account_id` FROM `login` WHERE `userid` = '".$login."'");
    $consulta->execute();
    $result = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($result['account_id']){
        return $result['account_id'];   
    } else {
        return null;   
    }
}

function efetuaCadastro($login, $senha, $email, $sexo, $conexao_pdo){
    $prepara = $conexao_pdo->prepare("
        INSERT INTO `login` (
                `account_id`,
                `userid`,
                `user_pass`,
                `sex`,
                `email`,
                `group_id`,
                `state`,
                `unban_time`,
                `expiration_time`,
                `logincount`,
                `lastlogin`,
                `last_ip`,
                `birthdate`,
                `character_slots`,
                `pincode`,
                `pincode_change`
            ) 
            VALUES
            (NULL, ?, ?, ?, ?, '0', '0', '0', '0', '0', '0000-00-00 00:00:00.000000', '', '0000-00-00', '0', '', '0')
    ");
    
    $verifica = $prepara->execute(
        array(
            $login,
            $senha,
            $sexo,
            $email
        )
    );
    
    if ($verifica) {
	    return "Cadastro Realizado";
    } else {
        return "Erro no Cadastro";
    }
}












//echo $_POST['email'];

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