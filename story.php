<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
/* Your existing CSS styles */
body {
  background-image: white;
}


.storymania{
  position: absolute;
  left: 750px;
  top: 1350px;
  font-family: "Tahoma";
}

.info{
  position: absolute;
  left: 490px;
  top: 1470px;
  width: 1000px;
  font-family: "Verdana";
}

.storymanialogo {
    position: absolute;
    top:10px;
    left:50px;
    width:300px; 
    height:300px;
}
.gg{
  position: absolute;
  left: 350px;
  top: 260px;
  font-family: "Verdana";
}
.gg h1 {
  font-size: 120px; /* Adjust the font size as needed */
}
.jjk{
  position: absolute;
  left: 1150px;
  top: 300px;
  font-family: "Verdana";
}
.juju{
  position: absolute;
  left:1000px;
  top: 2040px;
  font-family: "Verdana";
}
.dea{
  position: absolute;
  left:200px;
  top: 2540px;
  font-family: "Verdana";
}
.book {
    position: absolute;
    top:400px;
    left:0px;
    width:1910px; 
}
ul {
  list-style-type: none;
  padding: 0;
  overflow: hidden;
  background-color: transparent;
  position: relative;
  top: 50px;
  left: -10px;
  width: 1870px;
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

.dev
{
  position: absolute;
  left: 1400px;
  top: 3560px;
  font-family: "Arial";
  color: white;
}

/* Adjust the size of carousel images */
.carousel-item img {
  left: 10px;
  width: 1480px;
  height: 350px; /* Adjust as needed */
}
/* Adjust the size of carousel container */
.carousel {
  top: 3000px;
  left: 250px;
  width: 1460px; /* Adjust as needed */
  margin: auto;
}
.laptop{
  position: absolute;
  top: 1880px;
  left: 250px;
  width: 800px;
}
.cp1{
  position: absolute;
  top: 2450px;
  left: 1350px;
}
.cp2{
  position: absolute;
  top: 2430px;
  left: 1080px;
  width: 500px;
}
.rectangle {
  position: absolute;
  top: 3550px;
  left: 0px;
        width: 1910px; /* Width of the rectangle */
        height: 120px; /* Height of the rectangle */
        background-color: black; /* Background color */
        border-top: 2px solid #000;
    }
</style>
</head>
<body>
<div class="book"><img src="bookk.jpg" alt="Image"></div>
<div class="storymanialogo"><img src="storyfinal.png" alt="Image"></div>
<ul>
  <li style="float:right"><a href="register.php">REGISTER</a></li>
  <li style="float:right"><a href="login.php">LOGIN</a></li>

</ul>
<div class="rectangle"></div>
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="slide 1.jpg" class="d-block w-100" alt="slide 1">
    </div>
    <div class="carousel-item">
      <img src="slide 2.jpg" class="d-block w-100" alt="slide 2">
    </div>
    <div class="carousel-item">
      <img src="slide 3.jpg" class="d-block w-100" alt="slide 3">
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
<div class="laptop">
      <img src="laptop1.png" alt="laptop">
    </div>
    <div class="cp2">
      <img src="CPP.png" alt="smartphone">
    </div>

    <div class="cp1">
      <img src="CP.png" alt="cellphone">
    </div>
  
    <div class="gg">
  <h1><strong>READ<br>WRITE<br>POST</strong></h1>
</div>
<div class="jjk">
  <h2>Read and Create your <br>Own Stories with StoryMania</h2>
</div>
<div class="juju">
  <h1><strong>GENRE AND LIBRARY</strong></h1><br>
  <h4>Select Your Desired Genre and choose your rating <br>or classification of story you want to read or write <br>using StoryMania. Save your favorite stories in<br>
 the library for easy access.</h4>
</div>
<div class="dea">
  <h1><strong>POST STORIES AND MY STORIES</strong></h1><br>
  <h4>Write and Post Stories that you want to share using <br> StoryMania. StoryMania posts your stories globally and <br>automatically store it in your "My Stories" section <br>
to allow edit and delete access of your own stories.</h4>
</div>
<div class="storymania">
<br><br>
<h1><strong>Hi! This is StoryMania.</strong></h1></div>
<div class="info">
<h3><br><center> A reading website where you can also start your journey as a writer. You can write and post your stories where in all users can read.
This website is a great starter for aspiring writers to learn and develop skills in terms of writing stories.
Add your favorite story to the library and much more with StoryMania. For those who loves to read stories and to write, this website can help you. 
Improve your comprehension and vocabulary with StoryMania. If you are a person that has a passion for sharing, creating and reading stories. 
A website for beginners and for all ages, read and write with StoryMania! <br><br>
</h3></div>

<div class="dev">
<p>Developers<br><br>Casarego, Judea Anne A. - Back end Developer<br>Naceda, Julian Christopher M. - Front end Developer</p>
</div>

</body> 


</html>