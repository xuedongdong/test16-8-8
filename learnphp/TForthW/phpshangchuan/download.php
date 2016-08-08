<?php
header("Content-type:text/html;charset=utf8");
	$filename = "./uploads/14696744996584.png";
	$basename = pathinfo($filename);
	header("Content-Type:image/png");
	header("Content-Disposition:attachment;filename=".$basename["basename"]);
	header("Content-Length:".filesize($filename));
	readfile($filename);
?>