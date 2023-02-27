<?php
    include "connectdb.php";
    session_start();
    
    /*$sql = "SELECT * FROM `charges` WHERE `PID`=$pid;
    $result=$conn->query($sql);
    echo "
            <tr>
                <th style='width:100px'>Patient ID</th>
                <th style='width:150px'>Name</th>
                <th style='width:120px'>Phone number</th>
                <th style='width:100px'>Date of birth</th>
                <th style='width:150px'>City</th>
            </tr>
        ";
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $open = $row['ID'];
            echo "<tr onclick='openPatientDetail($open)'>";
            echo "<td style='width:100px'>" . $row['ID'] . "</td>";
            echo "<td style='width:150px'>" . $row['First name'] . " " . $row['Last name'] . "</td>";
            echo "<td style='width:120px'>" . $row['Phone number'] . "</td>";
            echo "<td style='width:100px'>" . $row['Date of birth'] . "</td>";
            echo "<td style='width:150px'>" . $row['City'] . "</td>";
            echo "</tr>";
        }
    }else{
        echo "<tr><td colspan='5' style='text-align:center'>No records found</td></tr>";
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="patientdetails.css">
    <title>LIFE</title>
    <style>
        @media print {
            #dis{
                display: none;
            }
            .bill{
                box-shadow: 0 0 0 white;
                position: absolute;
                top: 50px;
                left: 50px;
            }
        }
        #det tr{
            background-color: white;
        }
    </style>
</head>
<body>
    <div id="dis">
        Enter ID:   
        <input type="text" id="pid">
        <button onclick="showBill()">Get bill</button>
        <button onclick="Prints()">Print Bill</button>
    </div>
    <section class="bill" id="txtHint">
        <!--<div id="patient">
            <table id="det">
                <tr>
                    <td style="text-align:center;"><h1 style="font-size:40px; color: #5800ff;display:inline;">LIFE multispeciality hospital</h1></td>
                    <td style="text-align:right;"><img src="Hospital logo.png" alt="" style="display:inline;" width="100px" height="auto"></td>
                </tr>
                <tr>
                    <td><b>Patient Name:</b> Pratham shah</td>
                    <td><b>Patient ID:</b> 10004</td>
                </tr>
                <tr>
                    <td><b>Phone number:</b> 1234567890</td>
                    <td><b>Date:</b> 11/11/2001</td>
                </tr>
            </table>
        </div>
        <div id="billdetails">
            <table style="width:600px;">
                <tr>
                    <th style="width:30px;">ID</th>
                    <th style="width:300px;">Service</th>
                    <th style="width:100px;">Amount(Rs)</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Patient Admission</td>
                    <td>1000</td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right;">Total:</td>
                    <td>1000</td>
                </tr>
            </table>
        </div>-->
    </section>


    <script>
        function showBill() {
            var str=document.getElementById('pid').value;
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getBill.php?q="+str,true);
                xmlhttp.send();
            }
            document.getElementById('txtHint').style.display="block";
        }

        function Prints(){
            window.print();
        }
    </script>
</body>
</html>