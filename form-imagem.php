<!DOCTYPE html>
<html>
    <meta charset="utf-8">
    <title>Upload Imagem mysql</title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }
        form{
            margin: 20px auto;
            font-size: 20px;
            width: 400px;
            padding: 10px 10px;

        }
        label{
            margin-top: 10px;
            float: left;
            width: 100%;
        }
        input{
            width: 90%;   
            padding: 10px;
        }
        
        input.salvar{
            margin: 20px 10px;
            width: 200px;
            float: right;
            padding: 10px;
        }
        
    </style>
    <body>
        <?php
        /**
         * enctype = "/ form-data com várias partes". 
         * Type = file select com um botão "Procurar"
         */
        ?>
        
        <form action="imagemMyql.php" method="POST" enctype="multipart/form-data">
        <p><a href="listar-imagem.php">Listar Cadastros </a></p>
            <fieldset>
                <legend>Cadastro</legend>
                
                <label for="imagem">Avatar:</label>
                    <input type="file" name="imagem" id="imagem">
                
                <label for="nome">Nome:</label>
                    <input type="text" name="nome" />
                
                <label for="email">Email:</label>
                    <input type="text" name="email" />
                
                <label for="nome">Senha:</label>
                <input type="password" name="senha" />
                

                <input type="submit" class="salvar" value="Salvar" name="submit">
            </fieldset>
        </form>
    </body>
</html>