$(document).ready(function(){
    //Primeira etapa do cadastro: informar as opções de ano no Select '#ano'    
    var anos = "";
    var hoje = new Date();
    for(var i = 1940; i <= hoje.getFullYear(); i++){
        anos = anos + '<option value=' + i + '>' + i + '</option>';
    }
    $("#ano").append(anos);
    
    //Caso tenha sido passado no endereço da página o parâmetro "id"
    //("/cadastro.php?id=numero"), preencher o formulário com os dados 
    //do filme presente na tabela 'catalogo' do banco de dados 'locadora',
    //no registro onde 'idcatalogo' = "id"
    var id = getID();
    if(id != null){
        $.getJSON('/model/cadastro.php', {"id": id}).done(function(retorno){
            $('#idcatalogo').val(retorno.idcatalogo);
            $('#nome').val(retorno.nome);
            $("#ano").val(retorno.ano);
            $('#tipo-' + retorno.tipo).prop('checked',true);
            $('#midia').val(retorno.midia);
            $('#disponivel').val(retorno.disponivel);
            $('#sinopse').val(retorno.sinopse);
            $('#categoria').val(retorno.categoria.split(','));
        });
        var alerta = $('<div class="alert alert-warning alert-dismissible col-md-8 col-md-offset-2" role="alert">' + 
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
        '<span aria-hidden="true">&times;</span></button>' + 
        '<strong><i class="glyphicon glyphicon-warning-sign"></i> Atenção!</strong> Os dados do filme serão alterados.' + 
        '</div>');
    } else {
        var alerta = $('<div class="alert alert-info alert-dismissible col-md-8 col-md-offset-2" role="alert">' + 
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
        '<span aria-hidden="true">&times;</span></button>' + 
        '<strong><i class="glyphicon glyphicon-plus"></i> Cadastro</strong> de um novo filme.' + 
        '</div>');
    }
    $('#alertas').append(alerta);
    
    //Limitar a entrada 'id = disponivel' a receber apenas números
    $('#disponivel').keydown(function(evento){
        if((evento.keyCode >= 48 && evento.keyCode <= 57) || evento.keyCode == 08 || 
        evento.keyCode == 46 || (evento.keyCode >= 37 && evento.keyCode <= 40) || 
        (evento.keyCode >= 96 && evento.keyCode <= 105)  || evento.keyCode == 09){
            return true;
        } else {
            return false;
        } 
    });
        
    //Evento 'submit' (enviar dados) ao clicar no botão 
    $('#form-cadastro').submit(function(evento){
        //Desativar o envio direto dos dados, para serem tratados na sequência
        evento.preventDefault();
        
        //Validar o formulário
        if (!validar_formulario(this)){return false;};
        
        //Gerar o vetor a partir do formulário
        var dados = $(this).serialize();
        
        //Tratamento do retorno (chamado pelo método '$.post.done' logo abaixo)
        var tratar_retorno = function(retorno){
            $('#alertas').empty(); //Retirar os alertas no topo da página
            Retorno = JSON.parse(retorno); //Obter o retorno enviado por '/model/cadastro.php'
            
            if(Retorno.status == 'ok'){            
            var alerta = $('<div class="alert alert-success alert-dismissible col-md-8 col-md-offset-2" role="alert">' + 
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
            '<span aria-hidden="true">&times;</span></button>' + 
            '<strong><i class="glyphicon glyphicon-ok"></i> Sucesso!</strong> Filme adicionado.' + 
            '</div>');
            $('input, select, textarea').val('');
            $('input:first').focus();
            //$('#form-cadastro div.form-group:first').find('input,select,textarea').focus();
            
            } else {
            var alerta = $('<div class="alert alert-danger alert-dismissible col-md-8 col-md-offset-2" role="alert">' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' + 
            '<span aria-hidden="true">&times;</span></button>' +
            '<strong><i class="glyphicon glyphicon-remove"></i> Erro!</strong> Filme não adicionado.' + 
            '</div>');
            };
            $('#alertas').append(alerta);
        };
        
        //Enviar os dados à página '/model/cadastro.php' (método '.post')
        //e tratar o resultado fornecido por aquela página (método '.done')
        $.post('/model/cadastro.php', dados).done(tratar_retorno);
    });
    
    $('#arq-imagem').change(function(){
        var file = this.files[0];
        var img = $('#arq-imagem-exibir');
        
        img.removeClass("hide");
        // !!!verificar o tipo de arquivo!!!
        // https://developer.mozilla.org/pt-BR/docs/Using_files_from_web_applications
        var reader = new FileReader();
        reader.onload = (function(aImg) {
            return function(e) {
                var imgsrc = e.target.result;
                
                aImg.attr('src', imgsrc); 
                $('#img-src').val(imgsrc);
            }; 
        })(img);
        reader.readAsDataURL(file);
    });
});

//Marcar no formulário os dados não informados
function validar_formulario(form){
    var valido = true; //inicialmente, o formulário é tido como validado
    $(form).find('.form-group').removeClass('has-error'); //remover marcas de erro
    $(form).find('span.glyphicon-remove').remove(); //remover marcas de erro
    //Se alguma entrada 'input', 'select' ou 'textarea' estiver
    //sem dados informados, marcar como erro
    //(ignorar a entrada 'hidden' do cadastro)
    $(form).find('input, select, textarea').each(function(idx, elemento){
        if(($(elemento).val() == '' || $(elemento).val() == null) && 
        ($(elemento).attr('type') != 'hidden' && $(elemento).attr('type') != 'radio')){
            valido = false; //Formulário invalidado
            $(elemento).parent().parent().addClass('has-error');
            if($(elemento).attr('type') == 'text' ){
                $(elemento).after('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>');
            };
        };
    });
    return valido;
};


function getID(){
    var uri = window.location.search.substr(1);
    return uri.split('=')[1];
}
