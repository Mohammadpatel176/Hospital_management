<?php
    include "connectdb.php";
    $conns=$conn;
    session_start();
    if(isset($_POST['submit'])){
        $id=$_COOKIE['Userids'];
        
        
        $radiology = $_FILES['radiology']['name'];
        $pathology = $_FILES['pathology']['name'];
        $laboratory = $_FILES['laboratory']['name'];

        $file_tmp1 = $_FILES['radiology']['tmp_name'];
        $file_tmp2 = $_FILES['pathology']['tmp_name'];
        $file_tmp3 = $_FILES['laboratory']['tmp_name'];

        if($_FILES['radiology']['size']>0){
            move_uploaded_file($file_tmp1,"./reports/".$radiology);
            $sql = "UPDATE `patient details` SET `Radiology reports`='$radiology' WHERE ID=$id";
            $conns->query($sql);
        }
        if($_FILES['pathology']['size']>0){
            move_uploaded_file($file_tmp2,"./reports/".$pathology);
            $sql = "UPDATE `patient details` SET `Pathology reports`='$pathology' WHERE ID=$id";
            $conns->query($sql);
        }
        if($_FILES['laboratory']['size']>0){
            move_uploaded_file($file_tmp3,"./reports/".$laboratory);
            $sql = "UPDATE `patient details` SET `Laboratory reports`='$laboratory' WHERE ID=$id";
            $conns->query($sql);
        }

    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/09d21e6cd0.js" crossorigin="anonymous"></script><!-- icons for navigation links -->
    <link rel="shortcut icon" href="hospital logo.png" type="image/x-icon">
    <link rel="stylesheet" href="mla.css">
    <title>LIFE</title>
</head>
<body>
    <div>
        Enter Patient ID: <input type="text" name="userid" id="t">
        <button onclick="displayDocs()">Get</button>
    </div><br><br>
    <form action="" method="post" id="frm" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Radiology Report</th>
                <th>Pathology Report</th>
                <th>Laboratory Report</th>
            </tr>
            <tr>
                <td><input type="file" name="radiology"></td>
                <td><input type="file" name="pathology"></td>
                <td><input type="file" name="laboratory"></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align:center;"><button type="submit" name="submit">Upload</button></td>
            </tr>
        </table>
    </form>
    <div id="dummy"></div>
    <script>
        function displayDocs(){
            var id=document.getElementById("t").value;
            if(id<=0){
                return;
            }else{
                document.getElementById("frm").style.display="block";
                document.cookie="Userids="+id;
            }
        }
    </script>
</body>
</html>