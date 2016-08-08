<?php
header("Content-type:text/html;charset=utf8");
//echo "<b>Hello world!</b>";
//$expression = "第一个";

?>

<b><?php
// echo "Hello world!";

?></b>

<html>
	<head>
		<!-- <meta charset="utf8"> --> 
		<title>哈哈<?php if( @$expression)/*echo "PHP语言标记的使用";*/ ?></title>
	
	</head>

	<body <?php echo 'bgcolor=#cccccc'; ?>>
		<?php if($expression){?>
			<p aligin="<?php echo "center"; ?>">This is true</p>
		<?php }else{ ?>
			<p>This is false</p>
		<?php }; ?>

	</body>
</html>