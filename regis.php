<?
	mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
if(isset($_POST['submit']))

{

    $err = array();


    # проверям логин

    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))

    {

        $err[0] = "Логин может состоять только из букв английского алфавита и цифр";
		setcookie('err1',$err[0],time()+10);

    }

    

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)

    {

        $err[1] = "Логин должен быть не меньше 3-х символов и не больше 30";
		setcookie('err2',$err[1],time()+10);

    }

    

    # проверяем, не сущестует ли пользователя с таким именем

    $query = mysql_query("SELECT COUNT(user_id) FROM users WHERE user_login='".mysql_real_escape_string($_POST['login'])."'");

    if(mysql_result($query, 0) > 0)

    {

        $err[2] = "Пользователь с таким логином уже существует в базе данных";
		setcookie('err3',$err[2],time()+10);

    }

    if($_POST['password1']!=$_POST['password']){
		$err[3] = 'Пароли не совпадают';
		setcookie('err4',$err[3],time()+10);
	}

    # Если нет ошибок, то добавляем в БД нового пользователя

    if(count($err) == 0)

    {

        
        $login = $_POST['login'];

        

        # Убераем лишние пробелы и делаем двойное шифрование

        $password = md5(md5(trim($_POST['password'])));
		$name = $_POST['first_name'];
		$second=$_POST['second_name'];
		mysql_query("INSERT INTO users SET user_login='".$login."',user_action='1', user_password='".$password."', user_first_name ='".$name."' , user_second_name='".$second."'") or die(mysql_error());

       if($_POST['action']=='9721'){
	   	$action ='admin';
			mysql_query('UPDATE	users SET user_rights ="'.$action.'" , user_action="1" WHERE user_login="'.$login.'"');
	   }
	   header('Location: index.php') or die(mysql_error());
	   exit();

    }

    else

    {		
		header('Location: index.php') or die(mysql_error());
	   exit();
        /*print "<meta charset=\"utf-8\"><b>При регистрации произошли следующие ошибки:</b><br>";

        foreach($err AS $error)

        {

            print $error."<br>";

        }*/

    }

}	
?>