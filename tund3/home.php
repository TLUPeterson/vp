<?php
  $username = "Margen Peterson";
  $fulltimenow = date("d.M.Y H:i:s");
  $hournow = date("H");
  $partofday = "lihtsalt aeg";
  
  $weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  if($hournow < 6 ) {
	  $partofday = "uneaeg";
  }
  if($hournow >= 6 and $hournow < 8 ) {
	  $partofday = "hommik";
  }
  if($hournow >= 8 and $hournow < 18 ) {
	  $partofday = "koolipäev";
  }
  if($hournow >= 18 and $hournow < 24 ) {
	  $partofday = "kodutööd";
  }
  if($hournow >= 00 and $hournow < 6 ) {
	  $partofday = "magamine";
  }

  //jälgime semestri kulgu
  $semesterstart = new DateTime("2020-8-31");
  $semesterend = new DateTime("2020-12-13");
  $semesterduration = $semesterstart->diff($semesterend);
  $today = new DateTime("now");
  $fromsemesterstart = $semesterstart->diff($today);//aja erinevus objektina, niisama näidata ei saa
  $fromsemesterstartdays = $fromsemesterstart->format("%r%a");
  $semesterpercent = ($fromsemesterstartdays/$semesterduration);
  $weekdaynow = date("N");

  //Loen kataloogist piltide nimekirja
 // $allfiles = scandir("../vp_pics/");
  $allfiles = array_slice(scandir("../vp_pics/"), 2);
  //echo $allfiles //massiive nii näidata ei saa
  //var_dump($allfiles);
  //$allpicfiles = array_slice($allfiles, 2);
  //var_dump($allpicfiles);
  $allpicfiles = [];
  $picfiletypes = ["image/jpeg", "image/png"];
  //Käin kogu massivi läbi ja kontrollin igat elementi, kas sobiv tüüp
  foreach ($allfiles as $file){
	  $fileinfo = getImagesize("../vp_pics/" .$file);
	  if(in_array($fileinfo["mime"], $picfiletypes) == true){
		  array_push($allpicfiles, $file);
	  }
  }
  
  //Paneme kõik pildid järjest ekraanile
  //uurime mitu pilti on, e mitu fiali nimekirjas - massiivis
  $piccount = count($allpicfiles);
  $imghtml = "";
				//img src="../img/vp_banner.png" alt="all tekst">
  for($i = 0; $i < $piccount; $i ++){
	  //<img src="../img/vp_banner.png" alt="alt tekst">
	  $imghtml .= '<img src="../vp_pics/' .$allpicfiles[$i] .'" ';
	  $imghtml .= 'alt="Tallinna Ülikool">';
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
  <p>Lehe avamise aeg: <?php echo $weekdaynameset($weekdaynow =-1); echo $fulltimenow .", semestri algusest on möödunud " .$fromsemesterstartdays ." päeva! "; echo "Parajasti on " .$partofday ."."; ?> </p>
  
  <p> <?php if($fromsemesterstartdays < 0){
  echo "Semester pole veel alanud";
  }
  
	if ($fromsemesterstartdays > $semesterduration){
		echo "Semester on lõppenud";
	}
	
	
	
	
	echo $semesterpercent .'% semestrist läbi';
	  ?> </p>
  
  <hr>
  <?php echo $imghtml; ?>
  
  
  

  
  
  
</body>
</html>