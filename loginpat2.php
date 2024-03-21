<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="loginpat.css">
    <title>login</title>
</head>
<body>
    <div class="login-page">
        <div class="form">
            <?php
               include("login.php");
               if(isset($_POST['submit'])){
                  $cin = $_POST['cin'];
                  $name = $_POST['name'];
                  $password = $_POST['password'];
                  $email = $_POST['email'];
                  $bdate = $_POST['bdate'];
          
               $verify_query = mysqli_query($con,"SELECT cin FROM patient WHERE cin='$cin'");
      
               if(mysqli_num_rows($verify_query) !=0 ){
                  echo "<div class='message'>
                            <p>This cin is used, Try another One Please!</p>
                        </div> <br>";
                  echo "<a href='javascript:self.history.back()'><button class='form-btn'>Go Back</button>";
               }
               else{
      
                  mysqli_query($con,"INSERT INTO patient (cin,name,password,email_address,birthdate) VALUES('$cin','$name','$password','$email','$bdate')") or die("Error!!!");
      
                  echo "<div class='message'>
                            <p>Registration successfully!</p>
                        </div> <br>";
                  echo "<a href='loginpat1.php'><button class='form-btn'>Login Now</button>";}
               }else{
               
              ?>
          <form class="register-form" action="" method="post">
            <input type="text" placeholder="CIN" id="cin" name="cin" class="form-input"/>
            <input type="text" placeholder="NAME" id="name" name="name" class="form-input"/>
            <input type="password" placeholder="PASSWORD" id="password" name="password" class="form-input"/>
            <input type="text" placeholder="EMAIL ADDRESS" id="email" name="email" class="form-input"/>
            <input type="text" placeholder="BIRTHDATE:YYYY-MM-DD" id="bdate" name="bdate" class="form-input"/>
            <input type="submit" value="create" class="form-btn" name="submit"/>
            <p class="message">Already registered? <a href="loginpat1.php">Sign In</a></p>
          </form>
        </div>
        <?php } ?>
      </div>
      <script src="loginpat.js"></script>
</body>
</html>