<?php require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <section class="container">
        <div class="head">
            <h3>GRUPOS DE PRODUTO</h3>       
        </div>

        <form id="formGrupo" class="inserir_dados" action="create.php" method="POST">
            <div class="input-group w-50">
              <span class="input-group-text">Descrição</span>
              <input type="text" name="descricao" class="form-control">
            </div>
            <div class="form-check d-flex align-items-center gap-4" style="margin-left: -10px; margin-right: 10px;">
              <label class="form-check-label" for="checkChecked">Ativo</label>
              <input class="form-check-input m-0"
                            type="checkbox"
                            name="ativo"
                            id="checkChecked"
                            value="1"
                            checked>
            </div>
            <button type="submit" class="btn btn-outline-success">+ NOVO</button>
        </form>
   </section>
    <section class="container">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Descrição</th>
                <th>Ativo</th>
              </tr>
            </thead>
        <tbody>
       <?php
            $sql = "SELECT * FROM produto"; //criando uma string de instrução para o mysql
            //buscando todos os registros da tabela produto
            $result = mysqli_query($conn, $sql); //contém o objeto de resultado, não o produto


            //mysqli_fetch_assoc($result) -> $row recebe um array associativo de $result
            while($row = mysqli_fetch_assoc($result)){ //retorna uma linha do resultado, por isso precisa do while que vai percorrer até retornar false
            ?>
            <tr>                
                <td><?= $row['id_produto'] ?></td> <!-- $row acessa o id e retona na tabela  -->
                <td><?= $row['descricao'] ?></td> <!-- $row acessa a descrição e retorna na tabela -->

                <td>
                    <?php if($row['ativo'] == 1) { ?> <!-- se ativo for 1 retona Ativo -->
                        <a href="alterar_status.php?id=<?= $row['id_produto'] ?>"
                          class="btn btn-success btn-sm">
                          Ativo
                        </a>
                    <?php } else { ?> <!-- senão retorna Inativo -->
                        <a href="alterar_status.php?id=<?= $row['id_produto'] ?>"
                          class="btn btn-danger btn-sm">
                          Inativo
                        </a>
                    <?php } ?>
                </td>
                <td>
                  <a href="delete.php?id=<?=  $row['id_produto'] ?>" onclick="return confirm('Deseja realmente excluir este produto?')"> <!-- botão de excluir que acessa o id do produto e retorna um campo de confirmação antes -->
                    <!-- icon de lixeira do bootstrap -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                      <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                    </svg>
                  </a>
                </td>
                <td>
                  <a href="update.php?id=<?= $row['id_produto'] ?>"> <!-- botão de edição que acessa o id do produto -->
                    <!-- icon de lápis do bootstrap -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                    </svg>
                  </a>
                </td>
            </tr>
            <?php
            }
      ?>
        </tbody>
      </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>