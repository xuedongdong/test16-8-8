<?php
header("Content-type:text/html;charset=utf8");
	$upfile = $_FILES['myfile'];
	$path = "./uploads";
	$typelist = array("image/jpeg", "image/gif", "image/png", "image/pjpeg",);
	$filesize = -1;
	
	if ($upfile['error']>0) {
		switch ($upfile['error']) {
			case 1:
				$info = "上传的文件超过了php.ini中upload_max_fielsize选项限制的值。";
				break;
			case 2:
				$info = "上传的文件超过了HTML中upload_max_fielsize选项限制的值。";
				break;
			case 3:
				$info = "文件只有部分被上传。";
				break;
			case 4:
				$info = "没有文件被上传。";
				break;
			case 6:
				$info = "找不到临时文件夹。";
				break;
			case 7:
				$info = "文件写入失败。";
				break;
			default:
				$info = "未知错误！";
				break;
		}
		exit("上传失败！原因：".$info);
	}
	
	if (count($typelist)>0) {
		if (!in_array($upfile['type'], $typelist)) {
			exit("上传文件类型错误！".$upfile['type']);
		}
	}
	
	if ($filesize>0 &&($upfile['size']>$filesize)) {
		exit("文件大小超出[{$filesize}]!");
	}
	
	do{
		$newname = time().rand(1000,9999).".".pathinfo($upfile['name'],PATHINFO_EXTENSION);
	}while (file_exists($path."/".$newname));
	
	if (is_uploaded_file($upfile['tmp_name'])) {
		if (move_uploaded_file($upfile['tmp_name'], $path.'/'.$newname)) {
			echo "上传文件成功！".$newname;
		}else{
			die("移动文件上传失败！");
		}

	}else{
		die("无效的上传文件！");
	}
?>


<html>
	<head><title>文件上传</title></head>
	<body>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
			选择文件：<input type="file" name="myfile">
			<input type="submit" value="上传文件">
		</form>
	</body>
</html>