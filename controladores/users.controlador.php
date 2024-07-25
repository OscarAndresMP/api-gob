<?php
    class UsersControlador{

        public function index(){


            $users = ModeloUsers::index("users");
                $json = array(
                                "status" => 200,
                                "total de usuarios" => count($users),
                                "detalle" =>$users
                                );
                            
                                echo json_encode($json, true);
                            
                                return;

}


    public function UsersPost($datos){

        /*sevalida que el titulo o descripcion no estes ya registrados */
        $user = ModeloUsers::index("users");
        foreach ($user as $key => $valueUsers) {

            if($valueUsers->etemail == $datos["etemail"]){
                $json = array(
                    "status" => 404,
                    "detalle" => "El email ya se encuentra registrado"
                );

                echo json_encode($json, true);

                return;
    
            }
        }
        /*Se recolectan los datso para enviarlos */
        $datos = array("etname" => $datos["etname"], 
            "etnamefather" => $datos["etnamefather"], 
            "etnamemother" => $datos["etnamemother"], 
            "etemail" => $datos["etemail"],
            "etpassword" => $datos["etpassword"],
            "etcel" => $datos["etcel"],
            "etbirthday" => $datos["etbirthday"],
            "acvdependence" => $datos["acvdependence"],
            "acvsex" => $datos["acvsex"]

        );
        /*Se envian los datos a un metodo create junto con el nombre de la tabla */
        $create = ModeloUsers::create("users",$datos);
        /*Si se realizar en insertcion correctamente se manda el mensaje correcto */
        if($create == "ok"){

            $json = array( 
                "status" => 200
            );
            echo json_encode($json, true);
        }else{
            $json = array( 
                "status" => 404,
                "detalle" => "Error en el Sistema",
            );
            echo json_encode($json, true);
        }
    }

    
    
    public function UsersGet($id){

        $users = ModeloUsers::GetUsers("users", $id);
        if(!empty($users)){
    
                $json = array(
                    "status" => 200,
                    "detalle" =>$users
                    );
                        
                echo json_encode($json, true);
                        
                return;
        }else{
            $json = array(
                "status" => 404,
                "detalle" =>"No hay resultados"
                );
                    
            echo json_encode($json, true);
                    
            return;
        }
    }
    
    
    
    public function UsersPut($id, $datos){

        $datos = array("etname" => $datos["etname"], 
            "etnamefather" => $datos["etnamefather"], 
            "etnamemother" => $datos["etnamemother"], 
            "etemail" => $datos["etemail"],
            "etpassword" => $datos["etpassword"],
            "etcel" => $datos["etcel"],
            "etbirthday" => $datos["etbirthday"],
            "acvdependence" => $datos["acvdependence"],
            "acvsex" => $datos["acvsex"]

        );
        
        $users = ModeloUsers::Putusers("users", $datos, $id);

        if($users == "ok"){

            $json = array( 
                "status" => 200,
                "detalle" => "User actualizado exitosamente",
            );
            echo json_encode($json, true);
        }else{
            $json = array( 
                "status" => 404,
                "detalle" => "Error al actualizar",
            );
            echo json_encode($json, true);
        }
    }

    
    
    
    
    public function UsersDelete($id){
        $users = ModeloUsers::DeleteUsers("users", $id);
        if(!empty($users)){
    
                $json = array(
                    "status" => 200,
                    "detalle" =>"User Eliminado"
                    );
                        
                echo json_encode($json, true);
                        
                return;
        }else{
            $json = array(
                "status" => 404,
                "detalle" =>"Error en Eliminar"
                );
                    
            echo json_encode($json, true);
                    
            return;
        }
    }
}

?>