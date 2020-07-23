<?php
$bd = new SQLite3("series.db");

$sql = "DROP TABLE IF EXISTS series";

if($bd->exec($sql)) echo "\nTabela de series apagada! \n";

$sql = "CREATE TABLE series (
    ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    TITULO VARCHAR(200) NOT NULL,
    NOTA DECIMAL(2,1),
    SINOPSE TEXT,
    CAPA VARCHAR(200)
)";

if($bd->exec($sql)){
    echo "\nTabela de series criada! \n";
}
else{
    echo "\nERRO: Tabela de series não foi criada \n";
}

$sql = "INSERT INTO series (TITULO, CAPA, SINOPSE, NOTA) VALUES(
        'The Last Kingdom',
        'https://occ-0-964-185.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABdFfJWxcw3t7xsgGu9CPUhf8kc1AE3nHSntPdx3k6I2JY2kxTy4vuTL2Q4RBmAQFgZRvEgdpwRJHEoAkQm7VcpXClCZlU4GjqFU9eR7pgzvc5xrAwKJEGU6mlXo9.webp?r=427',
        'Uhtred e seus homens se aproximam de Bebbanburg, mas Wihtgar retorna com algumas cartas na manga. As notícias da traição de Cnut chegam a Wessex.',
        9.1
)";

if($bd->exec($sql)){
    echo "\nseries Inseridos com sucesso! \n";
}
else{
    echo "\nERRO: series não foram inseridos \n";
}

$sql = "INSERT INTO series (TITULO, CAPA, SINOPSE, NOTA) VALUES(
        'Vikings',
        'https://occ-0-964-185.1.nflxso.net/dnm/api/v6/X194eJsgWBDE2aQbaNdmCXGUP-Y/AAAABcQ7C25Ru8kOA8AW4Iks-V91VmzbPdH36mQkkrcEAGTPZsBjfGl6T94Z3b3zPCbs5xsGl8M0VUugwp4ncZHW4zp5J-w.webp?r=422',
        'Esta série dramática acompanha a vida do viking Ragnar Lothbrok em sua jornada para ampliar o domínio nórdico e desafiar um líder incompetente e sem visão.',
        9.4
)";

if($bd->exec($sql)){
    echo "\nseries Inseridos com sucesso! \n";
}
else{
    echo "\nERRO: series não foram inseridos \n";
}


?>
