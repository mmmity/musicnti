
<?php
mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
mysql_query("SET NAMES 'utf8'") or die(mysql_error());
mysql_select_db('j92444yo_music') or die(mysql_error());
	if(isset($_POST['genres_id'])){
			$query = mysql_query("SELECT singers.name,singers.id
FROM (songs INNER JOIN singers ON singers.id=songs.singer_id) INNER JOIN genres ON genres.id=songs.gentre_id
WHERE songs.gentre_id = ".trim($_POST['genres_id'])."");
			echo '<option value="0" >Выберите исполнителя</option>';
			while( $userdata = mysql_fetch_assoc($query)){
				echo'<option  value="'.$userdata['id'].'">
                                        '.$userdata['name'].'
                                     </option>' ;
			}				
	}
	if(isset($_POST['singer_id'])){
		$query = mysql_query("SELECT genres.name,genres.id
FROM (songs INNER JOIN singers ON singers.id=songs.singer_id) INNER JOIN genres ON genres.id=songs.gentre_id
WHERE songs.singer_id = ".trim($_POST['singer_id'])."");
			echo '<option value="0" >Выберите жанр</option>';
			while( $userdata = mysql_fetch_assoc($query)){
				echo'<option  value="'.$userdata['id'].'">
                                        '.$userdata['name'].'
                                     </option>' ;
		
	}
	}
	if(isset($_POST['reset_s'])){
		$query = mysql_query("SELECT * FROM singers");
		echo '<option value="0" >Выберите исполнителя</option>';
			while( $userdata = mysql_fetch_assoc($query)){
				echo'<option  value="'.$userdata['id'].'">
                                        '.$userdata['name'].'
                                     </option>' ;
			}
	}
	if(isset($_POST['reset_g'])){
		$query = mysql_query("SELECT * FROM genres");
		echo '<option value="0" >Выберите жанр</option>';
			while( $userdata = mysql_fetch_assoc($query)){
				echo'<option  value="'.$userdata['id'].'">
                                        '.$userdata['name'].'
                                     </option>' ;
			}
	}
?>