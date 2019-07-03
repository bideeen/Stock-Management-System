<?php

include ('db/config.php');



    $id=$_REQUEST['id'];
    $query = "DELETE FROM sales WHERE sales_no = '$id'"; 
    $result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli));
    header("Location: sales.php");

?>