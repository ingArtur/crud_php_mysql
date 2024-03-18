<?php 
include('connection.php');

$con = connection();

$sql = "SELECT * FROM users";
$query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/style.css"> 
    <link rel="stylesheet" href="CSS/styleform.css"> 
    <title>FORMULARIO DE REGISTRO</title>
</head>

<body>
    <div class="form"> 
        <div class="input-group">
            <h1>Crear usuario</h1>
            <form action="insert_user.php" method="POST">

                <div class="input-container">
                    <input type="text" name="name" placeholder="Nombre">
                    <i class="fa-solid fa-user"></i>

                </div>

                <div class="input-container">
                    <input type="text" name="lastname" placeholder="Apellido">    
                    <i class="fa-solid fa-user"></i>
                </div>
                
                <div class="input-container">
                    <input type="text" name="username" placeholder="Username" >
                    <i class="fa-solid fa-user"></i>
                    

                </div>
                
                <div class="input-container">
                    <input type="password" name= "password" placeholder="Password">
                    <i class="fa-solid fa-lock"></i>

                </div>

                <div class="input-container">
                    <input type="text" name= "email" placeholder="Email">
                    <i class="fa-solid fa-envelope"></i>

                </div>
                
                <input type="submit" value="Agregar usuario">
            </form>
       </div>
    </div>

    <div class="users-table">
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>               
            </thead>

            <tbody>
                <?php while($row =  mysqli_fetch_array($query)): ?>
                <tr>
                <th> <?= $row['id']?> </th>
                <th> <?= $row['name']?></th>
                <th> <?= $row['lastname']?></th>
                <th> <?= $row['username']?></th>
                <th> <?= $row['password']?></th>
                <th> <?= $row['email']?></th>

                <th><a href="update.php?id=<?= $row['id']?>" class="users-table--edit">Editar</a></th>
                <th><a href="delete_user.php?id=<?= $row['id']?>" class="users-table--delete">Eliminar</a></th>
                </tr>
                <?php endwhile; ?>
            </tbody>


        </table>
    </div>
    
</body>

</html>