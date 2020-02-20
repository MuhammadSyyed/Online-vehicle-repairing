<?php
$Username = $_POST['username'];
$Password = $_POST['password'];

if (isset($_POST['login'])) {
 	
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
     $SELEC = "SELECT Password From bio Where Password = ? Limit 1";
     //Prepare statement
     

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Username);
     $stmt->execute();
     $stmt->bind_result($Username);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
     $stm = $conn->prepare($SELEC);
     $stm->bind_param("s", $Password);
     $stm->execute();
     $stm->bind_result($Password);
     $stm->store_result();
     $rnm = $stm->num_rows;



     if ($rnum==0||$rnm==0) {
      $stmt->close();
      $stm->close();
      echo "****************************ERROR ALERT ! : Please enter valid username or password***************************************";
     }
     else { header('location: searchM.html');
     }
     
     $conn->close();
    }
} 

else {
 echo "All field are required";
 die();
}
?>