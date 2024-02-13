<?php
session_start();
echo "<h1>Configuració del dispositiu</h1>";
echo "<form method='post' action='config_commands.php'>";
echo "<label for='hostname'>Hostname:</label>";
echo "<input type='text' id='hostname' name='hostname'><br>";
echo "<label for='banner'>Banner:</label>";
echo "<input type='text' id='banner' name='banner'><br>";
echo "<label for='password'>Password:</label>";
echo "<input type='password' id='password' name='password'><br>";
// altres camps del formulari
echo "<input type='submit' value='Generar ordres'>";
echo "</form>";
?>
