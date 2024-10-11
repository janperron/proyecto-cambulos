<?php
$servername = "localhost"; // Nombre del servidor (usualmente 'localhost')
$username = "root"; // Tu nombre de usuario de la base de datos
$password = ""; // Tu contraseña de la base de datos
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

    // NO encriptar la contraseña, guardarla tal como fue ingresada
    $sql = "INSERT INTO usuarios (nombre_usuario, identificacion, contraseña) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $identificacion, $password);

    if ($stmt->execute()) {
        // Redirigir al usuario al login con una alerta
        echo "<script>
                alert('¡Registro exitoso! Ahora puedes iniciar sesión.');
                window.location.href = 'login.html';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>



