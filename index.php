
<?php
// 4. /index.php (Página principal de la tienda)
include 'includes/header.php';
include 'includes/db.php';
$resultado = $conexion->query("SELECT * FROM productos");
// while ($producto = $resultado->fetch_assoc()) {
//  echo "<div><h2>" . $producto['nombre'] .
// "</h2><p>Precio: " . $producto['precio_tonkens'] . "
// Tonkens</p></div>";
// }
include 'includes/footer.php';
// include 'productos/index2.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php
    include 'productos/index2.php';
    ?>
    
</body>
</html>


