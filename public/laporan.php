<?php
  session_start();
  ob_start();
  include "koneksi.php";

  $master = new sql($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/faf88445ba.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='img/logo2.png' rel='shortcut icon' />
    <title>ZakatFitr | Berbagi Berkah Dengan ZakatFitr</title>
</head>
<body class="font-worksans">
    <div class="flex">
    <?php
      include "header.php";
      ?>
      <div class="text-center mx-auto p-5">
        <div>
            <h1 class="font-bold py-5 text-4xl text-center">Laporan</h1>
            <div>
              <a href="./lappengumpulan.php"><button class="border border-black rounded-lg p-10 m-10 duration-300 hover:bg-blue-400"><i class="fa-solid fa-print"></i> Cetak Laporan Pengumpulan (.pdf)</button></a>
              <a href="./lapdistribusi.php"><button class="border border-black rounded-lg p-10 m-10 duration-300 hover:bg-blue-400"><i class="fa-solid fa-print"></i> Cetak Laporan Distribusi (.pdf)</button></a>
            </div>
        </div>
      </div>
     </div>
</body>
</html>