<?php
$userID = $_SESSION['UserID'];
// Establece el manejo de errores de PHP
ini_set('error_reporting', 0);

require_once 'conexion.php';
require_once './lib/funciones.php';
require_once './php/controlador_ranking.php';



// Consulta la base de datos para obtener la imagen y la biografía del usuario
$sql = "SELECT Presentacion FROM perfil WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$stmt->bind_result($presentacion);
$stmt->fetch();
$stmt->close();

// Consulta la base de datos para obtener el puntaje del usuario
$sql = "SELECT Score FROM rankings WHERE UserID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userID);
$stmt->execute();
$stmt->bind_result($score);
$stmt->fetch();
$stmt->close();

// Encuentra el nombre del rango en función del puntaje
$nombreRango = "No definido";
foreach ($rangos as $rango => $limites) {
  if ($score >= $limites["min"] && $score <= $limites["max"]) {
    $nombreRango = $rango;
    break;
  }
}


// Obtén el puntaje del usuario (esto podría estar en tu código actual)
$puntaje = $score;

// Formatea el puntaje con comas como separador de miles
$score_user = number_format($puntaje, 0, '.', '.');
?>