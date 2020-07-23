<?php

require "Conexao.php";

class SeriesRepositoryPDO
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::criar();
    }

    public function listarTodos()
    {
        $seriesLista = array();

        $sql = "SELECT * FROM series";
        $series = $this->conexao->query($sql);
        if (!$series) return false;

        while ($serie = $series->fetchObject()) {
            array_push($seriesLista, $serie);
        }
        return $seriesLista;
    }

    public function salvar($serie)
    {
        $sql = "INSERT INTO series (TITULO, CAPA, SINOPSE, NOTA) 
        VALUES (:titulo, :capa, :sinopse, :nota)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':titulo', $serie->titulo, PDO::PARAM_STR);
        $stmt->bindValue(':sinopse', $serie->sinopse, PDO::PARAM_STR);
        $stmt->bindValue(':nota', $serie->nota, PDO::PARAM_STR);
        $stmt->bindValue(':capa', $serie->capa, PDO::PARAM_STR);

        return $stmt->execute();
    }

    public function favoritar(int $id)
    {
        $sql = "UPDATE series SET FAVORITO = NOT FAVORITO WHERE ID=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "erro";
        }
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM series WHERE id=:id";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "erro";
        }
    }
}
