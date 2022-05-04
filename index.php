<?php include("db.php")?>

<?php include("includes/header.php")?>

    
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php  if(isset($_SESSION['message'])) { ?>

                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset(); } ?>
            
             <div class="card card-body">
               <form action="save_task.php" method="POST">

                   <div class="input-group mb-3">
                       <input type="text" name="title" class="form-control" placeholder="Titulo" autofocus>
                   </div>
                   <div class="input-group mb-3">
                       <textarea name="description" class="form-control" rows="2" placeholder="Descripción de la tarea"></textarea>
                   </div>
                   
                   <input type="submit" class="btn btn-success btn-block" name="enviar">
               </form>  
             </div>
        </div>
        <div class="col-md-8">
            <table class="table table-bordered center">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Creado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM task";
                        $result_task = mysqli_query($conexion, $query);

                        while($row = mysqli_fetch_array($result_task)){ ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit_task.php?id=<?php echo($row['id'])?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a class="btn btn-danger" href="delete_task.php?id=<?php echo($row['id'])?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>

                            <?php } ?>  

                </tbody>
            </table>
        </div>
    </div>
</div>


    


<?php include("includes/footer.php")?> 
