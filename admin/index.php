<?php
// 8. /admin/index.php (Inicio del panel de administración)
session_start();
if ($_SESSION['usuario']['rol'] !== 'administrador') {
 header("Location: ../index.php");
}
include '../includes/header.php';
echo "<h1>Panel de Administración</h1>";
include '../includes/footer.php';
?> 