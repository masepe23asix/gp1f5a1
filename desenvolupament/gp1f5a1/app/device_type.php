<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecció del tipus de dispositiu</title>
    <style>
        body {font-family: Arial, sans-serif; padding: 0 10%;}
        h1 {color: #2c3e50;}
        form {display: flex; flex-direction: column; justify-content: center; align-items: center; height: 50vh;}
        label {color: #34495e; margin-bottom: 10px;}
        select, input[type='submit'] {padding: 10px 20px; margin-bottom: 20px;}
        input[type='submit'] {background-color: #3498db; border: none; color: white; cursor: pointer;}
        input[type='submit']:hover {background-color: #2980b9;}
    </style>
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
