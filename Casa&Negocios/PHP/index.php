<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Casa & Negócios</title>
  <style>

body, header {
      font-family: 'Poppins', sans-serif; /* Aplica a fonte Poppins para todo o corpo e cabeçalho */
    }
    /* Estilos adicionais para centralizar o slider e ajustar o tamanho das imagens */
    #slider-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 60vh; /* Ajuste conforme necessário */
    }

    .rslides img {
      width: 100%; /* Utiliza toda a largura disponível */
      height: 200px; /* Ajuste a altura conforme necessário */
      object-fit: cover; /* Mantém proporções e corta conforme necessário */
    }


  </style>
  <link rel="stylesheet" href="../CSS/style.css">
  <link rel="stylesheet" href="../CSS/responsiveslides.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="../JS/responsiveslides.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    $(document).ready(function() {
      // Ajusta as dimensões das imagens logo após o carregamento da página
      $('.rslides img').each(function() {
        $(this).css({
          'height': '400px' // Ajuste conforme desejado
        });
      });

      // Inicializa o slider responsivo
      $("#slider1").responsiveSlides({
        maxwidth: 800,
        speed: 800
      });
    });
  </script>
</head>
<body class="bg-white font-family-karla h-screen">
  <header>
    <div class="logo">
      <img src="../IMAGENS/logo.png" alt="Logo da Casa & Negócios">
    </div>
    <nav>
      <ul>
        <li><a href="#home" class="text-center text-2xl nav-link">Home</a></li>
        <li><a href="#sobre" class="text-center text-2xl nav-link">Sobre</a></li>
        <li><a href="#servicos" class="text-center text-2xl nav-link">Serviços</a></li>
        <li><a href="#contato" class="text-center text-2xl nav-link">Contato</a></li>
      </ul>
    </nav>
    <div class="auth-buttons">
      <a href="login.php" class="button login text-center text-2xl">Login</a>
      <a href="cadastro.php" class="button register text-center text-2xl">Cadastro</a>
    </div>
  </header>

  <br><br>

  <div id="wrapper">
    <div id="slider-container">
      <ul class="rslides" id="slider1">
        <li><img src="../IMAGENS/dog.jpg" alt=""></li>
        <li><img src="../IMAGENS/eletricista.png" alt=""></li>
        <li><img src="../IMAGENS/limpeza.jpg" alt=""></li>
        <li><img src="../IMAGENS/dog2.jpg" alt=""></li>
        <li><img src="../IMAGENS/eletricista2.png" alt=""></li>
        <li><img src="../IMAGENS/limpeza.png" alt=""></li>
      </ul>
    </div>
  </div>

  <br><br><br><br><br><br><br><br><br><br><br>
  
  <footer>
    <p>&copy; 2024 Casa & Negócios. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
