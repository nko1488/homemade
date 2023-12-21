<!DOCTYPE html>
<html lang="en">
<head>
<style>
        table {
            width: 100%!;(MISSING)
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        .advantages, .disadvantages {
            margin-bottom: 20px;
        }
    </style>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Технические характеристики для каждой модели">
    <title>Характеристики модели</title>
</head>
<body>

<header>
        <h1>Характеристика авто</h1>
        <nav>
            <ul>
            <li><p><a href="index.php">Главная</a></p></li>
                <li><a href="comparison.php">Сравнение</a></li>
                <li><a href="prices.php">Цены</a></li>
                <li><a href="reviews.php">Отзывы</a></li>
                <li><a href="characteristics.php">Характеристика</a></li>
            </ul>
        </nav>
    </header>
    <table>
        <tr>
            <th>Характеристика</th>
            <th>Ока</th>
            <th>VW Lupo</th>
        </tr>
        <tr>
            <td>Мощность двигателя</td>
            <td>35 л.с.</td>
            <td>75 л.с.</td>
        </tr>
        <tr>
            <td>Расход топлива</td>
            <td>6 л/100 км</td>
            <td>5 л/100 км</td>
        </tr>
        <!-- Добавьте другие характеристики здесь -->
    </table>
<?php


// Получаем параметр из запроса (например, ?model=ModelName)
$modelName = isset($_GET['model']) ? $_GET['model'] : '';

// Проверяем, существует ли модель в характеристиках
if (array_key_exists($modelName, $characteristics)) {
    // Выводим заголовок с именем модели
    echo '<h1>' . $modelName . '</h1>';

    // Выводим характеристики модели
    echo '<ul>';
    foreach ($characteristics[$modelName] as $key => $value) {
        echo '<li><strong>' . $key . ':</strong> ' . $value . '</li>';
    }
    echo '</ul>';

    // Мета-теги для ключевых параметров
    echo '<meta name="keywords" content="' . implode(',', array_keys($characteristics[$modelName])) . '">';

} else {
    // Если модель не найдена, выводим сообщение об ошибке
    echo '<p>Модель не найдена.</p>';
}
?>

</body>
</html>