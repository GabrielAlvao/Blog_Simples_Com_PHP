<?php

require 'C:\xampp\htdocs\blog\configs.php';

class Artigo
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;   
    }

    public function exibirArtigos(): array
    {
        $resultado = $this->mysql->query('SELECT * FROM `artigos`');
        $artigos = $resultado->fetch_all(MYSQLI_ASSOC);

        return $artigos;
    }

    public function exbirPorId(string $id): array
    {
        $resultado = $this->mysql->prepare("SELECT id, titulo,conteudo FROM `artigos` WHERE `id` = ?");
        $resultado->bind_param('s',$id);
        $resultado->execute();
        $artigo = $resultado->get_result()->fetch_assoc();

        return $artigo;
    }
   public function adicionar(string $titulo, string $conteudo) :void
   {
        $insere = $this->mysql->prepare('INSERT INTO artigos (titulo, conteudo) VALUES (?,?);');
        // ss indica que os dois valores serão strings
        $insere->bind_param('ss', $titulo, $conteudo);
        $insere->execute();
   }
   public function deletar(string $id) :void
   {
        $remover = $this->mysql->prepare('DELETE FROM `artigos` WHERE id = ?');
        $remover->bind_param('s', $id);
        $remover->execute();
   }
   public function editar(string $id, string $titulo, string $conteudo):void
   {
        $editar = $this->mysql->prepare("UPDATE `artigos` SET titulo = ?, conteudo = ? WHERE id = ?");
        $editar->bind_param('sss', $titulo, $conteudo, $id);
        $editar->execute();
   }
}


?>