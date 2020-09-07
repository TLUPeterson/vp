<?php
  $username = "Margen Peterson";
  $fulltimenow = date("d.M.Y H:i:s");
  $hournow = date("H");
  $partofday = "lihtsalt aeg";
  if($hournow < 6 ) {
	  $partofday = "uneaeg";
  }
  if($hournow >= 6 and $hournow < 8 ) {
	  $partofday = "hommik";
  }
  if($hournow >= 8 and $hournow < 18 ) {
	  $partofday = "koolipäev";
  }

?>

<!DOCTYPE html>
<html lang="et">
<head>
  <meta charset="utf-8">
  <title>Veebileht</title>

</head>
<body style="background-color:grey;">
  <img src="../img/vp_banner.png" alt="Veebiproge kursuse bänner">
  <h1><?php echo $username; ?> programmeerib veebi</h1>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>See veebileht on loodud õppetöö kaigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>123223################<a	href="https://www.tlu.ee/">#</a>##### </p>
  <p>Kodus muudetud. Success</p>
  <p>Lehe avamise aeg: <?php echo $fulltimenow; ?>.  <?php echo "Parajasti on " .$partofday ."."; ?> </p>
  
  
  
  
</body>
</html>