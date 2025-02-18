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
                <a href="/teleDANA/index.php">Inicio</a>
                <a href="/teleDANA/quienes_somos.php">Quiénes Somos</a>
                <a href="/teleDANA/contacto.php">Contacto</a>
                <a href="/teleDANA/login.php">Login</a>
            </div>
            <div >
            <!-- <button  class="btn-animado" onclick=" window.location.href='registro.php'">Login</button> -->
            
            <button  class="btn-animado btn-container" onclick=" window.location.href='carrito/index.php'">&#128722;</button>
            </div> 
         


        </nav>
    </header>