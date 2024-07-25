<?php 

    class Conexion{

        static public function conectar(){
        /*session_start();
            $DB_HOST = $_ENV["DB_HOST"];
            $DB_USER = $_ENV["DB_USER"];
            $DB_PASSWORD= $_ENV["DB_PASSWORD"];
            $DB_NAME = $_ENV["DB_NAME"];
            $DB_PORT = $_ENV["DB_PORT"];*/

        $DB_HOST = "viaduct.proxy.rlwy.net";
            $DB_USER = "postgres";
            $DB_PASSWORD= "iZNlCgLnfLhwIosyWHVhaRBmBlVvRrxI";
            $DB_NAME = "railway";
            $DB_PORT ="22202";

            $link = new PDO("pgsql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;user=$DB_USER;password=$DB_PASSWORD");
            //$link=pg_connect("host=$DB_HOST port=$DB_PORT dbname=$DB_NAME user=$DB_USER password=$DB_PASSWORD");


            return $link;
        }

    }

?>