<?php 
include 'conexao.php'; //inclui conexão com o banco

$id = $_GET['id']; //enviando o valor do id para a url

//string de instrução para o mysql, vai faze update deixando ativo = not ativo
// NOT inverte o valor atual de ativo, se for 1 passa a ser 0, se for 0 passa a ser 1
$sql = "UPDATE produto
        SET ativo = NOT ativo
        WHERE id_produto = $id";

mysqli_query($conn, $sql); //consulta o banco de dados, mysql recebe a string e o banco grava o registro
header("Location: index.php"); //depois volta ao index.php, o que dá um reload na página e atualiza os produtos da tabela
?>