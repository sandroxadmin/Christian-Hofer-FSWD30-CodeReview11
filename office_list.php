<?php

include('config/database.conf.php');
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8');
$sql = 'SELECT * FROM `office`';
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
        <th>Adress</th>
      </tr>
      <?php foreach ($officeArray as $row): ?>
        <tr>
          <td><?php echo $row['office_id']; ?></td>
          <td><?php echo $row['street_name'].' '.$row['street_number']; ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>
