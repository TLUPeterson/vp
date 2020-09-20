<?php


  $username = "Margen Peterson";
  $fulltimenow = date("d.m.Y H:i:s");
  $kell = date("H:i:s");
  $weekday = date("d.m.Y");
  $daynow = date("d");
  $yearnow = date("Y");
  $hournow = date("H");
  $partofday = "lihtsalt aeg";
  



  
  $weekdaynameset = ["esmaspäev", "teisipäev", "kolmapäev", "neljapäev", "reede", "laupäev", "pühapäev"];
  $monthnameset = ["jaanuar", "veebruar", "märts", "aprill", "mai", "juuni", "juuli", "august", "september", "oktoober", "november", "detsember"];
  
  $monthnamenow = date("m");
  //küsime nädalapäeva
  $weekdaynow = date("N");
  //echo $weekdaynow;
  
  if($hournow < 6){
	  $partofday = "uneaeg";
  }
  if($hournow >= 6 and $hournow < 8){
	  $partofday = "hommikuste protseduuride aeg";
  }
  if($hournow >= 8 and $hournow < 18){
	  $partofday = "akadeemilise aktiivsuse aeg";
  }
  if($hournow >= 18 and $hournow < 22){
	  $partofday = "õhtuste toimetuste aeg";
  }
  if($hournow >= 22){
	  $partofday = "päeva kokkuvõtte ning magamamineku aeg";
  }
  
  //jälgime semestri kulgu
  $semesterstart = new DateTime("2020-8-31");
  $semesterend = new DateTime("2020-12-13");
  $semesterduration = $semesterstart->diff($semesterend);
  $semesterdurationdays = $semesterduration->format("%r%a");
  $today = new DateTime("now");
  $fromsemesterstart = $semesterstart->diff($today);
  //saime aja erinevuse objektina, seda niisama näidata ei saa
  $fromsemesterstartdays = $fromsemesterstart->format("%r%a");
  $semesterpercentage = 0;
    
  $semesterinfo = "Semester kulgeb vastavalt akadeemilisele kalendrile.";
  if($semesterstart > $today){
	  $semesterinfo = "Semester pole veel peale hakanud!";
  }
  if($fromsemesterstartdays === 0){
	  $semesterinfo = "Semester algab täna!";
  }
  if($fromsemesterstartdays > 0 and $fromsemesterstartdays < $semesterdurationdays){
	  $semesterpercentage = ($fromsemesterstartdays / $semesterdurationdays) * 100;
	  $semesterinfo = "Semester on täies hoos, kestab juba " .$fromsemesterstartdays ." päeva, läbitud on " .$semesterpercentage ."%.";
  }
  if($fromsemesterstartdays == $semesterdurationdays){
	  $semesterinfo = "Semester lõppeb täna!";
  }
  if($fromsemesterstartdays > $semesterdurationdays){
	  $semesterinfo = "Semester on läbi saanud!";
  }
  
  //loen kataloogist piltide nimekirja
  //$allfiles = scandir("../vp_pics/");
  $allfiles = array_slice(scandir("../vp_pics/"), 2);
  //echo $allfiles;  //massiivi nii näidata ei saa!!!
  //var_dump($allfiles);
  //$allpicfiles = array_slice($allfiles, 2);
  //var_dump($allpicfiles);
  $allpicfiles = [];
  $picfiletypes = ["image/jpeg", "image/png"];
  //käin kogu massiivi läbi ja kontrollin iga üksikut elementi, kas on sobiv fail ehk pilt
  foreach ($allfiles as $file){
	  $fileinfo = getImagesize("../vp_pics/" .$file);
	  if(in_array($fileinfo["mime"], $picfiletypes) == true){
		  array_push($allpicfiles, $file);
	  }
  }

  
  //paneme kõik pildid järjest ekraanile
  //uurime, mitu pilti on ehk mitu faili on nimekirjas - massiivis
  $piccount = count($allpicfiles);
  //echo $piccount;
  //$i = $i + 1;
  //$i += 1;
  //$i ++;
  
  $randomimg = $allpicfiles[array_rand($allpicfiles)];
  
  $imghtml = "";
  for($i = 0; $i < 1; $i ++){
	  //<img src="../img/vp_banner.png" alt="alt tekst">
	  $imghtml .= '<img src="../vp_pics/' .$randomimg .'" ';
	  $imghtml .= 'alt="Tallinna Ülikool">';
  }
    

  
  require("header.php");

?>
<body style="background-color:grey;">
  <img src="../img/vp_banner.png" alt="Veebiprogrammeerimise kursuse bänner">
  <h1><?php echo $username; ?> programmeerib veebi</h1>
  <p>See veebileht on loodud õppetöö käigus ning ei sisalda mingit tõsiseltvõetavat sisu!</p>
  <p>Leht on loodud veebiprogrammeerimise kursusel <a href="http://www.tlu.ee">Tallinna Ülikooli</a> Digitehnoloogiate instituudis.</p>
  
  
  <p>Lehe avamise aeg: <?php echo $weekdaynameset[$weekdaynow - 1] .", " .$daynow .". " .$monthnameset[$monthnamenow-1] .", " .$yearnow .", kell on " .$kell?>. 
  <?php echo "Parajasti on " .$partofday ."."; ?></p>
  <p><?php echo $semesterinfo; ?></p>
  <hr>
  <p> <?php   ?> </p>
  <?php echo $imghtml; ?>
  <hr>
  <a href="newhome_sisestamine.php">Mine sisestama mõttetuid mõtteid</a>
  <hr style="height:2px;border-width:0;color:black;background-color:white">
  <a href="newhome_motted.php">Vaata mõttetuid mõtteid</a>

  <hr>

  
</body>
</html>