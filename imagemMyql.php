<?php
/*
 * Código adaptado Oficina da Net
 * Ernandes Xeo
 * Ref.:
 * https://www.oficinadanet.com.br/post/9062-upload-de-imagem-com-php-e-mysql
 * Verificar validações para salvar imagens
 */

include_once './conexao.php';

// dados recebidos do formulário
$foto = $_FILES["imagem"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];


// Expressão regular 
//formato de imagem aceitos 
if (!preg_match("/^image\/(pjpeg|jpeg|JPG|png|gif|bmp)$/", $foto["type"])) { 
    header("location:form-imagem.php?");
} else {
    echo "Erro no formato/tamanho";
    header("location:form-imagem.php?");
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

