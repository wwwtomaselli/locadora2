<html>
<head>
    <meta charset="UTF-8">
    <title>Locadora</title>

    <link href="/css/bootstrap.css" rel="stylesheet" />
    
    <script type="text/javascript" src="/js/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="/js/bootstrap.js"></script>
    <script type="text/javascript" src="/js/cadastro.js"></script>

</head>
<body><!-- Bootstrap trabalha com 12 colunas, classe "col-md--##' ocupa o espaço de ## colunas -->
    <?php include 'menu.php' ?>
    <div class="container">
        <div class="row">
            <!-- Atributo enctype: para enviar arquivo binário (no caso, uma imagem) -->
            <form class="form-horizontal" id="form-cadastro" enctype="multipart/form-data">
            <fieldset>
            <!-- Número do cadastro (oculto) -->
            <input type="hidden" name="idcatalogo" id="idcatalogo" readonly />
            
            <!-- Form Name -->
            <legend>Cadastro de Filme</legend>
            
            <!-- Alert -->
            <div class="row" id="alertas"></div>

            <!-- Text input-->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="nome">Título</label>  
                <div class="col-md-4">
                <input id="nome" name="nome" type="text" placeholder="Título do filme" class="form-control input-md">
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="ano">Ano de lançamento</label>
                <div class="col-md-4">
                    <select id="ano" name="ano" class="form-control">
                        <option value="">&ndash; Selecione &ndash;</option>
                    </select>
                </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="tipo">Tipo</label>
                <div class="col-md-4">
                    <div class="radio">
                        <label for="tipo-0">
                        <input type="radio" name="tipo" id="tipo-catalogo" value="catalogo" checked="checked">
                        Catálogo
                        </label>
                    </div>
                    <div class="radio">
                        <label for="tipo-1">
                        <input type="radio" name="tipo" id="tipo-lancamento" value="lancamento">
                        Lançamento
                        </label>
                    </div>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="midia">Mídia do filme</label>
                <div class="col-md-4">
                    <select id="midia" name="midia" class="form-control">
                        <option value="">&ndash; Selecione &ndash;</option>
                        <option value="DVD">DVD</option>
                        <option value="BluRay">BluRay</option>
                        <option value="VHS">VHS</option>
                    </select>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="disponivel">Quantidade</label>  
                <div class="col-md-4">
                    <input id="disponivel" name="disponivel" type="text" placeholder="Quantidade disponível" class="form-control input-md">
                </div>
            </div>

            <!-- Select Multiple -->
            <!-- <aelect name="nome_do_vetor[]" para passar um vetor com as seleções-->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="categoria">Categoria</label>
                <div class="col-md-4">
                    <select id="categoria" name="categoria[]" class="form-control" multiple="multiple">
                        <?php include 'categoria.html' ?>
                    </select>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group has-feedback">
                <label class="col-md-4 control-label" for="sinopse">Sinopse</label>
                <div class="col-md-4">                     
                    <textarea class="form-control" id="sinopse" name="sinopse"></textarea>
                </div>
            </div>
            
            <!-- File Button --> 
            <div class="form-group">
                <label class="col-md-4 control-label" for="imagem">Capa do filme</label>
                <div class="col-md-4">
                    <!-- class hide -->
                    <img id="arq-imagem-exibir" width="100" height="150" src="imagens/image.jpg" class="hide"/>
                    <input type="file" id="arq-imagem" name="arq-imagem" class="input-file">
                    <input type="hidden" id="img-src" name="img-src">
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
<!-- http://getbootstrap.com/css/#forms-control-validation -->
<!-- http://getbootstrap.com/components/#alerts-dismissible -->
</html>
