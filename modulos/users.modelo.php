<?php 

    require_once 'conexion.php';

    class ModeloUsers{

        static public function index($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

            $stmt->close();
            $stmt = null;
        }



        static public function create($tabla, $datos){
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (etname, etnamefather, etnamemother, etemail, etpassword, etcel, etbirthday, acvdependence, acvsex) 
                VALUES (:etname, :etnamefather, :etnamemother, :etemail, :etpassword, :etcel, :etbirthday, :acvdependence, :acvsex)");

            $stmt->bindParam(":etname", $datos["etname"], PDO::PARAM_STR);
            $stmt->bindParam(":etnamefather", $datos["etnamefather"], PDO::PARAM_STR);
            $stmt->bindParam(":etnamemother", $datos["etnamemother"], PDO::PARAM_STR);
            $stmt->bindParam(":etemail", $datos["etemail"], PDO::PARAM_STR);
            $stmt->bindParam(":etpassword", $datos["etpassword"], PDO::PARAM_STR);
            $stmt->bindParam(":etcel", $datos["etcel"], PDO::PARAM_STR);
            $stmt->bindParam(":etbirthday", $datos["etbirthday"], PDO::PARAM_STR);
            $stmt->bindParam(":acvdependence", $datos["acvdependence"], PDO::PARAM_STR);
            $stmt->bindParam(":acvsex", $datos["acvsex"], PDO::PARAM_STR);


            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt = null;
        }



    static public function GetUsers($tabla, $id){

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WhERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS);

            $stmt->close();
            $stmt = null;
        }


        static public function PutUsers($tabla, $datos, $id){
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET etname = :etname, 
                    etnamefather = :etnamefather, etnamemother = :etnamemother, etemail = :etemail, 
                    etpassword = :etpassword, etcel = :etcel, etbirthday = :etbirthday, 
                    acvdependence = :acvdependence, acvsex = :acvsex WHERE id = :id ");

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->bindParam(":etname", $datos["etname"], PDO::PARAM_STR);
            $stmt->bindParam(":etnamefather", $datos["etnamefather"], PDO::PARAM_STR);
            $stmt->bindParam(":etnamemother", $datos["etnamemother"], PDO::PARAM_STR);
            $stmt->bindParam(":etemail", $datos["etemail"], PDO::PARAM_STR);
            $stmt->bindParam(":etpassword", $datos["etpassword"], PDO::PARAM_STR);
            $stmt->bindParam(":etcel", $datos["etcel"], PDO::PARAM_STR);
            $stmt->bindParam(":etbirthday", $datos["etbirthday"], PDO::PARAM_STR);
            $stmt->bindParam(":acvdependence", $datos["acvdependence"], PDO::PARAM_STR);
            $stmt->bindParam(":acvsex", $datos["acvsex"], PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt = null;
        }



        static public function DeleteUsers($tabla, $id){

            $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WhERE id = :id");
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            

            if($stmt->execute()){
                return "ok";
            }else{
                print_r(Conexion::conectar()->errorInfo());
            }

            $stmt->close();
            $stmt = null;
        }
    }


?>