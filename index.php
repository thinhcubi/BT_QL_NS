<?php
include_once "EmployeeManager.php";
include_once "Employee.php";
session_start();

if(!isset($_SESSION['user'])){
    header('Location: login/Signup.php');
}
if (isset($_REQUEST['logout'])){
    unset($_SESSION['use']);
        session_destroy();
        header('Location: login/Signup.php');
    }

$employees = EmployeeManager::load();
if(isset($_REQUEST['sort'])){
    if($_REQUEST['sort']=='up'){
        $employees = EmployeeManager::sortByDate('up');
    } else {
        $employees = EmployeeManager::sortByDate('down');
    }
}
if(isset($_REQUEST['page'])){
    if($_REQUEST['page']=='delete'){
        $id = $_REQUEST['id'];
        array_splice($employees,$id,1);
        EmployeeManager::save($employees);
        header('Location: index.php');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
<form method="post">
<table class="table table-success table-striped">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Tên</th>
        <th scope="col">Năm sinh</th>
        <th scope="col">Địa chỉ</th>
        <th scope="col">Vị trí</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($employees as $key => $employee): ?>
    <tr>
        <th scope="row"><?php echo $key+1 ?></th>
        <td><?php echo  $employee->name ?></td>
        <td><?php echo  $employee->date ?></td>
        <td><?php echo $employee->address ?></td>
        <td><?php echo $employee->position  ?></td>
    </tr>
  <?php endforeach; ?>
</table>
</form>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>
</html>




