<?php 
 include("login.php");
         session_start();
         
         if(isset($_POST['submit'])) {
             $cin = mysqli_real_escape_string($con, $_POST['cin']);
             $password = mysqli_real_escape_string($con, $_POST['password']);
         
             $result = mysqli_query($con, "SELECT * FROM patient WHERE cin='$cin' AND password='$password'") or die("Error executing query: " . mysqli_error($con));
             $row = mysqli_fetch_assoc($result);
         
             if($row) {
                     $_SESSION['valid'] = $row['cin'];
                     $_SESSION['name'] = $row['name'];
                     $_SESSION['email'] = $row['email_address'];
                     $_SESSION['bdate'] = $row['birthdate'];
                     $_SESSION['num'] = $row['num'];
                     header("Location: fich.php");
                     exit();
             } else {
                 echo "<div class='message'><p>Please verify your informations.</p></div>";
             }}
        ?>
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
          <form class="login-form" action="" method="post">
            <input type="text" placeholder="CIN" class="form-input" name="cin" id="cin"/>
            <input type="password" placeholder="PASSWORD" class="form-input" name="password" id="password"/>
            <input type="submit" value="login" class="form-btn" name="submit"/>
            <p class="message">Not registered? <a href="loginpat2.php">Create an account</a></p>
          </form>
        </div>
      </div>
      <script src="loginpat.js"></script>
</body>
</html>
