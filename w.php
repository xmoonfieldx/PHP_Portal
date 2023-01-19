<!--INSERT INTO STUDNGO(USN, NGO, Hours) VALUES (?,?,0);-->
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
   $conn = mysqli_connect("localhost", "root", "", "ngo");
   $usn = $_COOKIE["name"];
   $ngo = $_POST["name"];
   echo($ngo);
   //$desc = $_POST["name"];
   //$desc = 'Yes';
   //$n = 'Smile Foundation';
   //if ($desc == "") $desc = '0';
   $sql = "INSERT INTO STUDNGO(USN, NGO, Hours) VALUES (?,?,0)";
   $stmt= $conn->prepare($sql);
   $stmt->bind_param("ss", $usn, $ngo);
   $result= $stmt->execute();
?>
  <form id = "login" action = "http://localhost/z.php" method = "post">
    <div class = "usualDiv">
      <table style="margin-top:70px; font-family:Comfortaa; font-size:150%; letter-spacing: 2px;">
        <tr>
          <td>The data has been updated.</td>
        </tr>
         <tr>
           <td></th>
           <td><input type = "submit" value = "Okay" class = "koo" style="font-size:90%;"/></td>
        </tr>
      </table>
  </div>
  </form>
</body>
</html> 