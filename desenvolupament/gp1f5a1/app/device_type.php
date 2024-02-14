<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecció del tipus de dispositiu</title>
</head>
<body>
    <h1>Selecció del tipus de dispositiu</h1>
    <form method='post' action='procesar.php'>
        <label for='device_type'>Tipus de dispositiu:</label>
        <select id='device_type' name='device_type'>
            <option value='Router'>Router</option>
            <option value='Switch'>Switch</option>
        </select>
        <input type='submit' value='Següent'>
    </form>
</body>
</html>

