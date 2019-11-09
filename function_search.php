<?		mysql_connect('localhost','j92444yo_music','MRE9%x%k') or die(mysql_error());
	mysql_query("SET NAMES 'utf8'") or die(mysql_error());
	mysql_select_db('j92444yo_music') or die(mysql_error());
	function music($singer,$name,$song_id,$local,$singer_image_big,$gentre,$user1,$user2,$right){
		?>     
    <div class="music">
    <?	
		$singer_id=mysql_fetch_assoc(mysql_query('SELECT * FROM songs WHERE id="'.$song_id.'"'));
		$like = mysql_fetch_assoc(mysql_query('SELECT * FROM assessments WHERE user_id = "'.$_COOKIE['id'].'" and song_id="'.$song_id.'"'));
		$rank =  mysql_fetch_assoc(mysql_query('SELECT *,SUM(assess) FROM assessments WHERE  song_id="'.$song_id.'"'));
		$change = mysql_fetch_assoc(mysql_query('SELECT user_id_change FROM  songs WHERE  id="'.$song_id.'"'));
		$user = mysql_fetch_assoc(mysql_query('SELECT * FROM  users WHERE  user_id="'.$change['user_id_change'].'"'));
		//$song_id[$i]=$query01['id'];
            	echo '<table>
                    <tr>
                        <td>';
						if(isset($_GET['rank'])){
                       echo	'Нравится '.$rank["SUM(assess)"].' людям ';
						}
					   echo '| '.$singer.'   - 
                        </td>
                        <td>
                        	
						'.$name.' | 
							
                        </td>
						<td>';
						if(!isset($_GET['song_change'])){
							echo '<input type=\'checkbox\' name=\'song_list_add[]\' value="'.$song_id.'" class=\'check\'>';
						}
						
					echo	'</td>
                    </tr>
                </table>
                <table>
                    <tr>
                    	<td>
                        	<audio id =\'song\' controls>
                    			<source src="'.$local.'" type="audio/mpeg">
                			</audio>
                        </td>
                        ';
					if($right == 'admin'  && !isset($_GET['song_change'])){
						
		echo '<td><a class=\'get_a\' href=\'?song_change='.$song_id.'\'>Изменить</a></td>
					';}
					echo '
                        
                    </tr>
                </table>';
					
               ?> <div class='box'>
               		<div id='box1'>
                        <img src='<? echo $singer_image_big ?>' width="250px" height="250px"> 
                     </div>
                     <div id='box2'>
                        	<h4>Жанр:<? echo $gentre ?></h4>                     
                        	 <h4>Загрузил:<? echo $user1.' '.$user2 ?></h4>
                             <? if($change['user_id_change'] != 0){ ?>
                             	<h4>Изменил:<? echo $user['user_first_name'].' '.$user['user_second_name'] ?></h4>
                             <? } ?>
                             <? if(!isset($_GET['song_change'])){
								 if($like == NULL){
								 ?>
                                	 <a class='get_a' href='song_like.php?song_like=<? echo $song_id ?>'>Мне нравится </a><br>
                                 <? }else{?>
                                 	<a class='get_a' href='song_dislike.php?song_dislike=<? echo $song_id ?>'>Мне не  нравится </a><br>
								<? }  } ?>
                                 <? if($right == 'admin' && !isset($_GET['song_change'])){?>
                                 <a class='get_a' href='song_delete.php?song_delete=<? echo $song_id ?>'>Удалить </a><br><br><br>
                                 <? } ?>
                                 <? //if($right == 'admin'){ ?>
                                 <!--<a class='get_a' href='?singer_change=<? //echo $singer_id['singer_id'] ?>'>Изменение исполнителя </a>-->
                                 <? //} ?>
                        </div>  
                        </div>
                      </div>
				<?		
					}
?>