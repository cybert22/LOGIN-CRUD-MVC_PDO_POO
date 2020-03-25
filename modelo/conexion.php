<?php
#CLASE PARA LA CONEXION AL SERVIDOR Y BASE DE DATOS
class Conexion
{

    #METODO PARA REALIZAR LA CONEXION A LA BASE DE DATOS

    public function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=db_cybert_code", "root", "");
        return $link;
    }
}
    
    #PARA PROBAR LA CONEXION

    // $ok = new Conexion();
    // $ok->conectar();
    // echo "conexion con exito";
