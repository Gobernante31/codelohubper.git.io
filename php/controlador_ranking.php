<?php
require_once 'conexion.php';
require_once './lib/funciones.php';
// Establece el manejo de errores de PHP
ini_set('error_reporting', 0);

$rangos = [
  "Nuevo" => ["min" => 0, "max" => 50],
  "Aprendiz" => ["min" => 51, "max" => 100],
  "Principiante" => ["min" => 101, "max" => 200],
  "Intermedio" => ["min" => 201, "max" => 300],
  "Junior" => ["min" => 301, "max" => 400],
  "Avanzado" => ["min" => 401, "max" => 500],
  "Experto" => ["min" => 501, "max" => 600],
  "Profesional" => ["min" => 601, "max" => 700],
  "Maestro" => ["min" => 701, "max" => 800],
  "Ingeniero" => ["min" => 801, "max" => 900],
  "Gurú" => ["min" => 901, "max" => 1000],
  "Senior" => ["min" => 1001, "max" => PHP_INT_MAX],
];

// Obtiene la lista de clasificación
$listaClasificacion = obtenerClasificacion();
?>