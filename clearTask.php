<?php
    $q = intval($_GET['q']);
    include "connectdb.php";
    $sql="DELETE FROM `to do` WHERE ID=$q";
    $conn->query($sql);
    header("location: Dashboard.php");
?>