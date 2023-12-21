<!DOCTYPE html>
<html>
<head>
    <title>Анализ дней в выбранном месяце</title>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label for="year">Выберите год:</label>
    <select name="year" id="year">
        <?php
        for ($i = 2011; $i <= 2019; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        ?>
    </select>
    <label for="month">Выберите месяц:</label>
    <select name="month" id="month">
        <?php
        $months = [
            'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
        ];
        foreach ($months as $key => $month) {
            echo "<option value='" . ($key + 1) . "'>$month</option>";
        }
        ?>
    </select>
    <input type="submit" value="Показать отчет">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST["year"];
    $month = $_POST["month"];
    $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $first_day_of_month = date('N', strtotime("$year-$month-01"));
    $last_day_of_month = date('N', strtotime("$year-$month-$days_in_month"));
    $mondays_count = 0;
    for ($day = 1; $day <= $days_in_month; $day++) {
        if (date('N', strtotime("$year-$month-$day")) == 1) {
            $mondays_count++;
        }
    }

    echo "<h2>Отчет за $months[$month] $year года:</h2>";
    echo "<p>1) Количество дней в месяце: $days_in_month</p>";
    echo "<p>2) День недели первого дня месяца: " . getDayOfWeek($first_day_of_month) . "</p>";
    echo "<p>   День недели последнего дня месяца: " . getDayOfWeek($last_day_of_month) . "</p>";
    echo "<p>3) Количество понедельников в месяце: $mondays_count</p>";
}

function getDayOfWeek($day) {
    $days = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье'];
    return $days[$day - 1];
}
?>

</body>
</html>