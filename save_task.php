<?php 

include("db.php");

/*if(isset($_POST['save_task'])){
    echo 'saving';
}else{
    echo "Error";
}*/

$title = $_POST['title'];
$description = $_POST['description'];


$query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
$result = mysqli_query($conexion, $query);

if(!$result){
    die("error al enviar los datos");
}else{
    header("Location: index.php");
    $_SESSION['message'] = 'Tarea Guardada Correctamente';
    $_SESSION['message_type'] = 'success';
}



?>