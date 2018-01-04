<?php
	require_once 'config.php';
	include_once 'header.php';
	echo $pid = $_GET['pid'];
	if($_POST['subbtn'])
	{
		$pid = $_POST['pid'];
		$word = $_POST['word'];
		$meaning = $_POST['meaning'];
		
		$uploaddir='file/';//文件保存路径
		if(!file_exists('file/'))
		{
			mkdir('file/');
		}
		$file = $uploaddir.$_FILES['file']['name'];
		if(is_uploaded_file($_FILES['file']['tmp_name']))
		{
			if(move_uploaded_file($_FILES['file']['tmp_name'], $file))
			{
				
			}
		}
		$sql = "INSERT INTO temege(word, Meaning, ParentId, img) VALUES('" . $word . "','" . $meaning . "','" . $pid . "','".$_FILES['file']['name']."')";
		startDB();
		execute_sql_select($sql);
		
		header("Location:temege.php?id=".$pid);
		die;
	}
	
	?>
        <form enctype="multipart/form-data" name="myform" method="post" action="" >
	<div class="main">
        <div class="tupian">
        	<img width="360" height="360" src="img/luotuo.jpg" />
        	<input type="hidden" name="pid" value="<?php echo $pid?>" />
        </div>
        <div class="tupian-file"><input class="mongol-input img-file"  name="file" type="file" /></div>
        <div class="name">
        	<span class="mongol-writing">:</span>
        	<input class="mongol-input name-txt" name="word" type="text" />
        </div>
        <div class="xiangxi"><span class="mongol-writing">:</span></div>
        <div class="xiangxi-edit"><textarea class="mongol-input edit-textarea" name="meaning" cols="" rows=""></textarea></div> 
    </div>
        <div class="btn-box"><input class="mongol-input edit-btn" name="subbtn" type="submit" value="" /></div>
        </form>
				<?php 
	include_once 'footer.php';
?>