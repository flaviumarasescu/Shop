<?php
  //pornim o sesiune sa ne asigura ca sesiunea e pornita pe toate paginile din interiorul website ului
  session_start(); 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  
  <link rel="stylesheet" href="index.css?v=<?php echo time(); ?>">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  </head>
  <body>

    <div class="top-nav-bar">
      <div class="search-box">
        <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>
      <img src="poze/shop.png" alt="" class="logo">
      
     <div class="logged">
       <?php
        if(isset($_SESSION['userId'])){
          echo '<h5 class="login-status">You are logged in!</h5>';
        }
        else{
          echo '<h5 class="login-status">You are logged out!</h5>';
        }
       ?>
      
      
    </div>
     
   <!--   <input type="text" class="form-control">
      <span class="input-group-text"><i class="fa fa-search"></i></span>  -->
      </div>

      <div class="menu-bar">
      <ul>
        <li><a href="#"><i class="fa fa-shopping-basket"></i>cart</a></li>
        <?php

            if(isset($_SESSION['userId'])){
               echo '<form action="includes/logout.inc.php" method="get">
               <button type="submit" name="logout-submit">Logout</button>  
               </form>';
            }
            else{
               echo '<li><a href="signup.php">Sign up</a></li>
               <li><a href="login.php">Log in</a></li>';
}

        ?>
        
       
          
       
      </ul>
      </div>

      </div>

    <section class="header">
      <div class="side-menu" id="side-menu">
        <ul>
          <li>Femei<i class="fa fa-angle-right"></i>
            <ul>
              <li>submeniu1</li>
              <li>submeniu1</li>
              <li>submeniu1</li>
            </ul>
          </li>

          <li>Barbati<i class="fa fa-angle-right"></i>
            <ul>
              <li>submeniu2</li>
              <li>submeniu2</li>
              <li>submeniu2</li>
            </ul>
          </li>
          <li>Baieti<i class="fa fa-angle-right"></i>
            <ul>
              <li>submeniu3</li>
              <li>submeniu3</li>
              <li>submeniu3</li>
            </ul>
          </li>
          <li>Fete<i class="fa fa-angle-right"></i>
            <ul>
              <li>submeniu4</li>
              <li>submeniu4</li>
              <li>submeniu4</li>
            </ul>
          </li>
        </ul>

      </div>

      <div class="slider">
        <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="poze/img1.jpg" class="d-block w-100" >
  </div>
  <div class="carousel-item">
    <img src="poze/img2.jpg" class="d-block w-100" >
  </div>
  <div class="carousel-item">
    <img src="poze/img3.jpg" class="d-block w-100" >
  </div>
</div>
<ol class="carousel-indicators">
  <li data-target="#slider" data-slide-to="0" class="active"></li>
  <li data-target="#slider" data-slide-to="1"></li>
  <li data-target="#slider" data-slide-to="2"></li>
</ol>
</div>
      </div>
    </section>

    <script type="text/javascript">
      function openmenu(){
        document.getElementById("side-menu").style.display="block";
        document.getElementById("menu-btn").style.display="none";
        document.getElementById("close-btn").style.display="block";
      }
      function closemenu(){
        document.getElementById("side-menu").style.display="none";
        document.getElementById("menu-btn").style.display="block";
        document.getElementById("close-btn").style.display="none";
      }
    </script>

<!-- NOTE: Produse                     -->

    <section class="produse">
      <div class="container">
          <div class="row">

            <div class="col-md-3">
              <div class="product-top">
                <img class="imagine" src="poze/imgprodus1.jpg">
                <div class="produs">
                  <h5>pantofi sport</h3>
                  <h6>299 lei</h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="product-top">
                <img class="imagine" src="poze/imgprodus2.jpg">
                <div class="produs">
                  <h5>pantofi sport</h3>
                  <h6>299 lei</h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="product-top">
                <img class="imagine" src="poze/imgprodus3.jpg">
                <div class="produs">
                  <h5>pantofi sport</h3>
                  <h6>299 lei</h5>
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="product-top">
                <img class="imagine" src="poze/imgprodus2.jpg">
                <div class="produs">
                  <h5>pantofi sport</h3>
                  <h6>299 lei</h5>
                </div>
              </div>
            </div>


          </div>

      </div>

    </section>

    <!-- NOTE:          Footer          -->

      <section class="footer">
      <div class="container text-center">
          <div class="row">
            <div class="col-md-3">
              <h1>Useful links</h1>
              <p>Privacy Policy</p>
              <p>Terms of Use</p>
              <p>Return Policy</p>
            </div>

            <div class="col-md-3">
              <h1>Company</h1>
              <p>About Us</p>
              <p>Contact Us</p>
              <p>Career</p>
              <p>Affiliate</p>
            </div>

            <div class="col-md-3">
              <h1>Follow us</h1>
            <p class="follow"><i class="fa fa-facebook"></i>Facebook</p>
            <p class="follow"><i class="fa fa-twitter"></i>Twitter</p>
            <p class="follow"><i class="fa fa-instagram"></i>Instagram</p>
            <p class="follow"><i class="fa fa-youtube"></i>YouTube</p>


            </div>

          </div>
        </div>

      </section>


  </body>
</html>
