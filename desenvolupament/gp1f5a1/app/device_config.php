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

if ($_SESSION['device_type'] == 'Router') {
    echo "<label for='ip_router'>IP Router:</label>";
    echo "<input type='text' id='ip_router' name='ip_router'><br>";
    echo "<label for='serial_router'>Serial Router:</label>";
    echo "<input type='text' id='serial_router' name='serial_router'><br>";
    echo "<label for='serial_clock'>Serial Clock:</label>";
    echo "<input type='text' id='serial_clock' name='serial_clock'><br>";
    echo "<label for='routing'>Habilitació de routing:</label>";
    echo "<input type='text' id='routing' name='routing'><br>";
} elseif ($_SESSION['device_type'] == 'Switch') {
    echo "<label for='ip_switch'>IP Switch:</label>";
    echo "<input type='text' id='ip_switch' name='ip_switch'><br>";
    echo "<label for='time'>Hora:</label>";
    echo "<input type='text' id='time' name='time'><br>";
}

echo "<input type='submit' value='Generar ordres'>";
echo "</form>";
?>
