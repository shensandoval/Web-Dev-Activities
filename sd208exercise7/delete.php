<?php
    require('db.php');

    $id = $_REQUEST['id'];

    $delete = "DELETE FROM `registration` WHERE id = $id";

    $result = mysqli_query($conn, $delete) or die ("Connect failed: %s\n".mysqli_error($conn));
    header("Location: viewTable.php");
?>