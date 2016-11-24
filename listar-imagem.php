<?php include_once './conexao.php'; ?>
<p><a href="form-imagem.php">Cadastrar </a></p>
<?php
echo "<h1>Listar imagens</h1>";

try {
    // listar usuários banco método query
    $rs = $conexao->query("SELECT foto, nome, email from galeria");
    while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
        echo "<img src='media/" . $row->foto . "' width='150' alt='Foto de exibição' /> | " . $row->nome . " - " . $row->email . "<br />";
    }
} catch (Exception $ex) {
    print_r($ex);
}

