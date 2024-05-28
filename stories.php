<?php
session_start();
if (!isset($_SESSION['login'])) {
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

#storyTable td:first-child {
  display: none;
}

.juju {
  position: absolute;
  left: 400px;
  width: 100px;
}

.dea {
  position: absolute;
  left: 20px;
}

.radio {
  position: absolute;
  left: 200px;
  font-family: "Tahoma";
  top: 130px;
  border: 2px solid #000; /* Border color and thickness */
  border-radius: 20px; /* Border radius to make it look like a square */
  padding: 20px;
  width: 400px;
  background-color: white; 
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

.container {
  height: 700px; /* Adjust the height as needed */
  overflow-y: scroll; /* Enable vertical scrolling */
  margin-left: 860px;
  margin-top: 80px;
  font-family: "Tahoma";
}

#authorSearch {
  margin-left: 200px;
  margin-top: 70px;
  font-family: "Tahoma";
  width: 400px;
}
#titleSearch {
  margin-left: -180px;
  margin-top: 140px;
  font-family: "Tahoma";
  width: 400px;
}

.genre-container {
  position: absolute;
  left: 20px;
  font-family: "Tahoma";
  top: 170px;
  color: black;
}

.ratings {
  position: absolute;
  left: 220px;
  font-family: "Tahoma";
  top: 710px;
  border: 2px solid #000; /* Border color and thickness */
  border-radius: 20px; /* Border radius to make it look like a square */
  padding: 20px;
  width: 400px;
  background-color: white; 
}

#storyTable {
  background-color: black; /* Background color of the table */
  color: white; /* Text color */
  width: 100%; /* Full width */
  border-collapse: collapse; /* Collapse borders */
}

#storyTable th, #storyTable td {
  border: 1px solid black; /* Border color of table cells */
  padding: 8px; /* Padding inside cells */
}

#storyTable th {
  background-color: black; /* Background color for header cells */
  color: white; /* Text color for header cells */
}

#storyTable tr {
  background-color: black; /* Ensure background color for all rows */
}

#storyTable tr:hover {
  background-color: #333; /* Optional: slightly lighter on hover for visibility */
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

<div class="genre-container"> 
  <div class="radio"><br>
    <center><label><h2><strong>GENRE</strong></h2></label></center>
    <br><br>
    <input type="radio" id="horror" name="Genre" value="Horror">
    <label for="horror"><h4>Horror&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></label>
    <input type="radio" id="fantasy" name="Genre" value="Fantasy">
    <label for="fantasy"><h4>Fantasy</h4></label>
    <br>
    <input type="radio" id="comedy" name="Genre" value="Comedy">
    <label for="comedy"><h4>Comedy&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></label>
    <input type="radio" id="drama" name="Genre" value="Drama">
    <label for="drama"><h4>Drama</h4></label>
    <br>
    <input type="radio" id="sci-fi" name="Genre" value="Sci-Fi">
    <label for="sci-fi"><h4>Sci-Fi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></label>
    <input type="radio" id="romance" name="Genre" value="Romance">
    <label for="romance"><h4>Romance</h4></label>
    <br>
    <input type="radio" id="mystery" name="Genre" value="Mystery">
    <label for="mystery"><h4>Mystery&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></label>
    <input type="radio" id="fairytale" name="Genre" value="Fairy Tale">
    <label for="fairytale"><h4>Fairy Tale</h4></label>
    <br>
    <input type="radio" id="thriller" name="Genre" value="Thriller">
    <label for="thriller"><h4>Thriller&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></label>
    <input type="radio" id="adventure" name="Genre" value="Adventure">
    <label for="adventure"><h4>Adventure</h4></label>
  </div>
</div>

<div class="ratings">  
  <select name="Rating" id="ratingSelect"  required>
    <option value="">-Select Rating-</option>
    <option value="G">G - all ages</option>
    <option value="PG">PG - parental guidance</option>
    <option value="R">R - for ages 16+</option>
    <option value="X">X - for ages 18+</option>
  </select>  
</div> 

<div class="juju">
  <input type="text" id="titleSearch" placeholder="Search by title" onkeyup="filterTable()" style="border: 2px solid black;">
</div>
<div class="dea">
  <input type="text" id="authorSearch" placeholder="Search by author" onkeyup="filterTable()" style="border: 2px solid black;">
</div> 

<div class="form-group">
  <div class="container">
    <table id="storyTable" class="table table-bordered">
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Genre</th>
        <th>Rating</th>
        <th></th>
      </tr>
      <?php
      $conn = mysqli_connect("localhost", "root", "", "storymania");
      $sql = "SELECT * FROM writestory";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr class='storyRow'><td>". $row["id"]."</td><td><a href='read.php?id=" . $row["id"] . "&source=stories'>" . $row["Title"] . "</a></td><td>". $row["Author"]."</td><td>". $row[ "Genre"]."</td><td>". $row[ "Rating"]."</td><td>
              <form id='saveStoryForm' class='saveStoryForm' method='post' action='save_story.php'>
                  <input type='hidden' name='Title' value='".$row["Title"]."'>
                  <input type='hidden' name='Author' value='".$row["Author"]."'>
                  <input type='hidden' name='Genre' value='".$row["Genre"]."'>
                  <input type='hidden' name='Story' value='".$row["Story"]."'>
                  <input type='hidden' name='Rating' value='".$row["Rating"]."'>
                  <input type='hidden' name='libdef_id' value='".$row["id"]."'> <!-- Add libdef_id field -->
                  <button type='submit' style='background-color: black; color: white;'>Save Story</button>
              </form>
              </td></tr>";
          }
      }
      ?>
    </table>
  </div>

  <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo isset($_SESSION['modalMessage']) ? $_SESSION['modalMessage'] : ''; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var modalMessage = <?php echo json_encode(isset($_SESSION['modalMessage']) ? $_SESSION['modalMessage'] : null); ?>;
  if (modalMessage) {
    var modal = new bootstrap.Modal(document.getElementById('messageModal'));
    modal.show();
    <?php unset($_SESSION['modalMessage']); ?>
  }


  var genreRadios = document.querySelectorAll('input[name="Genre"]');
  var ratingSelect = document.getElementById('ratingSelect');
  
  genreRadios.forEach(function(radio) {
    radio.addEventListener("change", filterTable);
  });
  
  ratingSelect.addEventListener("change", filterTable);
});

function filterTable() {
  var titleInput = document.getElementById("titleSearch");
  var authorInput = document.getElementById("authorSearch");
  var genreRadios = document.querySelectorAll('input[name="Genre"]');
  var ratingSelect = document.getElementById("ratingSelect");

  var titleFilter = titleInput.value.toLowerCase();
  var authorFilter = authorInput.value.toLowerCase();
  var selectedGenre = Array.from(genreRadios).find(radio => radio.checked)?.value || "";
  var selectedRating = ratingSelect.value;

  var table = document.getElementById("storyTable");
  var rows = table.getElementsByTagName("tr");

  for (var i = 1; i < rows.length; i++) {
    var titleCell = rows[i].getElementsByTagName("td")[1];
    var authorCell = rows[i].getElementsByTagName("td")[2];
    var genreCell = rows[i].getElementsByTagName("td")[3];
    var ratingCell = rows[i].getElementsByTagName("td")[4];
    
    if (titleCell && authorCell && genreCell && ratingCell) {
      var titleMatch = titleCell.textContent.toLowerCase().indexOf(titleFilter) > -1;
      var authorMatch = authorCell.textContent.toLowerCase().indexOf(authorFilter) > -1;
      var genreMatch = selectedGenre === "" || genreCell.textContent === selectedGenre;
      var ratingMatch = selectedRating === "" || ratingCell.textContent === selectedRating;

      if (titleMatch && authorMatch && genreMatch && ratingMatch) {
        rows[i].style.display = "";
      } else {
        rows[i].style.display = "none";
      }
    }
  }
}
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["Home"])) {
    header("Location: storymaniadashboard.php");
    exit();
  } elseif (isset($_POST["about"])) {
    header("Location: about.php");
    exit();
  } elseif (isset($_POST["Write"])) {
    header("Location: write.php");
    exit();
  }
}
?>

</body>
</html>