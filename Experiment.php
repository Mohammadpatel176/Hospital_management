<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    <p id="1"></p>
    <p id="2"></p>
    <p id="3"></p>
    <p id="4"></p>
    <script>
      document.getElementById("1").innerHTML = "HREF: " + window.location.href ;
      document.getElementById("2").innerHTML = "Hostname: " + window.location.hostname ;
      document.getElementById("3").innerHTML = "Pathname: " + window.location.pathname ;
      document.getElementById("4").innerHTML = "Protocol: " + window.location.protocol ;
    </script>
</body>
</html>