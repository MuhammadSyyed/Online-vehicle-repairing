<?php

$username = $_POST['username'];
$vname = $_POST['vname'];
$regnum = $_POST['regnum'];
$loc = $_POST['loc'];
$mname = $_POST['mname'];
$fee = $_POST['Amount'];
$Date = $_POST['Date'];



if (isset($_POST['submit'])) {
 	
 	$host = "localhost";
    $dbUsername = "root";
    $dbPassword = "smiat102";
    $dbname = "ovrms";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    else {
     $INSERT = "INSERT Into receipt(Username,V_name,Reg_No,Curr_loc,M_Name,Fee,ddate) values(?,?,?,?,?,?,?)";
     //Prepare statement

      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssssss",$username,$vname,$regnum,$loc,$mname,$fee,$Date);
      $stmt->execute();
      ;echo("*************Your receipt is generated Successfully**********************");
     }
     $stmt->close();
     $conn->close();
    }


else {
 echo "All field are required";
 die();
}
?>