<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>File upload</title>
</head>
<body>
  <h1>Redimensione sua Imagem</h1>
  <hr>
  <form action="fileUpload.php" method="POST" enctype="multipart/form-data">
    Selecione uma image...
    <input type="file" name="image" id="image">
    <p>
      Largura: <input type="number" name="width" id="width" required>
    </p>
    <p>
      Altura: <input type="number" name="height" id="height">
    </p>
    <input type="submit" value="Carregar imagem">
  </form>
</body>
</html>