<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="autentificare.css">
  <title>Document</title>
</head>
<body>
  
<div id="outter">
<form action="includes/login.inc.php" method="post"  style="border:1px solid #ccc" >
  <div class="container">
    <h1>Login</h1>
   
    <hr>

    <label ><b>Email</b></label>
    <input type="text" placeholder="Username/Email" name="mailuid" required readonly  
     onfocus="this.removeAttribute('readonly');">

    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>

    <button type="submit" name="login-submit">Login</button>
  
  </div>
</form>
</div>
</body>
</html>