<?php
 
include('config.php');
session_start();
 
if (isset($_POST['login'])) {
 
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$username'");
    $resultado = mysqli_fetch_array($query);
    if (!$resultado) {
        echo '<p class="error">Datos invalidos!</p>';
    }else {
        if (password_verify($password, $resultado['pass'])) {
            $_SESSION['user_id'] = $resultado['id'];
            header('Location: pokedex.php  ');
            } else {
                echo '<p class="error">Usuario o Contraseña Incorrecta!</p>';
            }
    }
}
 
?>
<link rel="stylesheet" href="stylesLogin.css">
<div class="container"> 
<form method="post" action="" name="signin-form">
    <p class="titulo-ic">Iniciar Session</p>
    <div class="form-element">
        <label>Correo</label>
        <input type="email" name="username"  required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Iniciar session</button>
    <hr>
    <a href="register.php">Registrar</a>
</form>
</div>


