<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Painel do Administrador</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/phpcss.css">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/phpscss.css">
  <link rel="stylesheet" href="/ProjetoFecomercio/assets/css/phpscss.css.map">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                <div class="container">
                    
                    <div class="sidebar">
                        <nav>
                            <a href="#">Painel do<span> Admin</span></a>
                            <ul>
                                <li class="active"><a href="admin_panel.php">Dashboard</a></li>
                                <li><a href="carousel_edit.php">Editar Carrossel</a></li>
                                <li><a href="cards_edit.php">Editar Cards</a></li>
                                <li><a href="/ProjetoFecomercio/index.php">Logout</a></li>
                            </ul>
                        </nav>
                    </div>

                    <div class="main-content">
                        <h1>Bem vindo, Administrador(a)</h1>
                        <p></p>
                        <div class="panel-wrapper">
                            <div class="panel-head">
                                Boas notícias
                            </div>
                            <div class="panel-body" style="transform: translateY(-30%); font-size: larger; text-align: center;">
                                Você foi logado com sucesso! Aproveite seus recursos
                                para editar as seguintes funcionalidades da página:
                            </div>
                            <div class="container">
                                <button onclick="window.location.href = 'carousel_edit.php';" hidden="true">Ir para edição do carrossel</button>
                                <div class="row" style="transform: translateY(-20%); text-align: center;">
                                    <div class="col-md-6">
                                        <p style="font-weight: bold; font-size: larger; font-family: Arial, Helvetica, sans-serif;">Editar carrossel</p>
                                        <img src="https://cdn.dribbble.com/users/21402/screenshots/2386961/css_carousel.gif" onclick="window.location.href = 'carousel_edit.php';" alt="Editar um carrossel" style="width: 500px; padding: 0px 10px;">
                                    </div>
                                    <div class="col-md-6">
                                        <p style="font-weight: bold; font-size: larger; font-family: Arial, Helvetica, sans-serif;">Editar cards</p>
                                        <img src="/ProjetoFecomercio/assets/images/gifs/cardgif.gif" onclick="window.location.href = 'cards_edit.php';" alt="Editar os cards" style="width: 400px; padding: 0px;">
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
                        /* Act on the event */
                        $('.sidebar').slideToggle('fast');

                        window.onresize = function(){
                            if ($(window).width() >= 768) {
                                $('.sidebar').show();
                            } else {
                                $('.sidebar').hide();
                            }
                        };
                    });
                });
            </script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        </body>
</html>
