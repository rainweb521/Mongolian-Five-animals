<?php
	require_once 'config.php';
	include_once 'header.php';
	
	
	?>
        <form name="myform" method="post" action="">
	<div class="main">   
		<div class="search"><input class="search-txt mongol-input" name="search" type="text" />
			<input class="search-btn mongol-input" name="subbtn" value="" type="submit" /></div>
        <div class="search-list">
        <table class="search-list-tb" border="0" cellspacing="0" cellpadding="0">
          <tr>
          <?php 
          if($_POST['subbtn'])
          {
          	$search = $_POST['search'];
          	$sql = "SELECT * FROM temege WHERE word like '%$search%'";
          	
          }else {
          	$sql = "SELECT * FROM temege";
          }
          
          startDB();
          $query = execute_sql_select($sql);
          
          while($row = mysql_fetch_array($query))
          {
          	echo '<td valign="top"><span><a href="temege.php?id='.$row['id'].'">'.$row['word'].'</a></span></td>';
          }
          ?>
          </tr>
        </table>
        </div>
        </div>
      
        </form>
				<?php 
	include_once 'footer.php';
?>