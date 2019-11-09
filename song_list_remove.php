<?
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
	if(isset($_POST['song_list_add'])){
		$list = $_POST['song_list_add'];
		$n= count($list);
		$user_id = $_COOKIE['id'];
		for($i=0;$i<$n;$i++){
			mysql_query("DELETE FROM playlist WHERE song_id = '".$list[$i]."'");
		}
		header('Location:'.$_SERVER['HTTP_REFERER'].'');
	}else{
		header('Location:'.$_SERVER['HTTP_REFERER'].'');
	}
	
?>