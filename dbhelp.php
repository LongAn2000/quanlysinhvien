<?php
require_once('config.php');
//ham truy van du lieu insert, update, delete
function execute($sql)
{
    //tao ket noi
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        var_dump($conn->connect_error);
        die();
    }
    //query
    mysqli_query($conn, $sql);
    //dong ket noi
    $conn->close();
}
//su dung cho select du lieu
function executeResult($sql)
{
    //tao ket noi
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        var_dump($conn->connect_error);
        die();
    }
    //query
    $result = mysqli_query($conn, $sql);
    $data =[];
    while($row = mysqli_fetch_array($result, 1)){
        $data[] = $row;
    }
    //dong ket noi
    $conn->close();
    return $data;
}
