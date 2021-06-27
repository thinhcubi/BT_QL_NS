<?php
include_once "Employee.php";
include_once "EmployeeManager.php";
if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $employees = EmployeeManager::getById($id);
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
</head>
<body>
<form method="post">
    <table>
        <?php foreach($employees as $key => $item): ?>
        <tr>
            <td>Ten</td>
            <td><input type="text" name="name" value="<?php echo $item['name'] ?>"></td>
        </tr>
        <tr>
            <td>Nam sinh</td>
            <td><input type="text" name="date" value="<?php echo $item['date'] ?>"></td>
        </tr>
        <tr>
            <td>Dia chi</td>
            <td><input type="text" name="address" value="<?php echo $item['address'] ?>"></td>
        </tr>
        <tr>
            <td>Vi tri</td>
            <td><input type="text" name="position" value="<?php echo $item['position']?>"></td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td>
                <button type="submit" name="submit">Luu</button>
            </td>
            <td><a href="index.php">Quay lai</a></td>
        </tr>
    </table>
</form>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_REQUEST['id'];
  $data = [
          'name' => $_POST['name'],
          'date' => $_POST['date'],
         'address' => $_POST['address'],
         'position' => $_POST['position'],
];
  $employee = new Employee($data);
  EmployeeManager::edit($id,$employee);
 header('Location: index.php');
}
?>

</body>
</html>
