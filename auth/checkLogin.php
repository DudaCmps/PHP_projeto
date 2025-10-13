<?php
session_start();
header('Content-Type: application/json');

if(isset($_SESSION['id_user'])) {
    echo json_encode([
        'logado' => true,
        'nome' => $_SESSION['nome'],
        'id' => $_SESSION['id_user']
    ]);
} else {
    echo json_encode([
        'logado' => false
    ]);
}
