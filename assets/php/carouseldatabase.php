<?php 
// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carousel_system";

// Criar uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Inicializar as variáveis das três seções do carrossel
$image_url1 = "";
$image_url2 = "";
$image_url3 = "";
$title1 = "";
$title2 = "";
$title3 = "";
$subtitle1 = "";
$subtitle2 = "";
$subtitle3 = "";
$link1 = "";
$link2 = "";
$link3 = "";

// Executar uma consulta SQL para obter os valores atualizados da tabela carousel_data
$sql = "SELECT * FROM carousel_data WHERE id = 1";
$result = $conn->query($sql);

// Verificar se a consulta retornou algum resultado
if ($result->num_rows > 0) {
    // Obter os dados do primeiro registro
    $row = $result->fetch_assoc();

    // Armazenar os valores em variáveis para a seção 1 do carrossel
    $image_url1 = $row["image_url"];
    $title1 = $row["title"];
    $subtitle1 = $row["subtitle"];
    $link1 = $row["link"];
}

// Executar uma consulta SQL para obter os valores atualizados da tabela carousel_data2
$sql2 = "SELECT * FROM carousel_data2 WHERE id = 1";
$result2 = $conn->query($sql2);

// Verificar se a consulta retornou algum resultado
if ($result2->num_rows > 0) {
    // Obter os dados do primeiro registro
    $row2 = $result2->fetch_assoc();

    // Armazenar os valores em variáveis para a seção 2 do carrossel
    $image_url2 = $row2["image_url"];
    $title2 = $row2["title"];
    $subtitle2 = $row2["subtitle"];
    $link2 = $row2["link"];
}

// Executar uma consulta SQL para obter os valores atualizados da tabela carousel_data3
$sql3 = "SELECT * FROM carousel_data3 WHERE id = 1";
$result3 = $conn->query($sql3);

// Verificar se a consulta retornou algum resultado
if ($result3->num_rows > 0) {
    // Obter os dados do primeiro registro
    $row3 = $result3->fetch_assoc();

    // Armazenar os valores em variáveis para a seção 3 do carrossel
    $image_url3 = $row3["image_url"];
    $title3 = $row3["title"];
    $subtitle3 = $row3["subtitle"];
    $link3 = $row3["link"];
}

$row1 = null;
$row2 = null;
$row3 = null;

// Verificar se as variáveis de image_url estão vazias e atribuir os valores da tabela "arquivos" se necessário
if (empty($image_url1)) {
    // Executar uma consulta SQL para obter a imagem da seção 1
    $sql1 = "SELECT * FROM arquivo WHERE codigo = 21";
    $result1 = $conn->query($sql1);

    // Verificar se a consulta retornou algum resultado
    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $image_url1 = "/ProjetoFecomercio/upload/" . $row1["arquivo"];
    }
}

if (empty($image_url2)) {
    // Executar uma consulta SQL para obter a imagem da seção 2
    $sql2 = "SELECT * FROM arquivo WHERE codigo = 22";
    $result2 = $conn->query($sql2);

    // Verificar se a consulta retornou algum resultado
    if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $image_url2 = "/ProjetoFecomercio/upload/" . $row2["arquivo"];
    }
}

if (empty($image_url3)) {
    // Executar uma consulta SQL para obter a imagem da seção 3
    $sql3 = "SELECT * FROM arquivo WHERE codigo = 23";
    $result3 = $conn->query($sql3);

    // Verificar se a consulta retornou algum resultado
    if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $image_url3 = "/ProjetoFecomercio/upload/" . $row3["arquivo"];
    }
}

// Fechar a conexão com o banco de dados
$conn->close();
?>