<?php 
    mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
    mysql_query("SET NAMES 'utf8'") or die(mysql_error());
    mysql_select_db('j92444yo_music') or die(mysql_error());
	include('imageResize.php');
	   $song_name = mysql_real_escape_string($_POST['song_name']) or die(mysql_error());
	   
	   
	   if($_POST['choise2']=='song_singer_choise'){
	   		$song_singer = mysql_fetch_assoc(mysql_query("SELECT id FROM `singers` WHERE name ='".$_POST['song_singer_choise']."'"));
	   }else if($_POST['choise2']=='song_singer_add'){
				$right =  mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM singers WHERE name="'.$_POST['song_singer_add'].'"'));
			  if($right==0){
				mysql_query("INSERT INTO singers (name) VALUES('".$_POST['song_singer_add']."')");
				$song_singer= mysql_fetch_assoc(mysql_query("SELECT id FROM singers WHERE name='".$_POST['song_singer_add']."'"));
			  }else{
				setcookie('err12','Такой исполнитель уже существует ',time() +10);
			   header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
			  }
	   }else{
		   setcookie('err10','Введите\выберите исполнителя',time() +10);
		   header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();}
	   
	   if($_POST['choise1']=='song_gentre_choise'){
	   $song_gentre=  mysql_fetch_assoc(mysql_query("SELECT id FROM `genres` WHERE name ='".$_POST['song_gentre_choise']."'"));
	   }else if($_POST['choise1']=='song_gentre_add'){
		   $right =  mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM genres WHERE name="'.$_POST['song_gentre_add'].'"'));
		   if($right==0){
		   mysql_query("INSERT INTO genres (name) VALUES('".$_POST['song_gentre_add']."')");
		   $song_gentre=  mysql_fetch_assoc(mysql_query("SELECT id FROM `genres` WHERE name ='".$_POST['song_gentre_add']."'"));
		   }else{
			   setcookie('err13','Такой жанр уже существует ',time() +10);
			   header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
		   }
	   }else{setcookie('err11','Введите\выберите жанр',time() +10);header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();}
	
		$song_id = explode("_",$_POST['submit_song']) ;
	 
	   mysql_query("UPDATE songs SET name='".$song_name."' ,
	  								  singer_id='".$song_singer['id']."',
	 								  gentre_id='".$song_gentre['id']."',
									  user_id_change='".$_COOKIE['id']."'
									  WHERE id ='".$song_id[1]."'");
	    
		 
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
		
   
?>