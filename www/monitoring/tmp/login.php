<html>
<head>
<title>Login Result</title>
</head>
<body>
<h1>Request Result</h1>
<?php
$atr=$_POST['LoginForm'];
print_r($atr);
print '<br>Login='.$atr['username'];
print '<br>Password='.$atr['password'].'<br>';
print_r($_POST);
?>
</body>
</html>
