<?php
session_start();
if(!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'cliente') {
    header("Location: /index.php");
    exit;
}
