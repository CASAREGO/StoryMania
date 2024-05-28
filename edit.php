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

form {
  margin-left: 370px;
  margin-top: 50px;
  font-weight: bold;
  font-family: "Georgia", serif;
  width: 1200px;
}

h2 {
  margin-left: 370px;
  margin-top: 60px;
  font-family: "Georgia", serif;
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
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    session_destroy();
    exit;
}

$conn = new mysqli("localhost", "root", "", "storymania");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['source'])) {
    $source = $_GET['source'];
    $id_field = '';
    $id_value = 0;
    $table = '';

    if ($source === 'stories' && isset($_GET['id'])) {
        $id_field = 'id';
        $id_value = (int)$_GET['id'];
        $table = 'writestory';
    } elseif ($source === 'library' && isset($_GET['library_id'])) {
        $id_field = 'library_id';
        $id_value = (int)$_GET['library_id'];
        $table = 'library';
    } elseif ($source === 'mystory' && isset($_GET['default_id'])) {
        $id_field = 'default_id';
        $id_value = (int)$_GET['default_id'];
        $table = 'mystory';
    } else {
        echo "<p>Invalid source or missing ID</p>";
        $conn->close();
        exit;
    }

    $stmt = $conn->prepare("SELECT $id_field, Story, Title FROM $table WHERE $id_field = ?");
    $stmt->bind_param("i", $id_value);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<h2>Edit Story: " . htmlspecialchars($row["Title"]) .  "</h2>";
            echo '<form id="editForm" method="post">';
            echo '<input type="hidden" name="' . $id_field . '" value="' . $row[$id_field] . '">';
            echo '<label for="Title">Title:</label>';
            echo '<input type="text" id="Title" name="Title" style="border: 2px solid black;"  value="' . htmlspecialchars($row["Title"]) . '">';
            echo '<label for="Story">Story:</label>';
            echo '<textarea id="Story" name="Story"  style="border: 2px solid black;" rows="20">' . htmlspecialchars($row["Story"]) . '</textarea>';
            echo '<br><input type="submit" style="background-color: black; color: white;" value="Update Story">';
            echo '</form>';
        }
    } else {
        echo "<p>No result</p>";
    }

    $stmt->close();
} else {
    echo "<p>Source parameter is missing</p>";
}

$conn->close();
?>

<script>
document.getElementById('editForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the traditional way

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_story.php', true);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); // Show alert with the response from PHP
        }
    };

    xhr.send(formData);
});
</script>


</body>
</html>
