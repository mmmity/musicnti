<?
	if(isset($_GET['singer'])){
		$data = mysql_query('SELECT * FROM songs WHERE singer_id='.$_GET['singer'].'');
		$check =mysql_fetch_assoc(mysql_query('SELECT COUNT(*) FROM songs WHERE singer_id='.$_GET['singer'].'')); 
		if($check['COUNT(*)']!=0){
			?> <div id='list'><form method="post" action='song_list_add.php'><?
		while($data1 = mysql_fetch_assoc($data)){
			$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$data1["singer_id"].'"') );
			$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$data1["gentre_id"].'"') );
			$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$data1["user_id"].'"'));
			music($singer['name'],$data1['name'],$data1['id'],$data1['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);

			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
					 </form></div><?
		}
	}
?>