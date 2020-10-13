<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="autentificare.css">
  <title>Document</title>
</head>

<body>

  <div id="outter1">
    <form action="includes/signup.inc.php" method="post" style="border:1px solid #ccc">
      <div class="container">
        <h1>Sign up</h1>
        <?php
      
        <hr>

        <label><b>Username</b></label>
        <input type="text" placeholder="Username" name="uid" required>

        <label><b>E-mail</b></label>
        <input type="text" placeholder="E-mail" name="mail" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="pwd" required>

        <label><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="pwd-repeat" required>

        <button type="submit" name="signup-submit">Signup</button>

      </div>
    </form>
  </div>
</body>

</html>
