<?
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
			
	   		
		  	mysql_query('UPDATE singer SET name="'.$song_singer.'",image="singer/singer70'.$song_singer['id'].'.jpg",image_big="singer/singer250'.$song_singer['id'].'.jpg" WHERE id='.$song_singer['id'].' '); 
		   
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
?>