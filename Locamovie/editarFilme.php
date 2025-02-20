<!DOCTYPE html>
<html>

<head>
    <title>Editar Filme</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="StyleSheet" href="css/adicionar.css" />
</head>

<body>
    
    <main>

        
        <section>
          
          <div class="one-piece-existe">
            <div class="playstation-ou-xbox">
              <div class="Perfil-img">
                <img class="perfil1" src="img/hoteltransylvania.jpg" width="100%" />
    <?php
    require 'conexao.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM filmes WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $filme = $stmt->fetch();
        if ($filme) {
            echo '<form class="o-honrado" action="atualizarFilme.php" method="post">';
            echo '<h1>Editar Filme</h1>';
            echo '<input type="hidden" name="id" value="' . $filme['id'] . '">';
            echo '<label for="nome">Nome do Filme:</label>';
            echo '<input type="text" name="nome" value="' . $filme['nome'] . '" required><br>';
            echo '<label for="categoria">Categoria:</label>';
            echo '<input type="text" name="categoria" value="' . $filme['categoria'] . '" required><br>';
            echo '<label for="sinopse">Gênero:</label>';
            echo '<input type="text" name="sinopse" value="' . $filme['sinopse'] . '" required><br>';
            echo '<input type="submit" id="botao" class="p" value="Atualizar" />';
            echo '</form>';
        } else {
            echo '<p>Filme não encontrado.</p>';
        }
    } else {
        echo '<p>Parâmetros inválidos.</p>';
    }
    echo '<a href="listarFilme.php">Retornar para Lista de Filme</a>';
    ?>
       
       </div>        
      </div>
    </section>
</body>

</html>