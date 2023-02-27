<?php
    $q = intval($_GET['q']);
    include "connectdb.php";
    $sql = "SELECT `ID`, `First name`, `Last name`, `Phone number`, `Date of birth`, `City` FROM `patient details` WHERE `ID` LIKE '%$q%' AND `ID`!=10001";
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
    }

?>