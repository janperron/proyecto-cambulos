<?php
// Conexión a la base de datos
$servername = "localhost"; // Cambia esto al nombre de tu servidor
$username = "tu_usuario"; // Cambia esto a tu nombre de usuario
$password = "tu_contraseña"; // Cambia esto a tu contraseña
$dbname = "nombre_base_datos"; // Cambia esto al nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$identificacion = $_POST['identificacion'];
$vehiculo = $_POST['vehiculo'];
$placa = $_POST['placa'];
$fecha_hora_llegada = $_POST['fecha-hora-llegada'];
$email = $_POST['email'];
$ciudad = $_POST['ciudad'];
$telefono = $_POST['telefono'];
$destino = $_POST['destino'];
$cant_personas = $_POST['cant_personas'];
$viaja_con_menores = $_POST['viaja-con-menores'];

// Datos adicionales solo si viaja con menores
$cantidad_ninos = isset($_POST['cantidad-ninos']) ? $_POST['cantidad-ninos'] : null;
$rango_edades = isset($_POST['rango-edades']) ? $_POST['rango-edades'] : null;

// Consulta para insertar los datos en la tabla de reservas
$sql = "INSERT INTO reservas (nombre, apellidos, identificacion, vehiculo, placa, fecha_hora_llegada, email, ciudad, telefono, destino, cant_personas, viaja_con_menores, cantidad_ninos, rango_edades)
        VALUES ('$nombre', '$apellidos', '$identificacion', '$vehiculo', '$placa', '$fecha_hora_llegada', '$email', '$ciudad', '$telefono', '$destino', '$cant_personas', '$viaja_con_menores', '$cantidad_ninos', '$rango_edades')";

// Ejecutar la consulta y verificar si se insertaron los datos correctamente
if ($conn->query($sql) === TRUE) {
    echo "Reserva realizada con éxito.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>