<?php
  session_start();
  ob_start();
  include "koneksi.php";

  $sqlamil = mysqli_query($conn, "SELECT * FROM amil WHERE uname = '$_SESSION[uname]'");
  $amil    =mysqli_fetch_array($sqlamil);
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
      <div class="text-center mx-auto w-5/6">
        <h1 class="text-4xl font-bold mt-10">Dashboard</h1>
        <p class="text-lg m-2">Tampilan Keseluruhan Data</p>
        <div class="flex justify-around">
            <div class="rounded-lg overflow-hidden m-5">
              <canvas class="p-1" id="chartPie"></canvas>
              <p>Jumlah Muzakki : <?=$master->all_muzakki()->num_rows?></p>
              <p>Jumlah Mustahik : <?=$master->all_mustahik()->num_rows?></p>
            </div>
            <div class="my-10">
              <h1 class="font-bold text-2xl ">Konversi Uang</h1>
              <div class="text-left p-5">
                <p>Beras per muzakki : 2,5 kg : Rp. 37500</p>
                <?php 
                $fetch_beras = $master->besarbayar('beras')->fetch_array();
                $fetch_uang = $master->besarbayar('uang')->fetch_array();
                $fetch_dist = $master->bsrdistribusi()->fetch_array();
                $fetch_orang = $master->distribusi()->fetch_array()
                ?>
                <p>Beras yang terkumpul : <?=$fetch_beras['SUM(besar_bayar)']?> kg</p>
                <p>Uang yang terkumpul : Rp. <?=$fetch_uang['SUM(besar_bayar)']?></p>
                <?php
                  $konversi = $fetch_uang['SUM(besar_bayar)'] / 37500 * 2.5;
                  $total = $fetch_beras['SUM(besar_bayar)'] + $konversi;
                ?>
                <p>Konversi uang ke beras : <?=$fetch_uang['SUM(besar_bayar)']?> / 37500 = <?=$konversi?> kg</p>
                <p>Total beras : <?=$total?> kg</p>
              </div>
              <?php
              $sisa = $total - $fetch_dist['SUM(besar)'];
              ?>
              <div class="flex mx-auto justify-evenly my-10">
                <div>
                  <h1 class="font-bold text-lg border border-black p-3 rounded-t-lg">Distribusi</h1>
                  <h2 class="font-bold text-2xl border border-black p-5"><?=$fetch_orang['SUM(jml_tanggungan)']?></h2>
                  <p class="font-bold border border-black rounded-b-lg">Orang</p>
                </div>
                <div>
                  <h1 class="font-bold text-lg border border-black p-3 rounded-t-lg">Sisa Beras</h1>
                  <h2 class="font-bold text-2xl border border-black p-5"><?=number_format((float)$sisa, 2, '.', '')?></h2>
                  <p class="font-bold border border-black rounded-b-lg">Kg</p>
                </div>
              </div>
          </div>
        </div>
      </div>
     </div>


   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
    const dataPie = {
      labels: ["Muzakki", "Mustahik", ],
      datasets: [
        {
          label: "Jumlah orang",
          data: [<?=$master->all_muzakki()->num_rows?>, <?=$master->all_mustahik()->num_rows?>],
          backgroundColor: [
            "#FC4F00",
            "#1472FF",
          ],
        },
      ],
    };

    const configPie = {
      type: "pie",
      data: dataPie,
      options: {},
    };

    var chartBar = new Chart(document.getElementById("chartPie"), configPie);
  </script>
</body>
</html>