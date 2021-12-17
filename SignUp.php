<?php
   $connect=mysqli_connect("localhost","root","","Foodspacial");

   if(isset($_POST['Sign_up'])){
       $name=$_POST['Name'];
       $email=$_POST['email'];
       $password=$_POST['password'];
       $c_password=$_POST['C_password'];
       
        $emailquery="select * from project where Email='$email'";
        $query =mysqli_query($connect,$emailquery);
        $emailcount=mysqli_num_rows( $query);
           if($emailcount>0){
           header("Location: SignUp.php?error=Email alredy axit&$email");
        exit();
       }
       else{
        if($password=== $c_password){


$specialChars = preg_match('@[^\w]@', $password);
if(!$specialChars || strlen($password) <8){
  header("Location: SignUp.php?error=pls try again  8 char with 1 special char");

}
else{
      $query ="INSERT INTO project (Name,Email,Password,Confirm_password)  VALUES ('$name','$email','$password','$c_password')";
         $sql=mysqli_query( $connect, $query);
         if($sql)
         {
            header("Location: SignUp.php?success=Your account has been created successfully");
             exit();
         }
         else{
             header("Location: SignUp.php?error=Not Inseted");
         }

}

        }
        else{
            header("Location: SignUp.php?error=password are not matching");
        }
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
         .sign_up{
  position: absolute;
  top: 10%;
  left: 30%;
   width: 500px;
  height: 500px;
  background:#20B2AA;
  border-radius: 20px;
  margin-top: 50px;
   text-align: center;
  margin: 0 auto;

}
.sign_up h1{
  font-size: 30px;
  top: 10%;
  left: 30%;
  text-transform: uppercase;
  margin: 30px 0;
}
.sign_up p{
  font-size: 13px;
  margin: 5px 0;
}
.sign_up input{

  font-size: 12px;
  padding: 8px 5px;
  width: 200px;
  border-radius: 5px;
  outline: none;
}
.sign_up button{
  font-size: 15px;
  font-weight: bold;
  margin: 20px 0;
  padding: 10px 15px;
  width: 120px;
  border-radius:8px;
  background-color: #008B8B;
  text-align: center;
}
.sign_up button:hover{
  color: #7CFC00;
}
     </style>
</head>
<body> 
    
<div class="sign_up">
        <h1>SIGN UP</h1>
        <form action="#" method="post">
           <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>
            <p>Name:</p>
            <input type="text" name="Name" placeholder="Name">
            <p>Email:</p>
            <input type="email" name="email" placeholder="Email">
            <p>Password:</p>
            <input type="password" name="password" placeholder="Password">
            <p>Confirm Password:</p>
            <input type="password" name="C_password" placeholder="Confirm Password"><br/>
            <button type="submit" name="Sign_up">Sign Up</button><br/>
            <p>Already Registered? <a href="Login.php">Login</a></p>


        </form>
    </div>
      
</body>
</html>
