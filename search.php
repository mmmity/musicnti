
 <div id='search'>
	<form method='get' action="index.php">
    	<input type="search" name='search' placeholder="Поиск по названию..." title="Поиск по названию..." class='search'>
         <?
        $data2 = mysql_query('SELECT COUNT(*) FROM `singers`') or die(mysql_error());
        $data3= mysql_fetch_assoc($data2) or die(mysql_error());
        if($data3['COUNT(*)'] != 0){
        ?>
      
     <select id="singer_id" name='song_singer_choise1' title="Исполнитель" class='search' >
         <?
            echo '<option value="0">Выберите исполнителя</option>';
			$query2 = mysql_query('SELECT *  FROM `singers`') or die(mysql_error());
                           
            while( $query3 = mysql_fetch_assoc($query2)){
          
                          //$mas[] = $query3;
                                echo'<option  value="'.$query3['id'].'">
                                        '.$query3['name'].'
                                     </option>' ;
                            	
                        }
                        //echo '<option selected>Другой</option>' ;
    
        ?>
        </select>
        <? } ?>
         <?
                    $data = mysql_query('SELECT COUNT(*) FROM `genres`') or die(mysql_error());
                    $data1= mysql_fetch_assoc($data) or die(mysql_error());
                    if($data1['COUNT(*)'] != 0){
                ?>
        <select id="genres_id" name='song_gentre_choise1' class='search' title='Жанр' >
        <?
        echo '<option value="0" >Выберите жанр</option>';
		$query = mysql_query('SELECT * FROM `genres` ') or die(mysql_error());
                while($query1 = mysql_fetch_assoc($query)){
    								echo'<option  value="'.$query1['id'].'">
                                        '.$query1['name'].'
                                     </option>' ;
                            	
                        }
            //echo '<option selected>Другой</option>' ;
        ?>
        </select>
			<input type="button" id='reset_search' name='reset_search' value="Сброс">
             <input type="submit" id='submit_search' name='submit_search'>
          <? } ?>
	</form>
</div>
<?
	if(isset($_GET['submit_search'])){
		
		if($_GET['search']!=NULL && !$_GET['song_singer_choise1'] && !$_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE name LIKE "%'.trim($_GET['search']).'%"');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}
		else if($_GET['search']==NULL && !$_GET['song_singer_choise1']&& $_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE gentre_id="'.$_GET['song_gentre_choise1'].'"');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}
		else if($_GET['search']==NULL && $_GET['song_singer_choise1'] && !$_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE singer_id="'.$_GET['song_singer_choise1'].'"');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}      
		else if($_GET['search']==NULL && $_GET['song_singer_choise1'] && $_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE singer_id="'.$_GET['song_singer_choise1'].'" and gentre_id="'.$_GET['song_gentre_choise1'].'"');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}  
		else if($_GET['search'] && $_GET['song_singer_choise1'] && !$_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE singer_id="'.$_GET['song_singer_choise1'].'" and name LIKE "%'.$_GET['search'].'%"');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}
		else if($_GET['search'] && !$_GET['song_singer_choise1'] && $_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE gentre_id="'.$_GET['song_gentre_choise1'].'" and name LIKE "%'.$_GET['search'].'%"');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}   
		else if($_GET['search']!=NULL && $_GET['song_singer_choise1'] && $_GET['song_gentre_choise1']){
			$query01 =mysql_query('SELECT * FROM songs WHERE gentre_id="'.$_GET['song_gentre_choise1'].'" and name LIKE "%'.$_GET['search'].'%" and singer_id="'.$_GET['song_singer_choise1'].'" ');
			 ?> <div id='list'><form method="post" action='song_list_add.php'> <?
			while($song = mysql_fetch_assoc($query01)){
				$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
				$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
				$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
				music($singer['name'],$song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
				
			}
			?><div class='contenCheck'><input type="submit" value='Добавить в мои аудиозаписи'></div>
                    </form> </div><?
		}else{
			echo 'Введите параметры поиска ';
		}
	
	
	}
?>
