<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <!--TABLE OF NGOs REGISTERED-->
    <?php
        $x='Smile Foundation';
        $y=$_COOKIE["name"];
        $conn = mysqli_connect("localhost", "root", "", "ngo");
        if (!$conn){
            echo 'BRah';
        }
        $sql = "SELECT N.NGO, N.HOURS FROM STUDNGO N WHERE N.USN=?";
        $stmt= $conn->prepare($sql);
        $stmt->bind_param("s", $y);
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

   <!--FORM TO PICK NGO-->
   <h2>Register for an NGO</h2>

<p>You can preselect an option with the selected attribute:</p>


<form action = "http://localhost/w.php" method = "post" style="font-family: Comfortaa; font-size: 110%; letter-spacing: 1.5px;">
    <div class = "usualDiv">
    <table>
        <tr>
          <td>Enter the NGO name</td>
          <td><input type = "text" name = "name" size = "30" /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type = "submit" value = "Create" class = "koo"/></td>
       </tr>
     </table>
    </div>
</form>

<!--<form action="http://localhost/w.php">
  <label for="cars">Choose a car:</label>
  <select id="cars" name="cars">
    <option value="Smile Foundation">Smile Foundation</option>
    <option value="saab">Saab</option>
    <option value="fiat" selected>Fiat</option>
    <option value="audi">Audi</option>
  </select>
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
</form>-->
</body>
</html> 