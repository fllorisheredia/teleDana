<?php
// Conectar a la base de datos
include("includes/db.php");



// Obtener los productos de la base de datos
$sql = "SELECT * FROM productos ORDER BY id DESC";
$result = $conexion->query($sql);

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $pedido_id = $_POST['nombre'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $query = $conexion->prepare("INSERT INTO usuarios
//    (nombre, email, password, rol) VALUES (?, ?, ?,
//    'cliente')");
   


// }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .product-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-image {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
        .buy-button {
            background-color: orange;
            border: none;
            color: white;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .buy-button:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Productos Disponibles</h1>
    <div class="text-center mb-4">
        <a href="productos/agregar2.php" class="btn btn-primary">Añadir Producto</a>
    </div>

    <div class="row">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="col-md-4">
                <div class="product-card">
                    <?php if (!empty($row["imagen"])): ?>
                        <img src="imagenes/<?php echo $row['imagen']; ?>" class="product-image" alt="<?php echo $row["nombre"]; ?>">
                    <?php endif; ?>
                    <h5 class="mt-3">Nombre del Producto: <?php echo $row["nombre"]; ?> </h5>
                    <p class="text-muted">Descripción: <?php echo $row["descripcion"]; ?> :</p>
                    <p><strong>Precio:</strong> <?php echo $row["precio_tonkens"]; ?> Tokens</p>
                    <p><strong>Categoría:</strong> <?php echo $row["categoria"]; ?></p>
                    <p><strong>Stock:</strong> <?php echo $row["stock"]; ?></p>
                    <a href="detalle.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary w-100">Ver Detalles</a>


                    <button class="buy-button mt-2">Añadir al Carrito</button>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php $conexion->close(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
