<?php

//Confirguar o arquivo "php.ini"
// file_uploads = On 

$target_dir = "media/";
$target_file = $target_dir . basename($_FILES["UploadImagem"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION); // tipo de arquivo
// Verifica se o arquivo enviado é uma imagem
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["UploadImagem"]["tmp_name"]);
    if ($check !== false) {
        echo "O Arquivo é uma imagem  (" . $check["mime"] . ").<br />";
        $uploadOk = 1;
    } else {
        echo "O arquivo não é uma imagem.";
        $uploadOk = 0;
    }
}
// Verificar se o arquivo já existe
if (file_exists($target_file)) {
    echo "Desculpe o arquivo já exite.";
    $uploadOk = 0;
}

// Verificar tamanho da imagem
if ($_FILES["UploadImagem"]["size"] > 500000) {
    echo "Imagem maior que o tamanho suportado";
    $uploadOk = 0;
}

// Permite formatos jpg|pnp|jpeg|gif
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Desculpe, somente arquivos JPG, JPEG, PNG & GIF são permitidos";
    $uploadOk = 0;
}

// Verifica se $uploadOk  0 (falso) ou 1 (verdadeiro)
if ($uploadOk == 0) {
    echo "Desculpe, a imagem não foi carregada.";
// se tudo está ok
} else {
    if (move_uploaded_file($_FILES["UploadImagem"]["tmp_name"], $target_file)) {
        echo "O aquivo foi carregado com sucesso!";
    } else {
        echo "Ocorreu um erro ao carregar o arquivo.";
    }
}
?>