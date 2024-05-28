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

.storymanialogo {
  position: absolute;
  top: 5px;
  left: 710px;
  width: 500px; 
  height: 500px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: black;
  position: absolute;
  top: 480px;
  width: 3.7%;
  left: 450px;
  border-radius: 8px;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 10px 12px;
  text-decoration: none;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: gray;
}

.Info {
  top: 270px;
  position: absolute;
  COLOR:black;
  left: 570px;
  border: 2px solid #000; /* Border color and thickness */
  border-radius: 20px; /* Border radius to make it look like a square */
  background-color: white; 
  padding: 20px;
  width: 800px;
  font-family: "Tahoma";
}


.forgot{
  color: black;
}

.reg {
            background-color: white;
            color: black;
            width: 450px;
            font-family: "Tahoma";
            border: 2px solid black; /* Adding black border */
            padding: 10px 20px; /* Optional: add padding to make it look nicer */
            text-align: center; /* Optional: center the text inside the button */
            text-decoration: none; /* Ensure no underline if it's an <a> tag */
            display: inline-block; /* Ensure the element behaves like a button */
            font-size: 16px; /* Optional: adjust font size */
            cursor: pointer; /* Optional: show pointer cursor on hover */
        }


.log{
  width: 450px;
  background-color: black;
  color: white;
}
</style>
</head>

<body>
<div class="storymanialogo"><img src="storyfinal.png" alt="Image"></div>
<br><br><br>

<div class="Info">
<h1><center><strong> LOGIN YOUR ACCOUNT </strong></center></h1>
<form class="" action="" method="post" autocomplete="off">
<br><br>
<center>
  <label for="Username">USERNAME </label>
  <input type="text" name="username" id="username" size= "50" required> <br>

  <label for="password">PASSWORD</label>
  <input type="password" name="password" id="password" size= "50" required> <br><br>

  <button type="submit" name="submit" class="log">LOGIN</button>
</form>
<br><br>
<button class="reg" onclick="window.location.href='register.php';">REGISTER</button>
<br><br>
<a href="forgot-password.php" class="forgot">Forgot Password?</a></center>
</div>

<?php

require 'connection.php';

if (isset($_SESSION['login'])) {
    header("Location: storymaniadashboard.php");
    exit();
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $Pass = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($Pass == $row["Pass"]) {
            $_SESSION["login"] = true;
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["username"] = $row["username"];
            header("location: storymaniadashboard.php");
            exit();
        } else {
            $message = 'Wrong password';
        }
    } else {
        $message = 'User not Registered';
    }

    if (!empty($message)) {
        echo '
        <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                '.$message.'
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <script>
          var myModal = new bootstrap.Modal(document.getElementById("messageModal"), {
            keyboard: false
          });
          myModal.show();
        </script>';
    }
}
?>
</body>
</html>
