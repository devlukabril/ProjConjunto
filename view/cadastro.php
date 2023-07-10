<?php

require '../controller/RegisterProcess.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
    
  </style>
</head>
<body>
  <div class="container">
    <h2>Formulário de Cadastro</h2>
    <form>
      <div class="form-group" method="POST" action="RegisterProcess.php">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" >
      </div>
      <div class="form-group">
        <label for="lastname">Sobrenome:</label>
        <input type="text" id="lastname" name="lastname" >
      </div>
      <div class="form-group">
        <label for="email">Endereço de E-mail:</label>
        <input type="email" id="email" name="email" >
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" >
      </div>
      <div class="form-group">
        <label for="repeatpassword">Repetir Senha:</label>
        <input type="password" id="repeatpassword" name="repeatpassword" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Cadastrar">
      </div>
    </form>
  </div>
  <footer class="footer">
    <div class="logo">Minha Empresa</div>
    <div class="contact-info">
      <p>Endereço: Rua Fictícia, 1234</p>
      <p>Telefone: (00) 1234-5678</p>
      <p>E-mail: info@minhaempresa.com</p>
    </div>
    <div class="social-media">
      <a href="#">Facebook</a>
      <a href="#">Twitter</a>
      <a href="#">Instagram</a>
    </div>
    <p>Todos os direitos reservados &copy; 2023 Minha Empresa</p>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
      $('#caduser').submit(function(e) {
    e.preventDefault();
    var formulario = $(this);
    alert(formulario.serialize());
    var retorno = inserirFormulario(formulario);
    });

    function inserirFormulario(dados) {
        $.ajax({
            type: "POST",
            data: dados.serialize(),
            url: "../controller/RegisterProcess.php",
            async: false
        }).done(sucesso).fail(falha);
    }

    function sucesso(data) {
        console.log(data);
    }

    function falha() {
        console.log("erro");
    }

  </script>
</body>

</html>