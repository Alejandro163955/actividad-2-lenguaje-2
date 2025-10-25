<?php
session_start();

if (!isset($_SESSION['ultimo_usuario'])) {
    header('Location: index.php');
    exit;
}

$usuario = $_SESSION['ultimo_usuario'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Registrado - Sistema de Validación</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <div class="container">
        <header>
            <h1>✅ Usuario Validado Exitosamente</h1>
            <p>Los datos han pasado todas las validaciones de seguridad</p>
        </header>

        <div class="resultado-container">
            <div class="success-card">
                <h2>📋 Datos del Usuario Registrado</h2>

                <div class="user-details">
                    <div class="detail-item">
                        <strong>Nombre:</strong>
                        <span><?php echo htmlspecialchars($usuario['nombre']); ?></span>
                    </div>

                    <div class="detail-item">
                        <strong>Email:</strong>
                        <span><?php echo htmlspecialchars($usuario['email']); ?></span>
                    </div>

                    <div class="detail-item">
                        <strong>Edad:</strong>
                        <span><?php echo $usuario['edad']; ?> años</span>
                    </div>

                    <div class="detail-item">
                        <strong>Fecha de Registro:</strong>
                        <span><?php echo $usuario['fecha_registro']; ?></span>
                    </div>
                </div>

                <div class="security-info">
                    <h3>🔐 Medidas de Seguridad Aplicadas:</h3>
                    <ul>
                        <li>✅ Sanitización de caracteres peligrosos en el nombre</li>
                        <li>✅ Validación de formato de email</li>
                        <li>✅ Verificación de dominio permitido</li>
                        <li>✅ Validación de rango de edad</li>
                        <li>✅ Prevención de inyección SQL</li>
                        <li>✅ Protección contra XSS en output</li>
                    </ul>
                </div>

                <div class="actions">
                    <a href="index.php" class="btn btn-primary">➕ Registrar Otro Usuario</a>
                    <button onclick="window.print()" class="btn btn-secondary">🖨️ Imprimir Comprobante</button>
                </div>
            </div>

            <div class="database-info">
                <h3>💾 Listo para Base de Datos</h3>
                <p>Este usuario está listo para ser almacenado de forma segura en la base de datos.</p>
                <div class="code-example">
                    <strong>Ejemplo de inserción segura:</strong>
                    <pre><code>$stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, edad) VALUES (?, ?, ?)");
$stmt->execute([
    '<?php echo htmlspecialchars($usuario['nombre']); ?>',
    '<?php echo htmlspecialchars($usuario['email']); ?>',
    <?php echo $usuario['edad']; ?>
]);</code></pre>
                </div>
            </div>
        </div>
    </div>

    <?php
    unset($_SESSION['ultimo_usuario']);
    ?>
</body>

</html>