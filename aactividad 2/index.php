<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema para la Validación de Usuarios</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Sistema de Validación para Usuarios</h1>
        </header>

        <div class="form-container">
            <h2>Registrar Nuevo Usuario</h2>
            
            <form action="procesar.php" method="POST" class="user-form">
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" required 
                           placeholder="Ej: Juan Pérez"
                           value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"><br>
                    <small class="help-text">Máximo 50 caracteres. <br> No se permiten caracteres especialesq.</small>
                </div><br>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required
                           placeholder="Ej: usuario@empresa.com"
                           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br>
                    <small class="help-text">Formato válido de email. Dominios permitidos: gmail.com, hotmail.com, outlook.com, outlook.es, yahoo.com</small><br>
                </div><br>

                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="number" id="edad" name="edad" required min="1" max="120"
                           placeholder="Entre 18 y 120 años"
                           value="<?php echo isset($_POST['edad']) ? htmlspecialchars($_POST['edad']) : ''; ?>"><br>
                    <small class="help-text">Debe ser entre 18 y 120 años.</small>
                </div><br>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">✅ Validar y Registrar</button>
                    <button type="reset" class="btn btn-secondary">🔄 Limpiar</button>
                </div>
            </form>
        </div>

        <div class="info-section">
            <h3>🔒 Características de Seguridad:</h3>
            <ul>
                <li>✅ Prevención de SQL Injection</li>
                <li>✅ Validación de formato de email</li>
                <li>✅ Sanitización de caracteres peligrosos</li>
                <li>✅ Protección contra XSS</li>
                <li>✅ Validación de rangos numéricos</li>
            </ul>
        </div>

        <?php
        session_start();
            if (isset($_SESSION['mensaje'])) {
                echo '<div class="mensaje ' . $_SESSION['tipo_mensaje'] . '">' . $_SESSION['mensaje'] . '</div>';
                unset($_SESSION['mensaje']);
                unset($_SESSION['tipo_mensaje']);
            }
        ?>
    </div>
</body>
</html>