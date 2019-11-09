<?
	if(isset($_GET['song_change'])){
		$song = mysql_fetch_assoc(mysql_query('SELECT * FROM songs WHERE id='.$_GET['song_change'].''));
		$singer =mysql_fetch_assoc(mysql_query('SELECT * FROM `singers` WHERE id = "'.$song["singer_id"].'"') );
		$gentre =mysql_fetch_assoc(mysql_query('SELECT name FROM `genres` WHERE id = "'.$song["gentre_id"].'"') );
		$user = mysql_fetch_assoc(mysql_query('SELECT user_first_name,user_second_name FROM `users` WHERE user_id = "'.$song["user_id"].'"'));
		?><div id='list'> <?
		music($singer['name'], $song['name'],$song['id'],$song['local'],$singer['image_big'],$gentre['name'],$user['user_first_name'],$user['user_second_name'],$userdata['user_rights']);
		?></div> <?
?>
	
 <div id='song_add'>                
    <form action="song_change.php" method="post" enctype="multipart/form-data">
        <h4>Название:</h4><input type='text' name='song_name' placeholder="<? echo $song['name'] ?>" required><br>
        <h4>Жанр</h4><br>
            <?
                    $data = mysql_query('SELECT COUNT(*) FROM `genres`') or die(mysql_error());
                    $data1= mysql_fetch_assoc($data) or die(mysql_error());
                    if($data1['COUNT(*)'] != 0){
                ?>
        Выбрать<input type='radio' name='choise1' value='song_gentre_choise' >
        <select name='song_gentre_choise' required>
        <?
        //echo '<option selected >Выберите</option>';
		$query = mysql_query('SELECT name,id FROM `genres` ') or die(mysql_error());
                while($query1 = mysql_fetch_assoc($query)){
    								?><option  <? if($query1['id']==$song['gentre_id']){
										echo 'selected';
									}
									?> >
                                       <? echo $query1['name'] ?>
                                     </option>' <?
                            	
                        }
            //echo '<option selected>Другой</option>' ;
        ?>
        </select>
          <? } ?>
        <br>
        Добавить<input type='radio' name='choise1' value="song_gentre_add"><input type='text' name='song_gentre_add'><br>
        <h4>Исполнитель</h4> <br>
         <?
        $data2 = mysql_query('SELECT COUNT(*) FROM `singers`') or die(mysql_error());
        $data3= mysql_fetch_assoc($data2) or die(mysql_error());
        if($data3['COUNT(*)'] != 0){
        ?>
        Выбрать<input type='radio' name='choise2' value='song_singer_choise' ><select name='song_singer_choise' required>
         <?
            //echo '<option selected >Выберите</option>';
			$query2 = mysql_query('SELECT name,id  FROM `singers`') or die(mysql_error());
                           
            while( $query3 = mysql_fetch_assoc($query2)){
          
                          
                                ?><option  <? if($query3['id']==$song['singer_id']){
										echo 'selected';
									}
									?> >
                                       <? echo $query3['name'] ?>
                                     </option>' <?
                            	
                        }
                        //echo '<option selected>Другой</option>' ;
    
        ?>
        </select>
        <? } ?><br>
        Добавить<input type='radio' name='choise2' value='song_singer_add'><input type='text' name='song_singer_add'> Выберите фото(необязательно)<input type="file" name="singer_file" >
       <input type="submit" name="submit_song" value="Изменить_<? echo $song['id'] ?>"><br>
    </form>
    </div>
       <?
		}
	
	   ?>         
