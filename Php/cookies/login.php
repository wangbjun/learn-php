<?php
session_set_cookie_params(0, "/", "", false, true);
session_start();
?>
<html>
<body>
<?php
setcookie('Hello', '123', 0, '/');
//setcookie('Hello', '123', 0, '/', "", false, true);
$_SESSION['user_id'] = 123456;
?>
<p>这是一个关于session的故事</p>
</body>
</html>