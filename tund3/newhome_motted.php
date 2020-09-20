<?php
require("header.php");
//Loeme andmebaasi login  muutujad
  require("../../../config.php");
  //Kui kasutajad on vormis andmeid saatunud, siis salvestame andmebaasi
  $database="if20_margen_pe_3";
  
  if(isset($_POST["submitnonsense"])){
	  if(!empty($_POST["nonsense"])){
		  //Andmebaasi lisamine
		  //Loome andmebaasi ühenduse
		  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
		  //valmistame ette sql käsu
		  $stmt = $conn->prepare("INSERT INTO nonsense (nonsenseidea) VALUES(?)");
		  echo $conn->error;
		  //s-string, i-intege, d-decimal
		  $stmt->bind_param("s", $_POST["nonsense"]);
		  $stmt->execute();
		  //käsk ja ühendus kinni
		  $stmt->close();
		  $conn->close();
	  }
  }
  //Andmebaasist lugemine
  $nonsensehtml = "";
  $conn = new mysqli($serverhost, $serverusername, $serverpassword, $database);
  //SQL käsu valmistamine
  $stmt = $conn->prepare("SELECT nonsenseidea FROM nonsense");
  echo $conn->error;
  //seome tulemuse mingi muutujaga
  $stmt->bind_result($nonsensefromdb);
  $stmt->execute();
  //võtan, kuni on
  while($stmt->fetch()){
	  //<p>suvaline mõte</p>
	  $nonsensehtml.= "<p>" .$nonsensefromdb ."</p>";
  }
  $stmt->close();
  $conn->close();
  
    //Vaatame, mida vormist serverisse saadatakse
  var_dump($_POST);
?>
<body style="background-color:grey;">
  <?php echo $nonsensehtml; ?>
  <a href="newhome.php">Esilehele tagasi</a>
  
</body>
</html>