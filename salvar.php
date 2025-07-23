<?php
include 'conexao.php';

$nome      = $_POST['nome'];
$email     = $_POST['email'];
$telefone  = $_POST['telefone'];
$categoria = $_POST['categoria'];
$produto   = $_POST['produto'];
$descricao = $_POST['descricao'];
$link      = $_POST['link'];

$imagem = '';
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
    $ext = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    $imagem_nome = uniqid() . '.' . $ext;
    move_uploaded_file($_FILES['imagem']['tmp_name'], 'uploads/' . $imagem_nome);
    $imagem = 'uploads/' . $imagem_nome;
}

$sql = "INSERT INTO produtos (nome, email, telefone, categoria, produto, descricao, link, imagem)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $nome, $email, $telefone, $categoria, $produto, $descricao, $link, $imagem);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: index.php");
exit;