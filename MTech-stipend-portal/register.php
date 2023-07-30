<?php
include 'db.php';
session_start();
/*$server = "localhost";
$username = "root";
$password = "";
$database = "studentconcession";
try {
  $conn = mysqli_connect($server,$username,$password,$database);
  //echo '<script>alert("Connection successful")</script>';
}
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}*/
/*if($_SERVER["REQUEST_METHOD"]=="POST"){
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $regid=$_POST['regid'];
  $email=$_POST['email'];
  $pw=$_POST['pw'];
  $cpw=$_POST['cpw'];
  $gender=$_POST['gender'];
  $exists = false;

  if($pw == $cpw && $exists == false){
    $sql = "INSERT INTO `students`(`p_fname`, `p_lname`, `p_regid`, `p_email`, `p_password`, `p_gender`) VALUES ('$fname','$lname','$regid','$email','$pw','$gender')";
    $result = mysqli_query($conn, $sql);
    if($result){  
      $message = "You have been successfully registered";
    }
    else
    {  
      $message = "Could not insert record"; 
    }
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
  else{
    $showError = "Passwords do not match";
  }
}*/
//echo '<script>alert("Before main if")</script>';
if (isset($_POST['submit']))
{
  //echo '<script>alert("Inside main if")</script>';
$fname=$_POST['fname'];
//echo '<script>alert("First Name: " $fname)</script>';
$lname=$_POST['lname'];
$regid=$_POST['regid'];
$email=$_POST['email'];
$pw=$_POST['pw'];
$cpw=$_POST['cpw'];
$gender=$_POST['gender'];
$mobile = $_POST['mob'];

//$password = base64_encode(strrev(md5($password)));

if($pw == $cpw ){
  //echo '<script>alert("Inserting")</script>';
  $sql = "INSERT INTO `student`(`regid`, `fname`, `lname`, `mob`, `email`, `gender`, `password`) VALUES ('$regid','$fname','$lname','$mobile','$email','$gender','$pw')";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
  //echo "<script> location.href='login.php'; </script>";
  //exit;
  header("location: login.php");

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"> -->
    <link rel="stylesheet" href="css/s.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/validate.js"></script>
   </head>
<body style="background-color:#d9d9d9">
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form name="register" method="post" action="" onsubmit="return validate()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" name="fname" id="fname" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" id="lname" name="lname" required>
          </div>
          <div class="input-box">
            <span class="details">New Password</span>
            <input type="password" name="pw" id="pw" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cpw" id="cpw" placeholder="Confirm your password" required>
          </div>
          <div class="input-box">
            <span class="details">Registration ID</span>
            <input type="text" name="regid" id="regid" placeholder="Enter your Registration Id" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" id="email" placeholder="Enter your email" required>
          </div>

           <div class="input-box">
            <span class="details">Gender</span>
            <select name="gender" name="gender" required>
              <option value="none" selected disabled hidden>Select an Option</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">other</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Mobile Number</span>
            <input type="tel" name="mob" id="mob" placeholder="Enter your mobile number" required>
          </div>
          
        
          </div>
          
        <div class="button">
          <input type="Submit" id="submit" name="submit" value="Submit" style="background-color:#5fb759;color: black;">
        </div>
      </form> 
      <a href="login.php">Already have an account? Sign In</a>
    </div>
  </div>

</body>
</html>
