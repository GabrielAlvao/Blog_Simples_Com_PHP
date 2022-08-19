<?php
    
    include_once 'src/Artigo.php';
    require_once 'configs.php';

    $artigo = new Artigo($mysql);
    $artigo = $artigo->exibirArtigos();
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
        <h1>Meu Blog</h1>
        <?php foreach ($artigo as $value) :?>
        <h2>
            <a href="artigo.php?id=<?php echo $value['id'];?>">
                <?php echo nl2br($value['titulo']);?>
            </a>
        </h2>
        <p>
            <?php echo nl2br($value['conteudo']);?>
        </p>
        <?php  endforeach;  ?>
    </div>
</body>

</html>