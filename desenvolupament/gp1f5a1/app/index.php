<?php
session_start();
echo "<h1>Benvingut a l'aplicació de configuració de CISCO</h1>";
echo "<p>Aquesta aplicació et guiarà a través del procés de configuració inicial d'un dispositiu CISCO.</p>";
echo "<form method='post' action='device_type.php'>";
echo "<input type='submit' value='Començar'>";
echo "</form>";
?>
