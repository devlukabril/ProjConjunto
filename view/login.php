<?php 
if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
  echo "Credenciais inválidas. Por favor, tente novamente.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <form method="POST" action="authuser.php">
      <div class="form-group">
        <label for="email">Usuário:</label>
        <input type="text" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <div class="form-group">
        <input type="submit" value="Entrar" name="submit">
      </div>
    </form>   
</body>

</html>