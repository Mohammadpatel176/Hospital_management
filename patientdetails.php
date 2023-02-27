<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="patientdetails.css">
    <title>LIFE</title>

    
    <script>
        function showUser(str) {
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
                xmlhttp.open("GET","getpatient.php?q="+str,true);
                xmlhttp.send();
            }
        }


        function openPatientDetail(id){
            alert("Hello World "+id);
        }
    </script>
</head>
<body>
    Search(By ID): <input type="text" name="searchp" onkeyup="showUser(this.value)"><br><br>
    <table id="txtHint">
        <!--<tr>
            <td>20126</td>
            <td>Leuis laravel</td>
            <td>1112223330</td>
            <td>28-08-2001</td>
            <td>Mumbai</td>
        </tr>

        <tr>
            <td>20126</td>
            <td>Leuis laravel</td>
            <td>1112223330</td>
            <td>28-08-2001</td>
            <td>Mumbai</td>
        </tr>

        <tr>
            <td>20126</td>
            <td>Leuis laravel</td>
            <td>1112223330</td>
            <td>28-08-2001</td>
            <td>Mumbai</td>
        </tr>

        <tr>
            <td>20126</td>
            <td>Leuis laravel</td>
            <td>1112223330</td>
            <td>28-08-2001</td>
            <td>Mumbai</td>
        </tr>

        <tr>
            <td>20126</td>
            <td>Leuis laravel</td>
            <td>1112223330</td>
            <td>28-08-2001</td>
            <td>Mumbai</td>
        </tr>

        <tr>
            <td>20126</td>
            <td>Leuis laravel</td>
            <td>1112223330</td>
            <td>28-08-2001</td>
            <td>Mumbai</td>
        </tr>-->
    </table>
</body>
</html>