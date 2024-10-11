<?php
session_start();
include 'Conexion_login.php'; // Incluye tu archivo de conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar el usuario
    $query = "SELECT id, nombre_usuario FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre_usuario);
        $stmt->fetch();
        // Guardar información en la sesión
        $_SESSION['user_id'] = $id;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        // Redirigir al usuario a la página principal
        header("Location: inicio.php");
    } else {
        echo "Nombre de usuario o contraseña incorrectos.";
    }

    $stmt->close();
    $conn->close();
}
?>
