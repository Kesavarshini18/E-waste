<?php
$uname1 = $_POST['uname1'];
$upswd1 = $_POST['upswd1'];
$con = new mysqli("localhost","root","","webpage");
if($con->connect_error){
  die("Failed to connect : ".$con->connect_error);
}else{
  $stmt = $con-> prepare("select * from register where uname1 = ?");
  $stmt->bind_param("s",$uname1);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  if($stmt_result->num_rows > 0){
      $data = $stmt_result-> fetch_assoc();
      if($data['upswd1']=== $upswd1){
       
         echo "<h2>Login Successfully</h2>";
      }
  }else{
  echo "<h2>Invalid Username or Password</h2>";
  die(); 
}
header("Location: index.html");
   
}

?>
