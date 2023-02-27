<?php
    include "connectdb.php";
    session_start();
    $today=date("y-m-d");
    $sql = "SELECT * FROM operation WHERE Date>=$today ORDER BY Date";
    $result=$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script><!-- icons for navigation links -->
    <link rel="stylesheet" href="patientdetails.css">
    <title>LIFE</title>
</head>
<body>
    <table>
        <tr>
            <th>Sr no.</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Operation details</th>
            <th>Doctor Name</th>
            <th>Date</th>
            <th>Time</th>
        </tr>

        <?php
            $total=0;
            while($row=$result->fetch_assoc()){
                $id=$row['PID'];
                $sqli="SELECT * FROM `patient details` WHERE ID=$id";
                $re=$conn->query($sqli);
                $rows=$re->fetch_assoc();
                $total+=1;
                echo "
                    <tr>
                        <td>".$total."</td>
                        <td>".$row['PID']."</td>
                        <td>".$rows['First name']." ".$rows['Last name']."</td>
                        <td>".$row['Operation details']."</td>
                        <td>".$row['Doctor name']."</td>
                        <td>".$row['Date']."</td>
                        <td>".$row['Time']."</td>
                    </tr>
                ";
            }
        ?>
    </table>
</body>
</html>