<?
	if(isset($_GET['rank'])){
		$query = mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM `assessments`'));
		if($query['COUNT(*)'] != 0){
		$query0 = mysql_query('SELECT * FROM `assessments`') or die(mysql_error());
		 while($query01 = mysql_fetch_assoc($query0)){
			 $asd= mysql_query('SELECT SUM(assess) FROM `assessments` WHERE song_id = "'.$query01['song_id'].'"' );
			 while($say = mysql_fetch_assoc($asd)){
				$likes[$query01['song_id']] = $say['SUM(assess)'];
			 }
		 }
		 arsort($likes);
		 ?><div id='list'><form method="post" action='song_list_add.php'><?
		 foreach($likes as $value => $key){
			$song = mysql_fetch_assoc(mysql_query('SELECT * FROM songs WHERE id = "'.$value.'"') );
			$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
			$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
			$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));	
					 
music($singer['name'], $song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
		  }
		  ?> <div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div></form></div><?
		}else{
			echo '<h1>Пусто<h1>';
		}
	}
?>