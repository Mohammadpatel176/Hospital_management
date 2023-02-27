<?php
    include "connectdb.php";
    $sql = "SELECT `Bed number`, `Room type`, `PID`, `Patient Name`, `Room charge`, `Occupancy` FROM `rooms`";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script><!-- icons for navigation links -->
    <link rel="stylesheet" href="allocateBeds.css">
    <link rel="shortcut icon" href="hospital logo.png" type="image/x-icon">
    <title>LIFE</title>
</head>
<body>
    <div id="topper">
        <button id="generalward" class="active" onclick="generals()">General Ward</button>
        <button id="specialward"  onclick="specials()">Special Ward</button>
    </div>

    <section id="general">
        <?php
            $sql = "SELECT `Bed number`, `Room type`, `PID`, `Patient Name`, `Room charge`, `Occupancy` FROM `rooms` WHERE `Room type` = 'General'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
                if($row['Occupancy']==1){
                    $bgcolors="rgba(255,0,0,0.3)";
                    $color="red";
                }
                else{
                    $bgcolors="rgba(0,255,0,0.3)";
                    $color="green";
                }
                $rs=$row["Bed number"];
                echo "
                    <div id='$rs' onclick='submitPatient($rs)' style='background-color: $bgcolors; color: $color;'>
                        <i class='fa-solid fa-bed'></i>
                        <p>Bed-$rs</p>
                    </div>
                ";
            }
        ?>
    </section>
    <div id="fake"></div>
    <section id="special">
        <?php
            $sql = "SELECT `Bed number`, `Room type`, `PID`, `Patient Name`, `Room charge`, `Occupancy` FROM `rooms` WHERE `Room type` = 'Special'";
            $result=$conn->query($sql);
            while($row=$result->fetch_assoc()){
                if($row['Occupancy']==1){
                    $bgcolors="rgba(255,0,0,0.3)";
                    $color="red";
                }
                else{
                    $bgcolors="rgba(0,255,0,0.3)";
                    $color="green";
                }
                $rs=$row['Bed number'];
                echo "
                    <div id='$rs'  onclick='submitPatient($rs)' style='background-color: $bgcolors; color: $color;'>
                        <i class='fa-solid fa-bed'></i>
                        <p>Bed-$rs</p>
                    </div>
                ";
            }
        ?>
    </section>

    <!-- Bed occupancy details -->

    <section id="beddetails">
        
    </section>
    <script>
        document.getElementById("special").style.display="none";
        function specials(){
            document.getElementById("special").style.display="flex";
            document.getElementById("general").style.display="none";
            document.getElementById('generalward').style.color="black";
            document.getElementById('specialward').style.color="rgb(88,0,255)";
        }
        function generals(){
            document.getElementById('special').style.display="none";
            document.getElementById('general').style.display="flex";
            document.getElementById('generalward').style.color="rgb(88,0,255)";
            document.getElementById('specialward').style.color="black";
        }
        function iPatient(){
            document.getElementById('addpatient').style.display = "block";
        }
        function removePatient(){
            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("fake").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","removebeduser.php?q="+0,true);
            xmlhttp.send();
            location.assign("allocateBeds.php");
        }
        function submitPatient(str){
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("beddetails").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getBedDetails.php?q="+str,true);
                xmlhttp.send();
            }
            document.getElementById('beddetails').style.display="block";
        }
        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }
    </script>
</body>
</html>