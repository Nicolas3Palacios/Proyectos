<?php
 
include('config.php');
session_start();

$query = 0;
$result = '';
 
if (isset($_POST['register'])) {
 
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = mysqli_query($conexion, "SELECT * FROM usuarios where correo = '$email'");
    $result = mysqli_fetch_array($query);
    if ($result > 0) {
        
         echo '<p class="error">El correo ya ha sido registrado!</p>';
    } else {
        $query_insert = mysqli_query($conexion, "INSERT INTO usuarios(correo,pass) values ('$email', '$password_hash')");
        if ($query_insert) {
            echo '<p class="success">Usuario registrado exitosamente!</p>';
        } else {
            echo '<p class="error">Error!</p>';
        }
    }
    
}    

?>
<link rel="stylesheet" href="stylesLogin.css">
<div class="container">

</div>
<form method="post" action="" name="signup-form">
    <p class="titulo-ic">Registrar Usuario</p>
    <div class="form-element">
        <label>Correo</label>
        <input type="email" name="email" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="register" value="register">Registrar</button>
    <hr>
    <a href="index.php">Volver</a>
</form>