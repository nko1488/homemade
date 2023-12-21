
<?php
session_start();

// авторизован ли пользователь
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    // переадресация на файл
    header("Location: login_form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Таблица с данными об автомобилях</title>
</head>
<body>
    <h1>Таблица с данными об автомобилях</h1>
   
</body>
</html>