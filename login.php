<?php

include "includes/header.php";
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
include "includes/footer.php";
?>
<form method="POST">
 <input type="email" name="email" required>
 <input type="password" name="password" required>
 <button type="submit">Iniciar Sesión</button>
</form> 