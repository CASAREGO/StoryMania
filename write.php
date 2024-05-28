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
<title>StoryMania Website</title>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<style>
body {
  background-image: linear-gradient(to left, #FFFFFF, #d9d9d9);
}



.storymanialogo
{
  position: absolute;
  top: 115px;
  left: 100px;
  width: 350px;
  height: 250px;
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
.alb {
      width: 200px;
      height: 200px;
      padding: 5px;
    }
    .alb img {
      width: 100%;
      height: 100%;
    }
    a {
      text-decoration: none;
      color: black;
    }

#loadingSpinner {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}

.container{
position: absolute;
left:100px;
top: 350px;
width: 350px;
}
.textcontainer{
position: absolute;
left: 600px;
top: 130px;
width: 1100px;
}

</style>
</head>
<body>


<div class="storymanialogo"><img src="storyfinal.png" alt="Image"></div> 
  <ul>
  <li><a href="storymaniadashboard.php">HOME</a></li>
  <li><a href="stories.php">STORIES</a></li>
  <li><a href="write.php">WRITE</a></li>
  <li><a href="library.php">LIBRARY</a></li>
  <li><a href="mystory.php">MY STORIES</a></li>
  <li><a href="about.php">ABOUT</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
     </ul>
     <div id="loadingSpinner" style="display: none;">
    <img src="loading.gif" alt="Loading...">
</div>

           <div class="container">  
              
                <div class="form-group">  
                     <label>Enter Title</label>  
                     <input type="text" name="Title" id="Title" class="form-control" style="border: 2px solid black;" required/>  
                </div>  
                <div class="form-group">  
                     <label>Author</label>  
                     <input type="text" name="Author" id="Author" class="form-control" style="border: 2px solid black;" required/> 
                </div>
               
                <div class="form-group">  
                     <label>Genre</label>  
                     <select name="Genre" id="Genre" class="form-control" style="border: 2px solid black;" required>
                    <option value="">-Select Genre-</option>
                    <option value="Horror">Horror</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Comedy">Comedy</option>
                    <option value="Drama">Drama</option>
                    <option value="Sci-Fi">Sci-Fi</option>
                    <option value="Romance">Romance</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Fairy Tale">Fairy Tale</option>
                    <option value="Thriller">Thriller</option>
                    <option value="Adventure">Adventure</option>
                    </select>  
                </div>  
                <div class="form-group">  
                     <label>Rating</label>  
                     <select name="Rating" id="Rating" class="form-control" style="border: 2px solid black;" required>
                    <option value="">-Select Rating-</option>
                    <option value="G">G - all ages</option>
                    <option value="PG">PG - parental guidance</option>
                    <option value="R">R - for ages 16+</option>
                    <option value="X">X - for ages 18+</option>
                    </select>  
                </div> 
                 </div>
                <div class="textcontainer">
                <div class="formgroup"><label><h1><strong>Create Story</strong></h1></label>  
                <textarea name="Story" id="Story" rows="25" class="form-control" style="border: 2px solid black;" required></textarea>
                     <br> 
                
               
    <div class="form-group">
     <button type="button" id="publish" name="publish"  style="background-color: black; color: white;">Publish</button>
    </div>
                <div class="form-group">  
                     <input type="hidden" name="id" id="id" />  
                     <div id="autoSave"></div>  
                </div></div>
           </div> 
           
      </body>  
 </html>  
 <script> 
 $(document).ready(function(){  
      $('#publish').click(function() {
           var Title = $('#Title').val();
           var Author = $('#Author').val(); 
           var Genre = $('#Genre').val(); 
           var Rating = $('#Rating').val();     
           var Story = $('#Story').val(); 
           var id = $('#id').val();  
           if(Title != '' && Author != '' && Genre != '' && Story != '')  
           {   
                $('#loadingSpinner').show();
                $.ajax({  
                     url:"save_post.php",  
                     method:"POST",  
                     data:{Title:Title, Author:Author, Genre:Genre, Rating:Rating, Story:Story, Id:id},  
                     dataType:"text", 
                     success:function(data)  
                     {  
                          if(data != '')  
                          {  
                               $('#id').val(data);  
                          }  
                          $('#autoSave').text("Story Created!");  
                          setInterval(function(){  
                               $('#autoSave').text('');  
                          }, 50000);  
                          $('#loadingSpinner').hide();
                     }  
                });  
           }            
      }); 
 });  
 </script>

 <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["Home"])) {
        header("Location: storymaniadashboard.php");
        exit();
    } elseif (isset($_POST["about"])) {
        header("Location: about.php");
        exit();
    }
    elseif (isset($_POST["Stories"])) {
      header("Location: stories.php");
      exit();
  }
  
}
?>

</body>
</html>