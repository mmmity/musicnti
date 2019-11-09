 <?			for($i=1;$i<=13;$i++){
				if(isset($_COOKIE['err'.$i.''])){
					echo $_COOKIE['err'.$i.''].'<br>';
				}
 			}
		
				
			?> 
<?  
	if(($userdata['user_hash'] == $_COOKIE['hash']) && ($userdata['user_id'] == $_COOKIE['id']))

	{
	include('function_search.php');	
	require('search.php');
	require('music.php');
    require('add_song.php');
	require('music_gentre.php');
	require('music_singer.php');
	require('music_list.php');
	require('change_song.php');
	require('rank.php');
	require('set.php');
	require('change_singer.php');
	
	}
			if($userdata == NULL){
			?>
            	<div id='registr_form'>
                	<h1>Регистрация</h1><br><br>
                   	<form method='post' action='regis.php'>
                    	<input class='r' name='first_name' type="text" required placeholder="Имя"><br><br>
                    	<input class='r' name='second_name' type="text" required placeholder="Фамилия"><br><br>
                    	<input class='r' name='login' type="text" required placeholder="Логин"><br><br>
                        <input class='r' name='password' type="password" required placeholder="Пароль"><br>
                        <input class='r' name='password1' type="password" required placeholder="Повторите пароль"><br><br>
                        <input class='r' name='action' type="text"  placeholder="VIP(Пропустите)"><br><br><br>
                        <input id='submit1' name='submit' type="submit" value='Отправить'>
                    </form>
                </div>
                <? 
	}?>
               