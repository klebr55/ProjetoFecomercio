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

            $msg = false;

            $diretorio = "C:/xampp/htdocs/ProjetoFecomercio/upload/";
            
            if (isset($_FILES['arquivo'])) {
                $nome_arquivo = $_FILES['arquivo']['name'];
                $diretorio = "/ProjetoFecomercio/upload/";

                // Verifique se o campo "codigo" está definido
                if (isset($_POST['codigo'])) {
                    $codigo = $_POST['codigo'];

                    // Verifique se o diretório de upload existe
                    if (!is_dir($diretorio)) {
                        mkdir($diretorio, 0777, true);
                    }

                    // Mova o arquivo temporário para o diretório de upload
                    $arquivo_destino = $_SERVER['DOCUMENT_ROOT'] . '/ProjetoFecomercio/upload/' . $nome_arquivo;
                    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $arquivo_destino)) {
                        // Atualize a coluna "arquivo" para a entrada com o código especificado
                        $sql_code = "UPDATE arquivo SET arquivo = '$nome_arquivo', data = NOW() WHERE codigo = $codigo";
                        if ($conn->query($sql_code)) {
                            $msg = "Arquivo atualizado com sucesso para a seção $codigo!";
                        } else {
                            $msg = "Falha ao atualizar o arquivo para a seção $codigo: " . $conn->error;
                        }
                    } else {
                        $msg = "Falha ao mover o arquivo para o diretório.";
                    }
                } else {
                    $msg = "Campo 'codigo' não definido.";
                }
            }

            // Feche a conexão com o banco de dados
            $conn->close();
            ?>

            <!-- Preloader -->
            <div class="holder">
                <div class="preloader"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div> 
            </div>
            <!-- Fim do Preloader -->

            <p style="font-family: Arial, Helvetica, sans-serif; text-align: center; font-size: 40px; font-weight: bold;"> Fazer Upload da imagem da Seção 1 do Carrossel </p>

            <div class="container4" style="transform: translateY(-20%);">
                <form style="border-radius: 1rem; width: 100%; max-width: 45rem; margin-left: 350px; transform: translateY(20%);" action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="codigo" value="21">
                    <div class="form-group" x-data="{ fileName: '' }">
                        <div class="input-group shadow">
                            <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
                            <input type="file" required name="arquivo" x-ref="file" @change="fileName = $refs.file.files[0].name" name="img[]" class="d-none">
                            <input type="text" class="form-control form-control-lg" placeholder="Selecione a Imagem" x-model="fileName">
                            <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Procurar</button>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 20px; margin-bottom: 100px;">
                    <input type="submit" class="btn btn-primary" value="Retornar para página de edição do carrossel" style="margin-top: 20px; margin-bottom: 100px;" onclick="window.location.href = 'carousel_edit.php';">
                </form>
            </div>

            <p style="font-family: Arial, Helvetica, sans-serif; text-align: center; font-size: 40px; font-weight: bold;"> Fazer Upload da imagem da Seção 2 do Carrossel </p>

            <div class="container4">
                <form style="border-radius: 1rem; width: 100%; max-width: 45rem; margin-left: 350px; margin-top: 60px;" action="upload.php" method="POST" enctype="multipart/form-data"> 
                    <input type="hidden" name="codigo" value="22">
                    <div class="form-group" x-data="{ fileName: '' }">
                        <div class="input-group shadow">
                            <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
                            <input type="file" required name="arquivo" x-ref="file" @change="fileName = $refs.file.files[0].name" name="img[]" class="d-none">
                            <input type="text" class="form-control form-control-lg" placeholder="Selecione a Imagem" x-model="fileName">
                            <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Procurar</button>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 20px;">
                    <input type="submit" class="btn btn-primary" value="Retornar para página de edição do carrossel" style="margin-top: 20px;" onclick="window.location.href = 'carousel_edit.php';">
                </form>
            </div>


            <p style="font-family: Arial, Helvetica, sans-serif; text-align: center; font-size: 40px; font-weight: bold; margin-top: 60px;"> Fazer Upload da imagem da Seção 3 do Carrossel </p>

            <div class="container4">
                <form style="border-radius: 1rem; width: 100%; max-width: 45rem; margin-left: 350px; transform: translateY(20%);" action="upload.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="codigo" value="23">
                    <div class="form-group" x-data="{ fileName: '' }">
                        <div class="input-group shadow">
                            <span class="input-group-text px-3 text-muted"><i class="fas fa-image fa-lg"></i></span>
                            <input type="file" required name="arquivo" x-ref="file" @change="fileName = $refs.file.files[0].name" name="img[]" class="d-none">
                            <input type="text" class="form-control form-control-lg" placeholder="Selecione a Imagem" x-model="fileName">
                            <button class="browse btn btn-primary px-4" type="button" x-on:click.prevent="$refs.file.click()"><i class="fas fa-image"></i> Procurar</button>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 20px;">
                    <input type="submit" class="btn btn-primary" value="Retornar para página de edição do carrossel" style="margin-top: 20px;" onclick="window.location.href = 'carousel_edit.php';">
                </form>
            </div>

            <header>
                <div class="logo">Sincad<span>MT</span></div>
            </header>
            <div class="nav-btn">Menu</div>
                <div class="container invisible">
                    
                    <div class="sidebar">
                        <nav>
                            <a href="#">Painel do<span> Admin</span></a>
                            <ul>
                                <li><a href="admin_panel.php">Dashboard</a></li>
                                <li class="active"><a href="carousel_edit.php">Editar Carrossel</a></li>
                                <li><a href="cards_edit.php">Editar Cards</a></li>
                                <li><a href="/ProjetoFecomercio/index.php">Logout</a></li>
                            </ul>
                        </nav>
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
