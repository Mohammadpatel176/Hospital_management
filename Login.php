<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital management system";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $wrong=$userName="";

    $Username=$pass="";
    if(isset($_POST['login'])){
        $userName=$_POST['username'];
        $pass=$_POST['password'];
        $userName = strtolower($userName);

        $sql = "SELECT * FROM `logins` WHERE `UserId`='$userName' AND `Password`= BINARY'$pass'";
        //echo $sql;
        $result = $conn->query($sql);
        if($result->num_rows>0){
            session_start();
            //echo "<script>alert('Login successfull')</script>";
            $row=$result->fetch_assoc();
            $_SESSION['username'] = $userName;
            $_SESSION['usertype'] = $row['UserType'];
            
            header("location: home.php");
        }else{
            $userName = $_POST['username'];
            $wrong = "<p>Wrong Username/Password</p>";   
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Hospital Logo.png" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <title>LIFE Login</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
        }
        body{
            display: flex;
            overflow: hidden;
        }
        div{
            height: 100vh;
            width: 60%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        img{
            height: 60vh;
            width: auto;
        }
        div:last-child{
            background-color: #5800ff;
            width: 60%;
            clip-path: polygon(30% 0%, 100% 0%, 100% 100%, 0% 100%);
        }
        form{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: white;
            border-radius: 10px;
            padding: 35px;
            margin-right: -130px;
        }
        h1{
            margin-bottom: 15px;
        }
        input{
            width: 220px;
            height: 20px;
            padding: 10px;
            font-size: 16px;
            color: #333;
            border-radius: 5px;
            outline: none;
            border: none;
            background-color: #eeefff;
        }
        input[type="submit"]{
            width: 120px;
            height: auto;
            border: 2px solid #5800ff;
            transition: 0.3s;
            color: #5800ff;
            font-weight: 500;
        }
        input[type="submit"]:hover{
            background-color: #5800ff;
            color: #eeefff;
        }
        p{
            background-color: #ffeeee;
            padding: 10px;
            color: red;
            width: 220px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        #h{
            background: linear-gradient(109deg, #5800ff 84%, #fff 84%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 3rem;
            z-index: 10;
        }
    </style>
</head>
<body>
    <h1 id="h">LIFE Multispeciality Hospital</h1>

    <div>
        <img src="MainPage.png" alt="">
    </div>

    <div>
        <form method="POST" action="">
            <h1>Login</h1>
            <?php echo $wrong ?>
            <input type="text" name="username" placeholder="Username" value="<?php echo $userName ?>"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="submit" value="Login" name="login">
        </form>
    </div>

    
</body>
</html>