<?
	if(isset($_GET['song'])){
		if($_GET['song']=='add'){
?>    
    <div id='song_add'>                
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h4>Название:</h4><input type='text' name='song_name' required><br>
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
		$query = mysql_query('SELECT name FROM `genres` ') or die(mysql_error());
                while($query1 = mysql_fetch_assoc($query)){
    								echo'<option>
                                        '.$query1['name'].'
                                     </option>' ;
                            	
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
			$query2 = mysql_query('SELECT name  FROM `singers`') or die(mysql_error());
                           
            while( $query3 = mysql_fetch_assoc($query2)){
          
                          
                                echo'<option>
                                        '.$query3['name'].'
                                     </option>' ;
                            	
                        }
                        //echo '<option selected>Другой</option>' ;
    
        ?>
        </select>
        <? } ?><br>
        Добавить<input type='radio' name='choise2' value='song_singer_add'><input type='text' name='song_singer_add'> Выберите фото(необязательно)<input type="file" name="singer_file" >
        <h4>Выберите файл</h4><input type="file" name="song_file" required><br> 
        Добавить в Мои аудиозаписи<input type='checkbox' name='song_list_add' value="0" class='check'><input type="submit" name="submit_song" value="Добавить"><br>
    </form>
    </div>
       <?
		}
	}
	   ?>         