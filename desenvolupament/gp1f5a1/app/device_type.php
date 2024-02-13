<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['device_type'])) {
        $_SESSION['device_type'] = $_POST['device_type'];
        header("Location: device_config.php");
        exit;
    }
}

echo "<h1>Selección del tipo de dispositivo</h1>";
echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
echo "<label for='device_type'>Tipo de dispositivo:</label>";
echo "<select name='device_type'>";
echo "<option value='Router'>Router</option>";
echo "<option value='Switch'>Switch</option>";
echo "</select>";
echo "<input type='submit' value='Siguiente'>";
echo "</form>";
?>
