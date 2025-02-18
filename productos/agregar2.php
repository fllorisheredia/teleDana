<?php

// conexión a la bd
include __DIR__ . '/../includes/db.php';
include __DIR__.'/../includes/header.php';
include __DIR__ . '/../includes/footer.php';

$usuario_id = $_SESSION['usuario_id'] ?? 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];//
    $descripcion = $_POST["descripcion"]; //
    $precio_tonkens = $_POST["precio_tonkens"];
    $categoria = $_POST["categoria"];
    $stock = $_POST["stock"];

    // Validar que la categoría sea válida
    $categorias_permitidas = ['alimentos', 'limpieza', 'bricolaje', 'transporte'];

    if (!in_array($categoria, $categorias_permitidas)) {
        die("Error: La categoría ingresada no es válida.");
    }
    

    // Insertar bd
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

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="">
    <title>Agregar Servicios</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">

    
    <div class="container mt-5">
    <h1 class="text-center mb-4">Proporcionar Servicio</h1>
    <p class="text-center mb-5">Rellene el siguiente Formulario para añadir el servicio que quire porporcionar.</p>

    <form  action="agregar.php" id="solicitarAyudaForm" method="POST">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Servicio</label>
            <input type="text" class="form-control" id="nombre" name="nombre"required>
        </div>
        <div class="mb-3">
            <label for="precio_tonkens" class="form-label">Precio del Servicio</label>
            <input type="tel" class="form-control" id="precio_tonkens" name="precio_tonkens" required>
        </div>
      
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria de la Urgencia</label>
            <select class="form-select" id="categoria" name="categoria" required>
                <option value="">Selecciona una opción</option>
                <option value="alimentos"> Alimentos</option>
                <option value="limpieza">Limpieza</option>
                <option value="bricolaje"> Bricolaje</option>
                <option value="transporte"> Transporte</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción del Servicio</label>
            <textarea class="form-control" id="descripcion" rows="4" name="descripcion" required></textarea>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock del Producto</label>
            <textarea class="form-control" id="stock" name="stock"required></textarea>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn ">Enviar Solicitud</button>
        </div>
    </form>
</div>
      
  </body>
</html>
