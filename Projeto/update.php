<?php 
include "conexao.php"; //inclui a conexão com o banco

if($_SERVER['REQUEST_METHOD'] == 'POST'){ //$_SERVER é um array criado pelo php que contém informações da requisição, se é POST ou GET
    //se a requisição for POST, executa o if. Senão, ignora.
    //ex: quando o usuário clicar em salvar e o formulário tem o método POST,  função é executada

    $id = $_POST['id_produto']; //recebe o id do produto
    $descricao = $_POST['descricao']; //recebe a descricao do produto

    //string com as instruções sql
    $sql = "UPDATE produto
            SET descricao = '$descricao'
            WHERE id_produto = $id";

    mysqli_query($conn, $sql); //envia o update para o mysql

    header("Location: index.php"); //retorna para a página com a tabela depois de fazer o update
    exit;
}
//quando o usuário clica para editar o produto, ele envia um GET para carregar os dados desse produto
$id = $_GET['id']; //pega o id da url

//string com as instruções sql
$sql = "SELECT * FROM produto
        WHERE id_produto = $id";

$result = mysqli_query($conn, $sql); //faz a busca no banco, e retorna o objeto

$produto = mysqli_fetch_assoc($result); //pega a linha do produto e transforma em um array associativo
                                        //para aí então o usuário preencher o fromulário com os novos dados

?>
<!-- página de edição quando o usuário aperta em editar -->

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
            <!-- O id do produto está escondido ao usuário, pois ele não precisa ver
             mas é necessário o id do produto para fazer o POST e o UPDATE no banco -->
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
