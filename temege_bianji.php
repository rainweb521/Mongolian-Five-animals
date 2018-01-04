<?php
	require_once 'config.php';
	include_once 'header.php';
	echo $id = $_GET['id'];
	if($_POST['subbtn'])
	{
		$id = $_POST['id'];
		$word = $_POST['word'];
		$meaning = $_POST['meaning'];
		
		$uploaddir='file/';//文件保存路径
		if(!file_exists('file/'))
		{
			mkdir('file/');
		}
		$filename = $_FILES['file']['name'];
		if(is_uploaded_file($_FILES['file']['tmp_name']))
		{
			if(move_uploaded_file($_FILES['file']['tmp_name'], $uploaddir.$filename))
			{
				
			}
		}
		$sql = "UPDATE temege SET word = '$word', Meaning = '$meaning', img ='$filename' WHERE id=".$id;
		startDB();
		execute_sql_select($sql);
		
		header("Location:temege.php?id=".$id);
		die;
	}
	$sql = "SELECT * FROM temege WHERE id = " . $id;
	startDB();
	$query = execute_sql_select($sql);
	$arr = mysql_fetch_array($query);
	?>
        <form enctype="multipart/form-data" name="myform" method="post" action="" >
	<div class="main">
        <div class="tupian">
        	<img width="360" height="360" src="<?php echo $arr['img']?>" />
        	<input type="hidden" name="id" value="<?php echo $id?>" />
        </div>
        <div class="tupian-file"><input class="mongol-input img-file"  name="file" type="file" /></div>
        <div class="name">
        	<span class="mongol-writing">:</span>
        	<input class="mongol-input name-txt" name="word" type="text" value="<?php echo $arr['word']?>" />
        </div>
        <div class="xiangxi"><span class="mongol-writing">:</span></div>
        <div class="xiangxi-edit"><textarea class="mongol-input edit-textarea" name="meaning" cols="" rows=""><?php echo $arr['Meaning']?></textarea></div> 
    </div>
        <div class="btn-box"><input class="mongol-input edit-btn" name="subbtn" type="submit" value="" /></div>
        </form>
				<?php 
	include_once 'footer.php';
?>