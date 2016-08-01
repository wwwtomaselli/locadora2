$(document).ready(function(){
    var usuario = document.cookie.split('=');
    usuario = decodeURIComponent(usuario[1]);
    usuario = JSON.parse(usuario);
    console.log(usuario);
    $('#usuario').html(usuario.nome.replace('+',' ') + ' (logout)');
    
    $('#usuario').click(function(e){
        e.preventDefault();
        var expirar = new Date();
        expirar.setHours(-1);
        document.cookie = 'locadora=off; expires=' + expirar.toUTCString()+ '; path=/';
        window.location = '/login.php';
    });
});