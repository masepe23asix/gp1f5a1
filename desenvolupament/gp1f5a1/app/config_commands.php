<?php
session_start();
echo "<h1>Ordres de configuració</h1>";

// Verificar si s'han enviat les dades del formulari
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['device_type'])) {
    $_SESSION['hostname'] = $_POST['hostname'];
    $_SESSION['banner'] = $_POST['banner'];
    $_SESSION['password'] = $_POST['password'];

    if ($_SESSION['device_type'] == 'Router') {
        $_SESSION['ip_router'] = $_POST['ip_router'];
        $_SESSION['serial_router'] = $_POST['serial_router'];
        $_SESSION['serial_clock'] = $_POST['serial_clock'];
        $_SESSION['routing'] = $_POST['routing'];

        $config_commands = "Router(config)# hostname " . $_SESSION['hostname'] . "\n";
        $config_commands .= "Router(config)# banner motd " . $_SESSION['banner'] . "\n";
        $config_commands .= "Router(config)# enable secret " . $_SESSION['password'] . "\n";
        $config_commands .= "Router(config)# ip address " . $_SESSION['ip_router'] . "\n";
        $config_commands .= "Router(config)# serial " . $_SESSION['serial_router'] . "\n";
        $config_commands .= "Router(config)# clock rate " . $_SESSION['serial_clock'] . "\n";
        $config_commands .= "Router(config)# ip routing " . $_SESSION['routing'] . "\n";
    } elseif ($_SESSION['device_type'] == 'Switch') {
        $_SESSION['ip_switch'] = $_POST['ip_switch'];
        $_SESSION['time'] = $_POST['time'];

        $config_commands = "Switch(config)# hostname " . $_SESSION['hostname'] . "\n";
        $config_commands .= "Switch(config)# banner motd " . $_SESSION['banner'] . "\n";
        $config_commands .= "Switch(config)# enable secret " . $_SESSION['password'] . "\n";
        $config_commands .= "Switch(config)# ip address " . $_SESSION['ip_switch'] . "\n";
        $config_commands .= "Switch(config)# clock set " . $_SESSION['time'] . "\n";
    }

    echo "<pre>$config_commands</pre>";
} else {
    echo "No s'han rebut dades del formulari o el tipus de dispositiu no està definit.";
}
?>
