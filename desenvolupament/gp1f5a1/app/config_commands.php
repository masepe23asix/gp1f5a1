<?php
session_start();

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<style>";
echo "body {font-family: Arial, sans-serif; padding: 0 10%;}";
echo "h1 {color: #2c3e50;}";
echo "form {display: flex; flex-direction: column; justify-content: center; align-items: center; height: 50vh;}";
echo "label {color: #34495e; margin-bottom: 10px;}";
echo "input[type='text'], input[type='password'], input[type='number'], select {padding: 10px 20px; margin-bottom: 20px;}";
echo "input[type='submit'] {padding: 10px 20px; background-color: #3498db; border: none; color: white; cursor: pointer;}";
echo "input[type='submit']:hover {background-color: #2980b9;}";
echo "</style>";
echo "</head>";
echo "<body>";
echo "<h1>Ordres de configuració per el " . $_COOKIE['device_type'] . "</h1>";

// Verificar si s'han enviat les dades del formulari
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_COOKIE['device_type'])) {
    $_SESSION['hostname'] = $_POST['hostname'];
    $_SESSION['banner_autoritzats'] = $_POST['banner_autoritzats'];
    $_SESSION['banner'] = $_POST['banner'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['consola'] = $_POST['consola'];
    $_SESSION['ip_interface_1'] = $_POST['ip_interface_1'];
    $_SESSION['mascara_interface_1'] = $_POST['mascara_interface_1'];
    $_SESSION['ip_interface_2'] = $_POST['ip_interface_2'];
    $_SESSION['mascara_interface_2'] = $_POST['mascara_interface_2'];
    $_SESSION['ip_serial_interface_1'] = $_POST['ip_serial_interface_1'];
    $_SESSION['mascara_serial_interface_1'] = $_POST['mascara_serial_interface_1'];
    $_SESSION['ip_serial_interface_2'] = $_POST['ip_serial_interface_2'];
    $_SESSION['mascara_serial_interface_2'] = $_POST['mascara_serial_interface_2'];

    if ($_COOKIE['device_type'] == 'Router') {
        $config_commands = "Router>enable \n";
        $config_commands .= "Router#conf t \n";
        $config_commands .= "Router(config)# hostname " . $_SESSION['hostname'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config)#line console " . $_SESSION['consola'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#password " . $_SESSION['password'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#line vty " . $_SESSION['line_vty'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#password " . $_SESSION['password'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)# banner motd \"" . $_SESSION['banner_autoritzats'] . "\"\n";
        $config_commands .= $_SESSION['hostname'] . "(config)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "#clock set " . $_SESSION['serial_clock'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "#show clock \n";

        $config_commands .= $_SESSION['hostname'] . "#show ip interface brief \n";
        $config_commands .= $_SESSION['hostname'] . "#conf t \n";
        $config_commands .= $_SESSION['hostname'] . "(config)# ip routing \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#interface fastethernet0/0 \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#ip address" . $_SESSION['ip_interface_1'] . " " . $_SESSION['mascara_interface_1'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#no shutdown \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#interface fastethernet0/1 \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#ip address " . $_SESSION['ip_interface_2'] . " " . $_SESSION['mascara_interface_2'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#no shutdown \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#exit \n";
    
        $config_commands .= $_SESSION['hostname'] . "(config)#interface serial0/3/0 \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#ip address " . $_SESSION['ip_serial_interface_1'] . " " . $_SESSION['mascara_serial_interface_1'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#no shutdown \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#interface serial0/3/1 \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#ip address " . $_SESSION['ip_serial_interface_2'] . " " . $_SESSION['mascara_serial_interface_2'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#no shutdown \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#exit \n";
        
        $config_commands .= $_SESSION['hostname'] . "(config)#show ip interface brief \n";
        $config_commands .= $_SESSION['hostname'] . "(config)#show ip route \n";
        $config_commands .= $_SESSION['hostname'] . "(config)#copy running-config startup-config \n";
        
        $config_commands .= "Router#conf t \n";

        $config_commands .= $_SESSION['hostname'] . "(config)# banner motd \"" . $_SESSION['banner'] . "\"\n";
        $config_commands .= $_SESSION['hostname'] . "(config)#exit \n";
        $config_commands .= $_SESSION['hostname'] . "#exit \n";
        $config_commands .= $_SESSION['hostname'] . "\n";

    } elseif ($_COOKIE['device_type'] == 'Switch') {
        $config_commands = "Switch>enable \n";
        $config_commands .= "Switch>#conf t \n";
        $config_commands .= "Switch(config)# hostname " . $_SESSION['hostname'] . "\n";

        $config_commands .= $_SESSION['hostname'] . "#enable secret " . $_SESSION['password'] . "\n";

        $config_commands .= $_SESSION['hostname'] . "(config)#line vty " . $_SESSION['line_vty'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#password " . $_SESSION['password'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#line console " . $_SESSION['consola'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#password " . $_SESSION['password'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config-line)#login \n";
        $config_commands .= $_SESSION['hostname'] . "(config-line)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)# banner motd \"" . $_SESSION['banner_autoritzats'] . "\"\n";
        $config_commands .= $_SESSION['hostname'] . "(config)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "#clock set " . $_SESSION['serial_clock'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "#show clock \n";
        $config_commands .= $_SESSION['hostname'] . "#conf t \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#interface vlan 1 \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#ip address " . $_SESSION['ip_interface_1'] . " " . $_SESSION['mascara_interface_1'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#ip default-gateway" . $_SESSION['ip_serial_interface_1'] . "\n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#no shutdown \n";
        $config_commands .= $_SESSION['hostname'] . "(config-if)#exit \n";

        $config_commands .= $_SESSION['hostname'] . "(config)#show ip interface vlan 1 \n";
        $config_commands .= $_SESSION['hostname'] . "(config)#copy running-config startup-config \n";
    

    }

    echo "<pre>$config_commands</pre>";
    echo "<form method='post' action='index.php'>";
    echo "<input type='submit' value='Tornar al inici'>";
} else {
    echo "No s'han rebut dades del formulari o el tipus de dispositiu no està definit.";
}
?>
