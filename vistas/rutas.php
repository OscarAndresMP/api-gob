<?php

    /*Para poder capturar la Url*/
    $arrayRutas = explode('/', $_SERVER['REQUEST_URI']);

    //echo "<pre>"; print_r($arrayRutas); echo "</pre>";


    /*Si la Url esta vacia se mando mensaje no encontrado */
    if (count(array_filter($arrayRutas)) == 1) {

            $json = array(
                "detalle" => "No encontrado"
            );

            echo json_encode($json, true);

            return;
    }

    else {

        /*I la url encuentra una solicitud*/
        if (count(array_filter($arrayRutas)) == 2) {


            /*Si la url encuntra la solicitud de cursos si muestra la vista*/
            if (array_filter($arrayRutas)[2] == 'users') {
            
                /*Se capturan los datos a registtar en la base de de datos para poder agregar un curso */
                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

                    $datos = array("etname" => $_POST["etname"], 
                                "etnamefather" => $_POST["etnamefather"],
                                "etnamemother" => $_POST["etnamemother"],
                                "etemail" => $_POST["etemail"],
                                "etpassword" => $_POST["etpassword"],
                                "etcel" => $_POST["etcel"],
                                "etbirthday" => $_POST["etbirthday"],
                                "acvdependence" => $_POST["acvdependence"],
                                "acvsex" => $_POST["acvsex"]
                            );
                        //echo "<pre>"; print_r($datos); echo "</pre>";
                    $cursos = new UsersControlador();
                    $cursos->UsersPost($datos);
                }
                elseif(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){

                    $cursos = new UsersControlador();
                    $cursos->index();
                }
            
            }

            /*Si la url encuntra la adiccion de registro si muestra la vista*/
            if (array_filter($arrayRutas)[2] == 'registros') {

                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST'){

                    $clientes = new RegistrosControlador();
                    $clientes->RegistrosPost();
                }
                elseif(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){

                    $clientes = new RegistrosControlador();
                    $clientes->index();
                }
            }
        }
        /*Integracion de metodos por id, get, put y delete */
        else{

            if (array_filter($arrayRutas)[2] == 'users' && is_numeric(array_filter($arrayRutas)[3])){

                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'GET'){

                    $curso = new UsersControlador();
                    $curso->UsersGet(array_filter($arrayRutas)[3]);
                }

                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'PUT'){

                    $datos = array();

                    parse_str(file_get_contents('php://input'), $datos);
                        //echo "<pre>"; print_r($datos); echo "</pre>";

                    $curso = new UsersControlador();
                    $curso->UsersPut(array_filter($arrayRutas)[3], $datos);
                }

                if(isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'DELETE'){

                    $curso = new UsersControlador();
                    $curso->UsersDelete(array_filter($arrayRutas)[3]);
                }


            }


        }

    }
?>