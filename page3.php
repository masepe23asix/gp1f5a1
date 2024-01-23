<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device = $_POST["device"];
    $banner = $_POST["banner"];
    // Obté altres dades del formulari

    // Mostra les ordres de configuració
    echo "<h2>Ordres per configurar el $device amb les dades proporcionades:</h2>";
    echo "<p>Configura el banner: $banner</p>";
    // Mostres d'altres ordres segons les dades recopilades
}
?>

