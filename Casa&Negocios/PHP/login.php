<?php 
session_start();
$conn = new PDO("mysql:dbname=dbCasaNegocios;host=127.0.0.1", 'root', '');
 if (isset($_POST['email'])){ //&& isset($_POST['senha'])){

$email = $_POST['email'];
$senha = $_POST['senha'];

$cmd = $conn->prepare("SELECT  u.id, u.nome, u.email, u.senha FROM usuario u WHERE u.email = :email");
$cmd->bindParam(":email", $email);
$cmd->execute();

$bd = $cmd->fetch();

if ($bd){
    $hash_senha = $bd['senha'];

    if (password_verify($senha, $hash_senha)){
        $_SESSION['nome'] = $bd['nome'];
        $_SESSION['email'] = $bd['email'];
        $_SESSION['senha'] = $bd['senha'];
        $_SESSION['id'] = $bd['id'];
        echo "<h1> DEU CERTO! </h1>";
    } else {
      echo "<h1> DEU NÃO! SENHA ERRADA </h1>";
    } 
    }   else {
      echo "<h1> DEU NÃO! NAO EXISTE </h1>";
  } 
} else {
  echo "<h1 style='position:absolute'> DEU NÃO! </h1>";
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
    <title>Login </title>
  </head>
  <body>
  <img src="../IMAGENS/logo2.png" style="position: absolute; left: 95%; top:1.5%; width:5em;">
  <div class="font-[sans-serif]">
      <div class="min-h-screen flex fle-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full">
          <div class="border border-gray-300 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
            <form class="space-y-4" action='#' method='post'>
              <div class="mb-8">
                <h3 class="text-gray-800 text-3xl font-extrabold">Entre na sua conta</h3>
                <p class="text-gray-500 text-sm mt-4 leading-relaxed">Entre para aproveitar </p>
              </div>
              <div>
                <label class="text-gray-800 text-sm mb-2 block">Seu email</label>
                <div class="relative flex items-center">
                  <input name="email" type="text" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Email" />
                  
                </div>
              </div>
              <div>
                <label class="text-gray-800 text-sm mb-2 block">Senha</label>
                <div class="relative flex items-center">
                  <input name="senha" type="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Senha" />
                  
                </div>
              </div>

              <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                  <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" />
                  <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                    Lembrar este dispositivo
                  </label>
                </div>

                <div class="text-sm">
                  <a href="javascript:void(0);" class="text-blue-600 hover:underline font-semibold">
                    Esqueceu sua senha?
                  </a>
                </div>
              </div>

              <div class="!mt-8">
                <input type="submit" value='Entrar' class="w-full shadow-xl py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">
              </div>
              
              <p class="text-sm !mt-8 text-center text-gray-800">Não possui um cadastro? <a href="cadastro.php" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Cadastre-se aqui</a></p>
            </form>
          </div>
          </form>
          <div class="lg:h-[400px] md:h-[300px] max-md:mt-8">
          <img class="space-y-3" src="../IMAGENS/login-img.webp" class="w-full h-full max-md:w-4/5 mx-auto block object-cover" alt="Dining Experience" />
          </div>
        </div>
      </div>
    </div>
  </body>
</html>