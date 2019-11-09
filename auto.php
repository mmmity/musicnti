<?
					if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
								{   
								
									$query = mysql_query("SELECT *,INET_NTOA(user_ip) FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
								
									$userdata = mysql_fetch_assoc($query);
								
								
									if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id']))
								
									{
								
										
								
							echo	'		 <h1>Вход</h1>
                    
                    <a id=\'r\' href="?regis=active">Регистрация</a>';
								
									}
								
									else
								
									{
								
										echo '<div id=\'wellcome\'>
                        <h3>Здравствуйте,</h3><br>
                        <p id=\'p\'><h1>'.$userdata['user_first_name'].'!!!</h1></p>
						<a id=\'submit\'  href=\'out.php\'>Выйти</a>
                    </div>';
								
									}
								
								}
								
								else
								
								{
								
								
									echo '<h1>Вход</h1>
                    <form method = \'post\' action=\'login.php\'>
                        <input class=\'input\' name=\'login\' type=\'text\' placeholder=\'Логин\' required>
                        <input class=\'input\' name=\'password\' type=\'password\' placeholder=\'Пароль\' required>
                        <input class=\'input\' id=\'submit\' type=\'submit\' name=\'submit\' value=\'Войти\'>
                    </form> 
                    <a id=\'r\' href="?regis=active">Регистрация</a>';
								
								}
				?>