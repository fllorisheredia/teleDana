<?php
include 'includes/db.php';
// 6. /registro.php (Registro de usuarios)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 $nombre = $_POST['nombre'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $query = $conexion->prepare("INSERT INTO usuarios
(nombre, email, password, rol) VALUES (?, ?, ?,
'cliente')");
 $query->bind_param("sss", $nombre, $email, $password);
 if ($query->execute()) {
 header("Location: login.php");
 } else {
 echo "Error al registrar";
 }
}
?>

<form method="POST">
 <input type="text" name="nombre" required>
 <input type="email" name="email" required>
 
 <input type="password" name="password" required>

 <button type="submit">Registrarse</button>
</form>