<?php

require 'connection.php'; // Assumes you have a database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['verified']) && $_SESSION['verified'] == true) {
    $Pass = $_POST['pass'];
    $Confirmpass = $_POST['confirmpass'];

    // Regular expression to enforce password requirements
    $password_pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/';

    if ($Pass == $Confirmpass) {
        if (preg_match($password_pattern, $Pass)) {
            $user_id = $_SESSION['user_id'];

            // Update the user's password in the database without hashing
            $stmt = $conn->prepare("UPDATE register SET Pass = ?, Confirmpass = ? WHERE user_id = ?");
            if ($stmt === false) {
                die('Prepare failed: ' . htmlspecialchars($conn->error));
            }

            $stmt->bind_param("ssi", $Pass, $Confirmpass, $user_id); // 'ssi' specifies that the first two parameters are strings and the third is an integer
            $stmt->execute();

            if ($stmt->error) {
                die('Execute failed: ' . htmlspecialchars($stmt->error));
            }

            if ($stmt->affected_rows > 0) {
                $message = "Password reset successfully.";
            } else {
                $message = "Error resetting password or no changes made.";
            }

            $stmt->close();
        } else {
            $message = "Password must contain at least one capital letter, one small letter, and one number, and be at least 8 characters long.";
        }
    } else {
        $message = "Passwords do not match.";
    }
} else {
    $message = "Unauthorized request.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
/* Your existing CSS styles */
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

.Info {
  top: 300px;
  position: absolute;
  COLOR:black;
  left: 570px;
  border: 2px solid #000; /* Border color and thickness */
  border-radius: 20px; /* Border radius to make it look like a square */
  background-color: white; 
  padding: 20px;
  width: 800px;
  height: 400px;
  font-family: "Tahoma";
}

</style>
</head>
<body>
<div class="storymanialogo"><img src="storyfinal.png" alt="Image"></div>
<ul>
  <li style="float:right"><a href="register.php">REGISTER</a></li>
  <li style="float:right"><a href="login.php">LOGIN</a></li>
 
</ul></style>
<body>
<div class="Info"><center>
            <h2><strong>RESET PASSWORD</strong></h2><br>
            <form method="post" action="reset_password.php">
                <label for="pass">NEW PASSWORD</label>
                <input type="password" id="pass" name="pass" size="40px"required><br>
                
                <label for="confirmpass">CONFIRM PASSWORD</label>
                <input type="password" id="confirmpass" name="confirmpass" size="40px" required><br><br>
                
                <input type="submit" value="Reset Password">
            </form></center>
        </div>
<div class="modal fade" id="passModal" tabindex="-1" aria-labelledby="passModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passModalLabel">StoryMania</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo $message; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Script to show the modal -->
<script>
    var passModal = new bootstrap.Modal(document.getElementById('passModal'));
    passModal.show();
</script>

</body>
</html>
