<?php
    $q = intval($_GET['q']);
    include "connectdb.php";
    $sql = "SELECT * FROM `patient details` WHERE ID=$q";
    $result=$conn->query($sql);
    $Total=0;
    
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $ID=$row['ID'];
        $name=$row['First name']." ".$row['Last name'];
        $pnumber=$row['Phone number'];
        $dat=date("d-m-y");

        $sqli="SELECT * FROM `charges` WHERE PID=$ID and Pending=1";
        $res=$conn->query($sqli);
        echo '
        <div id="patient">
            <table id="det" style="width:600px;">
                <tr>
                    <td style="text-align:left;"><h1 style="font-size:35px; color: #5800ff;">LIFE multispeciality hospital</h1></td>
                    <td style="text-align:right;"><img src="Hospital logo.png" alt="" style="display:inline;" width="100px" height="auto"></td>
                </tr>
                <tr>
                    <td><b>Patient Name:</b> '. $name.'</td>
                    <td><b>Patient ID:</b> '. $ID.'</td>
                </tr>
                <tr>
                    <td><b>Phone number:</b> '. $pnumber.'</td>
                    <td><b>Date:</b> '. $dat.'</td>
                </tr>
            </table>
        </div>
    ';
        if($res->num_rows>0){
            echo '
            <div id="billdetails">
            <table style="width:600px;">
                <tr>
                    <th style="width:30px;">ID</th>
                    <th style="width:300px;">Service</th>
                    <th style="width:100px;">Amount(Rs)</th>
                </tr>';
            $number=1;
            while($rows=$res->fetch_assoc()){
                $Total+=$rows['Charge'];
                echo '
                <tr>
                <td>'.$number.'</td>
                <td>'.$rows['Service'].'</td>
                <td>'.$rows['Charge'].'</td>
            </tr>
                ';
                $number+=1;
            }
                echo '<tr style="background-color:#5800ff;color:white;">
                    <td colspan="2" style="text-align:right;">Total:</td>
                    <td>'.$Total.'</td>
                </tr>
            </table>
        </div>
            ';
        }
        else{
            echo '<table>
            <tr><td colspan="3">No Bill payments left</td></tr>
        </table>';
        }
    }else{
        echo "
            <table>
                <tr><td colspan='3'>No User found</td></tr>
            </table>
        ";
    }
    $sqls="UPDATE `charges` SET `Pending`=0 WHERE PID=$q";
    if($conn->query($sqls)){
    }else{
        echo "
            <table>
                <tr><td colspan='3'>No User found</td></tr>
            </table>
        ";
    }
?>