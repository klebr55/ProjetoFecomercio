<?php 
// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cards";

// Criar uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inicializar as variáveis das três seções do carrossel
$image_url4 = "";
$image_url5 = "";
$image_url6 = "";
$title4 = "";
$title5 = "";
$title6 = "";
$subtitle4 = "";
$subtitle5 = "";
$subtitle6 = "";
$link4 = "";
$link5 = "";
$link6 = "";

// Executar uma consulta SQL para obter os valores atualizados da tabela carousel_data
$sql4 = "SELECT * FROM cards_data WHERE id = 1";
$result4 = $conn->query($sql4);

// Verificar se a consulta retornou algum resultado
if ($result4->num_rows > 0) {
    // Obter os dados do primeiro registro
    $row4 = $result4->fetch_assoc();

    // Armazenar os valores em variáveis para a seção 1 do carrossel
    $image_url4 = $row4["image_url"];
    $title4 = $row4["title"];
    $subtitle4 = $row4["subtitle"];
    $link4 = $row4["link"];
}

// Executar uma consulta SQL para obter os valores atualizados da tabela carousel_data2
$sql5 = "SELECT * FROM cards_data2 WHERE id = 1";
$result5 = $conn->query($sql5);

// Verificar se a consulta retornou algum resultado
if ($result5->num_rows > 0) {
    // Obter os dados do primeiro registro
    $row5 = $result5->fetch_assoc();

    // Armazenar os valores em variáveis para a seção 2 do carrossel
    $image_url5 = $row5["image_url"];
    $title5 = $row5["title"];
    $subtitle5 = $row5["subtitle"];
    $link5 = $row5["link"];
}

// Executar uma consulta SQL para obter os valores atualizados da tabela carousel_data3
$sql6 = "SELECT * FROM cards_data3 WHERE id = 1";
$result6 = $conn->query($sql6);

// Verificar se a consulta retornou algum resultado
if ($result6->num_rows > 0) {
    // Obter os dados do primeiro registro
    $row6 = $result6->fetch_assoc();

    // Armazenar os valores em variáveis para a seção 3 do carrossel
    $image_url6 = $row6["image_url"];
    $title6 = $row6["title"];
    $subtitle6 = $row6["subtitle"];
    $link6 = $row6["link"];
}

$row4 = null;
$row5 = null;
$row6 = null;

// Verificar se as variáveis de image_url estão vazias e atribuir os valores da tabela "arquivos" se necessário
if (empty($image_url4)) {
    // Executar uma consulta SQL para obter a imagem da seção 1
    $sql4 = "SELECT * FROM arquivo2 WHERE codigo = 21";
    $result4 = $conn->query($sql4);

    // Verificar se a consulta retornou algum resultado
    if ($result4->num_rows > 0) {
        $row4 = $result4->fetch_assoc();
        $image_url4 = "/ProjetoFecomercio/uploadcards/" . $row4["arquivo"];
    }
}

if (empty($image_url5)) {
    // Executar uma consulta SQL para obter a imagem da seção 2
    $sql5 = "SELECT * FROM arquivo2 WHERE codigo = 22";
    $result5 = $conn->query($sql5);

    // Verificar se a consulta retornou algum resultado
    if ($result5->num_rows > 0) {
        $row5 = $result5->fetch_assoc();
        $image_url5 = "/ProjetoFecomercio/uploadcards/" . $row5["arquivo"];
    }
}

if (empty($image_url6)) {
    // Executar uma consulta SQL para obter a imagem da seção 3
    $sql6 = "SELECT * FROM arquivo2 WHERE codigo = 23";
    $result6 = $conn->query($sql6);

    // Verificar se a consulta retornou algum resultado
    if ($result6->num_rows > 0) {
        $row6 = $result6->fetch_assoc();
        $image_url6 = "/ProjetoFecomercio/uploadcards/" . $row6["arquivo"];
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>