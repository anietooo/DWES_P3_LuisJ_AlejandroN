<?php
function conectar():mysqli{
    $server = "127.0.0.1";
    $user = "root";
    $password = "Sandia4you";
    $dbname = "DWES_P3_LuisJ_AlejandroN";
    $conexion = new mysqli($server,$user,$password,$dbname);
    return $conexion;
}

?>