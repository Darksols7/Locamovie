<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $sinopse = $_POST['sinopse'];

    $stmt = $pdo->prepare("UPDATE filmes SET nome = :nome, categoria = :categoria, sinopse = :sinopse WHERE id = :id");
    $stmt->execute(['nome' => $nome, 'categoria' => $categoria, 'sinopse' => $sinopse, 'id' => $id]);

    header("Location: listarFilme.php"); // Redireciona para a página principal após a atualização
}
