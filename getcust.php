<?php

$Exp = $_POST['Exp'];
$Name = $_POST['name'];
$access = $_POST['LOC'];
$Phone = $_POST['phone'];
$CNIC = $_POST['MCNIC'];



if (isset($_POST['Register'])) {
 	
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
     $SELECT = "SELECT CNIC From mechanic Where CNIC = ? Limit 1";
     $INSERT = "INSERT Into mechanic (Name,Phone,Access,CNIC,Exp_Yr) values(?, ?, ?, ?, ?)";
     //Prepare statement
     

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("i", $CNIC);
     $stmt->execute();
     $stmt->bind_result($CNIC);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sisii",$Name,$Phone,$access,$CNIC,$Exp);
      $stmt->execute();
      ;echo("*************You Are Registered Successfully**********************");
     }
     else {
      echo "Someone already register using this CNIC"; header('location: getcust.html');
     }
     $stmt->close();
     $conn->close();
    }
} 

else {
 echo "All field are required";
 die();
}
?>