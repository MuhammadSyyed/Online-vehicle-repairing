<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$CNIC = $_POST['CNIC'];



if (isset($_POST['Submit'])) {
 	
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
     $SELECT = "SELECT Username From bio Where Username = ? Limit 1";
     $INSERT = "INSERT Into bio (Username,Name,Password,Phone,Email, CNIC) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Username);
     $stmt->execute();
     $stmt->bind_result($Username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssisi", $Username, $Name, $Password, $Phone, $Email, $CNIC);
      $stmt->execute();
      ;header('location: searchM.html');
     }
     else {
      echo "***********************Someone already register using this Username**********************";
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