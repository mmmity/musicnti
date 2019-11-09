<?php
	$html_start = '<!doctype html>
				<html>
				<head>
					<meta charset=\'utf-8\'>
					<link rel=\'stylesheet\' type=\'text/css\' href=\'style.css\'>
					<title>Ляляля</title>
				</head>
				<body>';
	$html_web_start= '<div id=\'web\'>
        <div id=\'head\'>
            <div id=\'head_name\'>
            	<МУЗЫКА>
            </div>
            <div id=\'autoriz\'>
                <div id=\'in\'>';
	$html_web_in= '<h1>Вход</h1>
                    <form>
                        <input class=\'input\' type=\'text\' placeholder=\'Логин\' required>
                        <input class=\'input\' type=\'password\' placeholder=\'Пароль\' required>
                        <input class=\'input\' id=\'submit\' type=\'submit\' value=\'Войти\'>
                    </form> 
                    <a id=\'r\' href=\'#\'>Регистрация</a>
					</div>
            </div>
        </div>';	
	$html_web_out= '<div id=\'wellcome\'>
                        <h1>Здравствуйте</h1><br>
                        <p id=\'p\'><h3>Владислав</h3></p>
                        <input id=\'submit\' type=\'submit\' value=\'Выйти\'>.
						</div>
                    </div>
            </div>
        </div>';
	$html_body_base1 = '
            <div id=\'base1\'>
                <div id=\'category\'>
                    <h2>Жанры</h2>
                    <div id=\'category1\'>
                        Рок
                    </div>
                    <div id=\'category1\'>
                        Поп
                    </div>
                    <div id=\'category1\'>
                        Джаз
                    </div>
                    <div id=\'category1\'>
                        Классика
                    </div>
                    <div id=\'category1\'>
                        Рок
                    </div>
                </div>
                <div id=\'category\'>
                    <h2>Исполнители</h2>
                    <table id=\'singer\'>
                       <tr>
                            <td>
                                <div id=\'category2\' data-title=\'Софийский собор\'>
                                    <img src=\'#\' >
                                </div>
                            </td>
                            <td>
                                <div id=\'category2\' data-title=\'Софийский собор\'>
                                    <img src=\'#\'>
                                </div>
                            </td>
                           <td>
                                <div id=\'category2\' data-title=\'Софийский собор\'>
                                    <img src=\'#\'>
                                </div>
                            </td>
							<td>
                                <div id=\'category2\' data-title=\'Софийский собор\'>
                                    <img src=\'#\'>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div> ';	
			$html_body_base2_registr_form = '
				<div id=\'registr_form\'>
                	<h1>Регистрация</h1><br><br>
                   	<form method=\'post\'>
                    	<input class=\'r\' name=\'first_name\' type=\'text\' required placeholder=\'Имя\'><br><br>
                    	<input class=\'r\' name=\'second_name\' type="text" required placeholder="Фамилия"><br><br>
                    	<input class=\'r\' name=\'login\' type="text" required placeholder="Логин"><br><br>
                        <input class=\'r\' name=\'password\' type="text" required placeholder="Пароль"><br>
                        <input class=\'r\' name=\'password1\' type="text" required placeholder="Повторите пароль"><br><br>
                        <input class=\'r\' name=\'action\' type="text"  placeholder="VIP(Пропустите)"><br><br><br>
                        <input id=\'submit1\' name=\'submit\' type="submit" value=\'Отправить\'>
                    </form>
                </div>
			';	
												
?>