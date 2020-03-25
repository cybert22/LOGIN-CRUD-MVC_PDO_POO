<?php

    class MvcControlador{

        public function pagina(){
            
            include "vista/principal.php";
        }
        // ====================================================================
        # METODO PARA DIRECCIONAR PAGINAS MEDIANTE MVC

        public function enlacesPaginasControlador(){

            if(isset($_GET['action'])){
                
                $enlace = $_GET['action'];
            }

            else{

                $enlace = "index";

            }
            
            $respuesta = Paginas::enlacesPaginasModelo($enlace);

            include $respuesta;
        }
        // ====================================================================
        # METODO PARA REGISTRO DE USUARIOS

        public function registroUsuarioControlador(){

            if(isset($_POST["usuarioRegistro"])){

                $datosControlador = array(  "usuario" => $_POST["usuarioRegistro"],
                                            "nombre" => $_POST["nombreRegistro"],
                                            "email" => $_POST["emailRegistro"],
                                            "password" => $_POST["passwordRegistro"],
                                        );
                $respuesta = Datos::registroUsuarioModelo($datosControlador,"usuarios");

                if($respuesta == "success"){

                    header("location:index.php?action=ok");
                    //header("location:index.php?action=ok#signup-agile");

                }else{
                    header("location:index.php");
                }


            }
        }
        // ====================================================================
        #METODO PARA INGRESAR AL SISTEMA POR LOGIN 

        public function ingresoUsuarioControlador(){

            if(isset($_POST["usuarioIngreso"])){

                $datosControlador = array(  "usuario" => $_POST["usuarioIngreso"],
                                            "password" => $_POST["passwordIngreso"],
                                        );

                $respuesta = Datos::ingresoUsuarioModelo($datosControlador,"usuarios");
                

                if($respuesta["usuario"]==$_POST["usuarioIngreso"] && $respuesta["password"]==$_POST["passwordIngreso"]){

                    session_start();

                    $_SESSION["validar"] = true;
                    
                    header("location:index.php?action=usuarios");

                }else{

                    header("location:index.php?action=fallo");
                }
            }

        }

        // ====================================================================

        #METODO PARA LISTAR USUARIOS EN TABLA

        public function vistaUsuariosControlador(){

            $respuesta = Datos::vistaUsuariosModelo("usuarios");

            foreach($respuesta as $row => $item){
                
                echo    '<tr>
                                <td>'.$item["id"].'</td>
                                <td>'.$item["usuario"].'</td>
                                <td>'.$item["nombre"].'</td>
                                <td>'.$item["email"].'</td>
                                <td>'.$item["password"].'</td>
                                <td><a class="btn btn-warning" href="index.php?action=editar&id='.$item["id"].'">Editar</a></td>
                                <td>
                                <a class="btn btn-danger" onclick="javascript:return confirm("¿Seguro de eliminar este registro?");" href="index.php?action=usuarios&idBorrar='.$item["id"].'">Borrar</a>
                                </td>
                        
                        </tr>';
            }
        }

        
	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioControlador(){

		$datosControlador = $_GET["id"];
		$respuesta = Datos::editarUsuarioModelo($datosControlador, "usuarios");

        echo'<input type="hidden" value="'.$respuesta["id"].'"class="form-control" name="idEditar">
            <div class="form-group">
            <label>Usuario</label>
            <input type="text" value="'.$respuesta["usuario"].'"class="form-control" name="usuarioEditar" required>
            </div>
            <div class="form-group">
            <label>Nombre y Apellido</label>
            <input type="text" value="'.$respuesta["nombre"].'"class="form-control" name="nombreEditar" required>
            </div>
            <div class="form-group">
            <label>Correo Electrónico</label>
            <input type="email" value="'.$respuesta["email"].'"class="form-control" name="emailEditar" required>
            </div>
            <div class="form-group">
            <label>Contraseña</label>
            <input type="text" value="'.$respuesta["password"].'"class="form-control" name="passwordEditar" required>
            </div>';

            // <input type="submit" value="Actualizar">';
            

   }

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioControlador(){

		if(isset($_POST["usuarioEditar"])){

			$datosControlador = array( "id"=>$_POST["idEditar"],
                                      "usuario"=>$_POST["usuarioEditar"],
                                      "nombre"=>$_POST["nombreEditar"],
                                      "email"=>$_POST["emailEditar"],
                                      "password"=>$_POST["passwordEditar"]
                                    );
			
			$respuesta = Datos::actualizarUsuarioModelo($datosControlador, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=cambio");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioControlador(){

		if(isset($_GET["idBorrar"])){

			$datosControlador = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModelo($datosControlador, "usuarios");

			if($respuesta == "success"){

				header("location:index.php?action=usuarios");
			
			}

		}

	}




        
    }

?>