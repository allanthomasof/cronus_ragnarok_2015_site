<?php

$base_dados = 'ragnarok';
$usuario_bd = 'root';
$senha_bd   = 'vertrigo';
//$host_db    = '177.22.120.230';
$host_db    = 'localhost';
$charset_db = 'utf8';
$conexao_pdo = null;
 
$detalhes_pdo  = 'mysql:host=' . $host_db;
$detalhes_pdo .= ';dbname='. $base_dados;
$detalhes_pdo .= ';charset='. $charset_db;
 
try {
    $conexao_pdo = new PDO($detalhes_pdo, $usuario_bd, $senha_bd);
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage() . "<br/>";
    die();
}
?>