<?php
header("Content-type:text/html;charset=utf8");
	function getFilePro($fileName){
		if (!file_exists($fileName)) {
			echo "目标文件不存在！！<br>";
			return;
		}
		if (is_file($fileName)) 
			echo $fileName."是一个文件<br>";
		if (is_dir($fileName)) 
			echo $fileName."是一个目录<br>";
		echo "文件型态：".getFileType($fileName)."<br>";
		echo "文件大小：".getFileSize(filesize($fileName))."<br>";
		if (is_readable($fileName)) 
			echo "文件可读<br>";
		if (is_writable($fileName)) 
			echo "文件可写<br>";
		if (is_executable($fileName)) 
			echo "文件可执行<br>";

		echo "文件建立时间：".date("Y 年 m 月 j 日", filectime($fileName))."<br>";
		echo "文件最后更动时间：".date("Y 年 m 月 j 日", filemtime($fileName))."<br>";
		echo "文件最后打开时间：".date("Y 年 m 月 j 日", fileatime($fileName))."<br>";
	}

	function getFileType($fileName){
		$type = "";
		switch (filetype($fileName)) {
			case 'file':    $type .= "普通文件";
				break;
			case 'dir':     $type .= "目录文件";
				break;
			case 'block':   $type .= "块设备文件";
				break;
			case 'char':    $type .= "字符设备文件";
				break;
			case 'fifo':    $type .= "命名管道文件";
				break;
			case 'link':    $type .= "符号链接";
				break;
			case 'ubknown': $type .= "未知类型";
				break;
			default:        $type .="没有检测到类型";
		}
		return $type;
	}

	function getFileSize($bytes){
		$suffix = "";
		if ($bytes >= pow(2,40)) {
			$return = round($bytes / pow(1024, 4), 2);
			$suffix = "TB";
		}elseif ($bytes >= pow(2, 30)) {
			$return = round($bytes / pow(1024, 3), 2);
			$suffix = "GB";
		}elseif ($bytes >= pow(2, 20)) {
			$return = round($bytes / pow(1024, 2), 2);
			$suffix = "MB";
		}elseif ($bytes >= pow(2, 10)) {
			$return = round($bytes / pow(1024, 1), 2);
			$suffix = "KB";
		}else{
			$return = $bytes;
			$suffix = "Byte";
		}
		return $return ."" . $suffix;

	}
	getFilePro("file.php");
	echo "<br><br>";

	$getFilePro = stat("file.php");
	print_r(array_slice($getFilePro, 13));
	echo "<br><br>";

	$path = "D:/phpstudy/www/file.php";
	echo basename($path)."<br>";
	echo basename($path,".php");
	echo "<br><br>";
	echo dirname($path)."<br>";
	echo dirname('d:/');
	echo "<br><br>";

	$path = "D:/phpstudy/www/file.php";
	$path_parts = pathinfo($path);
	echo $path_parts["dirname"]."<br>";
	echo $path_parts["basename"]."<br>";
	echo $path_parts["extension"]."<br>";
	echo "<br><br>";

	echo realpath("file.php");
	echo "<br><br>";



/*	$num = 0;
	$dirname = 'phpMyAdmin';
	$dir_handle = opendir($dirname);

	echo '<table border="o" align="center" width="600" cellspacing="0" cellpadding="0">';
	echo '<caption><h2>目录'.$dirname.'下面内容</h2></caption>';
	echo '<tr align="left" bgcolor=#cccccc>';
	echo '<th>文件名</th><th>文件大小</th><th>文件类型</th><th>修改时间</th>';

	while($file = readdir($dir_handle)){
		$dirFile = $dirname."/".$file;
		$bgcolor = $num++%2==0 ? '#FFFFFF' : '#CCCCCC';
		echo '<tr bgcolor='.$bgcolor.'>';
		echo '<td>'.$file.'</td>';
			echo '<td>'.filesize($dirFile).'</td>';
			echo '<td>'.filetype($dirFile).'</td>';
			echo '<td>'.date("Y/n/t",filemtime($dirFile)).'</td>';
			echo '</tr>';		
	}
	echo '</table>';
	closedir($dir_handle);
	echo '在<b>'.$dirname.'</b>目录下的子目录和文件共有<b>'.$num.'</b>个';*/

  /*$k = rmdir("testing2");
	var_dump($k);*/

	/*function delDir($directory){
		if (file_exists($directory)) {
			if ($dir_handle = @opendir($directory)) {
				while ($filename = readdir($dir_handle)) {
					if ($filename != "."&& $filename != "..") {
						$subFile = $directory."/".$filename;
						if (is_dir($subFile)) 
							delDir($subFile);
						if (is_file($subFile)) 
							unlink($subFile);
					}
				}
				closedir($dir_handle);
				rmdir($directory);
			}
		}
	}
	delDir("testing1");*/

	$handle = fopen("file.txt", "r");
	var_dump($handle);
	echo "<br>";
	/*$handle = fopen($_SERVER['DOCUMENT_BOOT']."/phpwenjian/file.txt", "r");*/
	/*var_dump($_SERVER['DOCUMENT_BOOT']);*/
	$handle = fopen("D:\\phpStudy\\WWW\\learnphp\\TForthW\\phpwenjian\\file.jpg", "r");
	var_dump($handle);
	echo "<br>";
	$handle = fopen("../phpwenjian/file.txt", "r");
	var_dump($handle);
	echo "<br>";
	$handle = fopen("http://www.baidu.com/", "r");
	var_dump($handle);
	echo "<br><br>";

	$handle = fopen("data.txt", "r") or die(
		"文件打开失败");
	while (!feof($handle)) {
		$buffer = fgets($handle, 4096);
		echo $buffer."<br>";
	}
	fclose($handle);
	echo "<br><br>";

	
	$file = fopen("data.txt", "r") or die(
		"文件打开失败");
	while (!feof($file)) {
		$line = fgets($file, 1024);
		if (preg_match("/<title>(.*)<\/title>/", $line,$out)) {
			echo $title = $out[1];
			break;
		}
	}
	fclose($file);
	echo "<br><br>";

/*	$fileName = "data.txt";
	$handle = fopen($fileName, 'a') or die('打开<b>'.$fileName.'</b>文件失败！！');
	for ($row=0; $row < 10; $row++) 
		fwrite($handle, $row.":www.chinagpx.com\n");
	fclose($handle);*/

	echo file_get_contents("data.txt");
	echo file_get_contents("D:\\phpStudy\\WWW\\learnphp\\TForthW\\phpwenjian\\file.jpg");
	$handle = fopen("data.txt", "r") or die("文件打开失败");
	while (!feof($handle)) {
		$buffer = fgets($handle, 4096);
		echo $buffer."<br>";
	}
	fclose($handle);
	$fp = fopen("data.txt", "r") or die("文件打开失败");
	while (false!==($char = fgetc($fp))) {
		echo $char."<br>";
	}
	print_r(file("test.txt"));
	readfile("data.txt");
?>