<?php
require_once 'conexion.php';

// Función para generar un token
function generarToken()
{
  return bin2hex(random_bytes(32));
}

// Función para verificar si un correo electrónico existe en la base de datos
function checkIfEmailExists($conn, $email)
{
  $check_email_stmt = $conn->prepare("SELECT UserID FROM users WHERE Email = ?");
  $check_email_stmt->bind_param("s", $email);
  $check_email_stmt->execute();
  $check_email_stmt->store_result();

  return $check_email_stmt;
}

// Función para verificar si un usuario está activo
function usuarioActivo($userID, $conn)
{ 
  $sql = $conn->prepare("SELECT activacion FROM users WHERE UserID = ? LIMIT 1");
  $sql->bind_param("i", $userID);
  $sql->execute();
  $result = $sql->get_result();

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row['activacion'] == 1;
  }
  return false;
}

// Función para solicitar una contraseña y generar un token
function solicitarPassword($userID, $conn)
{
  $Token = generarToken();
  $stmt = $conn->prepare("UPDATE users SET Token_password = ?, Password_request = 1 WHERE UserID = ?");
  if ($stmt->bind_param("si", $Token, $userID) && $stmt->execute()) {
    return $Token;
  }
  return null;
}

// Función para verificar si un token de solicitud de contraseña es válido
function verificarTokenRequest($userID, $Token, $conn)
{
  $stmt = $conn->prepare("SELECT UserID FROM users WHERE UserID = ? AND Token_password = ? AND Password_request = 1 LIMIT 1");
  $stmt->bind_param("is", $userID, $Token);
  $stmt->execute();
  $stmt->store_result();
  return $stmt->num_rows > 0;
}

// Función para validar una contraseña y retornar errores si no cumple los requisitos
function validarContraseña($contraseña)
{
  // Verificar si las contraseñas coinciden
  if (strlen($contraseña) < 8) {
    return "La contraseña debe tener al menos 8 caracteres.";
  } elseif (!preg_match("/[A-Z]/", $contraseña)) {
    return "La contraseña debe contener al menos una letra mayúscula (A-Z).";
  } elseif (!preg_match("/[a-z]/", $contraseña)) {
    return "La contraseña debe contener al menos una letra minúscula (a-z).";
  } elseif (!preg_match("/[0-9]/", $contraseña)) {
    return "La contraseña debe contener al menos un dígito (0-9).";
  }
  return true;
}

// Función para obtener información de perfil de usuarios
function perfilUsuario($usuarios)
{
  require 'conexion.php';
  $sql = "SELECT u.UserID, u.Username, p.Foto_perfil, u.RegistrationDate
          FROM users u
          LEFT JOIN perfil p ON u.UserID = p.UserID
          ORDER BY u.RegistrationDate DESC
          LIMIT ?";

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("i", $usuarios);
  $stmt->execute();
  $result = $stmt->get_result();
  $usuarios = array();

  while ($row = $result->fetch_assoc()) {
    $row['Foto_perfil'] = fotoUsuario($row['UserID'], $conn);
    $usuarios[] = $row;
  }

  $stmt->close();
  $conn->close();

  return $usuarios;
}

// Función para obtener la clasificación de usuarios
function obtenerClasificacion()
{

  global $conn, $rangos;
  $sql = "SELECT r.*, u.Username
            FROM rankings r
            INNER JOIN users u ON r.UserID = u.UserID
            ORDER BY r.Score DESC
            LIMIT 10";
  $result = $conn->query($sql);
  $clasificacion = [];

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      // Obtener el nombre del rango en función del valor de 'Score'
      $rangoUsuario = "Desconocido";
      foreach ($rangos as $nombreRango => $limites) {
        if ($row['Score'] >= $limites['min'] && $row['Score'] <= $limites['max']) {
          $rangoUsuario = $nombreRango;
          break;
        }
      }
      // Agregar el nombre del rango al resultado
      $row['Rango'] = $rangoUsuario;

      $clasificacion[] = $row;
    }
  }

  return $clasificacion;
}

// Función para obtener la foto de perfil de un usuario
function fotoUsuario($userID, $conn)
{
  $stmt = $conn->prepare("SELECT IFNULL(Foto_perfil, ?) AS Foto_perfil FROM perfil WHERE UserID = ?");
  $defaultImage = './img/fotos_perfil/user_default.png';
  $stmt->bind_param("si", $defaultImage, $userID);
  $stmt->execute();
  $stmt->bind_result($fotoPerfil);

  if ($stmt->fetch()) {
    return htmlspecialchars($fotoPerfil);
  } else {
    return $defaultImage;
  }
}

// Función para obtener la informacion de las publicaciones
function obtenerPublicaciones($conn)
{
    $stmt = $conn->prepare("SELECT p.PublicacionID, p.Titulo_publicacion, p.Contenido_Publicacion, p.Imagen_publicacion, p.Fecha_Publicacion, p.UsuarioID, r.Score, c.NombreCategoria 
                            FROM publicaciones p
                            LEFT JOIN rankings r ON p.UsuarioID = r.UserID
                            LEFT JOIN Categorias c ON p.CategoriaID = c.CategoriaID");

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        $publicaciones = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $publicaciones[] = $row;
            }
        }

        $stmt->close();
        return $publicaciones;
    }
    return array(); // Retorna un array vacío si no hay resultados o hay un error en la consulta
}


// Función para obtener la informacion de las publicaciones de los 10 mejores
function obtenerMejoresPublicaciones($conn)
{
    $stmt = $conn->prepare("SELECT p.PublicacionID, p.Titulo_publicacion, p.Contenido_Publicacion, p.Imagen_publicacion, p.Fecha_Publicacion, p.UsuarioID, r.Score, c.NombreCategoria 
                            FROM publicaciones p
                            LEFT JOIN rankings r ON p.UsuarioID = r.UserID
                            LEFT JOIN Categorias c ON p.CategoriaID = c.CategoriaID
                            ORDER BY r.Score DESC
                            LIMIT 10");

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        $publicaciones = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $publicaciones[] = $row;
            }
        }

        $stmt->close();
        return $publicaciones;
    }
    return array(); // Retorna un array vacío si no hay resultados o hay un error en la consulta
}



// Función para obtener las categorias existentes
function obtenerCategorias($conn)
{
    $stmt = $conn->prepare("SELECT CategoriaID, NombreCategoria FROM Categorias");

    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();

        $categorias = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categorias[] = $row;
            }
        }

        $stmt->close();
        return $categorias;
    }

    return array(); // Retorna un array vacío si no hay resultados o hay un error en la consulta
}
?>