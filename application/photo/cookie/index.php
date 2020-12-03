<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>

<?php
$expire=time()+60*60*24*30;
setcookie("userinfo", "cuiqun", $expire);

if (isset($_COOKIE["user"]))
    echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
    echo "普通访客!<br>";
?>

</body>
</html>
<?php
// 设置Cookie 有效期为 3600秒
Cookie::set('name','value',3600);
// 设置cookie 前缀为think_
Cookie::set('name','value',['prefix'=>'think_','expire'=>3600]);
// 支持数组
Cookie::set('name',[1,2,3]);
Cookie::get('name');
// 获取指定前缀的cookie值
Cookie::get('name','think_');

?>