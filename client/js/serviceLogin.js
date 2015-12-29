function cadastrar(){  
    $('.form').submit(function() {
        $.ajax({
            url: 'server/cadastrar.php',
            type: 'POST',
            data: $('.form').serialize(),
            success: function(data) {  
                alert (data);
            }
        });
        return false;
    }); 
}

//Inicio
//document.login_form.entrar.onclick = scripts.fazer_login;