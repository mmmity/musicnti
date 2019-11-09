<?
	if(isset($_GET['set'])){
		$query = mysql_query('SELECT * FROM users WHERE user_rights ="user"');
		?><div id='list'> <?
		while($lol = mysql_fetch_assoc($query)){
		echo "<h2>".$lol['user_first_name']." ".$lol['user_second_name']."</h2>" ;
			if($lol['user_action']==0){
				echo '<a class="get_a" href="action.php?user_action='.$lol['user_id'].'">Активировать</a>';
			}else{ 
				echo	'<a class="get_a" href="action.php?user_disaction='.$lol['user_id'].'">Заблокировать</a>';
			} 
		}
		?></div><?
	}
	
?>
