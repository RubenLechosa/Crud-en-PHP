<?php 
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";

    $result = mysqli_query($conexion, $query);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];

    }

}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];


    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    $result = mysqli_query($conexion, $query);
    header("Location: index.php");
    $_SESSION['message'] = 'Tarea Actualizada Correctamente';
    $_SESSION['message_type'] = 'success';

}

?>


<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_task.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="text" name="title" value="<?php echo($title) ?>" class="form-control" placeholder="Actualiza el Titulo" autofocus>
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="description" class="form-control" rows="2" placeholder="Actualiza la descripción" autofocus><?php echo($description) ?></textarea>
                    </div>
                    <button name="update" class="btn btn-success">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>