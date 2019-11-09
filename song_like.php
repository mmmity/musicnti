<?	 
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
	 if(isset($_GET['song_like'])){
		mysql_query("INSERT INTO assessments (
									  user_id,
									  song_id	,
									  assess)
									  VALUES('".$_COOKIE['id']."',
									 			'".$_GET['song_like']."',
												'1' 
									  )");
									   header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
	 }
	  header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
?>