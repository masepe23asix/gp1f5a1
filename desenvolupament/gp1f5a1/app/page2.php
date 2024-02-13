<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device = $_POST["device"];
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuració de <?php echo ucfirst($device); ?></title>
</head>
<body>
    <h2>Configuració de <?php echo ucfirst($device); ?></h2>
    <form action="page3.php" method="post">
        <label for="banner">Banner:</label>
        <input type="text" name="banner" required>
        <br>
        
        <br>
        <input type="hidden" name="device" value="<?php echo $device; ?>">
        <input type="submit" value="Següent">
    </form>
</body>
</html>
<?php
}
?>

