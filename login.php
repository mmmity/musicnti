<?php	
// Страница авторизации
# Функция для генерации случайной строки

function generateCode($length=6) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";

    $code = "";

    $clen = strlen($chars) - 1;  
    while (strlen($code) < $length) {

            $code .= $chars[mt_rand(0,$clen)];  
    }

    return $code;

}

# Соединямся с БД
mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
    mysql_query("SET NAMES 'utf8'") or die(mysql_error());
    mysql_select_db('j92444yo_music') or die(mysql_error());
    # Вытаскиваем из БД запись, у которой логин равняеться введенному

    $query = mysql_query("SELECT user_action,user_id, user_password FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."' LIMIT 1") or die(mysql_error());
	
    $data = mysql_fetch_assoc($query) ;

    
    # Сравниваем пароли

    if($data['user_password'] === md5(md5($_POST['password'])) && $data['user_action'] == 1)

    {

        # Генерируем случайное число и шифруем его

        $hash = md5(generateCode(10));

            

    

        $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";

        

        

        # Записываем в БД новый хеш авторизации и IP

        mysql_query("UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'") or die(mysql_error());
 
        

        # Ставим куки
		$cook  = mysql_query("SELECT user_hash FROM users WHERE user_id='".$data['user_id']."' LIMIT 1") or die(mysql_error());
        
        $cook1 =  mysql_fetch_assoc($cook) or die(mysql_error());
		setcookie('id',$data['user_id'],time()+ 60*60*24*30);
		setcookie('hash',$cook1['user_hash'],time()+ 60*60*24*30);
        # Переадресовываем браузер на страницу проверки нашего скрипта
        header('Location: index.php') or die(mysql_error());
	   exit();
    }

    else

    {	
		$err5='Вы ввели неправильный логин/пароль или вы активированы ';
		setcookie('err5',$err5,time()+10);
        header('Location: index.php?music=all') or die(mysql_error());
	   exit();

    }
	

?>

