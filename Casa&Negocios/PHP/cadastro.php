<?php 
session_start();
include("conexao.php");
$conn = new PDO("mysql:dbname=dbCasaNegocios;host=127.0.0.1", 'root', '');
if (isset($_POST['nome']) && isset($_POST['senha']) && isset($_POST['email']) && isset($_POST['confirmar_senha'])){
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $confirmar_senha = $_POST['confirmar_senha'];
        $cmd = $conn->prepare("INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha);");
        $cmd->bindParam(":nome", $nome);
        $cmd->bindParam(":email", $email);
          $cmd->bindParam(":senha", $senha);
          $cmd->execute(); 
          echo 'Funcionou!';
        
} else {
  echo isset($_POST["nome"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla {
            font-family: karla;
        }
    </style>
    <title>Cadastro</title>
  </head>
  <body>
    <img src="../IMAGENS/logo2.png" style="position: absolute; left: 95%; top:1.5%; width:5em;">
    <div class="font-[sans-serif]">
      <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
          <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
            <form method='post' action='#' class="space-y-6">
              <div class="mb-8">
                <h3 class="text-gray-800 text-3xl font-extrabold">Cadastro</h3>
                <p class="text-gray-500 text-sm mt-4 leading-relaxed">Crie sua conta para aproveitar todos os nossos recursos.</p>
              </div>

              <div>
                <label class="text-gray-800 text-sm mb-2 block">Nome de usuário</label>
                <div class="relative flex items-center">
                  <input name="nome" type="text" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Digite seu nome de usuário" />
                </div>
              </div>

              <div>
                <label class="text-gray-800 text-sm mb-2 block">Email</label>
                <div class="relative flex items-center">
                  <input name="email" type="email" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Digite seu email" />
                </div>
              </div>

              <div>
                <label class="text-gray-800 text-sm mb-2 block">Senha</label>
                <div class="relative flex items-center">
                  <input name="senha" type="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Digite sua senha" />
                </div>
              </div>

              <div>
                <label class="text-gray-800 text-sm mb-2 block">Confirmar Senha</label>
                <div class="relative flex items-center">
                  <input name="confirmar_senha" type="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Confirme sua senha" />
                </div>
              </div>

              <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                  <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                  <label for="remember-me" class="ml-3 block text-sm text-gray-800">Lembrar este dispositivo</label>
                </div>

                <div class="text-sm">
                  <a href="javascript:void(0);" class="text-blue-600 hover:underline font-semibold">Esqueceu sua senha?</a>
                </div>
              </div>

              <div class="!mt-8">
                <button type="submit" class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Cadastrar</button>
              </div>

              <p class="text-sm !mt-8 text-center text-gray-800">Já possui um cadastro? <a href="login.php" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Faça login aqui</a></p>
            </form>
          </div>
          <div class="lg:h-[400px] md:h-[300px] max-md:mt-8">
            <img class="space-y-4" src="../IMAGENS/qualidade.jpg" width="568px" height="265px" class="w-full h-full max-md:w-4/5 mx-auto block object-cover" alt="Imagem de Cadastro" />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
