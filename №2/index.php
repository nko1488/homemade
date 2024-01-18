<?php
class main{
    private $conn = "";

    function __construct(){
        $this->conn = mysqli_connect("localhost","root","root","database");
    }
    function printOption(){
        $sql = "SELECT * FROM departments";
        $result = mysqli_query($this->conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
        }
    }
    function printTable(){
        $sql = "SELECT * FROM employees e JOIN departments d on e.department_id=d.id";
        $result = mysqli_query($this->conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo '<tr><td>'.$row['full_name'].'</td><td>'.$row['name'].'</td><td>'.$row['position'].'</td></tr>';
        }
    }
    function add($department_id,$full_name,$position){
        $sql = "INSERT INTO employees(`department_id`,`full_name`,`position`) VALUE('$department_id','$full_name','$position')";
        $result = mysqli_query($this->conn,$sql);
    }
}
$cl= new main();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Система учета сотрудников</title>
</head>
<body>
<div style="width:100%">
    <div style="float:left">
<table cellpadding="5" border="1"> 
    <?php
        $cl->printTable();
    ?>
</table>
</div>
<div style="float:left">
<form method="post" action="">
    <select name="department_id">
    <!-- <option value="fullname">Выберите </option> -->
        <?php
            $cl->printOption();
        ?>
    </select><br>
    <input type="text" name="full_name" placeholder="ФИО"required><br>
    <input type="text" name="position" placeholder="должность"required><br>
    <input type="hidden" name="type" value="add">
    <input type="submit" value="Добавить запись">
</form>
</div>
</div>
<?php
if(isset($_POST['type']) && $_POST['type']=="add"){
    $full_name= $_POST['full_name'];
    $position=$_POST['position'];
    $department_id=$_POST['department_id'];
    $cl->add($department_id,$full_name,$position);
    unset($_POST);
}
?>
</body>
</html>