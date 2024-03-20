
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
        <?php 
  
           print_r($_POST);
          ?>
        <div class="form">
          <form class="login-form" action="loginpat1.php" methode="post">
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