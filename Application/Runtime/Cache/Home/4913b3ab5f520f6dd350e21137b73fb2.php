<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>添加<?php echo ($bigcat); ?>小类</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>

</head>
<body>
<h1>添加<font color="red"><?php echo ($bigcat); ?></font>小类</h1>
<form action="/index.php/Home/Index/test" method="post">
<textarea name="scat" style="height:500px;width:300px;"></textarea><br />
<input type="text" name="big_id" value="<?php echo ($_GET['id']); ?>" style="display:none;" />
<input type="submit" value="提交">
</form>
</body>
</html>