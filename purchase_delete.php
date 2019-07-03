<?php

include ('db/config.php');



    $id=$_REQUEST['id'];
    $query = "DELETE FROM purchase WHERE purchase_no = '$id'"; 
    $result = mysqli_query($mysqli,$query) or die ( mysqli_error($mysqli));
    header("Location: purchase.php");

?>