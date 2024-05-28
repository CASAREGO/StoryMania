<?php
session_start();
if(!isset($_SESSION['login']))
{
    header('Location: login.php');
    session_destroy();
    exit;
}?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
body {
  background-image: linear-gradient(to left, #FFFFFF, #d9d9d9);
}

.call
{
  position: absolute;
  top: 720px;
  left: 1350px;
  width: 300px;
}

.judea {
  position: absolute;
  top: 120px;
  left: 1500px;
  border-radius: 50%; /* Adjust this value as needed for rounded corners */
  width: 100px; /* Example width, adjust as needed */
  height: 100px; /* Example height, adjust as needed */
  overflow: hidden; /* Ensure the image fits within the rounded corners */
}

.julian {
  position: absolute;
  top: 120px;
  left: 1380px;
  border-radius: 50%; /* Adjust this value as needed for rounded corners */
  width: 100px; /* Example width, adjust as needed */
  height: 100px; /* Example height, adjust as needed */
  overflow: hidden; /* Ensure the image fits within the rounded corners */
}


.about
{
  margin-left: 200px;
  margin-top: 100px;
  border: 4px solid black; /* Border color and thickness */
  border-radius: 20px; /* Border radius to make it look like a square */
  padding: 20px;
  width: 1450px;
  height: 800px;
  font-family: "Tahoma"; 
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

</style>
</head>
<body>
  <ul>
  <li><a href="storymaniadashboard.php">HOME</a></li>
  <li><a href="stories.php">STORIES</a></li>
  <li><a href="write.php">WRITE</a></li>
  <li><a href="library.php">LIBRARY</a></li>
  <li><a href="mystory.php">MY STORIES</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>

<div class="about">
<br><br>
<h3><strong>About Us</strong></h3>
<h5><strong> <br> &nbsp;&nbsp;&nbsp;&nbsp;StoryMania is a website storymaker where users can create their own stories, in their own selected genre, it is for beginners who want to write and publish their stories publicly.
This website helps beginners to practice their comprehensive skills and writing skills. The website allows them to create, upload and read their stories at their own will. They can also read stories of other users at their own interest.
 This website was created for people that has passion for sharing, creating and reading stories. Creating this website gives way for aspiring writers to practice and get enough experience before facing great opportunities like writing in a big website.
 This website is a great starter for aspiring writers to learn and develop skills in terms of writing stories.</strong></h5>
<br><br>
<h3><strong>Developers</strong></h3>
<br>
<h5><strong>Casarego, Judea Anne A.<br></strong> -jujucasarego@gmail.com <br> -09569422290 <br> -front/back end devoloper<h5>
<br><br>
<h5><strong>Naceda, Julian Christopher M.<br></strong> - julianchristophernaceda@gmail.com <br> -09466137347 <br> -front/back end developer<h5>
</div>
<div class="judea"><img src="judea.png" alt="Image"></div>
<div class="julian"><img src="julian.png" alt="Image"></div>
<div class="call"><img src="call.gif" alt="Image"></div>
<br><br><br><br><br><br><br><br><br><br>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["Home"])) {
        header("Location: storymaniadashboard.php");
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
