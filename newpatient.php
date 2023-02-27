<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:\xampp\htdocs\Hospital Management System/phpmailer/src/Exception.php';
    require 'C:\xampp\htdocs\Hospital Management System/phpmailer/src/PHPMailer.php';
    require 'C:\xampp\htdocs\Hospital Management Systemd/phpmailer/src/SMTP.php';

    include "connectdb.php";
    $fname=$lname=$pnumber=$email=$gender=$dob=$street=$area=$city=$postcode=$usertype="";
    //$usertype = $_SESSION['usertype'];
    if($usertype == true){

    }
    else{
        //header('location: login.php');
    }
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $pnumber=$_POST['pnumber'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $dob=$_POST['dob'];
        $street=$_POST['street'];
        $area=$_POST['area'];
        $city=$_POST['city'];
        $postcode=$_POST['postcode'];

        $sql = "INSERT INTO `patient details`(`First name`, `Last name`, `Phone number`, `Email`, `Gender`, `Date of birth`, `Street`, `Area`, `City`, `Postal code`) 
        VALUES ('$fname','$lname','$pnumber','$email','$gender','$dob','$street','$area','$city','$postcode')";
        $conn->query($sql);

        $sql = "SELECT ID FROM `patient details` WHERE `Phone number`=$pnumber";
        $result=$conn->query($sql);
        $row=$result->fetch_assoc();
        $id=$row['ID'];
        $sql="INSERT INTO `charges`(`PID`, `Service`, `Charge`) VALUES ($id,'Admission fee',1000)";
        $conn->query($sql);

        $getid="SELECT ID from `Patient details` WHERE `Phone number`=$pnumber";
        $result1=$conn->query($getid);
        $row=$result1->fetch_assoc();
        $pass=substr(strtoupper($lname),-2,2)."pat@".substr($dob,0,4);
        $id=$row['ID'];
        $sql = "INSERT INTO `logins`(`UserID`, `Password`, `UserType`) VALUES ($id,'$pass','patient')";
        $conn->query($sql);

        sendMail($email, $id, $pass);
    }

    function sendMail($Email, $Id, $Password){
        $msg = "Hey this is from LIFE multispeciality hospital \n Your patient ID is: $Id \n Your Password is: $Password";
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth=true;
        $mail->Username='naitiksoni1705@gmail.com';
        $mail->Password='kwtwqbevjibqiewn';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('naitiksoni1705@gmail.com');
        $mail->addAddress($Email);
        $mail->isHTML(true);
        $mail->Subject ='Reset password';
        $mail->Body = $msg;

        $mail->send();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newpatient.css">
    <title>LIFE</title>

</head>
<body>
    <form action="" method="post">
        <h1>Add patient</h1><br>
        <table>
            <tr>
                <td>First name</td>
                <td>Last name</td>
            </tr>

            <tr>
                <td><input type="text" name="fname" required></td>
                <td><input type="text" name="lname" required></td>
            </tr>

            <tr>
                <td>Phone number</td>
                <td>Email</td>
            </tr>

            <tr>
                <td><input type="text" name="pnumber" required></td>
                <td><input type="email" name="email" required></td>
            </tr>

            <tr>
                <td>Gender</td>
                <td>Date of birth</td>
            </tr>

            <tr>
                <td>Male <input type="radio" name="gender" value="Male">&emsp; Female <input type="radio" name="gender" value="Female"></td>
                <td><input type="date" name="dob"></td>
            </tr>

            <tr>
                <td><h3>Address</h3></td>
            </tr>

            <tr>
                <td>Street</td>
                <td>Area</td>
            </tr>

            <tr>
                <td><input type="text" name="street"></td>
                <td><input type="text" name="area"></td>
            </tr>

            <tr>
                <td>City</td>
                <td>Postal code</td>
            </tr>

            <tr>
                <td><input type="text" name="city" required></td>
                <td><input type="text" name="postcode" ></td>
            </tr>
        </table>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>