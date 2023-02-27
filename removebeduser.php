<?php
    include "connectdb.php";
    session_start();
    $q = intval($_GET['q']);
    $pid=$_SESSION['beduser'];
    $bid=$_SESSION['bedid'];
    $sql="SELECT * FROM `rooms` WHERE `Bed number`=$bid";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $after=date_create();
    $before=date_create($row['Allocate Date']);
    $charge=$row['Room charge']*(date_diff($after,$before)->format("%a")==0?1:date_diff($after,$before)->format("%a"));
    $sql="INSERT INTO `charges`(`PID`, `Service`, `Charge`) VALUES ($pid,'Bed occupy charge',$charge)";
    $conn->query($sql);
    $sql="UPDATE `rooms` SET PID=0, `Patient Name`='', Occupancy=0, `Allocate Date`=NULL WHERE `Bed number`=$bid";
    $conn->query($sql);
    header("location: allocateBeds.php");
?>