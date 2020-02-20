<!DOCTYPE html>
<html>
<head>
 <title>Get Mechanic</title>
 <style>
  table{
   border-collapse: none;

   width: 80%;
   color: white;
   background-color: rgba(0,0,0,0.8);margin: 30px 150px;
   font-family: monospace;
   font-size: 20px;
   text-align: center;
     } 
  th {
   background-color: rgba(0,0,0,0.8);
   color: white;    }
  tr:{background-color: rgba(0,0,0,0.8);}
 </style>
</head>
<body>
<table cellpadding="10px" style="background-color:grey; font-size: 30px">
 <tr>
   <th>YOUR NEARBY MECHANICS</th>
 </tr>
</table>
 <table>
 <tr>
  <th>Name</th>
  <th>Phone</th> 
  <th>Experience</th>
  <th>Location</th>
 </tr>

 
<?php

$Access = $_POST['Location'];
 $conn = mysqli_connect("localhost", "root", "smiat102", "ovrms");
  // Check connection


  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT Name,Phone,Exp_Yr,Access FROM mechanic where Access = '$Access'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Name"]. "</td><td>" . $row["Phone"] . "</td><td>"
. $row["Exp_Yr"]. "</td><td>". $row["Access"]. "</td></tr>";
}
echo "</table>";
} else { echo "<tr><td>" . 'Not Found'. "</td><td>" . '-' . "</td><td>"
. '-'. "</td><td>".'Out of Access'. "</td></tr>"; }
$conn->close();


?>


</table>
</body>
<div>
        <link rel="stylesheet" type="text/css" href="getmech.css">
        <form action="raseed.html">
            <input type="submit" name="login" value="Get Receipt">
        </form>
            <form action="searchM.html">
            <input type="submit" name="login" value="Back">
        </form>
</div>
</html>