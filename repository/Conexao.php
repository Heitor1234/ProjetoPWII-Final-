<?php

class Conexao{
    public static function criar():PDO{
        $env = (parse_ini_file('.env')) ? parse_ini_file('.env') : getenv();
        $databaseType = $env["databasetype"];
        $database = $env["database"];
        $server = $env["server"];
        $pass = $env["pass"];
        $user = $env["user"];

        if($databaseType == "mysql"){
            $databaseURL = "host=$server;dbname=$database";
        }
        else{
            $databaseURL = $database;
        }

        return new PDO("$databaseType:$databaseURL", $user, $pass);
    }
}