<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login Box HTML Code - www.PSDGraphics.com</title>

<link href="login-box.css" rel="stylesheet" type="text/css" />
</head>

<body>

</form>
<script>
function submitForm(){
    $('#submit-login').submit();
}
</script>
<div style="padding: 200px 0 0 550px;">


<div id="login-box">

<H2>Login</H2>
Para cadastrar ramais, primeiro fa&ccedil;a login
<br />
<br />
<?php 
   $url = "";
        $ip = gethostbyname($url);
       //$ip = $_SERVER['REMOTE_ADDR'];
       $index = 'http://'.$ip.'/intranet/';
?>
<form action="<?php echo $index."/services/acaoLogin.php"; ?>" method="POST" id="submit-login">
<div id="login-box-name" style="margin-top:20px;">Login:</div><div id="login-box-field" style="margin-top:20px;"><input name="login" class="form-login" title="Username" value="" size="30" maxlength="2048" /></div>
<div id="login-box-name">Password:</div><div id="login-box-field"><input name="senha" type="password" class="form-login" title="Password" value="" size="30" maxlength="2048" /></div>
<br />
<span class="login-box-options"><input type="checkbox" name="1" value="1"> Remember Me <a href="#" style="margin-left:30px;">Forgot password?</a></span>
<br />
<br />
<!--<button formaction="../view/cadastrar_ramais.php" type="submit" name="enviar" value="Enviar"></button>-->
<!--<button formaction="../view/cadastrar_ramais.php" type="submit" name="enviar" value="Enviar"><a href="#"><img src="images/login-btn.png" width="103" height="42" style="margin-left:90px;" /></button>-->
<a href="#" onclick="document.forms[0].submit();return false;"><img src="images/login-btn.png" width="103" height="42" style="margin-left:90px;" /></a> 
</form>





</div>

</div>













</body>
</html>