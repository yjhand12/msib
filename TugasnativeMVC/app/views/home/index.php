<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul'];?> </title>
  </head>
  <body>
    <div class="container">
      <div class="jumbotron mt-4">
        <h1 class="display-4">Halo, Selamat Datang !</h1>
        <p class="lead">Perkenalkan, saya <?= $data['nama']; ?> </p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
      </div>
    </div>
  </body>
</html>