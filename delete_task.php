<?php  

include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "DELETE FROM task WHERE id = $id";

    $result = mysqli_query($conexion, $query);

    if(!$result){
        die("error al enviar los datos");
    }else{
        header("Location: index.php");
        $_SESSION['message'] = 'Tarea Borrada Correctamente';
        $_SESSION['message_type'] = 'danger';
    }
}


?>