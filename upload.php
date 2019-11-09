<?php 
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
	include('imageResize.php');
   if($_FILES['song_file']['type']!='audio/mpeg' && $_FILES['song_file']['type']!='audio/mp3' ){
			setcookie('err6','<h3>Формат файла только mp3!!!</h3>',time()+10);
			header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
	   }
	   
	   $song_name = mysql_real_escape_string($_POST['song_name']) or die(mysql_error());
	   
	   if($_POST['choise1']=='song_gentre_choise'){
	   $song_gentre=  mysql_fetch_assoc(mysql_query("SELECT id FROM `genres` WHERE name ='".$_POST['song_gentre_choise']."'"));
	   }else if($_POST['choise1']=='song_gentre_add'){
		   $right =  mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM genres WHERE name="'.$_POST['song_gentre_add'].'"'));
		   if($right['COUNT(*)']==0){
		   mysql_query("INSERT INTO genres (name) VALUES('".$_POST['song_gentre_add']."')");
		   $song_gentre=  mysql_fetch_assoc(mysql_query("SELECT id FROM `genres` WHERE name ='".$_POST['song_gentre_add']."'"));
		   }else{
			   setcookie('err13','Такой жанр уже существует ',time() +10);
			   header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
		   }
	   }else{setcookie('err11','Введите\выберите жанр',time() +10);header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();}
	   
	   if($_POST['choise2']=='song_singer_choise'){
	   		$song_singer = mysql_fetch_assoc(mysql_query("SELECT id FROM `singers` WHERE name ='".$_POST['song_singer_choise']."'"));
	   }else if($_POST['choise2']=='song_singer_add'){
				$right =  mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM singers WHERE name="'.$_POST['song_singer_add'].'"'));
			  if($right['COUNT(*)']==0  ){
				mysql_query("INSERT INTO singers (name) VALUES('".$_POST['song_singer_add']."')");
				$song_singer= mysql_fetch_assoc(mysql_query("SELECT id FROM singers WHERE name='".$_POST['song_singer_add']."'"));
			  }else{
				setcookie('err12','Такой исполнитель уже существует ',time() +10);
			   header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
			  }
	   }else{
		   setcookie('err10','Введите\выберите исполнителя',time() +10);
		   header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();}
	   
	   
	   
	   $song_local=mysql_fetch_assoc(mysql_query('SELECT MAX(id) FROM `songs`'));
	    if(is_uploaded_file($_FILES["song_file"]["tmp_name"]))
	   {
		 // Если файл загружен успешно, перемещаем его
		 // из временной директории в конечную
		 move_uploaded_file($_FILES["song_file"]["tmp_name"], 'music/music'.++$song_local['MAX(id)'].'.mp3');
	   } else {
		  setcookie('err7',"Ошибка загрузки файла",time()+10);
		  header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
	   }
	 	
	   mysql_query("INSERT INTO songs (name ,
	  								  singer_id,
	 								  gentre_id,
									  local,
									  user_id)
									  VALUES('".$song_name."',
									  '".$song_singer['id']."'
									  ,'".$song_gentre['id']."',
									  'music/music".$song_local['MAX(id)'].".mp3',
									  '".$_COOKIE['id']."'
									  )");
	    
		 if(isset($_POST['song_list_add']) && $_POST['song_list_add'] == 0 ){
		   $list = mysql_fetch_assoc(mysql_query('SELECT id FROM songs WHERE name = "'.$song_name.'"'));
		   mysql_query("INSERT INTO playlist (
										user_id,
										song_id
	  										)
									  VALUES('".$_COOKIE['id']."',
									  '".$list['id']."'
									  )");
		   
		   }
		  if($_FILES['singer_file']['tmp_name']){ 
		   if(($_FILES['singer_file']['type']=='image/png' || $_FILES['singer_file']['type']=='image/jpg' || $_FILES['singer_file']['type']=='image/jpeg') && $_POST['choise2']=='song_singer_add'){
				if(is_uploaded_file($_FILES["singer_file"]["tmp_name"])){
			 // Если файл загружен успешно, перемещаем его
			 // из временной директории в конечную
			 if($_FILES['singer_file']['type']=='image/jpg' || $_FILES['singer_file']['type']=='image/jpeg'){
				 move_uploaded_file($_FILES["singer_file"]["tmp_name"], 'singer/singer'.$song_singer['id'].'.jpg');
				 create_thumbnail('singer/singer'.$song_singer['id'].'.jpg', 'singer/singer70'.$song_singer['id'].'.jpg',70, 70);
				 create_thumbnail('singer/singer'.$song_singer['id'].'.jpg', 'singer/singer250'.$song_singer['id'].'.jpg',250, 250);
				 mysql_query('UPDATE singers SET image = "singer/singer70'.$song_singer['id'].'.jpg" , image_big = "singer/singer250'.$song_singer['id'].'.jpg" WHERE id = "'.$song_singer['id'].'" ');
			 }
			 if($_FILES['singer_file']['type']=='image/png'){
				 move_uploaded_file($_FILES["singer_file"]["tmp_name"], 'singer/singer'.$song_singer['id'].'.png');
				 create_thumbnail('singer/singer'.$song_singer['id'].'.png','singer/singer70'.$song_singer['id'].'.png', 70, 70);
				 create_thumbnail('singer/singer'.$song_singer['id'].'.png','singer/singer250'.$song_singer['id'].'.png', 250, 250);
				 mysql_query('UPDATE singers SET image = "singer/singer70'.$song_singer['id'].'.png" , image_big = "singer/singer250'.$song_singer['id'].'.png" WHERE id = "'.$song_singer['id'].'" ');
			 }
			 }
		   }
		  }
		  
		 header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
		/* if($_FILES["filename"]["size"] > 1024*3*1024)
   {
     echo ("Размер файла превышает три мегабайта");
     exit;
   }*/
   // Проверяем загружен ли файл
   // Проверяем загружен ли файл
   
	   
	   //Исполниели
	  /* if($_POST['song_singer_choise']=='Другой' && strlen($_POST['song_singer_add'])!=0){
		  	$song_singer = 	$_POST['song_singer_add'];
			 header('Location: index.php') or die(mysql_error());
	   exit();
	   }else if($_POST['song_singer_choise']=='Другой' && strlen($_POST['song_singer_add'])==0){
	   		setcookie('err8','Добавте(введите) исполнителя !!!',time()+10);
	    header('Location: index.php') or die(mysql_error());
	   exit();
	   }else if($_POST['song_singer_choise']!='Другой' && strlen($_POST['song_singer_add'])==0){
	   		$song_singer = $_POST['song_singer_choise']; header('Location: index.php') or die(mysql_error());
	   exit();
	   }else{
	  		setcookie('err8','Выберите или добавте исполнителя , что то одно!!!',time()+10); header('Location: index.php') or die(mysql_error());
	   exit();
	   }
	   
	   //Жанры
	   
	   if($_POST['song_gentre_choise']=='Другой' && strlen($_POST['song_gentre_add'])!=0){
		  	$song_singer = 	$_POST['song_gentre_add']; header('Location: index.php') or die(mysql_error());
	   exit();
	   }else if($_POST['song_gentre_choise']=='Другой' && strlen($_POST['song_gentre_add'])==0){
	   		setcookie('err9','Добавте(введите) жанр !!!',time()+10); header('Location: index.php') or die(mysql_error());
	   exit();
	   
	   }else if($_POST['song_gentre_choise']!='Другой' && strlen($_POST['song_gentrer_add'])==0){
	   		$song_singer = $_POST['song_gentre_choise']; header('Location: index.php') or die(mysql_error());
	   exit();
	   }else{
	  		setcookie('err9','Выберите или добавте жанр , что то одно!!!',time()+10); header('Location: index.php') or die(mysql_error());
	   exit();
	   } 
	   
	   */
   
?>