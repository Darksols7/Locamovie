<!DOCTYPE html>
<html>

<head>
    <title>Lista de Filmes</title>
    <link rel="stylesheet" type="text/css" href="css/crud.css">
   
   
</head>

<body class="body-crud-filme">
    <h1>Lista de Filmes</h1>
    <a href="adicionarFilme.html">Adicionar Filme</a>
    <ul>
        <?php
        require 'conexao.php';
        $stmt = $pdo->query("SELECT * FROM filmes");
        while ($row = $stmt->fetch()) {
            echo "<li>{$row['nome']} (Categoria: {$row['categoria']}, Sinopse: {$row['sinopse']})";
            echo "<div><a href='editarFilme.php?id={$row['id']}'>Editar</a> ";
            echo "<a href='excluirFilme.php?id={$row['id']}'>Excluir</a></div></li>";
        }
        ?>
      
    </ul>
    <br><a href="index.html">Voltar</a>
</body>

</html>