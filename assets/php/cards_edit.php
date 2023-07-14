<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Editor de Carrossel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/phpcss.css">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/phpscss.css">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/phpscss.css.map">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/uploadscss.css">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/uploadscss.scss">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/uploadscss.css.map">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    .invisible {
      visibility: hidden;
    }
  </style>
</head>
        <body>
            <?php 
            // Inicie a sessão
            session_start();

            // Verifique se o usuário está autenticado
            if (!isset($_SESSION['username'])) {
                // Usuário não autenticado, redirecione-o para a página de login
                header("Location: /ProjetoFecomercio/signin.html");
                exit();
            }

            // Realize a conexão com o banco de dados (substitua as informações de conexão com as suas)
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "carousel_system";

            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifique a conexão com o banco de dados
            if ($conn->connect_error) {
                die("Falha na conexão com o banco de dados: " . $conn->connect_error);
            }

            // Feche a conexão com o banco de dados
            $conn->close();
            ?>

            <!-- Preloader -->
            <div class="holder">
                <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div> 
            </div>
            <!-- Fim do Preloader -->

            <header>
                <div class="logo">Sincad<span>MT</span></div>
            </header>
            <div class="nav-btn">Menu</div>
                <div class="container invisible">
                    
                    <div class="sidebar">
                        <nav>
                            <a href="admin_panel.php">Painel do<span> Admin</span></a>
                            <ul>
                                <li><a href="admin_panel.php">Dashboard</a></li>
                                <li><a href="carousel_edit.php">Editar Carrossel</a></li>
                                <li class="active"><a href="cards_edit.php">Editar Cards</a></li>
                                <li><a href="/ProjetoFecomercio/index.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="main-content invisible">
                        <h1>Bem vindo, Administrador(a)</h1>
                        <p></p>
                        <div class="panel-wrapper">
                            <div class="panel-head">
                                Editor dos Cards da Página Inicial
                            </div>
                            <div class="container">
                                <div class="row" style="transform: translateY(-7%);">
                                    <div class="panel-body" style="transform: translateY(20%); margin-left: 0;">
                                        <p style="font-size: 3.5vh; font-family: Arial, Helvetica, sans-serif; font-weight: bold;">Aqui você edita os Cards da página inicial.</p> <br>
                                        <p style="font-size: 2.5vh; font-family: Arial, Helvetica, sans-serif; font-weight: bold; margin-top: -40px; margin-bottom: 50px;"> Atenção: Cuidado! Ao alterar o conteúdo dos Cards, 
                                        você pode acabar comprometendo o layout da página se não souber editar adequadamente.</p>
                                        <p style="font-size: 3.5vh; font-family: Arial, Helvetica, sans-serif; font-weight: bold;"> Guia Rápido 🧮 </p>
                                        <p style="font-size: 2.5vh; font-family: Arial, Helvetica, sans-serif; font-weight: bold;">
                                        URL da Imagem: Aqui você irá colocar o endereço da imagem que você quer escolher para aparecer na seção correspondente que você está alterando nos cards. Pegue qualquer imagem que quiser da internet e faça um teste, busque uma imagem, com o botão direito do mouse, clique em "abrir imagem em nova guia", clique novamente com o botão direito do mouse em cima da imagem e selecione a opção "Copiar endereço da imagem". Agora volte aqui e cole no campo "URL da Imagem". <br> <br>
                                        Subtítulo: É meio que auto-explicativo, aqui você coloca o subtítulo desejado para a notícia. <br> <br>
                                        Título: Mesma coisa do subtítulo. Fique a vontade para editar o título da notícia. <br> <br>
                                        URL de Redirecionamento: Aqui você irá colocar o url do site onde estará hospedada a notícia. O link que colocares aqui será o mesmo que você será redirecionado quando clicar em cima do Card.</p>
                                    </div>

                                    <div class="col" style="margin-top: 15vh;">
                                        <p style="font-size: 3vh;">Editar 1° card</p>

                                        <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 10px;" onclick="window.location.href = 'cardsupload.php';">Ir para página de upload de imagens</button>

                                        <p style="margin-top: 10px; font-weight: bold;">Ou insira o URL da Imagem abaixo 🔻</p>

                                        <form action="process_cards_edit.php" method="post">
                                        <div class="form-group">
                                            <label for="image_url">URL da Imagem:</label>
                                            <input type="text" class="form-control" name="image_url" id="image_url">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="subtitle">Subtítulo:</label>
                                            <input type="text" class="form-control" name="subtitle" id="subtitle">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Título:</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>

                                        <div class="form-group">
                                            <label for="link">URL de Redirecionamento:</label>
                                            <input type="text" class="form-control" name="link" id="link">
                                        </div>

                                        <input type="hidden" name="image_path" value="<?php echo $newImagePath; ?>">
                                        <input type="hidden" name="section1_submit" value="1">
                                        <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 20px;">
                                        <input type="button" class="btn btn-primary button1" value="Ver Alterações" style="margin-top: 20px; " id="btnRedirect">
                                        <input type="submit" class="btn btn-primary" value="Limpar banco de dados" style="margin-top: 20px;">
                                        </form>

                                        <p style="font-size: 3vh; margin-top: 60px;">Editar 2° card</p>

                                        <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 10px;" onclick="window.location.href = 'cardsupload.php';">Ir para página de upload de imagens</button>

                                        <p style="margin-top: 10px; font-weight: bold;">Ou insira o URL da Imagem abaixo 🔻</p>

                                        <form action="process_cards_edit2.php" method="post">
                                        <div class="form-group">
                                            <label for="image_url">URL da Imagem:</label>
                                            <input type="text" class="form-control" name="image_url" id="image_url">
                                        </div>

                                        <div class="form-group">
                                            <label for="subtitle">Subtítulo:</label>
                                            <input type="text" class="form-control" name="subtitle" id="subtitle">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Título:</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>

                                        <div class="form-group">
                                            <label for="link">URL de Redirecionamento:</label>
                                            <input type="text" class="form-control" name="link" id="link">
                                        </div>

                                        <input type="hidden" name="section2_submit" value="1">
                                        <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 20px;">
                                        <input type="button" class="btn btn-primary button2" value="Ver Alterações" style="margin-top: 20px;" id="btnRedirect">
                                        <input type="submit" class="btn btn-primary" value="Limpar banco de dados" style="margin-top: 20px;">
                                        </form>

                                        <p style="font-size: 3vh; margin-top: 60px;">Editar 3° card</p>

                                        <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 10px;" onclick="window.location.href = 'cardsupload.php';">Ir para página de upload de imagens</button>

                                        <p style="margin-top: 10px; font-weight: bold;">Ou insira o URL da Imagem abaixo 🔻</p>

                                        <form action="process_cards_edit3.php" method="post">
                                        <div class="form-group">
                                            <label for="image_url">URL da Imagem:</label>
                                            <input type="text" class="form-control" name="image_url" id="image_url">
                                        </div>

                                        <div class="form-group">
                                            <label for="subtitle">Subtítulo:</label>
                                            <input type="text" class="form-control" name="subtitle" id="subtitle">
                                        </div>

                                        <div class="form-group">
                                            <label for="title">Título:</label>
                                            <input type="text" class="form-control" name="title" id="title">
                                        </div>

                                        <div class="form-group">
                                            <label for="link">URL de Redirecionamento:</label>
                                            <input type="text" class="form-control" name="link" id="link">
                                        </div>

                                        <input type="hidden" name="section3_submit" value="1">
                                        <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 20px;">
                                        <input type="button" class="btn btn-primary button3" value="Ver Alterações" style="margin-top: 20px;" id="btnRedirect">
                                        <input type="submit" class="btn btn-primary" value="Limpar banco de dados" style="margin-top: 20px;">
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                setTimeout(function() {
                    $('.holder').fadeToggle();
                }, 2500);

                window.addEventListener('load', function() {
                document.documentElement.scrollTop = 0;
                });
            </script>

            <script>
                $(document).ready(function() {
                $('.nav-btn').on('click', function(event) {
                    event.preventDefault();
                    $('.sidebar').slideToggle('fast');

                    window.onresize = function() {
                    if ($(window).width() >= 768) {
                        $('.sidebar').show();
                        $('.main-content').show(); // Exibe a classe .main-content quando a largura da janela for maior ou igual a 768px
                    } else {
                        $('.sidebar').hide();
                        $('.main-content').hide(); // Oculta a classe .main-content quando a largura da janela for menor que 768px
                    }
                    };
                });

                setTimeout(function() {
                    $('.holder').fadeOut(function() {
                    $('.container, .main-content, .container2').removeClass('invisible'); // Remove a classe "invisible" para exibir o conteúdo da .container e .main-content
                    });
                }, 2500);
                });

                window.addEventListener('load', function() {
                setTimeout(function() {
                    $('.holder').fadeOut(function() {
                    $('.container, .container2').removeClass('invisible');
                    });
                }, 2500);
                });

            </script>

            <script>
            document.getElementById('btnRedirect').addEventListener('click', function() {
                window.location.href = '/ProjetoFecomercio/index.php';
            });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@latest" defer></script>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

        </body>
</html>
