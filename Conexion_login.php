<?php
// conexion.php

$servername = "localhost"; // Cambia a tu servidor si es necesario
$username = "root"; // Cambia al nombre de usuario de tu base de datos
$password = ""; // Cambia a la contraseña de tu base de datos
$dbname = "cambulos"; // Cambia al nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST["username"];
   $password = $_POST['password'];

    // Prepara la consulta SQL
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND contraseña = ?";
    
    // Prepara y ejecuta la declaración
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password); // "ss" significa que los parámetros son strings
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el usuario
    if ($result->num_rows > 0) {
        echo "Inicio de sesión exitoso.";
        header("Location: inicio.html"); // Redirigir a la página de inicio
        exit(); // Asegura que el código de abajo no se ejecutará
    } else {
        // Mostrar alerta de usuario no encontrado y redirigir al registro
        echo "<script>
                alert('Nombre de usuario o contraseña incorrectos. ¿No tienes cuenta? Regístrate ahora.');
                window.location.href = 'registro.html';
              </script>";
    }

    $stmt->close(); // Cierra la declaración
    $conn->close(); // Cierra la conexión
}
?>
