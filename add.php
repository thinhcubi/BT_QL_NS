<?php
require_once "EmployeeManager.php";
include_once "Employee.php";


//  $employee = new Employee($data);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = [
            'name' => $_POST['name'],
            'date' => $_POST['date'],
            'address' => $_POST['address'],
            'position' => $_POST['position']
        ];
        EmployeeManager::add($data);
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
        <tr>
            <td>Ten</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>Nam sinh</td>
            <td><input type="text" name="date"></td>
        </tr>
        <tr>
            <td>Dia chi</td>
            <td><input type="text" name="address"></td>
        </tr>
        <tr>
            <td>Vi tri</td>
            <td><input type="text" name="position"></td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit">Luu</button>
            </td>
            <td><a href="index.php">Quay lai</a></td>
        </tr>
    </table>
</form>
</body>
</html>
