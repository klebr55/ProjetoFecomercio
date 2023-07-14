<?php
// Realize a conexão com o banco de dados (substitua as informações de conexão com as suas)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cards";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifique a conexão com o banco de dados
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtenha os valores dos campos do formulário
    $image_url = isset($_POST["image_url"]) ? $_POST["image_url"] : "";
    $title = isset($_POST["title"]) ? $_POST["title"] : "";
    $subtitle = isset($_POST["subtitle"]) ? $_POST["subtitle"] : "";
    $link = isset($_POST["link"]) ? $_POST["link"] : "";

    // Atualize os dados na tabela
    $sql = "UPDATE cards_data2 SET image_url=?, title=?, subtitle=?, link=? WHERE id=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $image_url, $title, $subtitle, $link);

    if ($stmt->execute()) {
        echo "Dados do carrossel atualizados com sucesso!";
    } else {
        echo "Erro ao atualizar os dados do carrossel: " . $stmt->error;
    }

    $stmt->close();
}

// Armazene os valores atualizados em variáveis
$newImageUrl = isset($_POST["image_url"]) ? $_POST["image_url"] : "";
$newTitle = isset($_POST["title"]) ? $_POST["title"] : "";
$newSubtitle = isset($_POST["subtitle"]) ? $_POST["subtitle"] : "";
$newLink = isset($_POST["link"]) ? $_POST["link"] : "";

// Feche a conexão com o banco de dados
$conn->close();

// Redirecione de volta para cards_edit.php
echo '<script>window.location.href = "/ProjetoFecomercio/assets/php/cards_edit.php";</script>';
exit();
?>