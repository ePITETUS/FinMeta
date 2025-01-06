<?php
// Cria a conexão com o banco de dados, essas são as informações de conexão

/* CREDENCIAIS DE ACESSO PARA O infinityfree
$hostname = "sql310.infinityfree.com";
$db = "if0_37647538_dbfinmeta";
$user = "if0_37647538";
$senha = "FoGo2590 "; */

$hostname = "localhost";
$db = "dbfinmeta";
$user = "root";
$senha = "";

// Criação do objeto de conexão
$conn = new PDO('mysql:host='.$hostname.';dbname='.$db,$user, $senha);
// $conn=new PDO('mysql:host=sql310.infinityfree.com;dbname=if0_37647538_dbfinmeta','if0_37647538','nCVD3ZvN1OjD');
// Condição para retornar erro de conexão com a DB
// if ($mysql->connect_errno) {
//     echo "Falha ao conectar: (" . $mysql->connect_errno . ") " . $mysql->connect_error;
// }

?>