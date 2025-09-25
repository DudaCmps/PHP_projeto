<?php

if(!isset($_SESSION['perfil']) || $_SESSION['perfil'] !== 'admin') {
    header("Location: /index.php");
    exit;
}
