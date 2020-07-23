<?php
$bd = new SQLite3("series.db");

$sql = "ALTER TABLE series ADD COLUMN FAVORITO INT DEFAULT 0";

if ($bd->exec($sql)) echo "\nTabela de series foi aletarada com sucesso\n";
else echo "\nErro ao alterar a tabela de séries\n";
