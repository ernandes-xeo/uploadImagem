<?php

// https://www.oficinadanet.com.br/post/9062-upload-de-imagem-com-php-e-mysql
/*
  CREATE TABLE `galeria` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(255) NULL DEFAULT NULL,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
  )
  ENGINE=InnoDB
  ;
 */

$foto = $_FILES["imagem"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];



if (!preg_match("/^image\/(pjpeg|jpeg|JPG|png|gif|bmp)$/", $foto["type"])) { //formato de imagem aceitos 
    header("location:form-imagem.php?");
} else {
    echo "Erro no formato/tamanho";
    header("location:form-imagem.php?");
}
// pode usar include conexao, que foi o que fiz no meu. Mas a conexao em PDO segue abaixo: 
$conexao = new PDO("mysql:host=localhost;dbname=banco_aula", "root", "");
$conexao->exec("SET CHARACTER SET utf8");

try {
    $pdo = $conexao;
} catch (PDOException $e) {
    echo $e->getMessage;
}

$inserir = $pdo->prepare("INSERT INTO galeria(foto, nome, email, senha) VALUES(:foto, :nome, :email, :senha)");

if (!empty($foto["name"])) {
    // verifica se é um arquivo de imagem
    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
    // Gera um nome único para a imagem 
    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
    //Cria uma pasta dentro do projeto 
    $caminho_imagem = "media/" . $nome_imagem;
    move_uploaded_file($foto["tmp_name"], $caminho_imagem);
}
// poderia tratar dados recebidos do formulário, validando se eles foram prenchidos
$inserir->bindValue(":foto", $nome_imagem);
$inserir->bindValue(":nome", $nome);
$inserir->bindValue(":email", $email);
$inserir->bindValue(":senha", md5($senha));

$inserir->execute();
if ($inserir) {
    header("location:listar-imagem.php?");
} else {
    header("location:form-imagem.php?");
}
?>

