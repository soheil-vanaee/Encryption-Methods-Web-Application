<!DOCTYPE html>
<html>
<head>
    <title>Encryption Methods</title>
</head>
<style>
    body {
        background-color: #f0f2f5;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    h1 {
        background-color: #3b5998;
        color: #fff;
        padding: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        padding: 25px;
        padding-right: 35px;
        margin: 0 auto;
        max-width: 400px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #3b5998;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #29487d;
    }

    p {
        font-size: 18px;
        color: #333;
    }
</style>
<body>
    <h1>Encryption Methods</h1>
    <form method="post">
        <label for="input">Enter a value:</label>
        <input type="text" name="input" id="input" required>
        <label for="method">Choose encryption method:</label>
        <select name="method" id="method">
            <option value="hex">HEX</option>
            <option value="bcrypt">Bcrypt</option>
            <option value="base64">Base64</option>
        </select>
        <input type="submit" value="Encrypt">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST["input"];
        $method = $_POST["method"];
        $encryptedValue = "";

        switch ($method) {
            case "hex":
                $encryptedValue = bin2hex($input);
                break;
            case "bcrypt":
                $salt = password_hash("your_salt_here", PASSWORD_BCRYPT);
                $encryptedValue = password_hash($input, PASSWORD_BCRYPT, ['salt' => $salt]);
                break;
            case "base64":
                $encryptedValue = base64_encode($input);
                break;
        }

        echo "<p>Encrypted value using $method: $encryptedValue</p>";
    }
    ?>
</body>
</html>
