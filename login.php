<html>
<head>
    <meta charset="UTF-8">
    <title>Locadora</title>

    <link href="css/bootstrap.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body>
    <?php include 'menu.php' ?>
<div class="container" style="margin-top:30px">
<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title"><strong>Entrar no sistema</strong></h3>
      <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Esqueceu a senha?</a></div>
  </div>
  
  <div class="panel-body">
      <form role="form" action="/model/login.php" method="POST">
   <div class="alert alert-danger">
                <a class="close" data-dismiss="alert" href="#">×</a>Nome ou senha incorretos!
            </div>
  <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Nome do usuário">                                        
                                    </div>
                                
                            <div style="margin-bottom: 12px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Senha">
                                    </div>
                                    
                                    <div class="input-group">
                                      <div class="checkbox" style="margin-top: 0px;">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Lembrar de mim por uma semana
                                        </label>
                                      </div>
                                    </div>
                                    
  <button type="submit" class="btn btn-success">Entrar</button>
  
  <hr style="margin-top:10px;margin-bottom:10px;" >
  
  <div class="form-group">
                                    
                                        <div style="font-size:85%">
                                            Não possui uma conta? 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Cadastre-se aqui
                                        </a>
                                        </div>
                                    
                                </div> 
</form>
  </div>
</div>
</div>
</div>
</body>
</html>
