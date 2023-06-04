<!DOCTYPE html>
<html>
<head>
  <title>Dashboard Estilizada</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 top-menu">
        <div class="user-profile">
          <span>Bem-vindo, Usuário</span>
          <a href="#">Perfil</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 sidebar">
        <div class="logo">Minha Dashboard</div>
        <ul>
          <li><a href="#">Início</a></li>
          <li><a href="#">Cursos</a></li>
          <li><a href="#">Fórum</a></li>
          <li><a href="#">Configurações</a></li>
        </ul>
      </div>
      <div class="col-md-9 content">
        <h2>Player de Video</h2>
        <video class="video-player" controls>
          <source src="movies/teste.mp4" type="video/mp4">
          Seu navegador não suporta o elemento de vídeo.
        </video>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
