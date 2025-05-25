<!DOCTYPE html>
<html>
<head>
  <title>Multiplication Table</title>
</head>
<body>

  <h2>Enter a number to get its multiplication table:</h2>
  <form method="post">
    <input type="number" name="number" required>
    <input type="submit" value="Show Table">
  </form>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $num = $_POST["number"];
      echo "<h3>Multiplication Table of $num:</h3>";
      echo "<ul>";
      for ($i = 1; $i <= 10; $i++) {
        $result = $num * $i;
        echo "<li>$num x $i = $result</li>";
      }
      echo "</ul>";
    }
  ?>
</body>
</html>
<!-- Run this php in /xammp/opt/lammp/htdocs/firstphp-->
