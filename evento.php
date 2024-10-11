<?php
// Datos de configuración de la base de datos
$host = 'localhost';
$dbname = 'cambulos';  // Reemplaza con el nombre de tu base de datos
$username = 'root';  // Reemplaza con tu usuario de base de datos
$password = '';  // Reemplaza con tu contraseña de base de datos

try {
    // Crear una nueva conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Configurar el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Comprobar si se recibió una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recoger y sanitizar los datos del formulario
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellidos = htmlspecialchars($_POST['Apellidos']);
        $identificacion = htmlspecialchars($_POST['identificacion']);
        $direccion = htmlspecialchars($_POST['direccion']);
        $tipo_evento = htmlspecialchars($_POST['vehiculo']);
        $fecha_hora_llegada = htmlspecialchars($_POST['fecha-hora-llegada']);
        $email = htmlspecialchars($_POST['email']);
        $telefono = htmlspecialchars($_POST['telefono']);
        $cant_personas = htmlspecialchars($_POST['cant_personas']);
        $cantidad_ninos = isset($_POST['cantidad-ninos']) ? htmlspecialchars($_POST['cantidad-ninos']) : NULL;
        $rango_edades = isset($_POST['rango-edades']) ? htmlspecialchars($_POST['rango-edades']) : NULL;

        // Preparar la sentencia SQL con placeholders
        $sql = "INSERT INTO eventos (nombres, apellidos, identificacion, direccion, tipo_evento, fecha_hora_llegada, email, telefono, cant_personas, cantidad_ninos, rango_edades) 
                VALUES (:nombre, :apellidos, :identificacion, :direccion, :tipo_evento, :fecha_hora_llegada, :email, :telefono, :cant_personas, :cantidad_ninos, :rango_edades)";

        $stmt = $pdo->prepare($sql);

        // Ejecutar la sentencia SQL con los datos del formulario
        if ($stmt->execute([
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':identificacion' => $identificacion,
            ':direccion' => $direccion,
            ':tipo_evento' => $tipo_evento,
            ':fecha_hora_llegada' => $fecha_hora_llegada,
            ':email' => $email,
            ':telefono' => $telefono,
            ':cant_personas' => $cant_personas,
            ':cantidad_ninos' => $cantidad_ninos,
            ':rango_edades' => $rango_edades
        ])) {
            // Mostrar una alerta de JavaScript y redirigir al usuario
            echo "<script>
                    alert('REGISTRO EXITOSO °_°');
                    window.location.href = 'inicio.html';
                  </script>";
        } else {
            echo "Error al registrar el evento.";
        }
    }
} catch (PDOException $e) {
    // Manejo de errores de conexión y ejecución SQL
    echo 'Error en la conexión a la base de datos: ' . $e->getMessage();
}
?>

