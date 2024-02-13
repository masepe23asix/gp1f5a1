<?php
session_start();
echo "<h1>Selecció del tipus de dispositiu</h1>";
echo "<form method='post' action='device_config.php'>";
echo "<label for='device_type'>Tipus de dispositiu:</label>";
echo "<select name='device_type'>";
echo "<option value='Router'>Router</option>";
echo "<option value='Switch'>Switch</option>";
echo "</select>";
echo "<input type='submit' value='Següent'>";
echo "</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['device_type'] = $_POST['device_type'];
}
?>
