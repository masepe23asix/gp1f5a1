<?php
session_start();
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<style>";
echo "body {font-family: Arial, sans-serif; padding: 0 10%;}";
echo "h1 {color: #2c3e50;}";
echo "p {color: #34495e;}";
echo "form {display: flex; justify-content: center; align-items: center; height: 50vh;}";
echo "input[type='submit'] {padding: 10px 20px; background-color: #3498db; border: none; color: white; cursor: pointer;}";
echo "input[type='submit']:hover {background-color: #2980b9;}";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h1>Benvingut a l'aplicació de configuració de CISCO - 20240226</h1>";
echo "<h1>Proba per la fase C</h1>";
echo "<p>Aquesta aplicació et guiarà a través del procés de configuració inicial d'un dispositiu CISCO.</p>";
echo "<form method='post' action='device_type.php'>";
echo "<input type='submit' value='Començar'>";
echo "</form>";
echo "</body>";
echo "</html>";
?>
