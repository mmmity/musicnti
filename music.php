<? if(isset($_GET['music']) and $_GET['music']=='all'){
	$varo = mysql_query('SELECT COUNT(*) FROM `songs`') or die(mysql_error());
	$varo1 = mysql_fetch_assoc($varo) or die(mysql_error());
	if($varo1['COUNT(*)'] != 0){
		 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
		 $query0 = mysql_query('SELECT * FROM `songs`') or die(mysql_error());
		 while($query01 = mysql_fetch_assoc($query0)){
		//for($i=1;$i<=$varo1['COUNT(*)'];$i++){
			//$query0 = mysql_query('SELECT * FROM `songs` WHERE id = '.$i.'') or die(mysql_error());
			//$query01 = mysql_fetch_assoc($query0) ;
			$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$query01["singer_id"].'"') );
			$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$query01["gentre_id"].'"') );
			$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$query01["user_id"].'"'));
			music($singer['name'],$query01['name'],$query01['id'],$query01['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
					}
					?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div>
                    <?
	}
	
}
			?>

            