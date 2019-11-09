<?
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
	mysql_query('DELETE FROM `songs` WHERE `id` = '.$_GET['song_delete'].' LIMIT 1');
	mysql_query("DELETE FROM assessments WHERE song_id ='".$_GET['song_delete']."'");
	header('Location:'.$_SERVER['HTTP_REFERER'].''); exit();
		
?>