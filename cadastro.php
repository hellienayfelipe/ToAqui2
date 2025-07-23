<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <img src="logo_senac.png" class="logo" alt="Senac" />
  </header>

  <main>
    <form action="salvar.php" method="POST" enctype="multipart/form-data">
      <label>Nome: <input type="text" name="nome" required></label>
      <label>Email: <input type="email" name="email" required></label>
      <label>Telefone: <input type="tel" name="telefone"></label>
      <label>Categoria: <input type="text" name="categoria" required></label>
      <label>Produto/Serviço: <input type="text" name="produto" required></label>
      <label>Descrição: <textarea name="descricao" required></textarea></label>
      <label>Link: <input type="url" name="link"></label>
      <label>Imagem: <input type="file" name="imagem" accept="image/*"></label>
      <button type="submit">PUBLICAR</button>
    </form>
  </main>
</body>
</html>