function cadastrar(){
    if (document.getElementById("email").value.length <= 5){
        alert ("E-Mail Inválido!");
    } else if (document.getElementById("login").value.length < 5){
        alert ("Login muito curto!");
    } else if (document.getElementById("senha").value.length < 5){
        alert ("Senha muito curta!");
    } else {
        $('.form').submit(function() {
            $.ajax({
                url: 'server/cadastrar.php',
                type: 'POST',
                data: $('.form').serialize(),
                success: function(data) {  
                    alert (data);
                    document.getElementById('login').value='';
                    document.getElementById('senha').value='';
                    document.getElementById('email').value='';
                }
            });
            return false;
        });  
    }
}