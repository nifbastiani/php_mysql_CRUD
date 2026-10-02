<?php 
include "conexao.php"; //inclui a conexão com o banco

$id = $_GET['id']; // envia o valor do id para a url

//string com instrução sql
//deleta de produto onde o id_produto é igual o que foi recebido pelo $_GET da url
$sql = "DELETE FROM produto WHERE id_produto = $id";

mysqli_query($conn, $sql); //consulta o banco de dados, mysql recebe a string e o banco grava o registro

header("Location: index.php");
exit;
?>