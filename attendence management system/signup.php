<?php
include 'dbconnect.php';

if(isset($_POST['submited'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist. please use a different email'; 
   }
   
   else{
      if($password != $cpassword){
         $message[] = 'confirm password not matched!';
      }

      else{
         $insert = mysqli_query($conn, "INSERT INTO `user_form` (`name`, `dob`, `email`, `password`) VALUES ('$name', `dob`, '$email', '$password');");
         if ($insert) {
            $message[] = 'Registration successful. You can now log in.';
        } else {
            $message[] = 'Registration failed. Please try again later.';
        }
      }
   }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendence Management System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <section class="form-container">
        <?php
        if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
        ?>
        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
              <div class="mb-3">
              <label for="dob" class="form-label">dob</label>
              <input type="date" class="form-control" id="date" name="dob">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Conform Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
              </div>
            <button input type="submit" class="btn btn-primary" name="submited" value="Submit">Submit</button>
            <p>Already have an account? <a href="index.php">Login now</a></p>
          </form>
    </section>    
    
    <script src="https://kit.fontawesome.com/ace1a3a0e7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>