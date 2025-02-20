<!DOCTYPE html>
<html>

<head>
    <title>Excluir Filme</title>
    <link rel="stylesheet" type="text/css" href="css/crud.css">
    <link rel="StyleSheet" href="css/adicionar.css" />
    
</head>

<body>
    <div class="background-confirm-delete">
        <div class="box-confirm-delete">
            <h1>Excluir Filme</h1>

            <?php
            require 'conexao.php';

            if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
                // Se confirmado, exclua o filme aqui
                $id = $_GET['id'];
                $stmt = $pdo->prepare("DELETE FROM filmes WHERE id = :id");
                $stmt->execute(['id' => $id]);
                echo '<p>Filme excluído com sucesso.</p>';
                echo '<a href="listarFilme.php">Retornar para lista</a>';
            } elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
                $id = $_GET['id'];
                $stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = :id");
                $stmt->execute(['id' => $id]);
                $filme = $stmt->fetch();
                if ($filme) {
                    echo '<p>Tem certeza de que deseja excluir o filme "' . $filme['nome'] . '"?</p>';
                    echo '<div class="bt-confirm"><a href="excluirFilme.php?id=' . $filme['id'] . '&confirm=true">Sim</a>';
                    echo '<a href="listarFilme.php" class="excluir">Não</a></div>';
                } else {
                    echo '<p>Filme não encontrado.</p>';
                }
            } else {
                echo '<p>Parâmetros inválidos.</p>';
            }
            ?>
        </div>
    </div>
</body>

</html>