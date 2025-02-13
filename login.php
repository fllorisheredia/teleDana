<?php

// include "includes/header.php";
include "includes/db.php";

// 5. /login.php (Inicio de sesión)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $email = $_POST['email'];
 $password = $_POST['password'];
 $query = $conexion->prepare("SELECT * FROM usuarios
WHERE email = ? AND password = ?");
 $query->bind_param("ss", $email, $password);
 $query->execute();
 $resultado = $query->get_result();
 if ($resultado->num_rows > 0) {
 session_start();
 $_SESSION['usuario'] = $resultado->fetch_assoc();
 header("Location: index.php");
 } else {
 echo "Credenciales incorrectas";
 }
}
// include "includes/footer.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/registro.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" method="POST">
            <h2>Iniciar Sesión</h2>



            <div class="form-group">
                <i class="fas fa-user icon"></i>
                <input type="email" name="email" required>

            </div>

            <div class="form-group password-group">
                <i class="fas fa-lock icon"></i>
                <input type="password" name="password" required>
                <i class="toggle-password" id="togglePassword"></i>
            </div>

            <button type="submit" class="btn">Iniciar Sesión</button>

            <!-- Enlace para recuperación de contraseña -->
            <p class="forgot-password"><a href="/recuperar_contrasena">¿Olvidaste tu contraseña?</a></p>

            <div class="signup-link">
                <p>¿No tienes cuenta? <a href="/teleDANA/registro.php" class="signup-text">¡Crea una ahora aquí!</a></p>
            </div>
        </form>
    </div>
</body>
</html>









<!-- <form method="POST">
 <input type="email" name="email" required>
 <input type="password" name="password" required>
 <button type="submit">Iniciar Sesión</button>
</form>  -->