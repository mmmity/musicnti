   <?
				$data2 = mysql_query('SELECT COUNT(*) FROM `singers`') or die(mysql_error());
				$data3= mysql_fetch_assoc($data2) or die(mysql_error());
				if($data3['COUNT(*)'] != 0){
			?><div class='category'>
                    <h2>Исполнители</h2>
                    <?  $query2 = mysql_query('SELECT * FROM `singers` ') or die(mysql_error());
						 ?>
						<table id='singer'><?
						$i=1;
						while($query3 = mysql_fetch_assoc($query2)){
							if(($i-1)%3==0){
								?><tr><? 
							}
							?>
								<td>
                                <div class='category2' data-title=' <? echo $query3['name'] ?>' title="<? echo $query3['name'] ?>">
                                    <a href='?singer=<? echo $query3['id'] ?>'><img  src="<? echo $query3['image'] ?>" class='face'></a>
                                </div>
                            	</td><? 
							if($i%3==0){
								?> </tr><?
							}
							if($i==$data3['COUNT(*)']){
								?></tr><?
							}
							$i++;
						}
						?></table>
						</div>
					<? } ?>
					
