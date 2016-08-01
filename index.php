<?php
    if(!isset($_COOKIE['locadora'])){
        header('Location:/login.php');
    }
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Locadora</title>

    <link href="css/bootstrap.css" rel="stylesheet" />

    <script type="text/javascript" src="js/jquery-2.2.4.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/catalogo.js"></script>

</head>
<body>
    <?php include 'menu.php' ?>
    <div class="container">
        <div class="row">
            <section class="content">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="pull-right">
                                <div class="btn-group" id="filtro">
                                    <button type="button" class="btn btn-danger btn-filter" data-target="lancamento">Lançamento</button>
                                    <button type="button" class="btn btn-success btn-filter" data-target="catalogo">Catálogo</button>
                                    <button type="button" class="btn btn-warning btn-filter" data-target="disponivel">Disponível</button>
                                    <button type="button" class="btn btn-primary btn-filter btn-lg" data-target="todos">Todos</button>
                                </div>
                                <div class="col-md-4 pull-right">
                                    <select id="categoria" class="form-control">
                                        <option value="todos">&ndash; Categoria &ndash;</option>
                                        <?php include 'categoria.html' ?>
                                    </select>
                                </div>
                            </div>
                            <div class="table-container">
                                <table id="catalogo" class="table table-filter">
                                <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="content-footer">
                        <p>
                            © - 2016 <br>
                            Criado via recorta-e-cola por EuMesmo
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
