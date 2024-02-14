<?php
if(isset($_POST['device_type'])) {
    
    $dato = $_POST['device_type'];
    
    
    setcookie('device_type', $dato, time() + (86400 * 30), "/"); // 86400 = 1 día

    // Redireccionar a la siguiente página
    header('Location: device_config.php');
    exit;
} else {
    echo "No se recibió ningún dato del formulario.";
}
?>
