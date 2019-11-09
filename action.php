<?	
mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
mysql_query("SET NAMES 'utf8'") or die(mysql_error());
mysql_select_db('j92444yo_music') or die(mysql_error());
	$query = mysql_query("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
	$userdata = mysql_fetch_assoc($query);
	if(isset($_GET['user_action']) && $userdata['user_rights']=='admin'){
			mysql_query('UPDATE users SET user_action=1 WHERE user_id='.$_GET['user_action'].'');
			header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
	}
	else if(isset($_GET['user_disaction']) && $userdata['user_rights']=='admin'){
			mysql_query('UPDATE users SET user_action=0 WHERE user_id='.$_GET['user_disaction'].'');
			header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
	}else{
		header('Location:'.$_SERVER['HTTP_REFERER'].'');exit();
	}
?>