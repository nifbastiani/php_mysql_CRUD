<?php 
include 'conexao.php';

$id = $_GET['id'];

$sql = "UPDATE produto
        SET ativo = NOT ativo
        WHERE id_produto = $id";

mysqli_query($conn, $sql);
header("Location: index.php");
?>