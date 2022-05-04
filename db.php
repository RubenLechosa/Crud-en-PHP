<?php

session_start();

$conexion = mysqli_connect(
    'localhost',
    'root',
    '',
    'crud',
);

/*if(isset($connexion)){
    echo "Base de datos conectada";
}else{
    echo "Error al conectar la base de datos";
}*/

?>