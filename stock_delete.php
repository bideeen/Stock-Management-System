<?php

include ('db/config.php');

    $id=$_REQUEST['id'];
    $query = "DELETE FROM stock WHERE stock_no = '$id'"; 
    $result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli));
    header("Location: stock.php"); 
    
?>