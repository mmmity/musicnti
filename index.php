<?php
	if(isset($_GET['out']) && $_GET['out'] == 1 ){
		setcookie("id", "", time() - 3600*24*30*12, "/");
		setcookie("hash", "", time() - 3600*24*30*12, "/");
		}	
    mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
    mysql_query("SET NAMES 'utf8'") or die(mysql_error());
    mysql_select_db('j92444yo_music') or die(mysql_error());
	$query = mysql_query("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
	$userdata = mysql_fetch_assoc($query);
?>
<!doctype html>
<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
    <link  rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link rel='stylesheet' type="text/css" href="style.css">
    <script src="jquery.js"></script>
    <script src="music.js"></script>
    <title>Музыка, которую ты любишь</title>
</head>
<body>
    <div id='web'>
        <div id='head'>
        	<div id='auto'> <? if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
								{   
							
								
								
									if(($userdata['user_hash'] != $_COOKIE['hash']) && ($userdata['user_id'] != $_COOKIE['id']))
								
									{?>
				<div class='on' >
                Вход
               <div id='circle'>
                <form method = 'post' action='login.php'>
                        <input  name='login' type='text' placeholder='Логин' required><br>
                        <input name='password' type='password' placeholder='Пароль' required><br>
                        <input  id='submit' type='submit' name='submit' value='Войти'>
                 </form> 
                  </div>
              </div>
               <? }else{
								 ?>
             	<div id='welcome'>
                	Здравствуйте,<? echo $userdata['user_first_name']?>!
                </div> 
                <div class='on'>
               <a href='out.php'>Выйти</a>
                </div> 
                <? }
								}else{ 
								?><div class='on' >
                Вход
                <div id='circle'>
                <form method = 'post' action='login.php'>
                        <input  name='login' type='text' placeholder='Логин' required><br>
                        <input name='password' type='password' placeholder='Пароль' required><br>
                        <input  id='submit' type='submit' name='submit' value='Войти'>
                  </form> 
                  </div>
                </div><?
								}?>   
                                     
          </div>
			<div id='menu'>
              	<a href='?music=all'><div class='change fit'>Каталог</div></a>		
						<? if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
								{  		
							if(($userdata['user_hash'] == $_COOKIE['hash']) && ($userdata['user_id'] == $_COOKIE['id']))
								
									{?>
                <a href='?list=on'><div class='change fit'>Мои аудиозаписи</div></a>
                <a href='?rank'><div class='change fit'>Рейтинг</div></a>
                <a href='?song=add'><div class='change fit'>Добавить аудиозапись</div></a>
                <a href='<? if($userdata['user_rights']=='admin'){ echo '?set';}else echo '#'; ?>'><div class='change '>Управление сайтом</div></a>
								<? } }?>
              </div>
					  			
              
</div>
        <div id='body'>
	 <?
			//  if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
						//		{   
								?>
            <div id='base1'>
								<?	
								
								
								/*	if(($userdata['user_hash'] == $_COOKIE['hash']) && ($userdata['user_id'] == $_COOKIE['id']))
								
									{*/
				require('base1.php');
									//}
								
			//*/?>		 
            </div>
            <? //} ?>
            <div id='base2'>
            <?
					require('base2.php');
				
            ?>
            </div>
            <?
			/*  if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
								{ ?><div id='base3'><?
								
									$query = mysql_query("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
								
									$userdata = mysql_fetch_assoc($query);
								
								
									if(($userdata['user_hash'] == $_COOKIE['hash']) && ($userdata['user_id'] == $_COOKIE['id']))
								
									{*/
            	echo "<div id='base3'>";require('base3.php');
									//}
								
			?></div> 
            <? //} ?>
     	</div> 
     </div> 
</div>	 
</body>
</html>
