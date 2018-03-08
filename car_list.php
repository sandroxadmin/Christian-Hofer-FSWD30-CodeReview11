<?php

include('config/database.conf.php');
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8');

$sql = 'SELECT * FROM `car` JOIN car_model ON `car`.`car_model_id` = `car_model`.`car_model_id` ORDER BY `car_id`';
if($result = mysqli_query($conn, $sql)) {
  $officeArray =  mysqli_fetch_all ($result, MYSQLI_ASSOC);
}else{
  echo "Error Select " . mysqli_error($conn);
}
 ?>
 <!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8"/>
 </head>
  <body>
    <table>
      <tr>
        <th>ID</th>
        <th>Manufacturer</th>
        <th>Model</th>

      </tr>
      <?php foreach ($officeArray as $row): ?>
        <tr>
          <td><?php echo $row['car_id']; ?></td>
          <td><?php echo $row['manufacturer']?></td>
          <td><?php echo $row['model_name']?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
