<?
				$data = mysql_query('SELECT COUNT(*) FROM `genres`') or die(mysql_error());
				$data1= mysql_fetch_assoc($data) or die(mysql_error());
				if($data1['COUNT(*)'] != 0){
			?>
                <div class='category'>
                    <h2>Жанры</h2>
                    <?
                    /*for($i=1;$i<=$data1['COUNT(*)'];$i++){
						$query = mysql_query('SELECT name FROM `genres` WHERE id = '.$i.'') or die(mysql_error());
						$query1 = mysql_fetch_assoc($query) ;
							foreach($query1 as $key => $value){
							echo'<div id=\'category1\'>
                       				 <a href=\'?gentre='.$i.'\'>'.$value.'</a>
                   				 </div>' ;
						}	
					}*/$query = mysql_query('SELECT * FROM genres') or die(mysql_error());
						while($query1 = mysql_fetch_assoc($query)){ ?>
							<div class='category1'>
                       				 <a href='?gentre=<? echo $query1['id'] ?>'><? echo $query1['name'] ?></a>
                                     <? if($userdata['user_rights'] == 'admin'){  ?>
                                     <div class='over'>
                                     </div>
                                     <div class='gchange'>
                                    	<form method="post" action='genres_change.php'>
                                        	<input type='text' name = 'gentre_<? echo $query1['id'] ?>'  class='input_g_c' required placeholder="<? echo $query1['name'] ?>"><br>
                                            <input type="submit"  class='submit' value="Изменить">
                                        </form>
                                    </div>
                                    <? }?>
                   				 </div>
						<? }
					?>  
                    <div id='asdf'>
                    </div>
                </div>
                <? } ?>
              