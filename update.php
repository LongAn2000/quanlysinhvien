<?php
require_once('dbhelp.php');
$fullname = $age = $address = $id = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = 'SELECT * FROM student WHERE id = '.$id.'';
    $student = executeResult($sql);
    if($student != null && count($student) > 0){
        $fullname = $student[0]['fullname'];
        $age = $student[0]['age'];
        $address = $student[0]['address'];
    }else $id = '';
}
if (!empty($_POST)) {
    if (isset($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
    }
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    }
    if (isset($_POST['address'])) {
        $address = $_POST['address'];
    }
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    $sql = "UPDATE student SET fullname = '".$fullname."', age= '".$age."', address = '".$address."' WHERE id = ".$id."";
    execute($sql);
    header("Location: index.php");
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="id" value="<?=$id?>" style="display: none;">
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?=$fullname?>">
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" value="<?=$age?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" value="<?=$address?>">
            </div>
            <button type="submit" class="btn btn-default">Save</button>
        </form>
    </div>
</body>

</html>