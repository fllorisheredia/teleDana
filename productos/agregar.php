<?php
session_start();

// Incluir la conexión a la base de datos
include __DIR__ . '/../includes/db.php';

$usuario_id = $_SESSION['usuario_id'] ?? 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $precio_tonkens = $_POST["precio_tonkens"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];

    // Validar que la categoría sea válida
    $categorias_permitidas = ['alimentos', 'limpieza', 'bricolaje', 'transporte'];

    if (!in_array($categoria, $categorias_permitidas)) {
        die("Error: La categoría ingresada no es válida.");
    }
    

    // Insertar en la base de datos
    $sql = "INSERT INTO productos (usuario_id, nombre, descripcion, precio_tonkens, categoria, stock) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("issssi", $usuario_id, $nombre, $descripcion, $precio_tonkens, $categoria, $stock);

    if ($stmt->execute()) {
        echo "Producto añadido con éxito.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="css/agregarProducto.css">
</head>
<body>

<h2>Añadir Producto</h2>

<form action="agregar.php" method="post">
    <label for="nombre">Nombre del Producto:</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="3" required></textarea>

    <label for="precio_tonkens">Precio en Tokens:</label>
    <input type="number" id="precio_tonkens" name="precio_tonkens" required>

    <label for="categoria">Categoría:</label>
<select id="categoria" name="categoria" required>
    <option value="alimentos">Alimentos</option>
    <option value="limpieza">Limpieza</option>
    <option value="bricolaje">Bricolaje</option>
    <option value="transporte">Transporte</option>
</select>

    <label for="stock">Stock Disponible:</label>
    <input type="number" id="stock" name="stock" required>

    <button type="submit">Añadir Producto</button>
</form>

</body>
</html>
