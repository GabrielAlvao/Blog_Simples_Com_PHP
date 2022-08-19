<?php
$mysql = new mysqli('localhost', 'root', '', 'blog');

    if ($mysql == FALSE) {
        echo "Erro na conexão";
    }