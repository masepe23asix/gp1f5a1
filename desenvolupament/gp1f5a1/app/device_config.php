<?php
session_start();

echo "<h1>Configuració del dispositiu</h1>";

if (isset($_COOKIE['device_type'])) {
    echo "<form method='post' action='config_commands.php'>";
    echo "<label for='hostname'>Nom del dispositiu:</label>";
    echo "<input type='text' id='hostname' name='hostname'><br>";

    echo "<label for='password'>Introdueix la contrasenya:</label>";
    echo "<input type='password' id='password' name='password'><br>";

    echo "<label for='consola'>Linea de la consola:</label>";
    echo "<input type='number' id='consola' placeholder='0' name='consola'><br>";

    echo "<label for='line_vty'>Linea VTY:</label>";
    echo "<input type='text' id='line_vty' placeholder='0 15' name='line_vty'><br>";

    echo "<label for='banner_autoritzats'>Introdueix el banner per usuaris autoritzats:</label>";
    echo "<input type='text' id='banner_autoritzats' name='banner_autoritzats'><br>";

    echo "<label for='serial_clock'>Estableix la data i hora:</label>";
    echo "<input type='text' id='serial_clock' placeholder='HH:MM:SS D Month YEAR' name='serial_clock'><br>";
   

    if ($_COOKIE['device_type'] == 'Router') {
        echo "<label for='banner'>Introdueix el banner per usuaris:</label>";
        echo "<input type='text' id='banner' name='banner'><br>";

        echo "<label for='ip_interface_1'>Introdueix la IP de la interficie fastethernet0/0 del router:</label>";
        echo "<input type='text' placeholder='192.168.120.1' id='ip_interface_1' name='ip_interface_1'><br>";
        echo "<label for='mascara_interface_1'>Introdueix la mascara de la interficie fastethernet0/0 del router:</label>";
        echo "<input type='text' placeholder='255.255.255.0' id='mascara_interface_1' name='mascara_interface_1'><br>";

        echo "<label for='ip_interface_2'>Introdueix la IP de la interficie fastethernet0/1 del router:</label>";
        echo "<input type='text' placeholder='192.168.120.1' id='ip_interface_2' name='ip_interface_2'><br>";
        echo "<label for='mascara_interface_2'>Introdueix la mascara de la interficie fastethernet0/0 del router:</label>";
        echo "<input type='text' placeholder='255.255.255.0' id='mascara_interface_2' name='mascara_interface_2'><br>";

        echo "<label for='ip_serial_interface_1'>Introdueix la IP de la interficie serial0/3/0 del router:</label>";
        echo "<input type='text' placeholder='192.168.120.1' id='ip_serial_interface_1' name='ip_serial_interface_1'><br>";
        echo "<label for='mascara_serial_interface_1'>Introdueix la mascara de la interficie serial 0/3/0 del router:</label>";
        echo "<input type='text' placeholder='255.255.255.0' id='mascara_serial_interface_1' name='mascara_serial_interface_1'><br>";

        echo "<label for='ip_serial_interface_2'>Introdueix la IP de la interficie serial0/3/1 del router:</label>";
        echo "<input type='text' placeholder='192.168.120.1' id='ip_serial_interface_2' name='ip_serial_interface_2'><br>";
        echo "<label for='mascara_serial_interface_2'>Introdueix la mascara de la interficie serial 0/3/1 del router:</label>";
        echo "<input type='text' placeholder='255.255.255.0' id='mascara_serial_interface_2' name='mascara_serial_interface_2'><br>";
   

    } elseif ($_COOKIE['device_type'] == 'Switch') {
        echo "<label for='ip_interface_1'>Introdueix la IP de la interficie vlan 1 del switch:</label>";
        echo "<input type='text' placeholder='192.168.120.1' id='ip_interface_1' name='ip_interface_1'><br>";

        echo "<label for='mascara_interface_1'>Introdueix la mascara de la interficie vlan 1 del switch:</label>";
        echo "<input type='text' placeholder='255.255.255.0' id='mascara_interface_1' name='mascara_interface_1'><br>";

        echo "<label for='ip_serial_interface_1'>Introdueix la IP de la gateway per defecte del switch:</label>";
        echo "<input type='text' placeholder='192.168.120.1' id='ip_serial_interface_1' name='ip_serial_interface_1'><br>";

       
    }

    echo "<input type='submit' value='Generar ordres'>";
    echo "</form>";
} else {
    echo "No s'ha seleccionat cap tipus de dispositiu.";
}
?>
