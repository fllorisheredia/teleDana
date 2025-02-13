<?php
// 7. /carrito/index.php (Vista del carrito con productosañadidos)
session_start();
if (!isset($_SESSION['carrito'])) {
 $_SESSION['carrito'] = [];
}
foreach ($_SESSION['carrito'] as $id_producto => $cantidad)
{
 $query = $conexion->prepare("SELECT nombre,
precio_tonkens FROM productos WHERE id = ?");
 $query->bind_param("i", $id_producto);
 $query->execute();
 $resultado = $query->get_result()->fetch_assoc();
 echo "<div>" . $resultado['nombre'] . " - Precio: " .
$resultado['precio_tonkens'] . " Tonkens - Cantidad: " .
$cantidad . "</div>";
}
?>
<a href="checkout.php">Finalizar Compra</a> 