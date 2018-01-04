<?php
	require_once 'config.php';
	include_once 'header.php';
	$id = $_GET['id'];
	$sql = "SELECT * FROM yimaga WHERE id = " . $id;

	startDB();
	$q = execute_sql_select($sql);
	$arr = mysql_fetch_array($q);

	if($arr['img'] == "")
	{
		$img = "img/mianyang.jpg";
	}else
	{
		$img = 'file/'.$arr['img'];
	}
	$sql = "SELECT * FROM yimaga WHERE ParentId = ".$id;
	startDB();
	$q = execute_sql_select($sql);
	
	?>
	<div class="main">
		
        
        <div class="wuxu">
        	<span class="mongol-writing"><?php echo $arr["word"]?></span>
	        <div class="edit">
		        
	        </div>
        </div>
        <div class="jieshao"><span class="mongol-writing"><?php echo $arr['Meaning']?></span></div> 

        
        </div>
        <div class="list">
        <table class="list-tb" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <?php 
          
          while($row = mysql_fetch_array($q))
          {
          	echo '<td valign="top"><span><a href="yimaga.php?id='.$row['id'].'">'.$row['word'].'</a></span></td>';
          }
          
          ?>
          </tr>
        </table>
        </div>
        <div class="tupian"><img width="360" height="360" src="<?php echo $img?>" /></div>
				<?php 
	include_once 'footer.php';
?>