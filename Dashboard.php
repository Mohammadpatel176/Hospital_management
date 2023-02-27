<?php
    session_start();
    include "connectdb.php";

    $sql="SELECT * FROM `to do`";
    $result1=$conn->query($sql);

    if(isset($_POST['add'])){
        $todo=$_POST['item'];
        $sqli = "INSERT INTO `to do`(`Item`) VALUES('$todo')";
        $conn->query($sqli);
        header("location: Dashboard.php");
    }
?>

<?php
    $noPatient="SELECT COUNT(ID) AS C FROM `patient details` WHERE ID>10001";
    $result=$conn->query($noPatient);
    $row1=$result->fetch_assoc();
    $patientCount=$row1['C'];

    $noDoctors="SELECT COUNT(ID) AS C FROM `doctors`";
    $result2=$conn->query($noDoctors);
    $row2=$result2->fetch_assoc();
    $doctorCount=$row2['C']-1;

    $dat=date('y-m-d');
    $noOperation="SELECT COUNT(OID) AS C FROM `operation` WHERE `Date`='$dat'";
    $result3=$conn->query($noOperation);
    $row3=$result3->fetch_assoc();
    $operationCount=$row3['C'];

    $noBeds="SELECT COUNT(`Bed number`) AS C FROM `rooms` WHERE Occupancy=1 AND `Room type`='general'";
    $result4=$conn->query($noBeds);
    if($result4->num_rows>0){
        $row4=$result4->fetch_assoc();
        $generalBedCount=$row4['C'];
    }else{
        $generalBedCount=0;
    }
    $noBeds="SELECT COUNT(`Bed number`) AS C FROM `rooms` WHERE Occupancy=1 AND `Room type`='special'";
    $result4=$conn->query($noBeds);
    if($result4->num_rows>0){
        $row4=$result4->fetch_assoc();
        $specialBedCount=$row4['C'];
    }else{
        $specialBedCount=0;
    }

    $notask="SELECT COUNT(ID) AS C FROM `to do`";
    $result6=$conn->query($notask);
    if($result6->num_rows>0){
        $app=($result6->fetch_assoc())['C'];
    }else{$app=0;}

    $noPayments="SELECT COUNT(CID) AS C, SUM(Charge) AS S FROM charges WHERE Pending=1";
    $result5=$conn->query($noPayments);
    if($result5->num_rows>0){
        $row5=$result5->fetch_assoc();
        $No=$row5['C'];
        $totalCharge=$row5['S'];
    }else{
        $No=0;
        $totalCharge=0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script><!-- icons for navigation links -->
    <link rel="stylesheet" href="dashboard.css">
    <title>LIFE</title>
    <script>

    function deleteTask(ids){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("rep").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","clearTask.php?q="+ids,true);
        xmlhttp.send();
    }
</script>
</head>
<body id="rep">
    <table>
        <tr>
            <td>
                <div id="i">
                    <i class="fa-solid fa-users"></i>
                    <h2>Patients <br> <span><?php echo $patientCount; ?></span></h2>
                </div>
            </td>
            <td>
                <div id="ii">
                    <i class="fa-solid fa-user-doctor"></i>
                    <h2>Doctors <br> <span><?php echo $doctorCount; ?></span></h2>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div id="iii">
                    <i class="fa-solid fa-calendar-check"></i>
                    <h2>Tasks Left <br> <span><?php echo $app; ?></span></h2>
                </div>
            </td>
            <td>
                <div id="iv">
                    <i class="fa-solid fa-house-medical"></i>
                    <h2>Operation/Surgery <br> <span><?php echo $operationCount; ?></span></h2>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div id="v">
                    <i class="fa-solid fa-bed-pulse"></i>
                    <h2>Beds <br><span> General &nbsp;&nbsp;&nbsp;&nbsp;Special <br> <?php echo $generalBedCount; ?>/250 &emsp; <?php echo $specialBedCount; ?>/100</span></h2>
                </div>
            </td>
            <td>
                <div id="vi">
                    <i class="fa-solid fa-money-bill"></i>
                    <h2>Payment's left <br><span><?php echo $No; ?> | ₹ <?php echo $totalCharge; ?></span></h2>
                </div>
            </td>
        </tr>
    </table>

    <section>
        <form action="" method="post">
            <h2>To do's </h2>
            <input type="text" name="item" required>
            <input type="submit" value="Add to Task" name="add">
        </form>
        <table id="tb">
            <tr>
                <th colspan="2" style="background-color: #5800ff;">Tasks</th>
            </tr>
            <?php
                while($row=$result1->fetch_assoc()){
                    $id=$row['ID'];
                    echo '
                        <tr>
                            <td style="width:25px;"><input type="checkbox" onchange="deleteTask('.$id.')"></td>
                            <td id='.$id.'>'.$row['Item'].'</td>
                        </tr>
                    ';
                }
            ?>
        </table>
    </section>
</body>
</html>