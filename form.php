<!DOCTYPE html>
<html>
<body>
<?php
/**
 * enctype = "/ form-data com várias partes". 
 * Type = file select com um botão "Procurar"
 */
?>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Selecione uma imagem para upload:
    <input type="file" name="UploadImagem" id="fileToUpload">
    <input type="submit" value="Upload Imagem" name="submit">
</form>
</body>
</html>