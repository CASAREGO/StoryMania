<?php
session_start();
if(!isset($_SESSION['login']))

{


  header("location:login.php");
    exit;
}?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
body {
  background-image: linear-gradient(to left, #FFFFFF, #d9d9d9);
}

.storyfinal {
    position: absolute;
    top:280px;
    left:570px;
    width:500px; 
    height:400px;
}
.bgbook2 {
    position: absolute;
    top:370px;
    left:120px;
    width:500px; 
    height:400px;
}
.bgbook3 {
    position: absolute;
    top:537px;
    left:500px;
    width:500px; 
    height:400px;
}

ul {
  list-style-type: none;
  padding: 0;
  overflow: hidden;
  background-color: transparent;
  position: relative;
 top: 30px;
  left: 40px;
  width: 1800px; 
  border-radius: 7px;
  font-weight: bold;
}

li {
  float: left;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  margin: 0 20px;
  text-decoration: none;
  font-family: "Tahoma";
  font-size: 120%;
  border-bottom: 2px solid #000;
}

li a:hover {
  background-color: #d9d9d9;
}

.wc{
  position: absolute;
  left: 100px;
  text-align: center;
  font-family: "Tahoma";
  top: 180px;
}
.wc h1{
  font-size: 100px;
}
.info
{
  position: absolute;
  margin-left: 1150px;
  top: 300px;
  color: black;
  font-family: "Tahoma";
  border: 3px solid #000; /* Border color and thickness */
  border-radius: 20px; 
  height: 650px;
  width: 650px;
  
}
.dev
{
  position: absolute;
  margin-left: 1500px;
  margin-top: 1155px;
  color: white;
  font-family: "Arial";

  
}

.dev h6{
  font-size: 13px;
}

/* Adjust the size of carousel images */
.carousel-item img {
  left: 10px;
  width: 1480px;
  height: 350px; /* Adjust as needed */
  border-radius: 20px;
}
/* Adjust the size of carousel container */
.carousel {
  top: 1060px;
  left: 250px;
  width: 1460px; /* Adjust as needed */
  margin: auto;
  border-radius: 5px;
}

.write a{
  position: absolute;
  top: 1580px;
  width: 220px;
  left: 200px;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  border-radius: 8px;
  background-color: white;
  font-family: "Arial";
}
.library a{
  position: absolute;
  top: 1580px;
  width: 250px;
  left: 900px;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  border-radius: 8px;
  background-color: white;
  font-family: "Arial";
}

.read a{
  position: absolute;
  top: 1580px;
  width: 200px;
  left: 550px;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
  border-radius: 8px;
  background-color: white;
  font-family: "Arial";
}

.rectangle {
  position: absolute;
  top: 1559px;
  left: 0px;
        width: 1909px; /* Width of the rectangle */
        height: 88px; /* Height of the rectangle */
        background-color: black; /* Background color */
    }

</style>
</head>
<body>
<div class="bgbook2"><img src="bgbooks.jpg" alt="Image"></div>
<div class="bgbook3"><img src="bgbookk.jpg" alt="Image"></div>
<div class="storyfinal"><img src="storyfinal.png" alt="Image"></div>
<ul>

<li style="float:left"><li><a href="storymaniadashboard.php">HOME</a></li>
  <li><a href="stories.php">STORIES</a></li>
  <li><a href="write.php">WRITE</a></li>
  <li><a href="library.php">LIBRARY</a></li>
  <li><a href="mystory.php">MY STORIES</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>

<div class="rectangle"></div>

<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="read4.jpg" class="d-block w-100" alt="slide 1">
    </div>
    <div class="carousel-item">
      <img src="read5.jpg" class="d-block w-100" alt="slide 2">
    </div>
    <div class="carousel-item">
      <img src="read6.jpg" class="d-block w-100" alt="slide 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="info"><br><br>
<h1><strong><center>Hi! This is StoryMania</center></strong></h1><br>
<h4><center>What do you plan to do today?
Create your own stories <br> in our Write page, you can start your own journey <br>in writing with our Write page, 
choose your own <br> Genre and Rating(for ages) and publish it globally. <br><br>You can also Read stories in your own 
selected Genre <br> and according to your age in our Stories page, where <br> all published stories go.<br><br>
Add your favorite stories to your<br> Library and easily sort them by our search function.<br>
Edit or Delete your own published stories in your <br>My Stories page. Do anything you want with StoryMania<br><br> Enjoy!</center></h4>
</div>

<div class="dev">
<h6>Developers<br>Casarego, Judea Anne A. - Back end Developer<br>Naceda, Julian Christopher M. - Front end Developer</h6>
</div>

  <div class="write"><a href="write.php"><strong>Create Your Own Story</strong></a></div>
  <div class="library"><a href="library.php"><strong>Go To Library</strong></a></div>
  <div class="read"><a href="stories.php"><strong>Read Stories</strong></a></div>

<?php 
if (isset($_SESSION['username'])) : ?>
      <div class="wc">
    	<p><strong><h1>WELCOME&nbsp;&nbsp;<?php echo $_SESSION['username']; ?>!</h1></strong></p>
      </div>
    <?php endif ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    if (isset($_POST["About"])) {
        header("Location: about.php");
        exit();
    }
    elseif (isset($_POST["Stories"])) {
      header("Location: stories.php");
      exit();
  }
  elseif (isset($_POST["Write"])) {
    header("Location: write.php");
    exit();
}

}
?>

</body>
</html>