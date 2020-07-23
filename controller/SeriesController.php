<?php

session_start();

require "./repository/SeriesRepositoryPDO.php";
require "./model/Serie.php";

class SeriesController
{

    public function index()
    {
        $seriesRepository = new SeriesRepositoryPDO();
        return $seriesRepository->listarTodos();
    }

    public function save($request)
    {

        $seriesRepository = new SeriesRepositoryPDO();
        $serie = (object) $request;

        $upload = $this->saveCAPA($_FILES);

        if (gettype($upload) == "string") {
            $serie->capa = $upload;
        }

        if ($seriesRepository->salvar($serie)){
            $_SESSION["msg"] = "Serie cadastrada com sucesso";
        }
        else{
            $_SESSION["msg"] = "Erro ao cadastrar serie";
        }

        header("Location: /");
    }

    private function saveCAPA($file)
    {
        $CAPADir = "imagens/capas/";
        $CAPAPath = $CAPADir . basename($file["capa_file"]["name"]);
        $CAPATmp = $file["capa_file"]["tmp_name"];
        if (move_uploaded_file($CAPATmp, $CAPAPath)) {
            return $CAPAPath;
        } else {
            return false;
        }
    }

    public function favorite(int $id)
    {
        $seriesRepository = new SeriesRepositoryPDO();
        $result = ['success' => $seriesRepository->favoritar($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }

    public function delete(int $id)
    {
        $seriesRepository = new SeriesRepositoryPDO();
        $result = ['success' => $seriesRepository->delete($id)];
        header('Content-type: application/json');
        echo json_encode($result);
    }
}
