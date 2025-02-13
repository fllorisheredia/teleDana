<?php
// 4. /index.php (Página principal de la tienda)
include 'includes/header.php';
include 'includes/db.php';
$resultado = $conexion->query("SELECT * FROM productos");
while ($producto = $resultado->fetch_assoc()) {
 echo "<div><h2>" . $producto['nombre'] .
"</h2><p>Precio: " . $producto['precio_tonkens'] . "
Tonkens</p></div>";
}
include 'includes/footer.php';
?>