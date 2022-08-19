<?php

require_once 'configs.php';
require_once 'src/Artigo.php';

$id = $_GET['id'];

$artigo = new Artigo($mysql);
$artigo = $artigo->exbirPorId($id);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>
            <?php echo nl2br($artigo['titulo'])?>
        </h1>
        <p>
            <?php echo nl2br($artigo['conteudo'])?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>