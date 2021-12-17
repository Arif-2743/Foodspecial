<?php
session_start();
   $connect=mysqli_connect("localhost","root","","Foodspacial");
  if(!$connect){
           echo"faild";
       }

if(isset($_POST['Login'])) { 

$email=$_POST['email'];
$password=$_POST['password'];
$email_search="select * from project where email='$email'&& password='$password'";
$query=mysqli_query($connect,$email_search);
$email_pass=mysqli_fetch_assoc($query);
if($email_pass){
  $_SESSION['Email']=$email_pass['Email'];
  header('location:Home.php');
}
else{
    header("Location: Login.php?error=Invalid Acount");
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 <title>Kinbo Online</title>
     <style>
         
.Login{
  position: absolute;
  top: 10%;
  left: 30%;
   width: 500px;
  height: 450px;
  background:#20B2AA;
  border-radius: 20px;
  margin-top: 50px;
   text-align: center;
  margin: 0 auto;
}
.Login h1{
  font-size: 30px;
  top: 10%;
  left: 30%;
  text-transform: uppercase;
  margin: 30px 0;
}
.Login p{
  font-size: 15px;
  margin: 5px 0;
}
.Login input{
  font-size: 12px;
  padding: 8px 5px;
  width: 200px;
  border-radius: 5px;
  outline: none;
}
.Login button{
  font-size: 15px;
  font-weight: bold;
  margin: 20px 0;
  padding: 10px 15px;
  width: 70px;
  border-radius:8px;
  background-color: #008B8B;
}
.Login button:hover{
  color: #7CFC00;
}
     </style>
</head>
<body> 
    
<div class="Login">
        <h1>Login</h1>
        <form action="#" method="post">
             <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
            <p>Email:</p>
            <input type="email" name="email" placeholder="Email">
            <p>Password:</p>
            <input type="password" name="password" placeholder="Password"><br/>
            <button type="submit" name="Login">Login</button><br/>
            <p>Not Registered? <a href="SignUp.php">Register</a></p>


        </form>
    </div>
      
</body>
</html>
