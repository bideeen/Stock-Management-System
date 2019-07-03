<?php

include ('db/config.php');

    
    $id=$_REQUEST['id'];
    $query = "DELETE FROM supplier WHERE supplier_no = '$id'"; 
    $result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli));
    header("Location: suppliers.php");

?>