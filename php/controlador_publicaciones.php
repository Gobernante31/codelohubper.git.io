<?php
require_once './lib/funciones.php';
ini_set('error_reporting', 0);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["titulo"]) && isset($_POST["descripcion"])) {
    require_once 'conexion.php';

    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);
    $usuarioID = $_SESSION['UserID'];
    $categoriaID = (int)$_POST['categoria'];

    // Verificar el límite de publicaciones por usuario
    $limitePublicaciones = 3; 

    $stmt = $conn->prepare("SELECT COUNT(*) as total FROM publicaciones WHERE UsuarioID = ?");
    $stmt->bind_param("i", $usuarioID);
    $stmt->execute();
    $result = $stmt->get_result();
    $numeroPublicaciones = $result->fetch_assoc()['total'];

    if ($numeroPublicaciones >= $limitePublicaciones) {
        echo '<div class="mensaje_error" id="message">Ya has alcanzado el límite de publicaciones.</div>';

    } else {
        $imagen = "";

        if (!empty($_FILES['imagen']['name'])) {
            $uploadDir = "img/fotos_publicaciones/";
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $randomFileName = $usuarioID . "_publicacion_" . uniqid() . "." . $extension;
            $targetFilePath = $uploadDir . $randomFileName;

            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $targetFilePath)) {
                $imagen = $targetFilePath;
            } else {
                echo '<div class="mensaje_error" id="message">Error al subir la imagen.</div>';
            }
        }

        if (!empty($titulo) && !empty($descripcion) && !empty($imagen) && !empty($usuarioID) && !empty($categoriaID)) {
            $stmt = $conn->prepare("INSERT INTO publicaciones (Titulo_publicacion, Contenido_Publicacion, Imagen_publicacion, Fecha_Publicacion, UsuarioID, CategoriaID) VALUES (?, ?, ?, NOW(), ?, ?)");
            
            if ($stmt) {
                $stmt->bind_param("sssii", $titulo, $descripcion, $imagen, $usuarioID, $categoriaID);

                if ($stmt->execute()) {
                    echo '<div class="mensaje_ok" id="message">Publicación realizada con éxito.</div>';
                } else {
                    echo '<div class="mensaje_error" id="message">Error al publicar la información.</div>';
                }

                $stmt->close();
            } else {
                echo '<div class="mensaje_error" id="message">Error en la consulta.</div>';
            }
        } else {
            echo '<div class="mensaje_error" id="message">Todos los campos son requeridos.</div>';
        }
    }
}
?>
