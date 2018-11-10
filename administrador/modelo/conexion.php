<?php

class Conexion{//La conexion a la base de datos

    public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=Inventario", "Edwin123@","Edwin123@");
        return $link;
    }

}