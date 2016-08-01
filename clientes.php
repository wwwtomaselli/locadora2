<html>
<head>
    <meta charset="UTF-8">
    <title>Locadora</title>

    <link href="/css/bootstrap.css" rel="stylesheet" />
    <link href="/css/bootstrap-datepicker3.css" rel="stylesheet" />
    
    <script type="text/javascript" src="/js/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="/locales/bootstrap-datepicker.pt-BR.min.js"></script>
    <script type="text/javascript" src="/js/jquery.mask.js"></script>
    <script type="text/javascript" src="/js/clientes.js"></script>

</head>
<body><!-- Bootstrap trabalha com 12 colunas, classe "col-md--##' ocupa o espaço de ## colunas -->
    <?php include 'menu.php' ?>
    <div class="container">
        <div class="row">
            <form class="form-horizontal" id="form-clientes">
            <fieldset>

                <!-- Form Name -->
                <legend>Cliente</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome</label>  
                    <div class="col-md-4">
                        <input id="nome" name="nome" type="text" placeholder="Nome completo" class="form-control input-md">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="data-nascimento">Nascimento</label>  
                    <div class="col-md-4" id="seletor-date">
                        <!--input id="data-nascimento" name="data-nascimento" type="text" placeholder="Data de nascimento" class="form-control input-md" -->
                        <div class="input-group date">
                            <input type="text" class="form-control" id="data-nascimento" name="data-nascimento" placeholder="dd/mm/aaaa">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                    </div>
                </div>
                
                

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Telefone">Telefone</label>  
                    <div class="col-md-4">
                        <input id="telefone" name="telefone" type="text" placeholder="Número do telefone" class="form-control input-md tel-mask">
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">E-mail</label>  
                    <div class="col-md-4">
                        <input id="email" name="email" type="text" placeholder="Endereço do e-mail" class="form-control input-md">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cadastrar"></label>
                    <div class="col-md-4">
                        <button id="cadastrar" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
                
            </fieldset>
            </form>
        </div>
    </div><!--/.container-collapse -->
</body>
</html>
