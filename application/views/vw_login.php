<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php $this->load->view('template/vw_headerScriptLogin'); ?>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Entrar</h1>

            <div class="label-float">
                <input type="text" id="email" required>
                <label for="email">Email</label>
            </div>

            <div class="label-float">
                <input type="password" id="senha" required>
                <label for="senha">Senha</label>
            </div>

            <div class="justify-center">
                <button id="entrar">Entrar</button>
            </div> <br>

            <p>Não tem uma conta?
                <a href="cadastro">Cadastre-se</a>
            </p>

        </div>
    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js" integrity="sha256-dOvlmZEDY4iFbZBwD8WWLNMbYhevyx6lzTpfVdo0asA=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	$('#entrar').click(function() {

		email = $('#email').val()
		senha = $('#senha').val()

		if(!email){
			Swal.fire(
  						'Erro!',
  						'Preencha o email!',
  						'error'
			)

			return 0
		}

		if(!senha){
			Swal.fire(
  						'Erro!',
  						'Preencha a senha',
  						'error'
			)

			return 0
		} 

		$.ajax({
			type: "POST",
			url: "login/logar",
			dataType: "json",
			data: {
				email: email,
				senha: senha
			},
			beforeSend: function(){
				console.log('sending...')
			},
			success: function(jsonContent){

				console.log(jsonContent)
				if(jsonContent['status'] == 'usuarioLogado'){
					
					window.location.href = "timeLine";
				} else{
					Swal.fire(
  						'Erro!',
  						'Email ou senha incorretos',
  						'error'
			)
				}
			},
			error: function(){
				alert('error!!!')
			}
		})
		
	})
</script>
