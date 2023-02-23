<?php
if(isset($_GET['delete_id'])){
    $delete_id = $_GET['delete_id'];
    $sql = 'DELETE FROM student WHERE id = '.$delete_id.'';
    execute($sql);
}