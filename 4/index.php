<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form</title>
  <!-- Подключение библиотеки Bootstrap -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2>Bootstrap Form</h2>
    <form id="myForm">
      <div class="form-group">
        <label for="textInput1">Введите текст 1:</label>
        <input type="text" class="form-control" id="textInput1">
      </div>
      <div class="form-group">
        <label for="textInput2">Введите текст 2:</label>
        <input type="text" class="form-control" id="textInput2">
      </div>
      <div class="form-group">
        <label for="selectList">Выберите значение:</label>
        <select class="form-control" id="selectList">
          <option value="Значение 1">Значение 1</option>
          <option value="Значение 2">Значение 2</option>
          <option value="Значение 3">Значение 3</option>
          <option value="Значение 4">Значение 4</option>
        </select>
      </div>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Показать результат
      </button>
    </form>
  </div>
  
  <!-- Модальное окно -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Модальный заголовок -->
        <div class="modal-header">
          <h4 class="modal-title">Результат:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Модальное тело -->
        <div class="modal-body">
          <p id="result"></p>
        </div>
        
        <!-- Модальный футер -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Подключение библиотеки JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Подключение библиотеки Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function(){
      // Обработчик нажатия на кнопку
      $(".btn-primary").click(function(){
        // Получение данных из текстовых полей и выпадающего списка
        var text1 = $("#textInput1").val();
        var text2 = $("#textInput2").val();
        var selectValue = $("#selectList").val();
        // Формирование результата
        var result = "Текст 1: " + text1 + "<br>Текст 2: " + text2 + "<br>Выбранное значение: " + selectValue;
        // Вывод результата в модальное окно
        $("#result").html(result);
      });
    });
  </script>
</body>
</html>