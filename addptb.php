<?php
    session_start();
    $bid=$_SESSION['bedid'];
    include "connectdb.php";
    $id=$_POST['pids'];
    $sql="SELECT `ID`, `First name`, `Last name` FROM `patient details` WHERE ID=$id";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $pname=$row['First name']." ".$row['Last name'];
    $today=date("y-m-d");
    $sql="UPDATE `rooms` SET Occupancy=1, `Patient Name`='$pname', PID=$id, `Allocate Date`='$today' WHERE `Bed number`=$bid";
    $conn->query($sql);
    //header("location: Login.php");
    header('location:allocateBeds.php');
?>