<?php
/* Smarty version 3.1.29-dev/5, created on 2016-08-08 22:05:50
  from "D:\phpStudy\WWW\learn\1625ci\application\views\templates\user_list.php" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29-dev/5',
  'unifunc' => 'content_57a891be67b0b8_85257299',
  'file_dependency' => 
  array (
    '5e06555484fba32e6a33f8479a497763e102f926' => 
    array (
      0 => 'D:\\phpStudy\\WWW\\learn\\1625ci\\application\\views\\templates\\user_list.php',
      1 => 1470664717,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a891be67b0b8_85257299 ($_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<?php echo '<script'; ?>
 type="text/javascript" src="lib/html5.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="lib/respond.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="lib/PIE_IE678.js"><?php echo '</script'; ?>
>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/public/H-ui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/public/H-ui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/public/H-ui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/public/H-ui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="/public/H-ui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/public/H-ui/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<?php echo '<script'; ?>
 type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>DD_belatedPNG.fix('*');<?php echo '</script'; ?>
>
<![endif]-->
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}'})" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d'})" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
		
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','/User/open_add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong><?php echo $_smarty_tpl->tpl_vars['count']->value;?>
</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">id</th>
				<th width="100">用户名</th>
				<!-- <th width="40">性别</th -->>
				<th width="90">生日</th> 
				<th width="150">邮箱</th>
				<!-- <th width="">地址</th>
				<th width="130">加入时间</th>
				<th width="70">状态</th> -->
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$__foreach_val_0_total = $_smarty_tpl->smarty->ext->_foreach->count($_from);
if ($__foreach_val_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
" name=""></td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
</td>
				<!-- <td><u style="cursor:pointer" class="text-primary" onclick="member_show('张三','member-show.html','10001','360','400')">张三</u></td> -->
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['user_name'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['birthday'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['val']->value['email'];?>
</td>
				<!-- <td class="text-l">北京市 海淀区</td>
				<td>2014-6-11 11:11:42</td>
				<td class="td-status"><span class="label label-success radius">已启用</span></td> -->
				<td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','/User/edit_user','<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,<?php echo $_smarty_tpl->tpl_vars['val']->value['user_id'];?>
)" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
		</tbody>
	</table>
	</div>
</div>
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/lib/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/lib/layer/2.1/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/lib/laypage/1.2/laypage.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/lib/My97DatePicker/WdatePicker.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/lib/datatables/1.10.0/jquery.dataTables.min.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/static/h-ui/js/H-ui.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript" src="/public/H-ui/static/h-ui.admin/js/H-ui.admin.js"><?php echo '</script'; ?>
> 
<?php echo '<script'; ?>
 type="text/javascript">




$(function(){
	$('.table-sort').dataTable({
		"aaSorting": [[ 1, "desc" ]],//默认第几个排序
		"bStateSave": true,//状态保存
		"aoColumnDefs": [
		  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
		  {"orderable":false,"aTargets":[3,4]}// 制定列不参与排序
		]
	});
	$('.table-sort tbody').on( 'click', 'tr', function () {
		if ( $(this).hasClass('selected') ) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});
/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url+'?user_id='+id,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	/*layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});*/
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type : 'post',
			url : '/User/del_user',
			data : {'user_id' : id},
			datatype : 'JSON',
			success : function(res){
				if (res == 'success') {
					$(obj).parents("tr").remove();
					layer.msg('已删除!',{icon:1,time:1000});
				}else{
					layer.msg('删除失败!',{icon:1,time:1000});
				}
			}
		});
		/*$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});*/ 
	});
}

/*用户-批量删除*/
function datadel(){
	/*layer.confirm('确认要删除吗？',function(index){
		$(obj).parents("tr").remove();
		layer.msg('已删除!',{icon:1,time:1000});
	});*/
	layer.confirm('确认要删除吗？',function(index){
		if ($('input:checked').length-1 < 1) {
			layer.msg('不能为空!',{icon:1,time:1000});
		}else{
			for (var i = 0; i <= $('input:checked').length-1; i++) {
				$.ajax({
					type : 'post',
					url : '/User/del_user',
					data : {'user_id' : $('input:checked').eq(i).val()},
					datatype : 'JSON',
					success : function(res){
						if (res == 'fail') {
							return false;
						}
					}
				});
			};
			$('input:checked').parents("tr").remove();
			layer.msg('已删除!',{icon:1,time:1000});
		}
	});
}


<?php echo '</script'; ?>
> 
</body>
</html><?php }
}
