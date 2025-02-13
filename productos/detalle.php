<?php
// Conectar a la base de datos
$conn = new mysqli("localhost", "usuario", "contraseña", "nombre_bd");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_GET["id"];

// Obtener la información del producto
$sql = "SELECT * FROM productos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Producto</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<h2>Detalles del Producto</h2>

<?php if ($producto) { ?>
    <p><strong>Nombre:</strong> <?php echo $producto["nombre"]; ?></p>
    <p><strong>Descripción:</strong> <?php echo $producto["descripcion"]; ?></p>
    <p><strong>Precio (Tokens):</strong> <?php echo $producto["precio_tonkens"]; ?></p>
    <p><strong>Categoría:</strong> <?php echo $producto["categoria"]; ?></p>
    <p><strong>Stock Disponible:</strong> <?php echo $producto["stock"]; ?></p>
    <a href="index.php">Volver a la Lista</a>
<?php } else { ?>
    <p>El producto no existe.</p>
<?php } ?>

</body>
</html>
