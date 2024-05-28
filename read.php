<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('Location: login.php');
    session_destroy();
    exit;
}
?>

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

.storymanialogo {
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


table {
  margin-left: 370px;
  margin-top: 70px;
  font-weight: bold;
  font-family: "Tahoma";
  width: 1200px;
}

h2 {
  margin-left: 370px;
  margin-top: 100px;
  font-family: "Tahoma";
  font-weight: bold;
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
<?php
$conn = mysqli_connect("localhost", "root", "", "storymania");

if (isset($_GET['source'])) {
    $source = $_GET['source'];

    if ($source === 'stories' && isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $sql = "SELECT id, Story, Title FROM writestory WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>" . htmlspecialchars($row["Title"]) . "</h2>";
                echo "<table><tr><td>" . nl2br(htmlspecialchars_decode($row["Story"])) . "</td></tr></table>";
            }
        } else {
            echo "<tr><td>No result</td></tr>";
        }
    } elseif ($source === 'library' && isset($_GET['library_id'])) {
        $library_id = (int)$_GET['library_id'];
        $sql = "SELECT library_id, Story, Title FROM library WHERE library_id = $library_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<h2>" . htmlspecialchars($row["Title"]) . "</h2>";
                echo "<table><tr><td>" . nl2br(htmlspecialchars_decode($row["Story"])) . "</td></tr></table>";
            }
        } else {
            echo "<tr><td>No result</td></tr>";
        }
    } 
elseif ($source === 'mystory' && isset($_GET['default_id'])) {
  $default_id = (int)$_GET['default_id'];
  $sql = "SELECT default_id, Story, Title FROM mystory WHERE default_id = $default_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo "<h2>" . htmlspecialchars($row["Title"]) . "</h2>";
          echo "<table><tr><td>" . nl2br(htmlspecialchars_decode($row["Story"])) . "</td></tr></table>";
      }
  } else {
      echo "<tr><td>No result</td></tr>";
  }
} else {
  echo "<tr><td>Invalid source or missing ID</td></tr>";
}
} else {
echo "<tr><td>Source parameter is missing</td></tr>";
}

$conn->close();
?>
</body>
</html>