<?php
include "../Basis/Main.php";
cadastro_usuariotitular();
login_criasessao();
pos_cadastro_usuariotitular();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap" rel="stylesheet">



    <title>Login/Cadastro</title>
    <style>
        /*HTML e JavaScript tá tudo certo*/
        /*CSS, se eu não comentei eu não sei o que é, mas funciona>*/
       
   </style>
</head>
<body>



<div class="container" >
    <div id="loginForm" class="form active" method="post">

        <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
        <form action= "login.php" method="post" class="form" >
        <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->
        
            <h1 style="margin:auto;">LOGIN</h1>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="cpf">CPF do Titular</label>
                    <br>
                    <input type="cpf" placeholder="CPF do Usuário Titular" name="cpf" required>
                </div>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="usuario">Login</label>
                    <br>
                    <input type="usuario" placeholder="Login" name="usuario" required>
                </div>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="senha">Senha</label>
                    <br>
                    <input type="senha" placeholder="Senha" name="senha" required>
                </div>
                <input class="button" type="submit" name="logar" value="Entrar" class="btn btn-primary" style=" cursor:pointer;display: block;text-align: center;margin: auto;padding: 10px;background-color: rgb(2, 40, 122);color: rgb(255,255,255);border: none;border-radius: 30px;width: 30%;transition: all 0.6s ease-in-out;">
        
        <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
        </form>
        <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->    

    </div>
    <div id="registerForm" class="form">
        
        <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
        <form action= "login.php" method="post" class="form" >
        <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->

            <h1 style="margin:auto;">CADASTRE-SE</h1>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="nome">Nome</label>
                    <br>
                    <input type="text" placeholder="Nome" name="nome" required>
                </div>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="cpf">CPF</label>
                    <br>
                    <input type="text" placeholder="CPF" name="cpf" required>
                </div>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="email">Email</label>
                    <br>
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="grupo" style="margin:auto;">
                    <label class="form-check-label" for="senha">Senha</label>
                    <br>
                    <input type="password" placeholder="Senha" name="senha" required>
                </div>
                <!-- <div class="grupo">
                    <label class="form-check-label" for="confirmasenha">Confirme a Senha</label>
                    <br>
                    <input type="password" placeholder="Confirme a Senha" name="confirmasenha" required>
                </div> -->
                <input class="button" type="submit" name="cadastro" value="Cadastrar-se" class="btn btn-primary" style="margin:auto; cursor:pointer;display: block;text-align: center;margin: auto;padding: 10px;background-color: rgb(2, 40, 122);color: rgb(255,255,255);border: none;border-radius: 30px;width: 30%;transition: all 0.6s ease-in-out;">
        
        <!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
        </form>
        <!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->

    </div>
</div>


<div id="botao" class="container" >
    <img class="logo" src="../imagens/ilustracao.png.jpeg" style="margin:auto;">
<button id="toggleButton" class="special_button">Cadastre-se</button>
</div>

<script>
    const toggleButton = document.getElementById('toggleButton');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    toggleButton.addEventListener('click', () => {
        loginForm.classList.toggle('active');
        registerForm.classList.toggle('active');
        toggleButton.textContent = toggleButton.textContent === 'Cadastre-se' ? 'Login' : 'Cadastre-se';
    });
</script>

<!-- INÍCIO ALTERAÇÃO PEDRO DATA 06/10/2024 -->
<!-- <script src="Main.php"></script> -->
<!-- <script src="Basis/AJAX.js"></script> -->
<!-- FIM ALTERAÇÃO PEDRO DATA 06/10/2024 -->
 
</body>
</html>
