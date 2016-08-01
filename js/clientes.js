 $(document).ready(function(){
    $('#seletor-date .input-group.date').datepicker({
    format: "dd/mm/yyyy",
    endDate: "today",
    startView: 2,
    maxViewMode: 3,
    todayBtn: "linked",
    clearBtn: true,
    language: "pt-BR"
    });
    
    $('.tel-mask').mask('(00) 0000-0000');
    
    $('#form-clientes').submit(function(evento){
        //Desativar o envio direto dos dados, para serem tratados na sequência
        evento.preventDefault();
        
        //Gerar o vetor a partir do formulário
        var dados = $(this).serialize();
        
        //Tratamento do retorno (chamado pelo método '$.post.done' logo abaixo)
        var tratar_retorno = function(retorno){
            Retorno = JSON.parse(retorno); //Obter o retorno enviado por '/model/cadastro.php'
            
            if(Retorno.status == 'ok'){            
            console.log('ok');
            } else {
            console.lg('ok');
            };            
        };
        
        //Enviar os dados à página '/model/clientes.php' (método '.post')
        //e tratar o resultado fornecido por aquela página (método '.done')
        $.post('/model/clientes.php', dados).done(tratar_retorno);
    });
});