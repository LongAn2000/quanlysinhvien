<?php
function login()
{
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        require_once("sql_connect.php");
        //truy van du lieu
        $query = "SELECT * FROM student WHERE email = '".$email."' AND password = '".$password."'";
        $result = mysqli_query($conn, $query);
        $data = array();
        while($row = mysqli_fetch_array($result, 1)){
            $data[] = $row;
        }
        require_once("sql_close.php");
        if ($data != null && count($data) > 0) {
            header("Location: Welcome.php");
        }
    }
}
