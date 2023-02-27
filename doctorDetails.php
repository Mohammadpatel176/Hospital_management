<?php
    include "connectdb.php";
    session_start();
    $sql="SELECT * FROM doctors WHERE ID!=2001";
    $result=$conn->query($sql);

    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $pnumber=$_POST['pnumber'];
        $email=$_POST['email'];
        $department=$_POST['department'];
        $specialization=$_POST['specialization'];
        $room=$_POST['room'];
        $sql="INSERT INTO `doctors`(`Name`, `Phone number`, `Email`, `Department`, `Specialization`, `Room no.`) 
        VALUES ('$name','$pnumber','$email','$department','$specialization','$room')";
        $conn->query($sql);

        $sql="SELECT ID FROM doctors WHERE `Phone number`=$pnumber";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();

        $uid=$row['ID'];
        $pass=substr(strtoupper($name),-3,3)."doc@".substr($uid,0,4);
        $sql="INSERT INTO `logins`(`UserID`, `Password`, `UserType`) VALUES ($uid,'$pass','doctor')";
        $conn->query($sql);

        header("location: doctordetails.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script><!-- icons for navigation links -->
    <link rel="stylesheet" href="patientdetails.css">
    <link rel="shortcut icon" href="hospital logo.png" type="image/x-icon">
    <title>LIFE</title>
    <style>
        form label{
            width:150px;
            height: 30px;
            margin: 10px;
        }
        form{
            width: 320px;
            position: absolute;
            top: calc(50% - 160px);
            left: calc(50% - 180px);
            box-shadow: 0 0 10px grey;
            padding: 40px;
            border-radius: 5px;
            background: white;
            display: none;
        }
        form input[type="submit"]{
            background-color: #5800ff;
            color: white;
            border: none;
            border-radius: 3px;
            transform: translateX(-50%);
        }
        form input{
            float: right;
        }
        form i{
            position: absolute;
            top: 10px;
            right: 10px;
            color: #5800ff;
        }
    </style>
</head>
<body>
    <div>
        <button onclick="openform()"><i class="fa-solid fa-plus"></i> Add New doctor</button>
    </div><br>
    <table>
        <tr>
            <th style="width:70px">ID</th>
            <th style="width:200px">Name</th>
            <th style="width:200px">Department</th>
            <th style="width:400px">Specialization</th>
            <th style="width:120px">Phone number</th>
            <th style="width:80px">Room no.</th>
        </tr>

        <?php
            while($row=$result->fetch_assoc()){
                echo "
                    <tr>
                        <td>".$row['ID']."</td>
                        <td>".$row['Name']."</td>
                        <td>".$row['Department']."</td>
                        <td>".$row['Specialization']."</td>
                        <td>".$row['Phone number']."</td>
                        <td>".$row['Room no.']."</td>
                    </tr>
                ";
            }
        ?>
    </table><br>

    <form action="" method="post" id="frm">
        <i class="fa-solid fa-xmark" onclick="closeform()"></i>
        <label>Name:</label><input type="text" name="name"><br><br>
        <label>Phone number:</label> <input type="text" name="pnumber"><br><br>
        <label>Email:</label> <input type="email" name="email"><br><br>
        <label>Department:</label> <input type="text" name="department"><br><br>
        <label>Specialization:</label> <input type="text" name="specialization"><br><br>
        <label>Room No:</label> <input type="text" name="room"><br><br>
        <input type="submit" value="Submit" name='submit'>
    </form>

    <script>
        var frm = document.getElementById("frm");
        function closeform(){
            frm.style.display="none";
        }
        function openform(){
            frm.style.display="block";
        }
    </script>
</body>
</html>