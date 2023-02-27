<?php
    session_start();
    $q = intval($_GET['q']);
    $patientid=$patientname=$msgbtn=$bcolor=$btn=$func="";
    include "connectdb.php";
    $sql = "SELECT `Bed number`, `Room type`, `PID`, `Patient Name`, `Room charge`, `Occupancy` FROM `rooms` WHERE `Bed number` = $q";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $openbedid=$row['Bed number'];
    $occ=$row['Occupancy'];
    $_SESSION['bedid']=$openbedid;
    $_SESSION['beduser']=$row['PID'];
    if($row['Occupancy']==0){
        $bgcolors="rgba(0,255,0,0.3)";
        $color="green";
        $occ="Not occupied";
        $msgbtn="Add patient to Bed";
        $bcolor="#5800ff";
        $btn="plus";
        $func="iPatient()";
    }
    else{
        $bgcolors="rgba(255,0,0,0.3)";
        $color="red";
        $occ="Occupied";
        $patientid=$row['PID'];
        $patientname=$row['Patient Name'];
        $msgbtn="Discharge";
        $bcolor="red";
        $btn="minus";
        $func="removePatient()";
        //echo $occ." ".$patientid." ".$openbedid;
    }
    $roomcharge=$row['Room charge'];
    $roomtype=$row['Room type'];
    echo "
    <button class='btn' onclick='document.getElementById(`beddetails`).style.display=`none`'><i class='fa-solid fa-arrow-left'></i></button>
    <br><br>
    <table>
        <tr>
            <td><b>Bed Number:</b> $openbedid</td>
            <td><b>Room type:</b> $roomtype</td>
        </tr>

        <tr>
            <td><b>Bed charge:</b> $roomcharge RS</td>
            <td><b>Occupancy:</b> $occ</td>
        </tr>
        <tr>
            <td colspan='2'><button class='button' onclick=$func style='background-color:$bcolor'><i class='fa-solid fa-$btn'></i>$msgbtn</button></td>
        </tr>
    </table>
    "; 
//
    if($row['Occupancy'] == 1){
        echo "         
            <table>
                <tr>
                    <td><b>Patient Id:</b> $patientid</td>
                    <td><b>Patient Name:</b> $patientname</td>
                </tr>
            </table>
        ";
    }else{
        echo "
        <form action='addptb.php' method='post'>
            <table id='addpatient'>
                <tr>
                    <td>Enter Patient Id: <input type='text' name='pids'></td>
                    <td><input class='button' type='submit' name='submits' value='Save'></td>
                </tr>
            </table>
        </form>
        ";
    }
?>