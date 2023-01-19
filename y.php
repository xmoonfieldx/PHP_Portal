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

<?php
   $conn = mysqli_connect("localhost", "root", "", "ngo");
   $desc = $_POST["name"];
   //$desc = 'Yes';
   $n = $_COOKIE["name"];
   if ($desc == "") $desc = '0';
   $sql = "UPDATE NGO N SET N.DES=? WHERE N.NAME=?";
   $stmt= $conn->prepare($sql);
   $stmt->bind_param("ss", $desc, $n);
   $result= $stmt->execute();
?>
  <form id = "login" action = "http://localhost/x.php" method = "post">
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
