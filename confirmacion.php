<?php
session_start();

// Verifica si hay un mensaje de sesión
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    // Limpia el mensaje después de mostrarlo
    unset($_SESSION['message']);
} else {
    // Redirige a inicio.html si no hay mensaje
    header("Location: inicio.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
            background-color: ;
        }
        .message {
            padding: 20px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="message">
        <?php echo $message; ?>
    </div>

    <script>
        // Redirige después de 3 segundos
        setTimeout(function() {
            window.location.href = "inicio.html";
        }, 5000);
    </script>
</body>
</html>
