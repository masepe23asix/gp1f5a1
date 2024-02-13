<?php
session_start();
echo "<h1>Ordres de configuració</h1>";
$_SESSION['hostname'] = $_POST['hostname'];
$_SESSION['banner'] = $_POST['banner'];
$_SESSION['password'] = $_POST['password'];
// altres variables de configuració
$config_commands = "hostname " . $_SESSION['hostname'] . "\n";
$config_commands .= "banner " . $_SESSION['banner'] . "\n";
$config_commands .= "enable secret " . $_SESSION['password'] . "\n";
// altres ordres de configuració
echo "<pre>$config_commands</pre>";
?>
