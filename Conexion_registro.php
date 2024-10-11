<?php
$servername = "localhost"; // Nombre del servidor
$username = "root"; // Usuario de la base de datos
$password = ""; // Contraseña de la base de datos
$dbname = "cambulos"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $identificacion = $_POST['identificacion'];
    $password = $_POST['password'];

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre_usuario, identificacion, contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $identificacion, $password);

    if ($stmt->execute()) {
        // Indicar que el registro fue exitoso para mostrar la alerta después
        echo "<script>
                window.onload = function() {
                    alert('¡Registro exitoso! Ahora puedes iniciar sesión.');
                    window.location.href = 'login.html';
                };
              </script>";
    } else {
        echo "<script>
                window.onload = function() {
                    alert('Error: No se pudo completar el registro.');
                };
              </script>";
    }

    $stmt->close();
    $conn->close();
}
?>
