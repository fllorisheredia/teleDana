<?php session_start();
include "titulo.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DANA - Tienda</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/botonAnimado.css">
    
   
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-links">
                <a href="/DANA/index.php">Inicio</a>
                <a href="/quienes_somos.php">Quiénes Somos</a>
                <a href="/DANA/contacto.php">Contacto</a>
                <a href="/DANA/login.php">Login</a>
            </div>
            <div>
            <button  class="btn-animado" onclick=" window.location.href='registro.php'">Registro</button>

            </div>
        </nav>
    </header>