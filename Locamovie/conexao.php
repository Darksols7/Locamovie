<?php
$host = "localhost";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Cria o banco de dados
    $pdo->exec("CREATE DATABASE IF NOT EXISTS filmes_db");
    $pdo->exec("USE filmes_db");
    // Cria a tabela de filmes
    $pdo->exec("CREATE TABLE IF NOT EXISTS filmes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NOT NULL,
        categoria VARCHAR(255) NOT NULL,
        sinopse VARCHAR(600) NOT NULL
        )");
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
