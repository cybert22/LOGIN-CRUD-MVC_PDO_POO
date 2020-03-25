<?php
     
     #IMPORTAMOS EL MODULO DE CONEXION 

     require_once "conexion.php";

    //  ===================================================================
    
    #CLASE GENERAL PARA EL CRUD EXTENDIDA DE LA CLASE CONEXION

    class Datos extends Conexion{

        #METODO PARA EL REGISTRO DE USUARIOS
        
        public function registroUsuarioModelo($datosModelo, $tabla){
            
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, nombre,email,password) VALUES(:usuario,:nombre,:email,:password)");

            $stmt->bindParam(":usuario",$datosModelo["usuario"],PDO::PARAM_STR);
            $stmt->bindParam(":nombre",$datosModelo["nombre"],PDO::PARAM_STR);
            $stmt->bindParam(":email",$datosModelo["email"],PDO::PARAM_STR);
            $stmt->bindParam(":password",$datosModelo["password"],PDO::PARAM_STR);

            if($stmt->execute()){

                return "success";
            }else{

                return "error";
            }

            $stmt->closeCursor();

        }

        #METODO PARA INGRESAR AL SISTEMA

        public function ingresoUsuarioModelo($datosModelo, $tabla){

            $stmt = Conexion::conectar()->prepare("SELECT usuario, password FROM $tabla WHERE usuario= :usuario");
            $stmt->bindParam(":usuario",$datosModelo["usuario"],PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch();
            $stmt->closeCursor();

        }

        #METODO PARA LISTAR LOS REGISTROS EN TABLA

        public function vistaUsuariosModelo($tabla){

            $stmt = Conexion::conectar()->prepare("SELECT id, usuario, nombre, email, password FROM $tabla");
            $stmt->execute();
            return $stmt->fetchAll();
            $stmt->closeCursor();
        }

        #METODO PARA LISTAR LOS REGISTROS EN TABLA

        public function editarUsuarioModelo($datosModelo, $tabla){

            $stmt = Conexion::conectar()->prepare("SELECT id, usuario,nombre, email, password FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $datosModelo, PDO::PARAM_INT);	
            $stmt->execute();
    
            return $stmt->fetch();
    
            $stmt->closeCursor();
    
        }
    
        #ACTUALIZAR USUARIO
        #-------------------------------------
    
        public function actualizarUsuarioModelo($datosModelo, $tabla){
    
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario,nombre = :nombre, email= :email, password = :password  WHERE id = :id");
    
            $stmt->bindParam(":usuario", $datosModelo["usuario"], PDO::PARAM_STR);
            $stmt->bindParam(":nombre", $datosModelo["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datosModelo["email"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datosModelo["password"], PDO::PARAM_STR);
            $stmt->bindParam(":id", $datosModelo["id"], PDO::PARAM_INT);
    
            if($stmt->execute()){
    
                return "success";
    
            }
    
            else{
    
                return "error";
    
            }
    
            $stmt->closeCursor();
    
        }

        
	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModelo($datosModelo, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt->bindParam(":id", $datosModelo, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->closeCursor();

	}

    }

?>