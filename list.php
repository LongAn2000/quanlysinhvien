<?php
require_once('dbhelp.php');
require_once('delete.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quan ly sinh vien</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">QUẢN LÝ THÔNG TIN SINH VIÊN<a href="index.php" target="_self" style="background-color: white;margin-left:800px;"> Log out</a></div>
            <form action="" method="" GET>
                <input type="text" name="search" class="form-control" style="margin-top:15px; margin-bottom:15px;" placeholder="Tìm kiếm theo tên">
            </form>
            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Họ và tên</th>
                            <th>Tuổi</th>
                            <th>Địa chỉ</th>
                            <th width="60px"></th>
                            <th width="60px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['search']) && $_GET['search'] != '') {
                            $sql = 'SELECT * FROM student WHERE fullname like"%' . $_GET['search'] . '%"';
                        } else {
                            $sql = 'SELECT * FROM student';
                        }

                        $studentList = executeResult($sql);
                        $index = 1;
                        foreach ($studentList as $value) {
                            echo '<tr>
                                    <td>' . $index++ . '</td>
                                    <td>' . $value['fullname'] . '</td>
                                    <td>' . $value['age'] . '</td>
                                    <td>' . $value['address'] . '</td>
                                    <td><button class="btn btn-success"><a href="update.php?id=' . $value['id'] . '" target="_self">Update</button></td>
                                    <td><button class="btn btn-danger"><a href="?delete_id=' . $value['id'] . '" target="_self">Delete</button></td>
                                </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                <button class="btn btn-info"><a href="input.php" target="_self"> Add Student</a></button>
            </div>
        </div>
    </div>
</body>

</html>