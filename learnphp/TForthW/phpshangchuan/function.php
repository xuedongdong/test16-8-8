<?php
header("Content-type:text/html;charset=utf8");
	
	function fileupload($upfile, $path, $typelist = array(),$filesize = -1) {
		//1.获取上传文件信息，初始化上传信息变量
		//$upfile = $_FILES['myfile'];
		$path = rtrim($path, "/"); 
		$res["error"] = false;     //表示是否成功
		$res['info'] ="";          //表示上传后的信息 

		//2.通过错误号，判断上传是否成功
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
			$res['info'] = $info;
			return $res;
			//exit("上传失败！原因：".$info);
		}

		//3.可选 是否过滤上传文件类型；
		if (count($typelist)>0) {
			if (!in_array($upfile['type'], $typelist)) {
				$res['info'] = "上传文件类型错误！".$upfile['type'];
				return $res;
			}
		}

		//4.可选，是否过滤上传文件大小
		if ($filesize>0 &&($upfile['size']>$filesize)) {
			$res['info'] = "文件大小超出[{$filesize}]!";
			return $res;
		}

		//5.随机上传文件名称
		do{
			$newname = time().rand(1000,9999).".".pathinfo($upfile['name'],PATHINFO_EXTENSION);
		}while (file_exists($path."/".$newname));
	
		
		//6.执行文件上传移动
		// 判断是否是一个有效的上传文件
		if (is_uploaded_file($upfile['tmp_name'])) {
			//执行移动上传文件
			if (move_uploaded_file($upfile['tmp_name'], $path.'/'.$newname)) {
				$res['info'] =  $newname;
				$res['info'] = ture;
			}else{
				$res = "移动文件上传失败！";
			}

		}else{
			$res = "无效的上传文件！";
		}
		return $res;

	}

	function imageChangeSize($image, $maxwidth, $maxheight, $pre="s_"){
		
		//1.获取被处理的图片信息
		$info = getimagesize($image);
		$width = $info[0];
		$height = $info[1];

		//2.计算缩放后的尺寸
		if ($maxwidth/width < $maxheight/$height) {
			$w = $maxwidth;
			$h = $height*($maxwidth/$width);
		}else{
			$h = $maxheight;
			$w = $width*($maxheight/$height);
		}

		//3.创建图片所需的画布
		switch ($info[2]) {
			case 1:
				$scrim = imagecreatefromgif($image);
				break;
			case 2:
				$scrim = imagecreatefromjpeg($image);
				break;
			case 3:
				$scrim = imagecreatefrompng($image);
				break;
			default:
				exit("无效的图片格式");
		}
		$resim = imagecreatetruecolor($w, $h);
		//创建新图片资源（用于存放缩放后的图片）
		imagecopyresampled($resim , $srcim, 0, 0, 0, 0, $w, $h, $width, $height);

		//5 输出图片
		//定义缩放后的新图片名
		$newimage=pathinfo($image, PATHINFO_DIRNAME)."/".$pre.pathinfo($image, PATHINFO_BASENAME);
		switch ($info[2]) {
			case 1:
				imagegif($resim, $newimage);
				break;
			case 2:
				imagejpeg($resim, $newimage);
				break;
			case 3:
				imagepng($resim, $newimage);
				break;
		}

		//6 销毁图片资源
		imagedestroy($resim);
		imagedestroy($srcim);

		return true;
	}

?>