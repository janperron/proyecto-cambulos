<?php
// Configuración de la conexión a la base de datos
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

// Recibir los datos del formulario
$Nombres = $_POST['nombre'];
$Apellidos = $_POST['apellidos'];
$Identificacion = $_POST['identificacion'];
$Vehiculo = $_POST['vehiculo'] == "1" ? "Carro" : "Moto";
$Placa = $_POST['placa'];
$Fecha_hora_llegada = $_POST['fecha-hora-llegada'];
$Email = $_POST['email'];
$Ciudad = $_POST['ciudad'];
$Telefono = $_POST['telefono'];
$Destino = $_POST['destino'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO reservas (Nombres, Apellidos, Identificacion, Vehiculo, Placa, Fecha_hora_llegada, Email, Ciudad, Telefono, Destino)
VALUES ('$Nombres', '$Apellidos', '$Identificacion', '$Vehiculo', '$Placa', '$Fecha_hora_llegada', '$Email', '$Ciudad', '$Telefono', '$Destino')";

if ($conn->query($sql) === TRUE) {
    // Mostrar una alerta de JavaScript y redirigir al usuario
    echo "<script>
            alert('REGISTRO EXITOSO °_°');
            window.location.href = 'inicio.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
