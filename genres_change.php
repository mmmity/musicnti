<?	
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
	foreach($_POST as $value => $key){
		$gentre_id = explode("_", $value);
		mysql_query('UPDATE genres SET name="'.$key.'" WHERE id='.$gentre_id[1].'');
		header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
	}
?>