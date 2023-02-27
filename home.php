<?php
    $one=$two=$three=$four=$five=$six=$seven=$usertype=$open="";
    include "connectdb.php";
    session_start();
    if($_SESSION['usertype']==false){
        header("location: Login.php");
    }
    $usertype = $_SESSION['usertype'];
    //$usertype="patient";
    if($usertype == true){
        if($usertype == "admin"){
            $open="Dashboard.php";
            $one = "<a href='Dashboard.php' target='framespot'><i class='fa-solid fa-palette'></i>Dashboard</a>";
            $two = "<a href='newpatient.php' target='framespot'><i class='fa-solid fa-plus'></i>New patient</a>";
            $three = "<a href='patientdetails.php' target='framespot'><i class='fa-solid fa-circle-info'></i>Patient details</a>";
            $four = "<a href='allocatebeds.php' target='framespot'><i class='fa-solid fa-bed-pulse'></i>Allocate beds</a>";
            $five = "<a href='billpayment.php' target='framespot'><i class='fa-solid fa-money-bills'></i>Bill payments</a>";
            $six = "<a href='getOperationDetails.php' target='framespot'><i class='fa-solid fa-house-medical'></i>Operation/Surgery</a>";
            $seven = "<a href='doctorDetails.php' target='framespot'><i class='fa-solid fa-user-doctor'></i></i>Doctors</a>";
        }
        else if($usertype == "doctor"){
            $open="DOCTOR/getPatientDetails.php";
            $one = "<a href='DOCTOR/getPatientDetails.php' target='framespot'><i class='fa-solid fa-circle-info'></i>Patient details</a>";
            //$two = "<a href='' target='framespot'><i class='fa-regular fa-calendar-check'></i>Set Appointment</a>";
        }
        else if($usertype == "patient"){
            $open="PATIENT/myProfile.php";
            $one = "<a href='PATIENT/myProfile.php' target='framespot'><i class='fa-solid fa-circle-info'></i>Your Profile</a>";
            $two = "<a href='PATIENT/treatment.php' target='framespot'><i class='fa-solid fa-hospital-user'></i>Treatment Details</a>";
            $three = "<a href='PATIENT/reports.php' target='framespot'><i class='fa-solid fa-file-waveform'></i>Reports</a>";
            //$four = "<a href='PATIENT/getAppointment.php' target='framespot'><i class='fa-regular fa-calendar-check'></i>Get Appointment</a>";
        }
        else{
            $open="mla.php";
            $one = "<a href='mla.php' target='framespot'><i class='fa-solid fa-plus'></i>Add reports</a>";
        }
    }
    else{
        //header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script><!-- icons for navigation links -->
    <link rel="stylesheet" href="home.css">
    <link rel="shortcut icon" href="hospital logo.png" type="image/x-icon">
    <title>Home</title>
    <style>
        nav{
            border-right: 1px solid white;
        }
    </style>
</head>
<body>
    <nav>
        <img src="Hospital Logo revert.png" alt="" width="250px" height="250px">
        <ul>
            <li><?php echo $one; ?></li>
            <li><?php echo $two; ?></li>
            <li><?php echo $three; ?></li>
            <li><?php echo $four; ?></li>
            <li><?php echo $five; ?></li>
            <li><?php echo $six; ?></li>
            <li><?php echo $seven; ?></li>
        </ul>
    </nav>
    <iframe src="<?php echo $open; ?>" frameborder="0" name="framespot"></iframe>
</body>
</html>