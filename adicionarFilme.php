<?php
require 'conexao.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $categoria = $_POST['categoria'];
    $sinopse = $_POST['sinopse'];
    $stmt = $pdo->prepare("INSERT INTO filmes (nome, categoria, sinopse) VALUES (:nome, :categoria, :sinopse)");
    $stmt->execute(['nome' => $nome, 'categoria' => $categoria, 'sinopse' => $sinopse]);
    header("Location: adicionarFilme.html");
}
