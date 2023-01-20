<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
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
</style>
</head>
<body>
<div class="container">
<h1 style="text-align:center;color:#0066cc"> STUDENT DASHBOARD </h1>
<?php
echo '<h1 style="text-align:center;color:#0066cc">';
 printf("Welcome %s",$_COOKIE["name"]); echo '</h1>';

?>
    <!--TABLE OF NGOs REGISTERED-->
    <div class="alert alert-danger">
    <?php
        //$x='Smile Foundation';
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
</div>
<div class="alert alert-info">
   <!--FORM TO PICK NGO-->
   <h2>Register for an NGO</h2>



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
</div>
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
</div>
</body>
</html> 