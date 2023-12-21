
<?php
session_start();

// переменные для логина и пароля
$login = "admin";
$password = "password";

// была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // логин и пароль
    $enteredLogin = $_POST["login"];
    $enteredPassword = $_POST["password"];

    // совпадение данных
    if ($enteredLogin == $login && $enteredPassword == $password) {
        // переменная для авторизации
        $_SESSION["authenticated"] = true;

        // 'ссылка' на файл с таблицей
        header("Location: cars_table.php");
        exit();
    } else {
        
        $errorMessage = "Неправильный логин или пароль";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Форма авторизации</title>
</head>
<body>
    <h1>Форма авторизации</h1>
    <?php if (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
    <form method="POST" action="">
        <label for="login">Логин:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Войти">
    </form>
</body>
</html>