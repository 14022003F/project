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

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT email FROM patient WHERE email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>This email is used, Try another One Please!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO patient VALUES('$cin','$name','$password','$email','$bdate')") or die("error!!!");

            echo "<div class='message'>
                      <p>Registration successfully!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Login Now</button>";
         

         }
        }else{
        ?>
          <form class="register-form" action="" method="POST">
            <input type="text" placeholder="CIN" id="cin" name="cin"/>
            <input type="text" placeholder="NAME" id="name" name="name"/>
            <input type="password" placeholder="PASSWORD" id="password" name="password"/>
            <input type="text" placeholder="EMAIL ADDRESS" id="email" name="email"/>
            <input type="text" placeholder="BIRTHDATE:DD-MM-YY" id="bdate" name="bdate"/>
            <button type="submit">create</button>
            <p class="message">Already registered? <a href="loginpat1.php">Sign In</a></p>
          </form>
          <!--<form class="login-form">
            <input type="text" placeholder="username"/>
            <input type="password" placeholder="password"/>
            <button>login</button>
            <p class="message">Not registered? <a href="#">Create an account</a></p>
          </form>-->
        </div>
        
      </div>
      <script src="loginpat.js"></script>
      <?php } ?>
</body>
</html>