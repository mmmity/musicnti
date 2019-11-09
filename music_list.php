<?
	if(isset($_GET['list'])){
		$data = mysql_query('SELECT * FROM playlist WHERE user_id='.$_COOKIE['id'].'');
		$check =mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM playlist WHERE user_id='.$_COOKIE['id'].'')); 
		if($check['COUNT(*)']!=0){
			?> <div id='list'><form method="post" action='song_list_remove.php'><?
		while($data1 = mysql_fetch_assoc($data)){
			$song = mysql_fetch_assoc(mysql_query('SELECT * FROM songs WHERE id = "'.$data1["song_id"].'"') );
			$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
			$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
			$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
			if($song!= NULL){
			music($singer['name'], $song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
			}
			}
			?>
					 <div class='contenCheck'><input type="submit" value='Удалить из Мои аудиозаписи'></div></form></div><?
		}
	}
?>