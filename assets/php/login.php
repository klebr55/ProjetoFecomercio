<?php
// Obtenha os valores do formulário
$username = $_POST['username'];
$password = $_POST['password'];

// Conecte-se ao banco de dados (certifique-se de usar as credenciais corretas)
$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "user_system";

$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Verifique se houve um erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para buscar o usuário com base no nome de usuário fornecido
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Verifique se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // O nome de usuário existe, verifique a senha
    $row = $result->fetch_assoc();
    $storedPassword = $row['password'];

    // Verifique se a senha corresponde à senha armazenada
    if (password_verify($password, $storedPassword)) {
        // As credenciais estão corretas, crie uma sessão de usuário
        session_start();
        $_SESSION['username'] = $username;
        
        // Defina o cookie de autenticação
        setcookie('user_token', $username, time() + 3600, '/');
        
        // Redirecione para a página restrita após o login bem-sucedido
        header("Location: admin_panel.php");
        exit();
    } else {
        // Senha incorreta
        echo "Senha incorreta";
    }
} else {
    // Nome de usuário não encontrado
    echo "Nome de usuário não encontrado";
}

// Feche a conexão com o banco de dados
$conn->close();

// Verifique a presença do cookie de autenticação
if (isset($_COOKIE['user_token'])) {
    // O cookie de autenticação está presente, o usuário está autenticado
    // Realize as ações necessárias para tratar o usuário autenticado
} else {
    // O cookie de autenticação não está presente, o usuário não está autenticado
    // Redirecione para a página de login ou execute outras ações apropriadas
}
?>
