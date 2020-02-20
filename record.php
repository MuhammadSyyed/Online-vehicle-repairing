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
<table cellpadding="10px" style="background-color:grey; font-size: 20px">
 <tr>
   <th>YOUR RECORD</th>
 </tr>
</table>
 <table>
 <tr>
  <th>Username</th>
  <th>Vehicle Name</th> 
  <th>Regration #</th>
  <th>Location</th>
  <th>Mechanic</th>
  <th>Charges</th>
  <th>Date</th>
 </tr>

<?php

$username = $_POST['username'];
 $conn = mysqli_connect("localhost", "root", "smiat102", "ovrms");
  // Check connection


  if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);
  } 
  $sql = "SELECT * FROM receipt where Username = '$username'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
   // output data of each row
   while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["Username"]. "</td><td>" . $row["V_name"] . "</td><td>"
. $row["Reg_No"]. "</td><td>". $row["Curr_loc"]. "</td><td>". $row["M_Name"]. "</td><td>". $row["Fee"]. "</td><td>". $row["ddate"]. "</td></tr>";
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
        <form action="record.html">
            <input type="submit" name="search" value="Back">
        </form>
             <form action="login.html">
            <input type="submit" name="search" value="Logout">
        </form>

  
</div>
</html>