<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form class="form-horizontal" style="margin:20px 0px 0px 30px" action="php/action_login.php" name="form_login" method="post">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email" name="usuario_login">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Senha</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Senha" name="senha_login">
    </div>
  </div>
  <div class="control-group">
  
    <div class="controls">
      <input type="hidden" name="duplo" value="1" id="inputEmail">
    </div>
 
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox"> Lembrar-se
      </label>
      <button type="submit" class="btn">Entrar</button>
    </div>
  </div>
</form>
</body>
</html>