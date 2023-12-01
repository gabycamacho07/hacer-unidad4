<?php
ob_start(); // Inicia el búfer de salida

print_r($_POST);

if (!isset($_POST['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include "test_db_pdo.php";

$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$edad = $_POST['txtEdad'];
$signo = $_POST['txtSigno'];

$sentencia = $bd->prepare("UPDATE persona SET nombre = ?, edad = ?, signo = ? WHERE codigo = ?");
$resultado = $sentencia->execute([$nombre, $edad, $signo, $codigo]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=editado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}

ob_end_flush(); // Envia la salida del búfer al navegador y apaga el búfer
?>
