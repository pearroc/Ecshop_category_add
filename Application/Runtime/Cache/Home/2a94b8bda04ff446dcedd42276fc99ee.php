<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>分类管理</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<style>
.catlist li{margin:10px 0;}
.catlist li:hover{background:#eee;}
</style>
</head>
<body>
<a href="/index.php/Home/Index/add">添加大类</a>
<ul class="catlist">
<?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cat): $mod = ($i % 2 );++$i;?><li><?php echo ($cat["cat_name"]); ?>[<?php echo ($catnum["$key"]); ?>]<span><a href="/index.php/Home/Index/sadd/id/<?php echo ($cat["cat_id"]); ?>">添加小类</a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</body>
</html>