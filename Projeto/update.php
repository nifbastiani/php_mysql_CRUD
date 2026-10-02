<?php 
include "conexao.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id_produto'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE produto
            SET descricao = '$descricao'
            WHERE id_produto = $id";

    mysqli_query($conn, $sql); 

    header("Location: index.php"); 
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM produto
        WHERE id_produto = $id";

$result = mysqli_query($conn, $sql);

$produto = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <form action="update.php" method="POST" style="max-width: 500px; display: flex; gap: 20px;">
            <input type="hidden"
                name="id_produto"
                value="<?=  $produto['id_produto'] ?>">
            <label>Descrição</label>
            <input type="text"
                name="descricao"
                value="<?= $produto['descricao'] ?>"
                class="form-control">
            <button type="submit"
                    class="btn btn-primary">Salvar</button>
        </form>
    </div>
</body>
</html>
