<!DOCTYPE html>
<html>
<head>
<title>NGO Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<style>
.koo
{
  background-color: #f8d7da;
  text-align:center; 
  size:20px; 
  font-size: 150%
}
.center {
  text-align: center;
  border: 3px solid green;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #cce5ff;
}

input:focus + .slider {
  box-shadow: 0 0 1px #cce5ff;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body>
<div class="container">
<h1 style="text-align:center;color:#0066cc"> NGO DASHBOARD </h1>
<?php
echo '<h1 style="text-align:center;color:#0066cc">';
 printf("Welcome %s",$_COOKIE["name"]); echo '</h1>';

?>

<?php
$conn = mysqli_connect("localhost", "root", "", "ngo");
$x=$_COOKIE["name"];
/*$sql = "SELECT N.URL FROM NGO N WHERE N.NAME=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("s", $x);
    $stmt->execute();*/
?>
  <div class="alert alert-danger">
  <div style="letter-spacing: 1px; font-size:150%"><strong>Availability&nbsp&nbsp&nbsp&nbsp</strong>

  <label class="switch">
    <input type="checkbox" checked>
    <?php
    $x=$_COOKIE["name"];
    $sql = "UPDATE NGO N SET N.AVAILABILITY = NOT N.AVAILABILITY WHERE N.NAME=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("s", $x);
    $stmt->execute();

    ?>
    <span class="slider"></span>
  </label>
  </div>
  </div>


  <!--<h2> Edit Description </h2>-->
  <!--CHIIIIIIIIIIIIIIIIII-->
  <form action = "http://localhost/y.php" method = "post" style="font-family: Comfortaa; font-size: 110%; letter-spacing: 1.5px;">
    <div class="alert alert-info">
      <div class = "usualDiv" style="margin: 10px">
      <table>
          <tr>
            <td style="letter-spacing: 1px; font-size:150%"><strong>Enter the new description</strong></td>
            <td >&nbsp&nbsp&nbsp&nbsp<input type = "text" name = "name" size = "30" /></td>
          </tr>
          <tr>
            <td></td>
            <td style= "text-align:center; ">&nbsp&nbsp<input type = "submit" value = "Create" class = "koo"/></td>
        </tr>
      </table>
      </div>
      </div>
  </form>
  <!--Yesss-->
  <div class="alert alert-danger">
  <h2>Students signed up for Smile Foundation</h2>
  <?php
    $x=$_COOKIE["name"];
    //$conn = mysqli_connect("localhost", "root", "", "ngo");
    /*if (!$conn){
      echo 'BRah';
    }*/
    $sql = "SELECT S.NAME, S.USN FROM STUDENTS S, STUDNGO N WHERE N.NGO=? AND S.USN=N.USN";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("s", $x);
    $stmt->execute();
    $result = $stmt->get_result();
    print "<table>";
    print "<tr align = 'center'>";
    // Get the number of rows in the result
    $num_rows = mysqli_num_rows($result);
    // If there are rows in the result, put them in an HTML table
    if ($num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $num_fields = mysqli_num_fields($result);
    // Produce the column labels
    $keys = array_keys($row);
    for ($index = 0; $index < $num_fields; $index++)
    print "<th>" . $keys[$index] . "</th>";
    print "</tr>";
    // Output the values of the fields in the rows
    for ($row_num = 0; $row_num < $num_rows; $row_num++) {
      if($row_num%2==0)
      {
          echo '<tr bgcolor="#d1ecf1">';
      }
      else
      {
          echo '<tr bgcolor="#fff3cd">';
      }
    $values = array_values($row);
    for ($index = 0; $index < $num_fields; $index++) {
    $value = htmlspecialchars($values[$index]);
    print "<td>" . $value . "</td>";
    } //* end of for ($index ...
    print "</tr>";
    $row = mysqli_fetch_assoc($result);
    } //* end of for ($row_num ...
    } //* end of if ($num_rows ...
    else {
    print "There were no such rows in the table <br />";
    }
    print "</table>";
    ?>
<!--End-->
</div>
</div>
</body>
</html> 
