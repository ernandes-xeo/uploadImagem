<?php

// Incluir em imagemMysql.php e listar-imagem.php
$conexao = new PDO("mysql:host=localhost;dbname=banco_aula", "root", "");
$conexao->exec("SET CHARACTER SET utf8");

try {
    $pdo = $conexao;
} catch (PDOException $e) {
    echo $e->getMessage;
}