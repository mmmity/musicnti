<?	
	if(isset($_GET['singer_change'])){?>
		<h4>Исполнитель</h4> <br>
         <?
        $data2 = mysql_query('SELECT COUNT(*) FROM `singers`') or die(mysql_error());
		$asd =mysql_fetch_assoc( mysql_query('SELECT * FROM singers WHERE id='.$_GET['singer_change'].'')); 
        $data3= mysql_fetch_assoc($data2) or die(mysql_error());
        if($data3['COUNT(*)'] != 0){
        ?>
       <form action="singer_choise.php" method="post" enctype="multipart/form-data">
		<input type='text' placeholder="<? echo $asd['name'] ?>" name='song_singer_add_<? echo $_GET['singer_change'] ?>'><br> Выберите фото(необязательно)<br><input type="file" name="singer_file" >
        <h4>Выберите файл</h4><br> 
        <input type="submit" name="submit_song" value="Изменить">
        </form>
<?	}
	}
?>