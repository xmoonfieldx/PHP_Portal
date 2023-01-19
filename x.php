<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
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
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
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
<h1> NGO DASHBOARD </h1>
<?php
echo($_COOKIE["name"]); 
?>
<h2>Availability</h2>

<label class="switch">
  <input type="checkbox" checked>
  <?php
  $x=$_COOKIE["name"];
  $conn = mysqli_connect("localhost", "root", "", "ngo");
  $sql = "UPDATE NGO N SET N.AVAILABILITY = NOT N.AVAILABILITY WHERE N.NAME=?";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("s", $x);
  $stmt->execute();

  ?>
  <span class="slider"></span>
</label><br><br>


<h2> Edit Description </h2>
<!--CHIIIIIIIIIIIIIIIIII-->
<form action = "http://localhost/y.php" method = "post" style="font-family: Comfortaa; font-size: 110%; letter-spacing: 1.5px;">
    <div class = "usualDiv">
    <table>
        <tr>
          <td>Enter the new description</td>
          <td><input type = "text" name = "name" size = "30" /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type = "submit" value = "Create" class = "koo"/></td>
       </tr>
     </table>
    </div>
</form>
<!--Yesss-->
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
         echo '<tr bgcolor="#037682">';
     }
     else
    {
        echo '<tr bgcolor="#2fced6">';
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
  
  
</body>
</html> 
