<?php
// Conectar a la base de datos
include("includes/db.php");

// Obtener los productos de la base de datos
$sql = "SELECT * FROM productos ORDER BY id DESC";
$result = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css/agregarProductos.css">
</head>
<body>

<h2>Productos Disponibles</h2>
<a href="teleDANA/index.php">Añadir Producto</a>



<!-- Mensaje de presentacion -->
<div class="container mt-5">
  
  <form id="solicitarAyudaForm">

     <div>
      <h1 class="text-center mb-4">Productos disponibles</h1>
      <p class=" mb-5 text-body">
      <table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Precio (Tokens)</th>
        <th>Categoría</th>
        <th>Stock</th>
        <th>Acción</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["nombre"]; ?></td>
            <td><?php echo $row["descripcion"]; ?></td>
            <td><?php echo $row["precio_tonkens"]; ?></td>
            <td><?php echo $row["categoria"]; ?></td>
            <td><?php echo $row["stock"]; ?></td>
            <td><a href="detalle.php?id=<?php echo $row['id']; ?>">Ver Detalles</a></td>
        </tr>
    <?php } ?>

      </p>
     </div>
  </form>
</div>

</table>

<?php $conexion->close(); ?>

</body>
</html>
