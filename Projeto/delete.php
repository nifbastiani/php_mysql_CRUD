<?php 
include "conexao.php";

$id = $_GET['id'];

$sql = "DELETE FROM produto WHERE id_produto = $id";

mysqli_query($conn, $sql);

header("Location: index.php");
exit;
?>